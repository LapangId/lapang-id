<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <p class="text-lg font-weight-bold" style="font-size: 30px; margin-bottom: 0;">Bukti pemesanan</p>
                <p style="font-size: 12px; margin-top: 0;">{{ $pay->lokasi }}</p>
            </div>
        </div>
        <div class="row">
            <p class="">Tanggal: {{ $currentDate }}</p>
        </div>

        <hr style="border: 1px solid #000; margin-top: 20px; margin-bottom: 20px;">

        <table class="table table-bordered table-striped" style="font-size: 9px">
            @php
                $totalPrice = 0;
            @endphp
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Penyewa</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @if ($item->users_id == auth()->user()->getId())
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_p }}</td>
                            <td>{{ $item->lapangan->nama_lapangan }}</td>
                            <td>{{ $item->jlapangan->nama_lapangan }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->jam_m }}</td>
                            <td>{{ $item->jam_s }}</td>
                            <td>{{ $item->jam_s - $item->jam_m . ' jam' }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if (
                                    is_numeric($item->jam_s) &&
                                    is_numeric($item->jam_m) &&
                                    is_numeric($item->lapangan->harga_sewa)
                                )
                                    @php
                                        $durasi_booking = $item->jam_s - $item->jam_m;
                                        $total_biaya = $durasi_booking * $item->lapangan->harga_sewa;
                                        echo $total_biaya;
                                    @endphp
                                @else
                                    {{ $item->lapangan->harga_sewa }}
                                @endif
                            </td>
                        </tr>
                       
                    @endif
                @endforeach
            </tbody>
        </table>

        <hr style="border: 1px solid #000; margin-top: 20px; margin-bottom: 30px;">

        <!-- Tambahkan bagian pembayaran -->
        @php
            $change = $pay->amount - $totalPrice;
        @endphp
       
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>Bukti Pemesanan Harus dibawa pada saat melakukan pembayaran!</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk27Z3kp6aOG8ifwB6h+kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
