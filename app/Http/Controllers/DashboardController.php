<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Conge;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\User_service;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idRole = User::where('id', auth()->user()->id)->first();
        $ids = User_service::where('user_id', auth()->user()->id)->first();

        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();

         $sommes = Conge::where('user_id' , auth()->user()->id)
                        ->sum('nbjrs_conge');
        
        $conge = Conge::all();
        $mesconges = Conge::where('user_id' , auth()->user()->id)->get();
        $mesCongesAutorises = Conge::where('user_id' , auth()->user()->id)
                                     ->where('statut', 'Congé autorisé')->get();
        $mesCongesEncours = Conge::where('statut', 'Nouvelle demande')
                            ->where('user_id' , auth()->user()->id)->get();

        $mesCongesRefuses = Conge::where('statut', 'Refusé par la direction')
                                ->where('user_id' , auth()->user()->id)->get();


        $congesEncours = Conge::where('statut', 'Nouvelle demande')->get();
        $congesAutorises = Conge::where('statut', 'Congé autorisé')->get();
        $congesRefuses = Conge::where('statut', 'Refusé par la section')
                                ->orWhere('statut', 'Refusé par la division')
                                ->orWhere('statut', 'Refusé par le service')
                                ->orWhere('statut', 'Refusé par la direction')->get();

        //statistiquesques
        $conges = Conge::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("count");

        $congess = Conge::select(DB::raw("COUNT(*) as compte"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' , auth()->user()->id)
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("compte");

         $sections = Conge::select(DB::raw("COUNT(*) as secteur"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 6)
                    ->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par la section')
                    ->orWhere('statut', 'Refusé par la section')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("secteur");

         $divisions = Conge::select(DB::raw("COUNT(*) as divi"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 5)->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par la section')
                    ->orWhere('statut', 'Validé par la division')
                    ->orWhere('statut', 'Refusé par la division')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("divi");

         $services = Conge::select(DB::raw("COUNT(*) as ser"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 4)->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par le service')
                    ->orWhere('statut', 'Validé par la division')
                    ->orWhere('statut', 'Refusé par le service')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("ser");

         $rh = Conge::select(DB::raw("COUNT(*) as r"))
                    ->whereYear('created_at', date('Y'))
                    ->where('statut', 'Validé par la direction')
                    ->orWhere('statut', 'Congé autorisé')
                    ->orWhere('statut', 'Congé annulé')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("r");


        $months = Conge::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("month");

        $mois = Conge::select(DB::raw("Month(created_at) as moi"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' , auth()->user()->id)
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("moi");

        $sectionn = Conge::select(DB::raw("Month(created_at) as secte"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 6)
                    ->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par la section')
                    ->orWhere('statut', 'Refusé par la section')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("secte");

        $divise = Conge::select(DB::raw("Month(created_at) as divs"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 5)->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par la section')
                    ->orWhere('statut', 'Validé par la division')
                    ->orWhere('statut', 'Refusé par la division')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("divs");

        $servi = Conge::select(DB::raw("Month(created_at) as sers"))
                    ->whereYear('created_at', date('Y'))
                    ->where('user_id' ,'!=', auth()->user()->id)
                    ->where('service_id', $ids->service_id)
                    ->where('role_id', 4)->where('statut', 'Nouvelle demande')
                    ->orWhere('statut', 'Validé par le service')
                    ->orWhere('statut', 'Validé par la division')
                    ->orWhere('statut', 'Refusé par le service')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("sers");

        $ress = Conge::select(DB::raw("Month(created_at) as source"))
                    ->whereYear('created_at', date('Y'))
                    ->where('statut', 'Validé par la direction')
                    ->orWhere('statut', 'Congé autorisé')
                    ->orWhere('statut', 'Congé annulé')
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck("source");

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $donnees = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $section = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $division = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $service = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $drh = array(0,0,0,0,0,0,0,0,0,0,0,0);
        
        foreach($months as $index => $month)
        {
            $datas[$month] = $conges[$index]; 
        }

        foreach($mois as $index => $moi)
        {
            $donnees[$moi] = $congess[$index]; 
        }

        foreach($sectionn as $index => $secte)
        {
            $section[$secte] = $sections[$index]; 
        }
        foreach($divise as $index => $divs)
        {
            $division[$divs] = $divisions[$index]; 
        }

        foreach($servi as $index => $sers)
        {
            $service[$sers] = $services[$index]; 
        }

        foreach($ress as $index => $source)
        {
            $drh[$source] = $rh[$index]; 
        }
       
        return view('dashboard.index',  compact('datas','donnees', 'section', 'division', 'service', 'drh', 'congesEncours' ,'conge', 'congesAutorises', 'congesRefuses','mesconges', 'mesCongesAutorises','mesconges', 'sommes', 'mesCongesEncours', 'mesCongesRefuses'));
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
        //
    }
}
