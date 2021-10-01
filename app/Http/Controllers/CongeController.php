<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Conge;
use App\Models\User_service;
use App\Models\User;
use Alert, Str;



class CongeController extends Controller
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

        $idRole = User::where('id', auth()->user()->id)->first();

        $directeur = Conge::where('statut', 'Validé par le service')
                    ->orWhere('role_id', 2)
                    ->orWhere('role_id', 3)
                    ->orWhere('statut', 'Validé par la direction')
                    ->orWhere('statut', 'Refusé par la direction')->get();


        $drh = Conge::where('statut', 'Validé par la direction')
                ->orWhere('statut', 'Congé autorisé')
                ->orWhere('statut', 'Congé annulé')->get();


        $ids = User_service::where('user_id', auth()->user()->id)->first();

        $section = Conge::where('user_id', '!=', auth()->user()->id)
                ->where('service_id', $ids->service_id)
                ->where('role_id', 6)
                ->where('statut', 'Nouvelle demande')
                ->orWhere('statut', 'Validé par la section')
                ->orWhere('statut', 'Refusé par la section')->get();


        $division = Conge::where('user_id', '!=', auth()->user()->id)
                ->where('service_id', $ids->service_id)
                ->where('role_id', 5)->where('statut', 'Nouvelle demande')
                ->orWhere('statut', 'Validé par la section')
                ->orWhere('statut', 'Validé par la division')
                ->orWhere('statut', 'Refusé par la division')->get();

        $service = Conge::where('user_id', '!=', auth()->user()->id)
                ->where('service_id', $ids->service_id)
                ->where('role_id', 4)->where('statut', 'Nouvelle demande')
                ->orWhere('statut', 'Validé par le service')
                ->orWhere('statut', 'Validé par la division')
                ->orWhere('statut', 'Refusé par le service')->get();

        return view('conge.index', compact('section','drh', 'ids', 'directeur', 'division', 'service', 'mesconges', 'sommes')); 
    }

    public function not()
    {
        $id = auth()->user()->id;

        $notif = Conge::where('user_id', $id)->Where('statut', 'Congé autorisé')->first();

        return $notif->statut; 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conge.create'); 

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
        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

        $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');

        $conge = Conge::where('id', $id)->firstOrFail();

        return view('conge.edit', compact('conge','mesconges', 'sommes'));
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
        //
    }

    public function fiche($pdf)
    {
        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

        $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');

        $conge = Conge::find($pdf);

        return view('conge.pdf', compact('conge','mesconges', 'sommes'));
    }

    public function autorise(Request $request, $id){

        $status = "Congé autorisé";

        $file=$request->file;
            $filename =$file->getClientOriginalName();
            $request->file->move('assets/fiche', $filename);

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            'fiche' =>$filename,
            
        ]);

        Alert::success('Félicitations!', 'Le congé est autorisé');

        return redirect()->route('Conge');
    }

    public function valide_directeur(Request $request, $id){

        $status = "Validé par la direction";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);
        
        Alert::success('Génial!', 'La demande de congé est validée');

        return redirect()->route('Conge');
    }

    public function valide_section(Request $request, $id){

        $status = "Validé par la section";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::success('Génial!', 'La demande de congé est validée');

        return redirect()->route('Conge');
    }

    public function refuse(Request $request, $id){

        $status = "Refusé par la direction";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::info('Refusé!', 'La demande de congé est réjetée');


        return redirect()->route('Conge');
    }

    public function annule(Request $request, $id){

        $status = "Congé annulé";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::info('Annulé!', 'Le congé est annulé');

        return redirect()->route('Conge');
    }


    public function rejete(Request $request, $id){

        $status = "Refusé par la division";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

       Alert::info('Refusé!', 'La demande de congé est réjetée');

        return redirect()->route('Conge');
    }

    public function invalide(Request $request, $id){

        $status = "Refusé par le service";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::info('Refusé!', 'La demande de congé est réjetée');

        return redirect()->route('Conge');
    }

    public function valide_division(Request $request, $id){

        $status = "Validé par la division";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::success('Génial!', 'La demande de congé est validée');

        return redirect()->route('Conge');
    }

    public function valide_service(Request $request, $id){

        $status = "Validé par le service";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

         Alert::success('Génial!', 'La demande de congé est validée');

        return redirect()->route('Conge');
    }

    public function nonfavorable(Request $request, $id){

        $status = "Refusé par la section";

        $conge = Conge::where('id', $id)->firstOrFail();

        $conge->update([

            'statut'=> $status,
            
        ]);

        Alert::info('Refusé!', 'La demande de congé est réjetée');

        return redirect()->route('Conge');
    }

    public function recherche(){


        $r = 0;
        $r2 = 0;

        $q = Str::lower(request()->input('q'));

        if (($q == 'chef') || ($q == 'chef de') ){

            $r = 4;
            $r2 = 3;

        }elseif( ($q == 'chef de division')){

            $r = 4;
        }elseif( ($q == 'chef de service')){
            $r2 = 3;
            
        }

        $conges = Conge::where('role_id', $r)
                        ->orWhere('role_id', $r2)
                        ->orWhere('type_conge_id', 'like', "%$q%")
                        ->orWhere('statut', 'like', "%$q%")
                        ->get();

        return view('conge.recherche', compact('conges'));
    }
}
