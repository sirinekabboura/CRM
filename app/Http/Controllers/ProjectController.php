<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        return response()->json([
            $project
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $project = $request->validate([
                'Type' =>'required|string|max:10|min:2',
                'client'=>'required|string|max:10|min:2',
                'description' =>'required|string|max:255|min:5',
                'CDC' =>'required|string',
                'equipe_id'=>'required|string',
                'Deadline' =>'required|string|max:20|min:5',

            ]);
            Project::create($project);
            return response()->json([
                'status' =>'success',
                'message'=>'Porject Created',
            ],200);
        }catch(ValidationException $e){
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project){
            $msg = " Porject deleted successfully!";
            $project->delete();

        }else {
            $msg = " Porject Not found";
        }
        return response()->json([
            'message' =>$msg
        ],201);
    }
}
