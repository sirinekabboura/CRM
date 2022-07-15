@extends('clients.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Clients Informations</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $clients->name }}</h5>
        <p class="card-text">Email : {{ $clients->email }}</p>
        <p class="card-text">password : {{ $clients->password }}</p>
        <p class="card-text">NumTelephone : {{ $clients->NumTelephone }}</p>
        <p class="card-text">RaisonSociale : {{ $clients->RaisonSociale }}</p>
        <p class="card-text">Logo : {{ $clients->Logo }}</p>
        <p class="card-text">Etats : {{ $clients->Etats }}</p>
        <p class="card-text">RNE : {{ $clients->RNE }}</p>
        <p class="card-text">Personnephysique : {{ $clients->Personnephysique }}</p>
        <p class="card-text">Adresse : {{ $clients->Adresse }}</p>
       
    </div>
       
    </hr>
  
  </div>
</div>