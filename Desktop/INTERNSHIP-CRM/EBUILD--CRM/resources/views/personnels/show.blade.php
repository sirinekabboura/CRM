@extends('personnels.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Personnels Informations</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <p class="card-text">Soustrait : {{ $personnels->Soustrait }}</p>
        <p class="card-text">Role : {{ $personnels->Role }}</p>
        <p class="card-text">Salaire : {{ $personnels->Salaire }}</p>
        <p class="card-text">CarteID : {{ $personnels->CarteID }}</p>
        <p class="card-text">EtatCompte : {{ $personnels->EtatCompte }}</p>
       
    </div>
       
    </hr>
  
  </div>
</div>