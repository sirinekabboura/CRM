@extends('clients.app')
@section('content')

    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="table">
                    <div class="table">
                        <h2>Clients Informations </h2>
                    </div>
                    <div class="table">
                    <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-left"> Ajouter Client</button>
                       <!-- <a href="{{ url('/client/create') }}" class="btn btn-success btn-sm" title="Add New Client ">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Client 
                        </a>
-->
                        <br/>
                        <br/>
                        <div class="table">
                            <table class="table" style="width: 92%; word-wrap: normal;">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>RaisonSociale</th>
                                        <th>Logo</th>
                                        <th>Etats</th>
                                        <th>RNE</th>
                                        <th>Personnephysique</th>
                                        <th>Adresse</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $item->RaisonSociale }}</td>
                                        <td> <img src="{{ asset($item->Logo) }}" width= '50' height='50' class="img img-responsive" /> </td>                                 
                                        <td>{{ $item->Etats }}</td>
                                        <td>{{ $item->RNE }}</td>
                                        <td>{{ $item->Personnephysique }}</td>
                                        <td>{{ $item->Adresse }}</td>

 
                                        <td style="column-width: auto; padding-left: 10px; padding-right: 20px">
                                            <a href="{{ url('/client/' . $item->id) }}" title="View client"><button class="btn btn-info btn-sm" ><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/client/' . $item->id . '/edit') }}" title="Edit client"><button class="btn btn-primary btn-sm" id="edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                            <form method="POST" action="{{ url('/client' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete client" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection