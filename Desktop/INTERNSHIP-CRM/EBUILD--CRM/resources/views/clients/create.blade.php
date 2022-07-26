@extends('clients.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Clients Data</div>
  <div class="card-body">  
      <form action="{{ url('client') }}" method="post" >
        {!! csrf_field() !!}
        <label>RaisonSociale</label></br>
        <input type="text" name="RaisonSociale" id="RaisonSociale" class="form-control"></br>
        
        <label>Logo</label></br>
        <input type="file" name="Logo" id="Logo" class="form-control"  placeholder="image"></br>
        <div class="form-group" name="Etats">
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
        <input type="text" name="RNE" id="RNE" class="form-control"></br>
        <label>Personnephysique</label></br>
        <input type="text" name="Personnephysique" id="Personnephysique" class="form-control"></br>
        <label>Adresse</label></br>
        <input type="text" name="Adresse" id="Adresse" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/client') }}"> Back</a>
        </div>
    </form>
  </div>
</div>
 
@stop