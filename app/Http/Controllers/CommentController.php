<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Comment;

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
            $comment =  $request->validate([
                'desc' => 'required|string',
            ]);
            Comment::create($comment);
            return response()->josn([
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
        $comment->desc = $request->desc;
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
}
