@extends('layouts/landing/commonMaster' )
@section('title', 'Welcome')
@section('content')
    <main class="main" id="top">
      <div class="content">
        <nav class="navbar navbar-expand-md fixed-top" id="navbar" data-navbar-soft-on-scroll="data-navbar-soft-on-scroll">
          <div class="container-fluid px-0"><a href="/"><img class="navbar-brand w-75 d-md-none" src="{{ asset('images/logos/logo-app-sm.png') }}" alt="logo" /></a><a class="navbar-brand fw-bold d-none d-md-block" href="/">Prestasi</a><a class="btn btn-primary btn-sm ms-md-x1 mt-lg-0 order-md-1 ms-auto" href="{{ route('auth') }}">Login </a><button class="navbar-toggler border-0 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbar-content" data-navbar-collapse="data-navbar-collapse">
              <ul class="navbar-nav gap-md-2 gap-lg-3 pt-x1 pb-1 pt-md-0 pb-md-0" data-navbar-nav="data-navbar-nav">
                <li class="nav-item"> <a class="nav-link lh-xl" href="#home">Home</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="#service">Statistik</a></li>
                <li class="nav-item"> <a class="nav-link lh-xl" href="#about">Alur Permohonan</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div data-bs-target="#navbar" data-bs-spy="scroll" tabindex="0">
          <section class="hero-section overflow-hidden position-relative z-0 mb-4 mb-lg-0" id="home">
            <div class="hero-background">
              <div class="container">
                <div class="row gy-4 gy-md-8 pt-9 pt-lg-0">
                  <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="fs-2 fs-lg-1 text-white fw-bold mb-2 mb-lg-x1 lh-base mt-3 mt-lg-0"> Selamat Datang <span class="text-nowrap">di Prestasi</span></h1>
                    <p class="fs-8 text-white mb-3 mb-lg-4 lh-lg min-vh-75">Pelayanan Surat Keterangan Penelitian Secara <i>Online</i></p>
                    <p class="mb-x1 fs-10 button-text text-uppercase fw-bold lh-base text-300"></p>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-2 position-relative z-2"><a class="border-0 p-0 bg-transparent cursor-pointer rounded-1" href="#!"> </a><a class="border-0 p-0 bg-transparent cursor-pointer rounded-1" href="#!"> </a></div>
                  </div>
                  <div class="col-lg-6 position-lg-relative">
                    <div class="position-lg-absolute z-1 text-center"><img class="img-fluid chat-image" src="{{ asset('brainwave/assets/img/Hero/manager.png') }}" alt="" />
                      <div class="position-absolute dots d-none d-md-block"> <img class="img-fluid w-50 w-lg-75" src="{{ asset('brainwave/assets/img/illustrations/Dots.webp') }}" alt="" /></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="position-absolute bottom-0 start-0 end-0 z-1"><img class="wave mb-md-n2" src="{{ asset('brainwave/assets/img/illustrations/Wave.svg') }}" alt="" />
              <div class="bg-white py-2 py-md-5"></div>
            </div>
          </section>
          <section class="container border-bottom mb-8 mb-lg-10" id="service">
            <div class="row pb-6 pb-lg-8 g-3 g-lg-8 px-3">
              <div class="col-12 col-md-4">
                <h2 class="fs-3 fw-bold lh-sm mb-2 text-center" data-countup='{"endValue":6,"prefix":"0"}'>0</h2>
                <h6 class="fs-8 fw-normal lh-lg mb-0 opacity-70 text-center">Offices are available on different countries</h6>
              </div>
              <div class="col-12 col-md-4">
                <h2 class="fs-3 fw-bold lh-sm mb-2 text-center" data-countup='{"endValue":238}'>0</h2>
                <h6 class="opacity-70 fs-8 fw-normal lh-lg mb-0 text-center">Seats are available right now with support</h6>
              </div>
              <div class="col-12 col-md-4">
                <h2 class="fs-3 fw-bold lh-sm mb-2 text-center" data-countup='{"endValue":1395,"autoIncreasing":true}'>0</h2>
                <h5 class="opacity-70 fs-8 fw-normal lh-lg mb-0 text-center">People are using our co-work spaces right now</h5>
              </div>
            </div>
          </section>
          <section class="container mb-8 mb-lg-11" id="about">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-7">
                <h3 class="fs-4 fs-lg-3 fw-bold text-center mb-2 mb-lg-x1"> Alur <span class="text-nowrap">Pelayanan</span></h3>
                <p class="fs-8 mb-7 mb-lg-8 text-center lh-lg">Tahapan untuk proses penerbitan surat keterangan penelitian.</p>
              </div>
              <div class="col-12">
                <div class="row g-sm-2 g-lg-3 align-items-center timeline">
                  <div class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                    <div class="timeline-step-1 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                      <div class="timeline-item d-flex justify-content-center">
                        <div class="timeline-icon bg-primary rounded-circle d-flex justify-content-center align-items-center"><span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 1</span></div>
                      </div>
                    </div>
                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                      <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Pendaftaran</h6>
                      <p class="text-lg-center lh-xl mb-0">Penyerahan syarat administrasi.</p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                    <div class="timeline-step-2 w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                      <div class="timeline-item d-flex justify-content-center">
                        <div class="timeline-icon bg-success rounded-circle d-flex justify-content-center align-items-center"><span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 2</span></div>
                      </div>
                    </div>
                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                      <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Verifikasi Berkas</h6>
                      <p class="text-lg-center lh-xl mb-0">Verifikasi kelengkapan administrasi.</span></p>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 d-flex flex-row flex-lg-column justify-content-center gap-2 gap-sm-x1 gap-md-4 gap-lg-0">
                    <div class="timeline-step-3 position-relative z-1 overflow-hidden w-25 w-lg-100 mb-4 mb-lg-5 mb-xl-6">
                      <div class="timeline-item d-flex justify-content-center">
                        <div class="timeline-icon bg-info rounded-circle d-flex justify-content-center align-items-center"><span class="fs-6 fs-lg-5 fs-xl-4 text-white"> 3</span></div>
                      </div>
                    </div>
                    <div class="py-1 py-lg-0 px-lg-5 w-75 w-sm-50 w-lg-100 timeline-content">
                      <h6 class="fs-8 fw-bold text-lg-center lh-lg mb-2">Penerbitan Surat Keterangan</h6>
                      <p class="text-lg-center lh-xl mb-0">Terbit/Keluar Surat Keterangan Penelitian.</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="experience position-relative overflow-hidden">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 my-3 py-5">
                </div>
                
              </div>
            </div>
            <div class="position-absolute top-0 start-0 end-0">
              <div class="bg-white py-1 py-md-2 py-xl-3"> </div><img class="wave" src="{{ asset('brainwave/assets/img/illustrations/Wave_2.svg') }}" alt="" />
            </div>
          </section>
         <section class="bg-1100">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-md-8 col-lg-12 col-xl-11">
                      <h2 class="text-white fs-4 fs-lg-3 lh-sm mb-2 text-center text-lg-start fw-bold">Persyaratan Pelayanan</h2>
                      <p class="fs-8 text-white text-opacity-65 mb-4 mb-md-6 mb-lg-7 lh-lg mb-6 mb-lg-7 text-center text-lg-start"> Silahkan siapkan persyaratan berikut.</p>
                    </div>
                    <div class="col-lg-10">
                      <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                        <div>
                          <div class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center"> <span class="uil uil-check text-white"></span></div>
                        </div>
                        <div>
                          <p class="lh-xl text-white text-opacity-70 mb-0">Surat permohonan keterangan penelitian dari lurah tempat domisili peneliti bagi penelitian kemasyarakatan yang tidak berasal dari lembaga penelitian, pendidikan/perguruan tinggi.</p>
                        </div>
                      </div>
                      <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                        <div>
                          <div class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center"> <span class="uil uil-check text-white"></span></div>
                        </div>
                        <div>
                          <p class="lh-xl text-white text-opacity-70 mb-0">Surat permohonan keterangan penelitian dari pimpinan peneliti dari lembaga pendidikan/perguruan tinggi , badan usaha, kementarian/lembaga pemerintah non kementerian, organisasi kemasyarakatan, atau organisasi nirlaba lainnya.</p>
                        </div>
                      </div>
                      <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                        <div>
                          <div class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center"> <span class="uil uil-check text-white"></span></div>
                        </div>
                        <div>
                          <p class="lh-xl text-white text-opacity-70 mb-0">Surat persetujuan dari lembaga/nstansi yang dituju.</p>
                        </div>
                      </div>
                      <div class="d-flex gap-2 gap-lg-x1 mb-4 mb-lg-5">
                        <div>
                          <div class="check-icon bg-success mb-1 rounded-circle d-flex align-items-center justify-content-center"> <span class="uil uil-check text-white"></span></div>
                        </div>
                        <div>
                          <p class="lh-xl text-white text-opacity-70 mb-0">Proposal penelitian.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div><button class="btn scroll-to-top text-white rounded-circle d-flex justify-content-center align-items-center bg-primary" data-scroll-top="data-scroll-top"><span class="uil uil-angle-up"></span></button>
        <footer class="">
          <div class="container">
            <div class="row gy-2 py-3 justify-content-center justify-content-md-between">
              <div class="col-auto ps-0">
                <p class="text-center text-md-start lh-xl text-1100"> © 2024 Copyright, All Right Reserved, Bakesbangpol Kota Cimahi </a></p>
              </div>
              <div class="col-auto pe-0"><a class="icons fs-8 me-3 me-md-0 ms-md-3 cursor-pointer" href="#!"><span class="uil uil-twitter"> </span></a><a class="icons fs-8 me-3 me-md-0 ms-md-3 cursor-pointer" href="#!"><span class="uil uil-instagram"></span></a><a class="icons fs-8 me-3 me-md-0 ms-md-3 cursor-pointer" href="#!"><span class="uil uil-linkedin"> </span></a></div>
            </div>
          </div>
        </footer>
      </div>
    </main>
@endsection