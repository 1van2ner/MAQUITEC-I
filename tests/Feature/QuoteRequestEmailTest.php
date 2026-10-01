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

    public function test_quote_request_is_sent_to_the_configured_recipient(): void
    {
        config([
            'mail.default' => 'smtp',
            'mail.quote_to' => 'ivan20koji07rv@gmail.com',
        ]);
        Mail::fake();

        $categoria = Categoria::create([
            'nombre' => 'Categoría de cotización',
            'slug' => 'categoria-cotizacion',
            'descripcion' => 'Prueba de cotización',
        ]);

        $producto = Producto::create([
            'categoria_id' => $categoria->id,
            'codigo' => 'QUOTE-001',
            'nombre' => 'Montacargas de prueba',
            'slug' => 'montacargas-de-prueba',
            'descripcion' => 'Producto de prueba',
            'stock' => 1,
            'imagen' => 'img/productos/maquitec_2026_new.jpg',
        ]);

        $response = $this->from('/productos/cotizar/' . $producto->slug)
            ->post('/productos/cotizar', [
                'product' => $producto->slug,
                'name' => 'Ana Pérez',
                'company' => 'Empresa de prueba',
                'email' => 'ana@example.com',
                'phone' => '+51 999 111 222',
                'message' => 'Necesito una cotización para este equipo.',
            ]);

        $response->assertRedirect('/productos/cotizar/' . $producto->slug)
            ->assertSessionHas('message');

        Mail::assertSent(QuoteRequestReceived::class, function (QuoteRequestReceived $mail) use ($producto) {
            return $mail->hasTo('ivan20koji07rv@gmail.com')
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