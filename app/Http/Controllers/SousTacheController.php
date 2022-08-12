<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Soustache;

class SousTacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soustache = Soustache::All();
        return response()->json(
            [
                $soustache,
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
                "inti_tache" => 'required|string|',
                "Deadline" => 'required|string',
                "assignation" => 'required|string',
                "description" => 'required|string|',
                "file" => 'required|string',
                "soustache_id" => 'required|string',

            ]);

            $soustache = new Soustache([
                "inti_tache" => $request->inti_tache,
                "Deadline" => $request->Deadline,
                "assignation" => $request->assignation,
                "description" => $request->description,
                "file" => $request->file,
                "soustache_id" => $request->soustache_id,
            ]);


            return response()->json([
                $soustache,
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

            $soustache = Soustache::find($id);
            $soustache->inti_tache = $request->inti_tache;
            $soustache->Deadline = $request->Deadline;
            $soustache->assignation = $request->assignation;
            $soustache->description = $request->description;
            $soustache->file = $request->file;
            $soustache->soustache_id = $request->soustache_id;
            $soustache->save();
            return response()->json([
                $soustache
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
        $soustache = Soustache::find($id);
        if ($soustache) {
            $msg = " Sous tache deleted successfully!";
            $soustache->delete();
        } else {
            $msg = " Sous Tache Not found";
        }
        return response()->json([
            'message' => $msg
        ], 201);
    }
}
