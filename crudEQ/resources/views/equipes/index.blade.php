@extends('equipes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des équipes :</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-outline-danger" href="{{ route('equipes.create') }}">Ajouter équipe</a>
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
            <th>IdEquipe</th>
            <th>Nom équipe</th>
            <th>Membres équipe</th>
            <th>Projet</th>
            <th>Pseudo</th>
            <th>Code</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($equipes as $eq)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $eq->name }}</td>
            <td>{{ $eq->membres }}</td>
            <td>{{ $eq->projet }}</td>
            <td>{{ $eq->pseudo }}</td>
            <td>{{ $eq->code }}</td>
            <td>
                <form action="{{ route('equipes.destroy',$eq->id) }}" method="POST">
   
                    <a class="btn btn-outline-success " href="{{ route('equipes.show',$eq->id) }}">Détail</a>
    
                    <a class="btn btn-outline-warning" href="{{ route('equipes.edit',$eq->id) }}">Modifer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $equipes->links() !!}
      
@endsection