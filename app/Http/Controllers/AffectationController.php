<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\User_service;
use App\Models\Conge;
use Alert;


class AffectationController extends Controller
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

        $affectations = User_service::all();
        return view('affectation.index', compact('affectations', 'mesconges', 'sommes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

        $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');

        $users = User::all();
        $services = Service::all();
        return view('affectation.create', compact('users','services','mesconges', 'sommes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $affectation = new User_service;
        
        $affectation->create([
            'user_id'=>$request->user_id,
            'service_id'=>$request->service_id,
            'date_affect'=>$request->date_affect,
        ]);

        Alert::success('Génial!', 'L\'affectation a été sauvegardée');

        return redirect()->route('Affectation');
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
                        
        $users = User::all();
        $services = Service::all();
        $affectation = User_service::where('id', $id)->firstOrFail();

        return view('affectation.edit', compact('affectation', 'users','services','mesconges', 'sommes'));
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
        $affectation = User_service::where('id', $id)->firstOrFail();
        
        $affectation->update([
            'user_id'=>$request->user_id,
            'service_id'=>$request->service_id,
            'date_affect'=>$request->date_affect,
        ]);

        Alert::success('Super!', 'L\'affectation a été modifiée');

        return redirect()->route('Affectation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectation = User_service::findOrFail($id);
        $affectation->delete();

        
        Alert::error('Oops!', 'L\'affectation a été supprimée');

        return redirect()->route('Affectation');
    }
}
