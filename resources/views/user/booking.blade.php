<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
            color: #fff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .court-btn {
            background-color: #0582BC;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .court-btn.selected {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        }

        #jam {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .available {
            background-color: #0582BC;
            color: #fff;
            margin: 5px;
            cursor: pointer;
        }

        .selected {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        }

        .unavailable {
            background-color: #B5C1C7;
        }

        .logout-btn {
            background-color: #FF4641;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #9D0803;
        }

        .split-container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
        }

        .left-side {
            flex: 1;
            padding-right: 20px;
        }

        .right-side {
            flex: 1;
            padding-left: 20px;
        }

        .payment-method {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .payment-method label {
            display: block;
            cursor: pointer;
        }

        .payment-method input {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <input readonly hidden type="text" id="harga" name="harga" value="{{ $lapangan->harga_sewa }}">
    <input readonly hidden type="text" id="idl" name="idl" value="{{ $lapangan->id }}">

    <div class="container mt-5">
        <h2 class="mb-4">Formulir Booking Lapangan</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('postPemesanan', $lapangan->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyewa:</label>
                <input type="nama_p" class="form-control border border-
secondary form-control-lg" name="nama_p"
                    required value="{{ old('nama_p') }}">
                <span class="text-danger">
                    @error('nama_p')
                        {{ $message }}
                    @enderror
                </span>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lhari" class="form-label">Pilih Hari:</label>
                        <select class="form-select border border-secondary form-control-lg" id="hari"
                            name="hari" required>
                            <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                            <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="minggu" {{ old('hari') == 'minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                        <span class="text-danger">
                            @error('hari')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                        <input type="date"
                            class="form-control border border-
                        secondary form-control-lg"
                            name="tanggal" required value="{{ old('tanggal') }}">
                        <span class="text-danger">
                            @error('tanggal')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="lapangan" class="form-label">Pilih Lapangan:</label>
                <select class="form-select border border-secondary form-control-lg" id="lapangan" name="lapangan"
                    required>
                    <option value="" disabled selected>Pilih Lapangan</option>
                    @foreach ($j_lapangan as $l)
                        @if ($d == $l->lapangan_id)
                            <option value="{{ $l->id }}">{{ $l->nama_lapangan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai:</label>
                        <select class="form-select border border-secondary form-control-lg" id="jam_mulai"
                            name="jam_mulai" required>
                            <option value="" disabled selected>Pilih Jam Mulai</option>
                            @foreach ($availableTimes as $time)
                                <option value="{{ $time }}">{{ $time < 10 ? "0$time:00" : "$time:00" }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('jam_mulai')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai:</label>
                        <select class="form-select border border-secondary form-control-lg" id="jam_selesai"
                            name="jam_selesai" required>
                            <option value="" disabled selected>Pilih Jam Selesai</option>
                            @for ($i = 8; $i <= 24; $i++)
                                @if ($i > old('jam_mulai', 8))
                                    <option value="{{ $i }}">{{ $i < 10 ? "0$i:00" : "$i:00" }}</option>
                                @endif
                            @endfor
                        </select>
                        <span class="text-danger">
                            @error('jam_selesai')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Biaya</label>
                <div>{{ $lapangan->harga_sewa }}</div>
                <label for="totalCost" class="form-label">Total Biaya:</label>
                <div id="totalCostDisplay"></div>
            </div>

            <div>
                <p style="font-size: 12px; font-style:italic">Setelah melakukan pemesanan, silahkan bayar ditempat</p>
            </div>

            <button type="submit" class="btn btn-primary">Booking Sekarang</button>

            {{-- <a href="{{ route('user.buktiBooking') }}" class="btn btn-primary">Booking Sekarang</a> --}}

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const jamMulaiSelect = document.getElementById("jam_mulai");
        const jamSelesaiSelect = document.getElementById("jam_selesai");
        const totalCostDisplay = document.getElementById("totalCostDisplay");

        jamMulaiSelect.addEventListener("change", calculateTotalCost);
        jamSelesaiSelect.addEventListener("change", calculateTotalCost);

        function calculateTotalCost() {
            const jamMulai = parseInt(jamMulaiSelect.value);
            const jamSelesai = parseInt(jamSelesaiSelect.value);

            // Ensure valid values and jam_selesai is greater than jam_mulai
            if (isNaN(jamMulai) || isNaN(jamSelesai) || jamSelesai <= jamMulai) {
                totalCostDisplay.textContent = "Silahkan pilih jam lainnya";
                return;
            }

            const durasiJam = jamSelesai - jamMulai;
            const hargaSewa = {{ $lapangan->harga_sewa }} // Replace with actual price
            const totalBiaya = durasiJam * hargaSewa;

            totalCostDisplay.textContent = "Rp " + totalBiaya.toLocaleString();
        }
    </script>
</body>

</html>
