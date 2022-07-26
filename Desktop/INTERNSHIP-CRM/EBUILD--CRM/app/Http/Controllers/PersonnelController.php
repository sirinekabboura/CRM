<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;


class PersonnelController extends Controller
{
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
}
