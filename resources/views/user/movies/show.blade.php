@extends('user.layout.parent')

@section('title', 'Movie-App | ' . $movie['title'])



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
                    <h1 class="details__title">{{ $movie['title'] }}</h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-6">
                    <div class="card card--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                                <div class="card__cover">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
                                        alt="poster">
                                </div>
                            </div>
                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                                <div class="card__content">
                                    <div class="card__wrap">
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>
                                            {{ number_format($movie['vote_average'], 1) }}</span>

                                        <ul class="card__list">
                                            <li>HD</li>
                                            <li>{{ $movie['status'] }}</li>
                                        </ul>
                                    </div>

                                    <ul class="card__meta">
                                        <li><span>Genre:</span>
                                            @foreach ($movie['genres'] as $genre)
                                                <a href="#">{{ $genre['name'] }}</a>
                                            @endforeach
                                        </li>
                                        <li><span>Release
                                                Date:</span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d,Y') }}
                                        </li>
                                        <li><span>Running time:</span> {{ $movie['runtime'] }} min</li>
                                        <li><span>Country:</span> <a href="#">{{ $movie['origin_country'][0] }}</a>
                                        </li>
                                    </ul>

                                    <div class="card__description card__description--details">
                                        {{ $movie['overview'] }}
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->

                <!-- player -->
                <div class="col-12 col-xl-6">
                    <iframe id="player" width="560" height="315"
                        src="{{ count($movie['videos']['results']) > 0 ? 'https://www.youtube.com/embed/' . $movie['videos']['results'][0]['key'] : 'https://www.youtube.com' }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>

                <!-- end player -->
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
                                    aria-controls="tab-1" aria-selected="true">Cast</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                    aria-selected="false">Reviews</a>
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
                                            aria-selected="true">Cast</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                            role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

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
                                    @forelse ($movie['credits']['cast'] as $cast)
                                        @if ($loop->index < 12)
                                            <figure class="col-12 col-sm-6 col-xl-3" itemprop="associatedMedia" itemscope>
                                                <a href="{{ route('actors.show', $cast['id']) }}" itemprop="contentUrl"
                                                    data-size="1920x1280">
                                                    <img src="{{ $cast['profile_path'] ? 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] : 'https://ui-avatars.com/api/?size=128&name=' . $cast['name'] }}"
                                                        itemprop="thumbnail" alt="Actor" />
                                                </a>
                                                <div class="mt-2">
                                                    <a href="{{ route('actors.show', $cast['id']) }}"
                                                        class="card__title text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                                    <div class="card__title mx-2" style="font-size: 12px;">
                                                        {{ $cast['character'] }}</div>
                                                </div>
                                            </figure>
                                        @endif
                                    @empty
                                        <h1 class="section__title">No Cast Available..</h1>
                                    @endforelse


                                    <!-- end gallery item -->
                                </div>
                            </div>
                            <!-- end project gallery -->
                        </div>

                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                            <div class="row">
                                <!-- reviews -->
                                <div class="col-12">
                                    <div class="reviews">
                                        <ul class="reviews__list">

                                            @forelse ($movie['reviews']['results'] as $review)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        @if ($review['author_details']['avatar_path'])
                                                            <img class="reviews__avatar"
                                                                src="{{ 'https://image.tmdb.org/t/p/w500/' . $review['author_details']['avatar_path'] }}"
                                                                alt="Avatar">
                                                        @else
                                                            <img class="reviews__avatar" src="/icon/favicon-32x32.png"
                                                                alt="Avatar">
                                                        @endif
                                                        <span class="reviews__name">{{ $review['author'] }}</span>
                                                        <span
                                                            class="reviews__time">{{ \Carbon\Carbon::parse($review['created_at'])->format('M d, Y') }}</span>
                                                        <span class="reviews__rating">
                                                            <i class="icon ion-ios-star"></i>
                                                            {{ $review['author_details']['rating'] ?? 'No Rating' }}
                                                        </span>
                                                    </div>
                                                    <p class="reviews__text">{{ $review['content'] }}</p>
                                                </li>
                                            @empty
                                                <h1 class="section__title">No Reviews Yet</h1>
                                            @endforelse


                                        </ul>

                                        <form action="#" class="form">
                                            <input type="text" class="form__input" placeholder="Title">
                                            <textarea class="form__textarea" placeholder="Review"></textarea>
                                            <div class="form__slider">
                                                <div class="form__slider-rating" id="slider__rating"></div>
                                                <div class="form__slider-value" id="form__slider-value"></div>
                                            </div>
                                            <button type="button" class="form__btn">Send</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- end reviews -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                            <!-- project gallery -->
                            <div class="gallery" itemscope>
                                <div class="row">
                                    <!-- gallery item -->
                                    @forelse ($movie['images']['backdrops'] as $image)
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

                <!-- sidebar -->
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="row">
                        <!-- section title -->
                        <div class="col-12">
                            <h2 class="section__title section__title--sidebar">You may also like...</h2>
                        </div>
                        <!-- end section title -->

                        <!-- card -->
                        @forelse ($movie['recommendations']['results'] as $recomendMovie)
                            <div class="col-6 col-sm-4 col-lg-6">
                                <div class="card">
                                    <div class="card__cover">
                                        <img src="{{ $recomendMovie['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $recomendMovie['poster_path'] : 'https://ui-avatars.com/api/?size=128&name=' . $recomendMovie['title'] }}"
                                            alt="poster">
                                        <a href="{{ route('movies.show', $recomendMovie['id']) }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a
                                                href="{{ route('movies.show', $recomendMovie['id']) }}">{{ $recomendMovie['title'] }}</a>
                                        </h3>
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>
                                            {{ number_format($recomendMovie['vote_average'], 1) }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1 class="section__title">No Recomendations</h1>
                        @endforelse

                        <!-- end card -->
                    </div>
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- end content -->

@endsection
