<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ajouter client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('client') }}" method="post">
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
                    <button type="button" class="btn btn-secondary btn btn-primary pull-right" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Save" class="btn btn-success btn btn-primary pull-right"></br>
                </form>

            </div>
       <!--     <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
-->
        </div>
    </div>
</div>








<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure you want to delete Member?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="deletemember" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>