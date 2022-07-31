<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = DB::table('projets')
            ->leftJoin('equipes', 'projets.NomProjet', '=', 'equipes.name')
            ->get();
        $projets = Projet::latest()->paginate(5);
      
        return view('projets.index',compact('projets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
 
    }
    public function create()
    {
        return view('projets.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'NomProjet' => 'required',
            'Equipe' => 'required',
            'Etat' => 'required',
            'Deadline' => 'required',
           
        ]);
      
        Projet::create($request->all());
       
        return redirect()->route('projets.index')
                        ->with('success','Projet a été ajouté avec succés');
    }

    public function show(Projet $projet)
    {
        return view('projets.show',compact('projet'));
    }

    public function edit(Projet $projet)
    {
        return view('projets.edit',compact('projet'));
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();
       
        return redirect()->route('projets.index')
                        ->with('success','Projet a été supprimé avec succés');
    }
    public function update(Request $request, Projet $projet)
    {
        $request->validate([
            'NomProjet' => 'required',
            'Equipe' => 'required',
            'Etat' => 'required',
            'Deadline' => 'required',

        ]);
      
        $projet->update($request->all());
      
        return redirect()->route('projets.index')
                        ->with('success','Projet a été modifié avec succés');
    }
  
}
