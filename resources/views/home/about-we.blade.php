@extends('home.layouts.layout')

@section('content')
    <section id="tentangkami" class="pt-3">
        <div class="container " data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <div class="col">
                    <h3 class="fw-bold text-center">Tentang Kami</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p style="text-align: justify">
                        Selamat datang di Go-Course, platform penyedia lembaga kursus yang aman dan terpercaya! Kami berkomitmen untuk
                        memberikan pengalaman belajar yang menarik, interaktif, dan berharga bagi Anda.
                        Go-Course hadir dengan tujuan membantu Anda menemukan lembaga kursus yang sesuai dengan minat dan
                        kebutuhan Anda. Kami bekerja sama dengan berbagai penyedia kursus terbaik untuk menyediakan beragam
                        pilihan kursus yang berkualitas.
                        Tim kami yang berdedikasi akan membantu Anda menavigasi melalui berbagai pilihan kursus yang
                        tersedia. Kami memastikan bahwa setiap kursus yang ditawarkan telah melalui proses seleksi yang
                        ketat untuk memastikan kualitas dan keamanannya.
                        Kami juga memahami pentingnya kenyamanan dan keamanan bagi para pelanggan kami. Oleh karena itu,
                        kami mengupayakan untuk menyediakan fasilitas kursus yang berkualitas tinggi dan lokasi yang nyaman.
                        Tidak hanya itu, kami juga menyediakan layanan pelanggan yang responsif dan siap membantu Anda dalam
                        setiap tahap proses pemesanan. Jika Anda memiliki pertanyaan atau memerlukan bantuan, tim dukungan
                        kami siap menjawab dan memberikan solusi terbaik.
                        Kami berharap dengan menggunakan Go-Course, Anda dapat menemukan lembaga kursus yang sesuai dengan kebutuhan Anda,
                        memperluas pengetahuan, dan membantu Anda mencapai tujuan belajar Anda. Kami berkomitmen untuk terus
                        meningkatkan layanan kami agar dapat memberikan pengalaman yang memuaskan bagi para pelanggan kami.
                        Terima kasih telah memilih Go-Course sebagai pilihan Anda. Mari bersama-sama menjelajahi dunia
                        pengetahuan dan meraih kesuksesan dalam kursus yang Anda pilih.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="location" class="my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h3 class="fw-bold">Lokasi Kami</h3>
                </div>
            </div>
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15813.411677828954!2d112.1803734!3d-7.752341500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785c4fb840026b%3A0x4a55067c6b506aa3!2sKp.%20Inggris%20Pare%2C%20Tulungrejo%2C%20Kec.%20Pare%2C%20Kabupaten%20Kediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1684657340356!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection
