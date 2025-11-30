<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(Booking $booking)
{
    // URL QR yang kamu pakai
    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($booking->code);

    // Ambil gambar dari URL
    $qrImage = file_get_contents($qrUrl);

    // Convert ke base64
    $qrBase64 = base64_encode($qrImage);

    // Load PDF view
    $pdf = PDF::loadView('pdf.invoice', [
        'booking' => $booking,
        'qr' => $qrBase64
    ])->setOptions(['isRemoteEnabled' => true]);

    return $pdf->download('invoice-' . $booking->invoice_number . '.pdf');
}

}
