@extends('projets.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter un projet</h2>
        </div>
 
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('projets.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom Projet:</strong>
                <input type="text" name="NomProjet" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Equipe :</strong>
                <input type="text" name="Equipe" class="form-control" placeholder="équipe">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Etat:</strong>
                <select id="etat" name="Etat">
                     <option value="Affecté">Affecté</option>
                    <option value="Crée">Créé</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deadline:</strong>
                <input type="date" name="Deadline" class="form-control" placeholder="deadline">
            </div>
        </div>
    <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                <a class="btn btn-outline-danger" href="{{ route('projets.index') }}"> Retour</a>
        </div>
    </div>
   
</form>
@endsection