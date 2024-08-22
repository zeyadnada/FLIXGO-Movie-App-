<div id="searchBox" class="search-box">
    <div class="row">
        <div class="col">
            <div class="header__search-content">
                <input Wire:model="search" type="text"
                    placeholder="Search for a movie, TV Series that you are looking for">
            </div>
        </div>
    </div>
    <div class="section section--bg">
        <div class="row">
            @forelse ($searchResults as $result)
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $result['poster_path'] }}" alt="poster">
                            <a href="{{ route('movies.show', $result['id']) }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">{{ $result['title'] }}</a></h3>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>
                                {{ number_format($result['vote_average'], 1) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="section__title">No results for {{$search}}</h3>
            @endforelse
        </div>
    </div>
</div>
