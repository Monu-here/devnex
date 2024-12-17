@php
    $services = getServiceSetting();
@endphp
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Check our Services</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                          <img src="{{asset($service->icon)}}" alt="">
                        </div>
                        <a href="service-details.html" class="stretched-link">
                            <h3>{{$service->name}}</h3>
                        </a>
                        <p>{{$service->description}}</p>
                    </div>
                </div>
            @endforeach
            <!-- End Service Item -->


        </div>

    </div>

</section>
