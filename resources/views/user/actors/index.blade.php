@extends('user.layout.parent')

@section('title', 'Movies-App | Actors')

@section('content')




    <!-- page title -->
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">Actors</h2>
                        <!-- end section title -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <section class="section">

        <div class="catalog">
            <div class="container">
                <div class="grid row">
                    <!-- card -->
                    @forelse ($popularActors as $actor)
                        <div class="actor col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <a href="{{ route('actors.show', $actor['id']) }}">
                                    <div class="card__cover">
                                        <img src="{{ $actor['profile_path'] ? 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] : 'https://ui-avatars.com/api/?size=128&name=' . $actor['name'] }}"
                                            alt="">
                                    </div>
                                </a>
                                <div class="card__content">
                                    <h3 class="card__title"><a
                                            href="{{ route('actors.show', $actor['id']) }}">{{ $actor['name'] }}</a></h3>
                                    <span class="card__category">
                                        @forelse($actor['known_for'] as $media)
                                            <a
                                                href="{{ route('movies.show', $media['id']) }}">{{ $media['media_type'] == 'movie' ? $media['title'] : $media['name'] }}</a>
                                        @empty
                                            <p>No works</p>
                                        @endforelse
                                    </span>


                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <!-- end card -->
                </div>

                <div class="page-load-status my-8 d-flex justify-content-center align-items-center flex-column">
                    <p class="card__title infinite-scroll-request">Loading...</p>
                    <p class="card__title infinite-scroll-last">End of content</p>
                    <p class="card__title infinite-scroll-error">No more pages to load</p>
                </div>
            </div>


        </div>
    </section>

@endsection


@section('js')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status',
            // history: false,
        });
    </script>
@endsection
