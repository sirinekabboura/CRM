<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Ajouter Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('personnel') }}" method="post">
                    {!! csrf_field() !!}
                    <label>Soustrait</label></br>
                    <select name="Soustrait" id="Soustrait" class="form-control" >
                        <option> -- Select --</option> 
                        <option  value="True" > True </option> 
                        <option  value="False" > False </option> 
                    </select>
                 <!--   <input type="boolean" name="Soustrait" id="Soustrait" class="form-control"></br> -->

                    <div class="form-group" name="Role">
                        <label for="Role[]">Role</label></br>
                        <div class="form-check">
                            <input type="radio" value="Administrateur" name="Role" class="form-check-input">
                            <label class="form-check-label"> Administrateur </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" value="Deve Front" name="Role" class="form-check-input">
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
                   
                    <input type="Float" name="Salaire" id="Salaire" class="form-control"></br>
                    <label>CarteID</label></br>
                    <input type="integer" name="CarteID" id="CarteID" class="form-control"></br>
                    <label>EtatCompte</label></br>
                    <input type="String" name="EtatCompte" id="EtatCompte" class="form-control"></br>
                    <label>Adresse</label></br>
                    <input type="String" name="Adresse" id="Adresse" class="form-control"></br>
                    <button type="button" class="btn btn-secondary btn btn-primary pull-right"
                        data-bs-dismiss="modal">Close</button>
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