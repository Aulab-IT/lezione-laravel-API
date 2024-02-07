<x-layout headerTitle="MyAnime List">

    <div class="container-fluid my-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <a href="{{ route('anime.genres') }}" class="btn btn-dark btn-lg">
                    Anime
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="{{ route('manga.genres') }}" class="btn btn-dark btn-lg">
                    Manga
                </a>
            </div>
        </div>
    </div>


</x-layout>