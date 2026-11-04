<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestReceived;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class QuoteRequestEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_quote_page_receives_the_product_image_gallery(): void
    {
        $categoria = Categoria::create([
            'nombre' => 'CategorÃƒÂ­a con galerÃƒÂ­a',
            'descripcion' => 'Prueba de galerÃƒÂ­a de cotizaciÃƒÂ³n',
        ]);
        $images = [
            'img/productos/producto-principal.jpg',
            'img/productos/producto-detalle.jpg',
        ];

        $producto = Producto::create([
            'categoria_id' => $categoria->id,
            'codigo' => 'QUOTE-GALLERY-001',
            'nombre' => 'Producto con varias imÃƒÂ¡genes',
            'slug' => 'producto-con-varias-imagenes',
            'descripcion' => 'Producto de prueba',
            'stock' => 1,
            'imagen' => $images[0],
            'imagenes' => $images,
        ]);

        $this->get('/productos/cotizar/' . $producto->slug)
            ->assertOk()
            ->assertViewHas('productImages', $images)
            ->assertSee('product-image-thumbnails');
    }

    public function test_quote_request_is_sent_to_the_configured_recipient(): void
    {
        config([
            'mail.default' => 'smtp',
            'mail.quote_to' => 'maquitec.servicios0601@gmail.com',
        ]);
        Mail::fake();

        $categoria = Categoria::create([
            'nombre' => 'CategorÃƒÂ­a de cotizaciÃƒÂ³n',
            'slug' => 'categoria-cotizacion',
            'descripcion' => 'Prueba de cotizaciÃƒÂ³n',
        ]);

        $producto = Producto::create([
            'categoria_id' => $categoria->id,
            'codigo' => 'QUOTE-001',
            'nombre' => 'Montacargas de prueba',
            'slug' => 'montacargas-de-prueba',
            'descripcion' => 'Producto de prueba',
            'stock' => 1,
            'imagen' => 'img/logo_pagina_general/logo_maquiteci_transparente.png',
        ]);

        $this->get('/productos/cotizar/' . $producto->slug)
            ->assertOk()
            ->assertViewHas('productImages', [$producto->imagen]);

        $response = $this->from('/productos/cotizar/' . $producto->slug)
            ->post('/productos/cotizar', [
                'product' => $producto->slug,
                'name' => 'Ana PÃƒÂ©rez',
                'company' => 'Empresa de prueba',
                'email' => 'ana@example.com',
                'phone' => '+51 999 111 222',
                'message' => 'Necesito una cotizaciÃƒÂ³n para este equipo.',
            ]);

        $response->assertRedirect('/productos/cotizar/' . $producto->slug)
            ->assertSessionHas('message');

        Mail::assertSent(QuoteRequestReceived::class, function (QuoteRequestReceived $mail) use ($producto) {
            return $mail->hasTo('maquitec.servicios0601@gmail.com')
                && $mail->quote['product_name'] === $producto->nombre
                && $mail->quote['product_image'] === $producto->imagen
                && $mail->quote['email'] === 'ana@example.com';
        });

        $sentMail = Mail::sent(QuoteRequestReceived::class)->first();
        $html = $sentMail->render();

        $this->assertStringContainsString('Responder al cliente', $html);
        $this->assertTrue(
            preg_match('/<img[^>]+src="(?:cid:|data:image\/)/i', $html) === 1,
            'The quote email should contain an inline product image.'
        );
    }
}