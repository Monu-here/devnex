@php
    $contect = getHomeSetting();
@endphp
<section id="hero" class="hero section dark-background">

    <img src="{{ asset('assets/front/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

    <div class="container">

        <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-6 col-lg-8">
                <h2>{{ $contect->home_text }}<span>.</span></h2>
                <p>{{ $contect->home_description }}</p>
            </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                    {{-- <img src="{{ asset($contect->how_we_work_icon_1) }}" alt="" srcset=""> --}}
                    <h3><a href="">{{ $contect->how_we_work_text_1 }}</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                    {{-- <img src="{{ asset($contect->how_we_work_icon_2) }}" alt="" srcset=""> --}}
                    <h3><a href="">{{ $contect->how_we_work_text_2 }}</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                    {{-- <img src="{{ asset($contect->how_we_work_icon_3) }}" alt="" srcset=""> --}}
                    <h3><a href="">{{ $contect->how_we_work_text_3 }}</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="600">
                <div class="icon-box">
                    {{-- <img src="{{ asset($contect->how_we_work_icon_4) }}" alt="" srcset=""> --}}
                    <h3><a href="">{{ $contect->how_we_work_text_4 }}</a></h3>
                </div>
            </div>
            <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="700">
                <div class="icon-box">
                    {{-- <img src="{{ asset($contect->how_we_work_icon_5) }}" alt="" srcset=""> --}}
                    <h3><a href="">{{ $contect->how_we_work_text_5 }}</a></h3>
                </div>
            </div>
        </div>

    </div>

</section>
