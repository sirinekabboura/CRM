<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Comment;
use App\Models\Tache;

class CommentController extends Controller
{

    //get all comment
    public function index()
    {
        $comment = Comment::all();
        return response()->json([
            $comment
        ]);
    }

    //create all comment
    public function create(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required|string',
                'image' => 'required|string',
                'id_user' => 'required|integer',
                'id_tache' =>'required|integer'
            ]);

            $comment = new Comment([
                "description" => $request->description,
                "image" => $request->image,
                "id_user" => $request->id_user,
                "id_tache" => $request->id_tache
            ]);
            return response()->josn([
                $comment,
                "status" => "success",
                "message" => "Comment created succes",
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "status" => "error",
                "errors" => $e->errors()
            ], 400);
        }
    }

    //Updated Comment
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->description = $request->description;
        return response()->json([
            "status" => "success",
            "message" => "comment updated succefull",
        ]);
    }

    //destroy  function
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $msg = " Comment deleted successfully!";
            $comment->delete();
        } else {
            $msg = " CommentF Not found";
        }
        return response()->json([
            'message' => $msg
        ], 201);
    }

    public function tache($id){
        return response()->json([
            Comment::where("id_tache",$id_tache)->with(["tache"])->get()
        ],201);
    }
    
}
