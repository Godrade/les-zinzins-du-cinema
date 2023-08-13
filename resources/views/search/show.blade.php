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
                                            @if($result['poster_path'])
                                                <img src="https://image.tmdb.org/t/p/w500{{ $result['poster_path'] }}"
                                                     class="d-block"
                                                     alt="Movie images">
                                            @else
                                                <img
                                                    src="https://via.placeholder.com/500x750?text={{ $result['original_title'] }}"
                                                    class="d-block w-100"
                                                    alt="Movie images">
                                            @endif
                                        </div>

                                        @if($movie)
                                            <div class="position-absolute top-0 start-0 p-2">
                                                <span class="badge bg-dark p-2" style="font-size: 18px">{{ $movie->votes->avg('rating') ?? "?" }}/10</span>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="my-3">{{ $result['title'] }}</h5>
                            <p>Release: {{ \Carbon\Carbon::parse($result['release_date'])->format('d/m/y') }}</p>
                            <p>Popularity: {{ $result['popularity'] }}</p>
                            <p>Vote: {{ $result['vote_average'] }}</p>
                            <p>Vote count: {{ $result['vote_count'] }}</p>
                            <p>Durations: {{ runtimes($result['runtime']) }} </p>

                            <hr class="my-3">

                            <div>
                                <ul class="list-unstyled d-flex flex-wrap gap-2">
                                    @foreach($result['genres'] as $genre)
                                        <li><span class="badge bg-light-info">{{ $genre['name'] }}</span></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <p class="my-3">{{ $result['overview'] }}</p>
                            </div>

                            @if(!$movie)
                                <div>
                                    <form action="{{ route('movies.store') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="tmdb_id" value="{{ $result['id'] }}">

                                        <label for="movie_id">Liste</label>
                                        <select name="listing_id" id="listing_id" class="form-select m-b-5">
                                            <option value="">-- Choisir une liste --</option>
                                            @foreach($listings as $list)
                                                <option value="{{ $list->id }}">{{ $list->title }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-light-primary m-t-10">Ajouter à la liste
                                        </button>
                                    </form>
                                </div>
                            @endif

                            @if(isset($movie) && !$movie->votes->contains('user_id', auth()->id()) && !$movie->listings->contains('id', 3))
                                <div>
                                    <p class="my-3">Votez pour ce film</p>
                                    <form action="{{ route('movies.vote.store',$movie) }}" method="POST">
                                        @csrf

                                        <label for="vote">Vote</label>
                                        <input type="number" step="0.01" min="0" max="10" name="vote" id="vote"
                                               class="form-control m-b-5">
                                        <button type="submit" class="btn btn-light-primary m-t-10">Voter</button>
                                    </form>
                                </div>
                            @endif

                            @if(isset($movie) && !$movie->isViewed)
                                <div class="position-absolute bottom-0 end-0 p-4">
                                    <a href="{{ route('movies.update', $movie) }}" class="btn btn-light-primary m-t-10">Marquer comme vu</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
