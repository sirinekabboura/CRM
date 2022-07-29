<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        return $personnels->toJson(JSON_PRETTY_PRINT);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Personnel::create($request->all());        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel ,$id )
    {
        $personnel = Personnel::find($id);
        return $personnel->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel , $id)
    {
        

        $personnel = Personnel::find($id);
        $input = $request->all();
        $personnel->update($input);
     
            return $personnel->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel , $id)
    {
       $personnel= Personnel::destroy($id);
       return response()->json([
        'success' => 'Personnel supprimé avec succès '
        ], 200);

    }
}

    /*
    public function index()
    {
        $personnels = Personnel::all();
        return view ('personnels.index')->with('personnels', $personnels);
    }
    public function create()
    {
        return view('personnels.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
       
        
        Personnel::create($input); 
        return redirect('personnel')->with('flash_message', 'Personnel Addedd!');  
    }
    
    public function show($id)
    {
        $personnel = Personnel::find($id);
        return view('personnels.show')->with('personnels', $personnel);
    }
    
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        return view('personnels.edit')->with('personnels', $personnel);
    }
  
    public function update(Request $request, $id)
    {
        $personnel = Personnel::find($id);
        $input = $request->all();
        $personnel->update($input);
        return redirect('personnel')->with('flash_message', 'personnel Updated!');  
    }
  
    public function destroy($id)
    {
        Personnel::destroy($id);
        return redirect('personnel')->with('flash_message', 'personnel deleted!');  
    }
    */

