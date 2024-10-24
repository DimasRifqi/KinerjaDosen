@extends('layouts.home.app')
@section('title', 'FAQ')
@section('userTypeOnPage', 'SuperAdmin, Dosen, Auditor, OPPT')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    
                        <div>
                        <div class="accordion faq-accordian" id="faqAccordion">
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bagaimana cara mengganti kata sandi?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Masuk ke menu pengaturan akun, kemudian pilih "Ganti Kata Sandi" dan ikuti instruksi yang ada.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Bagaimana cara melihat riwayat absensi?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Klik pada menu "Absensi" di dashboard, kemudian pilih "Riwayat" untuk melihat absensi Anda.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingThree">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Apa yang harus dilakukan jika lupa kata sandi?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Klik "Lupa Kata Sandi" di halaman login, masukkan email yang terdaftar, dan ikuti petunjuk untuk mengatur ulang kata sandi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
.section_padding_130 {
    padding-top: 130px;
    padding-bottom: 130px;
}
.faq_area {
    position: relative;
    z-index: 1;
    background-color: #f5f5ff;
}

.faq-accordian {
    position: relative;
    z-index: 1;
}
.faq-accordian .card {
    position: relative;
    z-index: 1;
    margin-bottom: 1.5rem;
    border: 2px solid #3f43fd; /* Border color dan ketebalan */
    border-radius: 8px; /* Tambahkan sedikit radius jika diperlukan */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek */
}

.faq-accordian .card:last-child {
    margin-bottom: 0;
}
.faq-accordian .card .card-header {
    background-color: #ffffff;
    padding: 0;
    border-bottom-color: #ebebeb;
}
.faq-accordian .card .card-header h6 {
    cursor: pointer;
    padding: 1.75rem 2rem;
    color: #3f43fd;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -ms-grid-row-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}
.faq-accordian .card .card-header h6 span {
    font-size: 1.5rem;
}
.faq-accordian .card .card-header h6.collapsed {
    color: #070a57;
}
.faq-accordian .card .card-header h6.collapsed span {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
}
.faq-accordian .card .card-body {
    padding: 1.75rem 2rem;
}
.faq-accordian .card .card-body p:last-child {
    margin-bottom: 0;
}

@media only screen and (max-width: 575px) {
    .support-button p {
        font-size: 14px;
    }
}

.support-button i {
    color: #3f43fd;
    font-size: 1.25rem;
}
@media only screen and (max-width: 575px) {
    .support-button i {
        font-size: 1rem;
    }
}

.support-button a {
    text-transform: capitalize;
    color: #2ecc71;
}
@media only screen and (max-width: 575px) {
    .support-button a {
        font-size: 13px;
    }
}
</style>


<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
@endsection
