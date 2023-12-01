<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $transaction->no_transactions }}</title>
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
        <div class="row my-5">
            <div class="col text-center">
                <h1>Go-Course</h1>
            </div>
        </div>
        <div class="row mb-5">
            <p style="text-align:justify">
                Terima kasih telah memberikan kesempatan kepada kami untuk menjadi bagian dari perjalanan pembelajaran
                Anda. Kami berharap Anda menikmati pengalaman belajar yang interaktif, bermanfaat, dan memuaskan bersama
                kami.
            </p>
        </div>
        <div class="row mb-5">
            <p>
                <span class="label">No Transaksi</span>
                <span class="colon">:</span>
                <span>{{ $transaction->no_transactions }}</span>
            </p>
            <p>
                <span class="label">Nama</span>
                <span class="colon">:</span>
                <span>{{ $transaction->user->first_name . ' ' . $transaction->user->last_name }}</span>
            </p>
            <p>
                <span class="label">Lembaga</span>
                <span class="colon">:</span>
                <span>{{ $transaction->product->courses->name }}</span>
            </p>
            <p>
                <span class="label">Program</span>
                <span class="colon">:</span>
                <span>{{ $transaction->product->name }}</span>
            </p>
            <p>
                <span class="label">Langganan</span>
                <span class="colon">:</span>
                <span>{{ $transaction->subscribe->name }}</span>
            </p>
            <p>
                <span class="label">Harga</span>
                <span class="colon">:</span>
                <span>Rp.{{ number_format($transaction->subscribe->price, 0, ',', '.') }}</span>
            </p>
            <p>
                <span class="label">Tanggal Transaksi</span>
                <span class="colon">:</span>
                <span>{{ date('d F Y', strtotime($transaction->created_at)) }}</span>
            </p>
            <p>
                <span class="label">Tanggal Mulai</span>
                <span class="colon">:</span>
                <span>{{ date('d F Y', strtotime($dateStartClass)) }}</span>
            </p>
        </div>
        <div class="row">
            <p style="text-align:justify">
                Kami berharap bahwa lembaga kursus dan program yang Anda beli akan memberikan manfaat yang signifikan bagi kemajuan
                bahasa Inggris Anda. Tim tutor kami yang berpengalaman dan memiliki profesionalitas dalam proses pembelajaran Anda siap 
                memberikan bimbingan dan dukungan untuk membantu Anda mencapai tujuan bahasa Inggris Anda.
            </p>
            <p style="color:red">
                *nb: Dimohon untuk menunjukkan bukti pembayaran dan kartu identitas Anda ke lembaga kursus yang telah Anda pilih.
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
