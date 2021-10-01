<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;

use Alert;

class MescongesController extends Controller
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

        
        return view('mesconges.index', compact('mesconges', 'sommes')); 
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
        $mesconges = Conge::findOrFail($id);
        $mesconges->delete();

        Alert::info('Supprimé!', 'Le congé est supprimé');

        return redirect()->route('Mesconges');
    }
}
