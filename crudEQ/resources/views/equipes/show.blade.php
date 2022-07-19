@extends('equipes.layout')
  
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
									<th>Nom Equipe: </th>
									<td>{{ $equipe->name }}</td>
								</tr>
								<tr>
									<th>Membres :</th>
									<td>{{ $equipe->membres }}</td>
								</tr>
                                <tr>
									<th>Projet :</th>
									<td>{{ $equipe->projet }}</td>
								</tr>
                                <tr>
									<th>Pseudo</th>
									<td>{{ $equipe->pseudo }}</td>
								</tr>
                                <tr>
									<th>Code :</th>
									<td>{{ $equipe->code }}</td>
								</tr>
        </table
							
    
    </div>
    <div class="pull-right">
                <a class="btn btn-outline-danger" href="{{ route('equipes.index') }}"> Back</a>
            </div>
@endsection