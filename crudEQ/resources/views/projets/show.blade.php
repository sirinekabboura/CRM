@extends('projets.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Détails équipe :</h2>
            </div>

        </div>
    </div>
   
    <div class="row">

        <table class="table table-hover table-bordered" id="sampleTable">
							<tbody>
                                <tr>
									<th>Nom Projet: </th>
									<td>{{ $projet->NomProjet }}</td>
								</tr>
								<tr>
									<th>Equipe :</th>
									<td>{{ $projet->Equipe }}</td>
								</tr>
                                <tr>
									<th>Etat :</th>
									<td>{{ $projet->Etat }}</td>
								</tr>
                                <tr>
									<th>Deadline</th>
									<td>{{ $projet->Deadline }}</td>
								</tr>
                              
        </table
							
    
    </div>
    <div class="pull-right">
                <a class="btn btn-outline-danger" href="{{ route('projets.index') }}"> Retour</a>
            </div>
@endsection