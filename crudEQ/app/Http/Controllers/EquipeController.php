<?php
  
namespace App\Http\Controllers;
  
use App\Models\Equipe;
use Illuminate\Http\Request;
  
class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::latest()->paginate(5);
      
        return view('equipes.index',compact('equipes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipes.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'membres' => 'required',
            'projet' => 'required',
            'pseudo' => 'required',
            'code' => 'required',
        ]);
      
        Equipe::create($request->all());
       
        return redirect()->route('equipes.index')
                        ->with('success','Equipe a été ajoutée avec succés');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        return view('equipes.show',compact('equipe'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        return view('equipes.edit',compact('equipe'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'name' => 'required',
            'membres' => 'required',
            'projet' => 'required',
            'pseudo' => 'required',
            'code' => 'required',

        ]);
      
        $equipe->update($request->all());
      
        return redirect()->route('equipes.index')
                        ->with('success','Equipe a été modifiée avec succés');
    }
    /**
     * Remove the specified resource from storage.
     *
     *@param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
       
        return redirect()->route('equipes.index')
                        ->with('success','Equipe a été supprimée avec succés');
    }
}