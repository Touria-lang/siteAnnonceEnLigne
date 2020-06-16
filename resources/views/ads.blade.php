@extends('layouts.app')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="{{route('annonces.search')}}" method="post" onsubmit="search(event)" id="searchForm">
        @csrf
        <div class="form-group">
          <label for="rechercher"></label>
          <input type="text" name="words" id="words" class="form-control">
          <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
        
      </form>
      <div id="results">
        @foreach ($annonces as $annonce)
        <div class="card mb-3" style="width: 100%;">
          <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title" >{{$annonce->title}}</h5>
            <small>{{$annonce->created_at}}</small>
            <p class="card-text text-info" >{{$annonce->localisation}}</p>
            <p class="card-text" >{{$annonce->description}}</p>
            <a href="#" class="btn btn-primary">Voir l'annonce</a>
          </div>
        </div> 
        @endforeach  
        {{$annonces->links()}}
      </div>
      
      
    </div>
  </div>
</div>
@endsection
@section('extra-js')
    <script>
      function search(event)
      {
        event.preventDefault()
        const words = document.querySelector('#words').value;
        const url = document.querySelector('#searchForm').getAttribute('action');
        axios.post(url, {
          words : words,
         
        })
        .then(function (response) {
          const ads = response.data.ads
          let results = document.querySelector('#results');
          results.innerHTML = '';
          if(ads.length == 0){
            
            let p = document.createElement('p');
            p.innerHTML = '0 element selectionné';
            results.appendChild(p);
          }else{
            
          for(let i=0; i< ads.length; i++){
            let card = document.createElement('div');
            card.classList.add('card', 'mb-3');

            let cardbody = document.createElement('div');
            cardbody.classList.add('card-body');

            let title = document.createElement('h5');
            title.classList.add('card-title');
            title.innerHTML = ads[i].title;
            let description = document.createElement('p');
            description.classList.add('card-text');
            description.innerHTML = ads[i].description;
            card.appendChild(cardbody);
            cardbody.appendChild(title);
            cardbody.appendChild(description);
            results.appendChild(card);

            
          }
          }

          
        })
        .catch(function (error) {
          console.log(error);
        });

      }
    </script>
@endsection