@extends('layouts.app')
@section('content')
<div class="container" >
    <form action="{{route('annonces.store')}}" method="POST" class="needs-validation"> 
      @csrf
        <div class="form-group">
          <label for="title">Titre de l'annonce</label>
          <input type="text" class="form-control @error('title') {{'is-invalid'}}  @enderror"  id="title" name="title" aria-describedby="title">          
          @error('title')            
              <div class="invalid-feedback" >
                <strong>{{$message}}</strong>
              </div>            
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description de l'annonce</label>
          <textarea class="form-control @error('description') {{'is-invalid'}}  @enderror" id="description" name="description" cols="30" rows="10"></textarea>
          @error('description')          
            <div class="invalid-feedback" >
              <strong>{{$message}}</strong>
            </div>          
          @enderror
        </div>
        <div class="form-group">
            <label  for="localisation">Localisation</label>
            <input class="form-control @error('localisation') {{'is-invalid'}}  @enderror" type="text" id="localisation" name="localisation">
            @error('localisation')
              <div class="invalid-feedback">
                <strong>{{$message}}</strong>
              </div>
            @enderror
        </div>
        <div class="form-group">
          <label  for="price">Prix</label>
          <input class="form-control @error('price') {{'is-invalid'}}  @enderror" type="text" id="price" name="price">
          @error('price')            
              <div class="invalid-feedback" >
                <strong>{{$message}}</strong>
              </div>           
          @enderror
        </div>
         
    

    @guest
    <h1>Vos informations</h1>
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

          
    @endguest
    <button type="submit" class="btn btn-primary">Soumettre une annonce</button>
    </form>  
</div>   
@endsection