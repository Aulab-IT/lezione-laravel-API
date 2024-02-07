<x-layout headerTitle="Tutti i generi di manga">
    <div class="container my-5">
        <div class="row justify-content-around">

            @foreach($genres as $genre)
                <div class="col-12 col-md-2">
                    <a href="{{ route('manga.index', ['genre_id' => $genre['mal_id'], 'genre_name' => $genre['name'], 'page' => 1]) }}" class="btn btn-dark w-100 my-2">
                        {{ $genre['name'] }}
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</x-layout>