<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        //   return view ('clients.index')->with('clients', $clients);
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
       /* $input = $request->all();
        Client::create($input); 
         return redirect('client')->with('flash_message', 'Client Addedd!'); 
         */ 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client , $id)
    {
        $client = Client::find($id);
        return $client->toJson(JSON_PRETTY_PRINT);

        /*
        $client = Client::find($id);
        return view('clients.show')->with('clients', $client);
        */
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
     
        return $client->toJson(JSON_PRETTY_PRINT);
    }



        /*
        $client = Client::find($id);
        $input = $request->all();
        $client->update($input);
        return redirect('client')->with('flash_message', 'client Updated!'); 
        */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client , $id)
    {
        $client= Client::destroy($id);
        return response()->json([
         'success' => 'Client supprimé avec succès '
         ], 200);

        /*
        Client::destroy($id);
        return redirect('client')->with('flash_message', 'client deleted!'); 
        */ 
    }

    
///////////////////////////////////////////
    
 
  
  /*
    
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show')->with('clients', $client);
    }
    
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit')->with('clients', $client);
    }
  
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $input = $request->all();
        $client->update($input);
        return redirect('client')->with('flash_message', 'client Updated!');  
    }
  
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('client')->with('flash_message', 'client deleted!');  
    }
    */
}
