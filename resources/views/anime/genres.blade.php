<x-layout headerTitle="Tutti i generi di anime">

    <div class="container my-5">
        <div id="wrapper" class="row justify-content-between">
            {{-- <div class="col-12 col-md-2 my-2">
                <a href="" class="btn btn-dark"></a>
            </div> --}}
        </div>
    </div>

    <script>
        fetch('/api/anime/genres') //ottengo la response
            .then(response => response.json()) //trasformo la response in json
            .then(data => {
                //ci recuperiamo l'elemento del DOM che conterra' i nostri dati
                const wrapper = document.querySelector('#wrapper');
                
                // cicliamo i dati
                data.forEach(item => {
                    
                    //per ogni genere all'interno di data, io voglio creare una colonna e dentro alla colonna voglio creare un bottone
                    //creo un div che sara' la mia colonna e assegno delle classi
                    const col = document.createElement('div');
                    col.classList.add('col-12', 'col-md-2', 'my-2');
    
                    const button = document.createElement('a');
                    button.href=`/anime/genres/${ item.mal_id }/${ item.name }/page/1`
                    button.classList.add('btn', 'btn-dark', 'w-100');
                    button.textContent = item.name;
                    
                    // alla colonna, voglio dare come figlio il button
                    col.appendChild(button);

                    // al wrapper, voglio dare come figlio la colonna
                    wrapper.appendChild(col);
                })
            })
            .catch(error => {
                console.error('Si è verificato un errore: ', error);
            })
    </script>
</x-layout>