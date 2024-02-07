<x-layout headerTitle="{{ $genre_name }}">

    <div class="container my-5">
        <div class="row justify-content-between">

            @foreach($mangas as $manga)
                <div class="col-12 col-md-3 my-2">
                    <div class="card" style="min-height: 600px;">
                        <img height="400" src="{{ $manga['image'] }}" class="card-img-top" alt="{{ $manga['title'] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                {{ $manga['title'] ?? $manga['title_english'] }}
                            </h5>
                            <p class="card-text text-truncate">
                                {{ $manga['synopsis'] }}
                            </p>
                            <p class="card-text fst-italic small text-muted">
                                Anno: {{ $manga['year'] }}
                            </p>
            
                          <a href="#" class="btn btn-dark w-100 mt-auto">Scopri di piu'</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end mb-5 me-3">
        {{-- Se la pagina corrente e' maggiore di 1, allora inserisci il bottone "pagina precedente" --}}
        @if($pagination['current_page'] > 1)
            <a
                href="{{ route('manga.index', [
                    'genre_id' => $genre_id,
                    'genre_name' => $genre_name,
                    'page' => $pagination['current_page'] - 1
                ]) }}"
                class="btn btn-outline-dark me-3"
            >
                Prev. Page
            </a>
        @endif

        {{-- Se pagination ha il bool 'has_next_page' come true, allora inserisci il bottone "pagina successiva" --}}
        @if($pagination['has_next_page'])
            <a
                href="{{ route('manga.index', [
                    'genre_id' => $genre_id,
                    'genre_name' => $genre_name,
                    'page' => $pagination['current_page'] + 1
                ]) }}"
                class="btn btn-outline-dark"
            >
                Next Page
            </a>
        @endif
    </div>

</x-layout>