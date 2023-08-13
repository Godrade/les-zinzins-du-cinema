<x-admin-layout title="Films">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ $listing->title }}</h5>
                    <a href="{{ route('movies.random', $listing) }}" class="btn btn-light-primary">Aléatoire</a>
                </div>
                <div class="card-body row">
                    @forelse($listing->movies as $movie)
                        <div class="col-lg-3">
                            <div class="card product-card">
                                <div class="card-img-top">
                                    <a href="{{ route('search.show', $movie->tmdb_id) }}">
                                        @if($movie->poster_path)
                                            <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="image" class="img-prod img-fluid">
                                        @else
                                            <img src="https://via.placeholder.com/500x750?text={{ $movie->title }}" alt="image" class="img-prod img-fluid">
                                        @endif
                                    </a>
                                    <div class="card-body position-absolute end-0 top-0">
                                        <div class="form-check prod-likes">
                                            <input type="checkbox" class="form-check-input">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart prod-likes-icon"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        </div>
                                    </div>
                                    @if($movie->votes->avg('rating'))
                                        <div class="card-body position-absolute start-0 top-0">
                                            <a href="{{ route('search.show', $movie->tmdb_id) }}" class="btn btn-dark">
                                                {{ rating($movie->votes->avg('rating')) }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Aucun film trouvé</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
