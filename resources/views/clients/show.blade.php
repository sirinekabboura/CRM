@extends('clients.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Clients Informations</div>
  <div class="card-body">
   
 
        <div class="card-body">
    
        <p class="card-text">Raison Sociale : {{ $clients->RaisonSociale }}</p>
        <p class="card-text">Logo : {{ $clients->Logo }}</p>
        <p class="card-text">Etats : {{ $clients->Etats }}</p>
        <p class="card-text">RNE : {{ $clients->RNE }}</p>
        <p class="card-text">Personne physique : {{ $clients->PersonnePhysique }}</p>
        <p class="card-text">Adresse : {{ $clients->Adresse }}</p>
       
    </div>
       
    </hr>
  
  </div>
</div>