<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_conge;
use App\Models\Conge;
use App\Models\User_service;
use App\Models\User;
use Auth;
use Alert;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ids = User_service::where('user_id', auth()->user()->id)->first();
        $idRole = User::where('id', auth()->user()->id)->first();

        $conge = new Conge;

        $file=$request->file;
            $filename =$file->getClientOriginalName();
            $request->file->move('assets/fiche', $filename);

        
        $conge->create([
            'user_id'=> Auth::user()->id,
            'role_id'=> $idRole->role_id,
            'service_id'=> $ids->service_id,
            'type_conge_id'=>$request->type_conge_id,
            'debut_conge'=>$request->debut_conge,
            'fin_conge'=>$request->fin_conge,
            'nbjrs_conge'=>$request->nbjrs_conge,
            'fiche'=>$filename,
        ]);

        Alert::success('Félicitations!', 'Votre demande a été envoyée');

        return redirect()->route('Mesconges');
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
