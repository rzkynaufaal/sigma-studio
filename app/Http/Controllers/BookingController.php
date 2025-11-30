<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function invoice($id)
    {
        $booking = Booking::with(['customer.user', 'service', 'staff'])
            ->findOrFail($id);

        // QR CODE (PNG)
        $qr = QrCode::format('png')
            ->size(300)
            ->generate($booking->code);

        // HTML untuk PDF
        $html = view('pdf.invoice', [
            'booking' => $booking,
            'qr'      => base64_encode($qr),
        ])->render();

        // Convert ke PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);

        return $pdf->download("invoice-{$booking->invoice_number}.pdf");
    }
}
