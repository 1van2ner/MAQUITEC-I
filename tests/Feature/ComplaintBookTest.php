<?php

namespace Tests\Feature;

use App\Mail\ComplaintReceived;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ComplaintBookTest extends TestCase
{
    public function test_complaint_page_is_public(): void
    {
        $this->get('/libro-de-reclamaciones')->assertOk()->assertSee('Libro de Reclamaciones');
    }

    public function test_complaint_is_sent_to_configured_mailbox(): void
    {
        Mail::fake();
        config()->set('mail.default', 'smtp');
        config()->set('mail.quote_to', 'maquitec.servicios0601@gmail.com');

        $response = $this->post('/libro-de-reclamaciones', [
            'name' => 'Usuario Prueba',
            'document_type' => 'DNI',
            'document_number' => '12345678',
            'email' => 'usuario@example.com',
            'phone' => '963727185',
            'address' => 'Lima',
            'claim_type' => 'Reclamo',
            'product' => 'Montacargas',
            'order_number' => 'PED-001',
            'purchase_date' => '2026-10-20',
            'detail' => 'El equipo presenta una falla de funcionamiento.',
            'customer_request' => 'Solicito revisión técnica.',
            'consent' => '1',
        ]);

        $response->assertSessionHas('message');
        Mail::assertSent(ComplaintReceived::class, function (ComplaintReceived $mail) {
            return $mail->hasTo('maquitec.servicios0601@gmail.com')
                && $mail->claim['claim_type'] === 'Reclamo';
        });
    }
}
