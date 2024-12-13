@php
    $teams = getteamSetting();
@endphp
<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>our Team</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            @foreach ($teams as $team)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="{{ asset($team->image) }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="{{ $team->github }}"><i class="bi bi-github"></i></a>
                                <a href="{{ $team->facebook }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $team->instagram }}"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $team->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->position }}</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @endforeach

        </div>

    </div>

</section>
