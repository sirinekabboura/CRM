<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Tache;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tache = Tache::all();
            return response()->json([
                $tache,
               
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $request->validate([
                "inti_tache" => 'required|string|',
                "Deadline" => 'required|string',
                "assignation" => 'required|string',
                "description" => 'required|string|',
                "soustache_id" => 'required|string'
            ]);
            
            $tache = new Tache([
                "inti_tache" => $request->inti_tache,
                "Deadline" => $request->Deadline,
                "assignation" => $request->assignation,
                "description" => $request->description,
                "soustache_id" => $request->soustache_id,
                "id_comment"=>$request->id_comment,
                
            ]);

            return response()->json([
                $tache,
                "status" => "success",
                "message" => "Tache created successfully"
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "status" => "error",
                "errors" => $e->errors()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $tache = Tache::find($id);
            $tache->inti_tache = $request->inti_tache;
            $tache->Deadline = $request->Deadline;
            $tache->assignation = $request->assignation;
            $tache->description = $request->description;
            $tache->soustache_id = $request->soustache_id;
            $tache->comment_id = $request->comment_id;

            $tache->save();
            return response()->json([
                $tache
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "status" => "error",
                "errors" => $e->errors()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::find($id);
        if ($tache) {
            $msg = "tache deleted successfully!";
            $tache->delete();
        } else {
            $msg = "Tache Not found";
        }
        return response()->json([
            'message' => $msg
        ], 201);
    }
}
