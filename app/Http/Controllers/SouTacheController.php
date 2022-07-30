<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Soutach;

class SouTacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soutache = Soutach::All();
        return response()->json(
            [
                'tache' => $soutache,
                'path' => url('image/tache') . "/"
            ],
            201
        );
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
                "inti_tache" => 'required|string|max:10|min:5|unique:taches',
                "Deadline" => 'required|string',
                "assignation" => 'required|string',
                "description" => 'required|string|max=255|min:5',
                "file" => 'required|string',
                "image" => 'required|string',
                "tache_id" => 'required|string'
            ]);

            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'image/tache';
            $request->image->move($path, $file_name);

            $Soutache = new Soutach([
                "inti_tache" => $request->inti_tache,
                "Deadline" => $request->Deadline,
                "assignation" => $request->assignation,
                "description" => $request->description,
                "file" => $request->file,
                "image" => $file_name,
                "tache_id" => $request->tache_id,
            ]);

            return response()->json([
                $Soutache,
                "status" => "success",
                "message" => "Tache created successfully",
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

            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'image/tache/';
            $request->image->move($path, $file_name);


            $soutache = Soutach::find($id);
            $soutache->inti_tache = $request->inti_tache;
            $soutache->Deadline = $request->Deadline;
            $soutache->assignation = $request->assignation;
            $soutache->description = $request->description;
            $soutache->file = $request->file;
            $soutache->image = $request->file_name;
            $soutache->tache_id = $request->tache_id;

            $soutache->save();
            return response()->json([
                $soutache
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
        $soutache = Soutach::find($id);
        if ($soutache){
            $msg = " Sous tache deleted successfully!";
            $soutache->delete();

        }else {
            $msg = " Sous Tache Not found";
        }
        return response()->json([
            'message' =>$msg
        ],201);
    }
}
