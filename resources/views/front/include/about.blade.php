@php
    $about = getAboutSetting();

@endphp
<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="{{ asset($about->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
                <h3>{{ $about->title }}</h3>
                <p class="fst-italic">
                    {!! $about->description !!}
                </p>

            </div>
        </div>

    </div>

</section>
