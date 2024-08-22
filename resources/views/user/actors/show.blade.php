@extends('user.layout.parent')

@section('title', 'Movie-App | ' . $actor['name'])

@section('content')

    <section class="section details">
        <!-- details background -->
        <div class="details__bg" data-bg="/img/home/home__bg.jpg"></div>
        <!-- end details background -->

        <!-- details content -->
        <div class="container">
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="details__title">{{ $actor['name'] }}</h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-10">
                    <div class="card card--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-4">
                                <div class="card__cover">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }}"
                                        alt="poster">
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-8">
                                <div class="card__content">
                                    <div class="card__wrap">
                                        <div class="details__share">
                                            <ul class="details__share-list">
                                                @if ($actor['external_ids']['facebook_id'])
                                                    <li class="facebook"><a
                                                            href="{{ 'http://facebook.com/' . $actor['external_ids']['facebook_id'] }}"><i
                                                                class="icon ion-logo-facebook"></i></a></li>
                                                @endif

                                                @if ($actor['external_ids']['instagram_id'])
                                                    <li class="instagram"><a
                                                            href="{{ 'http://instagram.com/' . $actor['external_ids']['instagram_id'] }}"><i
                                                                class="icon ion-logo-instagram"></i></a></li>
                                                @endif

                                                @if ($actor['external_ids']['twitter_id'])
                                                    <li class="twitter"><a
                                                            href="{{ 'http://twitter.com/' . $actor['external_ids']['twitter_id'] }}"><i
                                                                class="icon ion-logo-twitter"></i></a></li>
                                                @endif
                                                @if ($actor['homepage'])
                                                    <li class="vk"><a href="{{ $actor['homepage'] }}"><i
                                                                class="icon ion-logo-vk"></i></a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>

                                    <ul class="card__meta">
                                        <li><span>Known For:</span> {{ $actor['known_for_department'] }}
                                        </li>
                                        <li><span>Country:</span> <a href="#">{{ $actor['place_of_birth'] }}</a>
                                        </li>
                                        <li><span>Birth
                                                Date:</span>{{ \Carbon\Carbon::parse($actor['birthday'])->format('M d,Y') }}
                                            ({{ \Carbon\Carbon::parse($actor['birthday'])->age }} years old)
                                        </li>
                                        <li><span>Gender:</span> {{ $actor['gender'] == 1 ? 'Female' : 'Male' }}</li>

                                        </li>
                                    </ul>

                                    <div class="card__description card__description--details">
                                        {{ $actor['biography'] }}
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->
            </div>
        </div>
        <!-- end details content -->
    </section>


    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Discover</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">Movies</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                    aria-selected="false">TV shows</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                    aria-selected="false">Photos</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Comments">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                            href="#tab-1" role="tab" aria-controls="tab-1"
                                            aria-selected="true">Movies</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                            role="tab" aria-controls="tab-2" aria-selected="false">TV shows</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3"
                                            role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-8">
                    <!-- content tabs -->
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                            <!-- Cast -->
                            <div class="gallery" itemscope>
                                <div class="row">
                                    <!-- Cast item -->
                                    @forelse ($actor['movie_credits']['cast'] as $movie)
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <div class="card">
                                                <div class="card__cover">
                                                    <img src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] : 'https://ui-avatars.com/api/?size=128&name=' . $movie['title'] }}"
                                                        alt="poster">
                                                    <a href="{{ route('movies.show', $movie['id']) }}"
                                                        class="card__play">
                                                        <i class="icon ion-ios-play"></i>
                                                    </a>
                                                </div>
                                                <div class="card__content">
                                                    <h3 class="card__title"><a
                                                            href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                                                    </h3>
                                                    <span class="card__rate"><i class="icon ion-ios-star"></i>
                                                        {{ number_format($movie['vote_average'], 1) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h3 class="section__title">No Films for {{ $actor['name'] }}</h3>
                                    @endforelse


                                    <!-- end gallery item -->
                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>

                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                            <!-- Cast -->
                            <div class="gallery" itemscope>
                                <div class="row">
                                    <!-- Cast item -->
                                    @forelse ($actor['tv_credits']['cast'] as $show)
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <div class="card">
                                                <div class="card__cover">
                                                    <img src="{{ $show['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $show['poster_path'] : 'https://ui-avatars.com/api/?size=128&name=' . $show['name'] }}"
                                                        alt="poster">
                                                    <a href="{{ route('tvShows.show', $show['id']) }}" class="card__play">
                                                        <i class="icon ion-ios-play"></i>
                                                    </a>
                                                </div>
                                                <div class="card__content">
                                                    <h3 class="card__title"><a
                                                            href="{{ route('tvShows.show', $show['id']) }}">{{ $show['name'] }}</a>
                                                    </h3>
                                                    <span class="card__rate"><i class="icon ion-ios-star"></i>
                                                        {{ number_format($show['vote_average'], 1) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h3 class="section__title">No Shows for {{ $actor['name'] }}</h3>
                                    @endforelse


                                    <!-- end gallery item -->
                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>

                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                            <!-- project gallery -->
                            <div class="gallery" itemscope>
                                <div class="row">
                                    <!-- gallery item -->
                                    @forelse ($actor['images']['profiles'] as $image)
                                        @if ($loop->index < 12)
                                            <figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
                                                <a href="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}"
                                                    itemprop="contentUrl" data-size="1920x1280">
                                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}"
                                                        itemprop="thumbnail" alt="Image description" />
                                                </a>
                                                <figcaption itemprop="caption description">Some image caption 1
                                                </figcaption>
                                            </figure>
                                        @endif

                                    @empty
                                        <h1 class="section__title">No Photos Yet..</h1>
                                    @endforelse

                                    <!-- end gallery item -->
                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>
                    </div>
                    <!-- end content tabs -->
                </div>
            </div>
        </div>
    </section>
    <!-- end content -->

@endsection
