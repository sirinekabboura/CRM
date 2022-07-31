@extends('projets.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des projets :</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-danger" href="{{ route('projets.create') }}">Ajouter projet</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>IdProjet</th>
            <th>Nom Projet</th>
            <th>Equipe Responsable</th>
            <th>Etat</th>
            <th>Deadline</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projets as $projet)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $projet->NomProjet }}</td>
            <td>{{ $projet->Equipe }}</td>
            <td>{{ $projet->Etat }}</td>
            <td>{{ $projet->Deadline }}</td>
            <td>
                <form action="{{ route('projets.destroy',$projet->id) }}" method="POST">
   
                    <a class="btn btn-outline-success " href="{{ route('projets.show',$projet->id) }}">Détail</a>
    
                    <a class="btn btn-outline-warning" href="{{ route('projets.edit',$projet->id) }}">Modifer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $projets->links() !!}
      
@endsection