<head>
    <meta charset="utf-8">
    <title>qsqnd Delete</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<form action="{{route('client.create')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Create New User') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! csrf_field() !!}

                    <label>Name</label></br>
                    <input type="text" name="name" id="name" class="form-control"></br>
                    <label>email</label></br>
                    <input type="text" name="email" id="email" class="form-control"></br>
                    <label>password</label></br>
                    <input type="password" name="password" id="password" class="form-control"></br>
                    <label>NumTelephone</label></br>
                    <input type="text" name="NumTelephone" id="NumTelephone" class="form-control"></br>
                    <label>RaisonSociale</label></br>
                    <input type="text" name="RaisonSociale" id="RaisonSociale" class="form-control"></br>

                    <label>Logo</label></br>
                    <input type="file" name="Logo" id="Logo" class="form-control" placeholder="image"></br>
                    <div class="form-group">
                        <label for="Etats[]">Etats</label></br>
                        <div class="form-check">
                            <input type="radio" value="Prospection" name="Etats" class="form-check-input">
                            <label class="form-check-label"> Prospection </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" value="prise RDV" name="Etats" class="form-check-input">
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
                </div>
            </div>
        </div>
    </div>
</form>