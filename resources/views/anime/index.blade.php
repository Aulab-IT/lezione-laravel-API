<x-layout headerTitle="{{ $genre_name }}">

    <div class="container my-5">
        <div class="row justify-content-between">

            {{-- @foreach($mangas as $manga)
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
            @endforeach --}}

        </div>
    </div>

    <script>
        let genre_id = {{ $genre_id }};
        let genre_name = `{{ $genre_name }}`;

        let page = {{ $page }}

        fetch(`/api/anime/genres/${genre_id}/${genre_name}/page/${page}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
    </script>

</x-layout>