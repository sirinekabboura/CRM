<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('user')->get();
        return $clients->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create($request->all());   
        User::create($request->all()); 
        return response()->json([
            'success' => 'Client  Ajouté avec succès '
            ], 200);      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $user=User::find($id);
        return response()->json([
            'client'=>$client,
            'user'=>$user
            ], 200); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client , $id)
    {
        $client = Client::find($id);
        $input = $request->all();
        $client->update($input);
     

        $user= User::find($id);
        $input = $request->all();
        $user->update($input);
     
    
           return response()->json([
            'client'=>$client,
            'user'=>$user,
            'success' => 'Client updated with success '
            ], 200);     
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client= Client::where('id',$request->id)->delete();

        return response()->json([
         'success' => 'Client supprimé avec succès '
         ], 200);
    }

}
