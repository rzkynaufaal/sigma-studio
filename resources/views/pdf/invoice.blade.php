<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice Booking</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #111;
            color: #f4f4f4;
            padding: 40px;
        }

        .card {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #333;
        }

        h1 {
            color: #f1c40f;
            margin-bottom: 10px;
        }

        .label {
            color: #aaa;
        }

        .value {
            font-weight: bold;
            color: #fff;
        }

        .line {
            border: 0;
            border-top: 1px solid #333;
            margin: 25px 0;
        }

        .qr-box {
            margin-top: 20px;
            padding: 15px;
            background: #0f0f0f;
            border: 1px solid #333;
            border-radius: 10px;
            width: 220px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #666;
        }

        .signature {
            margin-top: 50px;
            text-align: left;
        }

        .gold {
            color: #f1c40f;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>Invoice Booking</h1>

        <!-- INFORMASI -->
        <p>
            <span class="label">Layanan:</span>
            <span class="value">{{ $booking->service->name }}</span>
        </p>

        <p>
            <span class="label">Tanggal:</span>
            <span class="value">{{ $booking->booking_date }}</span>
        </p>

        <p>
            <span class="label">Jam:</span>
            <span class="value">{{ $booking->booking_time }}</span>
        </p>

        <p>
            <span class="label">Harga:</span>
            <span class="value">Rp {{ number_format($booking->price) }}</span>
        </p>

        <hr class="line">

        <h3 class="gold">QR Code Booking</h3>

        <!-- QR CODE -->
        <div class="qr-box">
            <img 
                src="data:image/png;base64,{{ $qr }}"
                width="200"
                alt="QR Code"
                style="border-radius: 8px;"
            >
        </div>

        <div class="signature">
            <p class="label">Tertanda,</p>
            <p class="gold" style="font-size: 16px; margin-top: 6px;">
                Sigma Studio Barbershop
            </p>
        </div>

    </div>

    <p class="footer">© {{ date('Y') }} Sigma Studio. All rights reserved.</p>

</body>
</html>
