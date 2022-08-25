<?php

namespace App\Http\Controllers;
use App\Models\User;
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

        $personnels = Personnel::with('user')->get();
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
        $user=User::create($request->all()); 
        $personnel=Personnel::create($request->all());
        

        return response()->json([
            'user'=>$user,
            'personnel'=>$personnel,
            'success' => 'Personnel  Ajoute avec succes '
            ], 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel1=Personnel::find($id);
        $user=User::find($id);
        return response()->json([
            'personnel'=>$personnel1,
            'user'=>$user
            ], 200); 

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        

        $personnel = Personnel::find($id);
        $user= User::find($id);
        $input = $request->all();
        $personnel->update($input);
        $user->update($input);
     
           // return $personnel->toJson(JSON_PRETTY_PRINT);
    
           return response()->json([
            'personnel'=>$personnel,
            'user'=>$user,
            'success' => 'Personnel  updated with success '
            ], 200);     
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       //$personnel= Personnel::destroy($id);
       $personnel= Personnel::where('id',$request->id)->delete();
       return response()->json([
        'success' => 'Personnel supprimé avec succès '
        ], 200);

    }
}

