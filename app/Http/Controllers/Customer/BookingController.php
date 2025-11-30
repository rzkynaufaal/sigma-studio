<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    // QR image (dipakai <img src="..."> di Blade)
    public function qr(Booking $booking)
    {
        // kalau belum ada code, jaga-jaga generate sederhana
        if (!$booking->code) {
            $booking->code = 'BK-' . str_pad($booking->id, 6, '0', STR_PAD_LEFT);
            $booking->save();
        }

        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new Png()
        );

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($booking->code);

        return response($qrImage)->header('Content-Type', 'image/png');
    }

    // PDF invoice
    public function invoice(Booking $booking)
    {
        // kalau belum ada nomor invoice, generate dulu
        if (!$booking->invoice_number) {
            $booking->invoice_number = 'INV-' . now()->format('Ymd') . '-' . $booking->id;
            $booking->save();
        }

        $pdf = Pdf::loadView('pdf.invoice', [
            'booking' => $booking,
        ]);

        return $pdf->download("invoice-{$booking->invoice_number}.pdf");
    }
}
