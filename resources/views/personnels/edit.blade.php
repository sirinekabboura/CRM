@extends('personnels.layout')
@section('content')
 
<div class="card">
  <div class="card-header"> Edit Personnel</div>
  <div class="card-body">
      
      <form action="{{ url('personnel/' .$personnels->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$personnels->id}}" id="id" />
       
        <label>Soustrait</label></br>
                    <select name="Soustrait" id="Soustrait"  value="{{$personnels->Soustrait}}" class="form-control" >
                        <option> -- Select --</option> 
                        <option  value="True" > True </option> 
                        <option  value="False" > False </option> 
                    </select>
    

        <div class="form-group" >
          <label for="Role[]" value="{{$personnels->Role}}">Role</label></br>
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
        <input type="float" name="Salaire" id="Salaire" value="{{$personnels->Salaire}}" class="form-control"></br>
        <label>CarteID</label></br>
        <input type="integer" name="CarteID" id="CarteID" value="{{$personnels->CarteID}}" class="form-control"></br>
        <label>EtatCompte</label></br>
        <input type="String" name="EtatCompte" id="EtatCompte" value="{{$personnels->EtatCompte}}" class="form-control"></br>
        <label>Adresse</label></br>
        <input type="String" name="Adresse" id="Adresse" value="{{$personnels->Adresse}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop