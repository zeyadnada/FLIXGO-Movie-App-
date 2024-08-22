<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="home__title"><b>{{ $title }}</b></h1>

            <button class="home__nav home__nav--prev" type="button">
                <i class="icon ion-ios-arrow-round-back"></i>
            </button>
            <button class="home__nav home__nav--next" type="button">
                <i class="icon ion-ios-arrow-round-forward"></i>
            </button>
        </div>

        <div class="col-12">
            <div class="owl-carousel home__carousel">
                @forelse ($tvShows as $tvShow)
                    <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] }}"
                                    alt="">
                                <a href="{{ route('tvShows.show', $tvShow['id']) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a
                                        href="{{ route('tvShows.show', $tvShow['id']) }}">{{ $tvShow['name'] }}</a></h3>
                                <span class="card__category">
                                    @foreach ($tvShow['genre_ids'] as $id)
                                        <a href="#">{{ $genres[$id] }}</a>
                                    @endforeach
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>
                                    {{ number_format($tvShow['vote_average'], 1) }}
                                </span>
                                <span style="font-size: 14px; color: white; mx-2">|</span>
                                <span class="card__rate mx-2"
                                    style="font-size: 12px;">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d,Y') }}</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                @empty
                    <h1>No Shows exist</h1>
                @endforelse
            </div>
        </div>
    </div>
</div>
