<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 20px;
    }

    .container {
        max-width: 600px;
        margin: auto;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .booking-details {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
    }

    .booking-details h2 {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .booking-item {
        margin-bottom: 10px;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
    }
    </style>
    <title>Bukti Pemesanan</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bukti Pemesanan</h1>
        </div>

        <div class="booking-details">
            <h2>Detail Pemesanan</h2>
            <div class="booking-item">
                <strong>Nama Penyewa:</strong> Intan Suhada
            </div>
            <div class="booking-item">
                <strong>Nama Lapangan:</strong> Lapangan 1
            </div>
            <div class="booking-item">
                <strong>Hari:</strong> Kamis
            </div>
            <div class="booking-item">
                <strong>Tanggal:</strong> 2023-12-14
            </div>
            <div class="booking-item">
                <strong>Waktu:</strong> 08:00 - 09:00
            </div>
            <div class="booking-item">
                <strong>Total Biaya:</strong> Rp 27,000
            </div>
        </div>

        <div class="footer">
            <p>Terima kasih telah melakukan pemesanan.</p>
            <a href="{{ route('user.cetakBukti') }}" button onclick="generatePDF()"> Cetak Bukti Pemesanan</a>
        </div>
    </div>

</body>

</html>