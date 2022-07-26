@extends('clients.layout')
@section('content')
 
<div class="card">
  <div class="card-header"> Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('client/' .$clients->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$clients->id}}" id="id" />
        
        <label>RaisonSociale</label></br>
        <input type="text" name="RaisonSociale" id="RaisonSociale" value="{{$clients->RaisonSociale}}" class="form-control"></br>
        <label>Logo</label></br>
        <input type="file" name="Logo" id="Logo" value="{{$clients->Logo}}" class="form-control"></br>

       <!-- <label>Etats</label></br>
        <input type="text" name="Etats" id="Etats" value="{{$clients->Etats}}" class="form-control"></br>
        !-->

        <div class="form-group" >
          <label for="Etats[]" >Etats</label></br>
          <div class="form-check">
            <input type="radio" value="Prospection" name="Etats" class="form-check-input" >
            <label class="form-check-label"> Prospection </label>
          </div>

          <div class="form-check">
            <input type="radio" value="prise RDV" name="Etats" class="form-check-input" >
            <label class="form-check-label"> prise RDV </label>
          </div>

          <div class="form-check">
            <input type="radio" value="Confirmé" name="Etats" class="form-check-input" checked>
            <label class="form-check-label"> Confirmé </label>
          </div>

          <div class="form-check">
            <input type="radio" value="Echoué" name="Etats" class="form-check-input">
            <label class="form-check-label"> Echoué </label>
          </div>

        </div>
        <label>RNE</label></br>
        <input type="text" name="RNE" id="RNE" value="{{$clients->RNE}}" class="form-control"></br>
        <label>Personnephysique</label></br>
        <input type="text" name="Personnephysique" id="Personnephysique" value="{{$clients->Personnephysique}}" class="form-control"></br>
        <label>Adresse</label></br>
        <input type="text" name="Adresse" id="Adresse" value="{{$clients->Adresse}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop