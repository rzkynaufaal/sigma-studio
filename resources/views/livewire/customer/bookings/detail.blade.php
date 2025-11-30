@php
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$qr = QrCode::create($booking->code)
    ->setSize(240)
    ->setMargin(10);

$writer = new PngWriter();
$result = $writer->write($qr);

$qrDataUri = $result->getDataUri();
@endphp

<div class="space-y-8">

    <h1 class="text-3xl font-bold text-white">Detail Booking</h1>

    <div class="bg-zinc-900 p-6 rounded-xl border border-zinc-700 space-y-2">
        <p class="text-white text-lg font-semibold">{{ $booking->service->name }}</p>

        <p class="text-zinc-400">Tanggal: {{ $booking->booking_date->isoFormat('D MMMM YYYY') }}</p>
        <p class="text-zinc-400">Jam: {{ $booking->booking_time }}</p>
        <p class="text-zinc-400 capitalize">Status: {{ $booking->status }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl text-center">
        <h2 class="text-xl font-semibold mb-2 text-black">Barcode / QR Booking</h2>

        {{-- QR CODE --}}
        <img src="{{ $qrDataUri }}" class="mx-auto w-48 h-48">

        <p class="mt-2 text-sm text-black">
            Kode: <strong>{{ $booking->code }}</strong>
        </p>

        <a href="{{ route('customer.bookings.invoice', $booking->id) }}"
            class="mt-4 inline-block px-4 py-2 bg-primary-600 text-white rounded-lg">
            Download Invoice
        </a>
    </div>

</div>
