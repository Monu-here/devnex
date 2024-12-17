@php
    $ProjectCategorys = getProjectionSetting();
@endphp
<section id="project" class="project section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>project</h2>
        <p>Check our project</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="project-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                @foreach ($ProjectCategorys as $index => $item)
                    <li data-filter=".filter-{{ $item->id }}" class="{{ $index === 0 ? 'filter-active' : '' }}">
                        {{ $item->name }}
                    </li>
                @endforeach

            </ul><!-- End project Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($ProjectCategorys as $item)
                    @foreach ($item->project as $xx)
                        <div class="col-lg-4 col-md-6 project-item isotope-item filter-{{ $item->id }}">
                            <img src="{{ asset($xx->image) }}" class="img-fluid" alt="">
                            <div class="project-info">
                                <h4>{{ $xx->name }}</h4>
                                <p>{{ $xx->description }}</p>
                                <a href="{{ asset($xx->image) }}" title="{{ $xx->name }}"
                                    data-gallery="project-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="{{ $xx->url }}" target="_blank" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End project Item -->
                    @endforeach
                @endforeach


            </div><!-- End project Container -->

        </div>

    </div>

</section>
