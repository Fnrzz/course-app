<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $no_transaction }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .label {
            display: inline-block;
            width: 150px;
        }

        .colon {
            display: inline-block;
            width: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col text-center">
                <h1>Go-Course</h1>
            </div>
        </div>
        <div class="row mb-3">
            <p>
                Terima kasih telah memberikan kesempatan kepada kami untuk menjadi bagian dari perjalanan pembelajaran
                Anda. Kami berharap Anda menikmati pengalaman belajar yang interaktif, bermanfaat, dan memuaskan bersama
                kami.
            </p>
        </div>
        <div class="row mb-3">
            <p>
                <span class="label">No Transaksi</span>
                <span class="colon">:</span>
                <span>{{ $no_transaction }}</span>
            </p>
            <p>
                <span class="label">Nama</span>
                <span class="colon">:</span>
                <span>{{ $user_name }}</span>
            </p>
            <p>
                <span class="label">Lembaga</span>
                <span class="colon">:</span>
                <span>{{ $product_name }}</span>
            </p>
            <p>
                <span class="label">Program</span>
                <span class="colon">:</span>
                <span>{{ $course_name }}</span>
            </p>
            <p>
                <span class="label">Langganan</span>
                <span class="colon">:</span>
                <span>{{ $subscribe_name }}</span>
            </p>
            <p>
                <span class="label">Harga</span>
                <span class="colon">:</span>
                <span>Rp.{{ number_format($price, 0, ',', '.') }}</span>
            </p>
            <p>
                <span class="label">Tanggal Transaksi</span>
                <span class="colon">:</span>
                <span>{{ date('d F Y', strtotime($created_at)) }}</span>
            </p>
            <p>
                <span class="label">Tanggal Mulai</span>
                <span class="colon">:</span>
                <span>{{ date('d F Y', strtotime($dateStartClass)) }}</span>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
