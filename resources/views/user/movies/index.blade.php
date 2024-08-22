@extends('user.layout.parent')

@section('title', 'Movies-App')



@section('content')

    <!-- home -->
    <section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
        </div>
        <!-- end home bg -->
        <x-movie-card title="Popular Movies" :movies="$popularMovies" :genres="$genres" />
    </section>
    <!-- end home -->


    <section class="section">
        <x-movie-card title="Now Playing" :movies="$nowPlayingMovies" :genres="$genres" />
    </section>

    <section class="section">
        <x-movie-card title="Top Rated Movies" :movies="$topRatedMovies" :genres="$genres" />
    </section>
@endsection
