<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Berita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">

        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/baner3.png" style="height:90px; width:700px;" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="#politik" class="nav-item nav-link">Politik</a>
                        <a href="#ekonomi" class="nav-item nav-link">Ekonomi</a>
                        <a href="#olahraga" class="nav-item nav-link">Olahraga</a>
                        <a href="#teknologi" class="nav-item nav-link">Teknologi</a>

                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->





    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach ($kontens as $item)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="">{{ $item->kategori }}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{ $item->tanggal }}</a>
                                    </div>
                                    <a class="h4 m-0 text-white font-weight-bold"
                                        href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 20) }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                    </div>
                    @php
                        $kontensGrouped = $kontensGrouped->shuffle();
                    @endphp

                    @foreach ($kontensGrouped as $kategori => $items)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            @foreach ($items->take(1) as $item)
                                <!-- Ambil satu item per kategori -->
                                <img class="img-fluid w-100 h-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="object-fit: cover;">
                                <a href=""
                                    class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                    {{ $item->kategori }}
                                </a>
                            @endforeach
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

                @foreach ($featured as $item)
                    <div class="position-relative overflow-hidden" style="height: 200px; ">
                        <img class="img-fluid w-100 h-100" src="storage/konten_foto/{{ $item->foto }}"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">{{ $item->kategori }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ $item->tanggal }}</a>
                            </div>
                            <a class="h5 m-0 text-white" style="font-size:20px;"
                                href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 5) }}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3" id="ekonomi">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Ekonomi</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($ekonomi as $item)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="height:150px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">{{ $item->kategori }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $item->tanggal }}</span>
                                    </div>
                                    <a class="h5 m-0"
                                        href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 py-3" id="teknologi">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Teknologi</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($teknologi as $item)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="height:150px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">{{ $item->kategori }}</a> <span class="px-1">/</span>
                                        <span>{{ $item->tanggal }}</span>
                                    </div>
                                    <a class="h5 m-0"
                                        href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3" id="politik">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Politik</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($politik as $item)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="height:150px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">{{ $item->kategori }}</a> <span class="px-1">/</span>
                                        <span>{{ $item->tanggal }}</span>
                                    </div>
                                    <a class="h5 m-0"
                                        href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6 py-3" id="olahraga">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Olahraga</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($olahraga as $item)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="storage/konten_foto/{{ $item->foto }}"
                                    style="height:150px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="">{{ $item->kategori }}</a> <span class="px-1">/</span>
                                        <span>{{ $item->tanggal }}</span>
                                    </div>
                                    <a class="h5 m-0"
                                        href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Popular</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @foreach ($popular->take(1) as $item)
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ 'storage/konten_foto/' . $item->foto }}"
                                        style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="">{{ $item->kategori }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item->tanggal }}</span>
                                        </div>
                                        <a class="h4"
                                            href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                        <p class="m-0">{{ Str::words($item->keterangan, 15) }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @foreach (array_slice($popular->toArray(), 1, 3) as $item)
                                <div class="d-flex mb-3">
                                    <img src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            @foreach ($popular2->take(1) as $item)
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ 'storage/konten_foto/' . $item->foto }}"
                                        style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="">{{ $item->kategori }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item->tanggal }}</span>
                                        </div>
                                        <a class="h4"
                                            href="{{ route('show', $item->slug) }}">{{ Str::words($item->judul, 8) }}</a>
                                        <p class="m-0">{{ Str::words($item->keterangan, 12) }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @foreach (array_slice($popular2->toArray(), 1, 3) as $item)
                                <div class="d-flex mb-3">
                                    <img src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="img/baner.png" alt=""></a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Latest</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @foreach (array_slice($latest->ToArray(), 0, 1) as $item)
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h4"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                        <p class="m-0">{{ Str::words($item['keterangan'], 13) }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @foreach (array_slice($latest->toArray(), 3, 4) as $item)
                                <div class="d-flex mb-3">
                                    <img src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            @foreach (array_slice($latest->toArray(), 7, 4) as $item)
                                <div class="d-flex mb-3">
                                    <img src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                    </div>
                                </div>
                            @endforeach
                            @foreach (array_slice($latest->ToArray(), 1, 1) as $item)
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ 'storage/konten_foto/' . $item['foto'] }}"
                                        style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="">{{ $item['kategori'] }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $item['tanggal'] }}</span>
                                        </div>
                                        <a class="h4"
                                            href="{{ route('show', $item['slug']) }}">{{ $item['judul'] }}</a>
                                        <p class="m-0">{{ Str::words($item['keterangan'], 13) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Newsletter</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                            <small>Sit eirmod nonumy kasd eirmod</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        @foreach ($kontens->take(6) as $item)
                            
                        <div class="d-flex mb-3">
                            <img src="{{ ('storage/konten_foto/' . $item->foto) }}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                            style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="">{{ $item->kategori }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $item->tanggal }}</span>
                            </div>
                            <a class="h6 m-0" href="{{ route('show' , $item->slug) }}">{{ $item->judul }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($kontens as $item)
                                <a href=""
                                    class="btn btn-sm btn-outline-secondary m-1">{{ $item->kategori }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
                <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Categories</h4>
                <div class="d-flex flex-wrap m-n1">
                    @foreach ($kontens as $item)
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ $item->kategori }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Tags</h4>
                <div class="d-flex flex-wrap m-n1">

                    @foreach ($kontens as $item)
                        <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ $item->kategori }}</a>
                    @endforeach
                </div>
            </div>
    
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="#">BayNews</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
