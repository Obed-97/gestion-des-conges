<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_conge;
use App\Models\Conge;
use Alert;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

        $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');

        $types = Type_conge::all();
        return view('type.index', compact('types','mesconges', 'sommes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type_conge;
        
        $type->create([
            'lib_type_conge'=>$request->lib_type_conge,
            'nbjours'=>$request->nbjours,
        ]);

        Alert::success('Génial!', 'Le type a été sauvegardé');

        return redirect()->route('Type');
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
         $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

        $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');

        $type = Type_conge::where('id', $id)->firstOrFail();

        return view('type.edit', compact('type','mesconges', 'sommes'));
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
        $type = Type_conge::where('id', $id)->firstOrFail();
        
        $type->update([
            'lib_type_conge'=>$request->lib_type_conge,
            'nbjours'=>$request->nbjours,
        ]);

        Alert::success('Super!', 'Le type a été modifié');


        return redirect()->route('Type');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type_conge::findOrFail($id);
        $type->delete();

        Alert::info('Supprimé!', 'Le type a été supprimé');


        return redirect()->route('Type');
    }
}
