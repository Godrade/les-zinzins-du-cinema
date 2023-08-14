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
                                                     class="d-block w-100 object-fit-cover"
                                                     alt="Movie images">
                                            @else
                                                <img
                                                    src="https://via.placeholder.com/500x750?text={{ $result['original_title'] }}"
                                                    class="d-block w-100 object-fit-cover"
                                                    alt="Movie images">
                                            @endif
                                        </div>

                                        @if($movie && $movie->votes->avg('rating'))
                                            <div class="position-absolute top-0 start-0 p-2">
                                                <span class="badge bg-dark p-2"
                                                      style="font-size: 18px">{{ rating($movie->votes->avg('rating')) }}</span>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="my-3 mb-1">{{ $result['title'] }}
                                @if(isset($movie) && $movie->listings->first())
                                    - <span class="badge"
                                            style="background-color: {{ $movie->listings->first()->color }}">
                                        {{ $movie->listings->first()->title }}
                                    </span>
                                @endif</h5>
                            <p class="mb-0">{{ \Carbon\Carbon::parse($result['release_date'])->format('d/m/y') }}
                                - {{ runtimes($result['runtime']) }}</p>
                            <p>
                                @if(isset($movie) && $movie->votes->contains('user_id', auth()->id()))
                                    Public : {{ rating($result['vote_average']) }}
                                    <span>({{ $result['vote_count'] }} votes)</span>
                                @else
                                    Vous devez voter pour voir la note moyenne
                                @endif
                            </p>

                            @if($movie && $movie->votes->avg('rating'))
                                @foreach($movie->votes as $vote)
                                    <p @class(['mb-0' => !$loop->last])>
                                        {{ $vote->user->name }} : {{ rating($vote->rating) }}
                                    </p>
                                @endforeach
                            @endif

                            <ul class="list-unstyled d-flex flex-wrap gap-2">
                                @foreach($result['genres'] as $genre)
                                    <li><span class="badge bg-light-info">{{ $genre['name'] }}</span></li>
                                @endforeach
                            </ul>

                            <hr class="my-3">

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

                                @if($movie->listings->first()->id != 1)
                                    <div class="mb-5">
                                        <form action="{{ route('movies.update', $movie) }}" method="GET">
                                            @csrf

                                            <label for="movie_id">Déplacer vers</label>
                                            <select name="listing_id" id="listing_id" class="form-select m-b-5">
                                                <option value="">-- Choisir une liste --</option>
                                                @foreach($listings->whereNotIn('id', [2, $movie->listings->first()->id]) as $list)
                                                    <option value="{{ $list->id }}">{{ $list->title }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-light-primary m-t-10">
                                                Déplacer
                                            </button>
                                            <a href="{{ route('movies.destroy', $movie) }}"
                                               class="btn btn-light-danger m-t-10">
                                                Supprimer
                                            </a>
                                        </form>
                                    </div>
                                @endif

                                @if($movie->listings->first()->id == 1)
                                    <div>
                                        <form action="{{ route('movies.vote.store',$movie) }}" method="POST">
                                            @csrf

                                            <label for="vote">Vote</label>
                                            <input type="number" step="0.01" min="0" max="10" name="vote" id="vote"
                                                   class="form-control m-b-5">
                                            <button type="submit" class="btn btn-light-primary m-t-10">Voter</button>
                                        </form>
                                    </div>

                                    @if(isset($movie) && !$movie->isViewed && !$movie->listings->contains('id', 3))
                                        <div class="position-absolute bottom-0 end-0 p-4">
                                            <a href="{{ route('movies.update', $movie) }}"
                                               class="btn btn-light-primary m-t-10">Marquer
                                                comme vu</a>
                                        </div>
                                    @endif
                                @endif

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
