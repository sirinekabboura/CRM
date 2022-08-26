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
            'projects'=>$project
        ], 200);
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
                'Type' => 'required|string',
                'Projectname'=>'required|string',
                'Frameworks'=>'required|string',
                'database'=>'required|string',
                'description' => 'required|string',
                'etats' => 'required|string',
                'filecvc' => 'string',
                'dateCreation' => 'required|string',
                'Deadline' => 'required|string'

            ]);
            $project = New Project([
                'Type' => $request->Type, 
                "Projectname" => $request->Projectname,
                'Frameworks'=> $request->Frameworks,
                'database'=> $request->database,
                'description' => $request->description,
                'etats' => $request->etats,
                'filecvc' => $request->filecvc,
                'dateCreation' => $request->dateCreation,
                'Deadline' => $request->Deadline,
            ]);
            $project->save();
            return response()->json([
                $project,
                'status' => 'success',
                'message' => 'Porject Created',
            ], 200);
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
    public function edit()
    {
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

            $project = Project::find($id);  
            $project->Type = $request->Type;
            $project->Projectname= $request->Projectname;
            $project->Frameworks = $request->Frameworks;
            $project->database = $request->database;
            $project->description = $request->description;
            $project->etats = $request->etats;
            $project->filecvc = $request->filecvc;
            $project->dateCreation = $request->dateCreation;
            $project->Deadline = $request->Deadline;


            $project->save();

            return response()->json([
                "status" => "succes",
                "message" => "project updated succs",
                $project
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
        $project = Project::find($id);
        if ($project) {
            $msg = " Porject deleted successfully!";
            $project->delete();
        } else {
            $msg = " Porject Not found";
        }
        return response()->json([
            'message' => $msg
        ], 201);
    }
}
