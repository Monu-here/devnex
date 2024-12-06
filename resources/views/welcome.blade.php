@extends('front.layout.app')
@section('content')
    <!-- Hero Section -->
    @include('front.include.herosection')
    <!-- /Hero Section -->

    <!-- About Section -->
    @include('front.include.about')
    <!-- /About Section -->

    <!-- Clients Section -->
    @include('front.include.client')
    <!-- /Clients Section -->

    <!-- Features Section -->
    @include('front.include.feature')

    <!-- /Features Section -->

    <!-- Services Section -->
    @include('front.include.services')

    <!-- /Services Section -->

    <!-- Call To Action Section -->
    @include('front.include.call-to-action')

    <!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    @include('front.include.project')

    <!-- /Portfolio Section -->

    <!-- Stats Section -->
    @include('front.include.stats')

    <!-- /Stats Section -->

    <!-- Testimonials Section -->
    @include('front.include.testimonial')

    <!-- /Testimonials Section -->

    <!-- Team Section -->
    @include('front.include.team')

    <!-- /Team Section -->

    <!-- Contact Section -->
    @include('front.include.contact')

    <!-- /Contact Section -->
@endsection
