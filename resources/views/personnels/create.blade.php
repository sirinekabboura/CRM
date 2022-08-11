@extends('personnels.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Personnels Data</div>
  <div class="card-body">  
      <form action="{{ url('personnel') }}" method="post" >
        {!! csrf_field() !!}

       
        <label>Soustrait</label></br>
        <input type="boolean" name="Soustrait" id="Soustrait" class="form-control"></br>
        
        <div class="form-group" name="Role">
          <label for="Role[]" >Role</label></br>
          <div class="form-check">
            <input type="radio" value="Administrateur" name="Role" class="form-check-input" >
            <label class="form-check-label"> Administrateur </label>
          </div>

          <div class="form-check">
            <input type="radio" value="Deve Front" name="Role" class="form-check-input" >
            <label class="form-check-label"> Deve Front </label>
          </div>

          <div class="form-check">
            <input type="radio" value="Deve Back" name="Role" class="form-check-input" checked>
            <label class="form-check-label"> Deve Back </label>
          </div>

          <div class="form-check">
            <input type="radio" value="Deve Full Stack" name="Role" class="form-check-input">
            <label class="form-check-label"> Deve Full Stack </label>
          </div>

        </div>

        <label>Salaire</label></br>
        <input type="Number" name="Salaire" id="Salaire" class="form-control"></br>
        <label>CarteID</label></br>
        <input type="Number" name="CarteID" id="CarteID" class="form-control"></br>
        <label>EtatCompte</label></br>
        <input type="Boolean" name="EtatCompte" id="EtatCompte" class="form-control"></br>
        <label>Adresse</label></br>
        <input type="String" name="Adresse" id="Adresse" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/personnel') }}"> Back</a>
        </div>
    </form>
  </div>
</div>
 
@stop