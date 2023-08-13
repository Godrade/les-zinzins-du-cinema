<x-admin-layout title="Films">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="sticky-md-top product-sticky">
                                <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider"
                                     data-bs-ride="carousel">
                                    <div class="carousel-inner bg-light rounded position-relative">
                                        <div>
                                            @if($movie['poster_path'])
                                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="d-block"
                                                     alt="Movie images">
                                            @else
                                                <img src="https://via.placeholder.com/500x750?text={{ $movie['original_title'] }}" class="d-block w-100"
                                                     alt="Movie images">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="my-3">{{ $movie['title'] }}</h5>
                            <p>Release: {{ \Carbon\Carbon::parse($movie['release_date'])->format('d/m/y') }}</p>
                            <p>Popularity: {{ $movie['popularity'] }}</p>
                            <p>Vote: {{ $movie['vote_average'] }}</p>
                            <p>Vote count: {{ $movie['vote_count'] }}</p>
                            <p>Durations: {{ runtimes($movie['runtime']) }} </p>

                            <hr class="my-3">

                            <div>
                                <ul class="list-unstyled d-flex flex-wrap gap-2">
                                    @foreach($movie['genres'] as $genre)
                                        <li><span class="badge bg-light-info">{{ $genre['name'] }}</span></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <p class="my-3">{{ $movie['overview'] }}</p>
                            </div>

                            <div>
                                <form action="{{ route('movies.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="tmdb_id" value="{{ $movie['id'] }}">

                                    <label for="movie_id">Liste</label>
                                    <select name="listing_id" id="listing_id" class="form-select m-b-5">
                                        <option value="">-- Choisir une liste --</option>
                                        @foreach($listings as $list)
                                            <option value="{{ $list->id }}">{{ $list->title }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-light-primary m-t-10">Ajouter à la liste</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
