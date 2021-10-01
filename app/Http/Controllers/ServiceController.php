<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Conge;
Use Alert;
 

class ServiceController extends Controller
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

        $services = Service::all();

        return view('service.index', compact('services','mesconges', 'sommes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;
        
        $service->create([
            'ordre_service'=>$request->ordre_service,
            'lib_service'=>$request->lib_service,
        ]);

        Alert::success('Génial!', 'Le service a été sauvegardé');

        return redirect()->route('Service');
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

        $service = Service::where('id', $id)->firstOrFail();

        return view('service.edit', compact('service','mesconges', 'sommes'));
       
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
        $service = Service::where('id', $id)->firstOrFail();
        
        $service->update([
            'ordre_service'=>$request->ordre_service,
            'lib_service'=>$request->lib_service,
        ]);

        Alert::success('Super!', 'Le service a été modifié!');

        return redirect()->route('Service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        Alert::info('Supprimé!', 'Le service a été supprimé!');

        return redirect()->route('Service');
    }
}
