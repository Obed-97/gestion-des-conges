<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\Models\User;
use App\Models\Conge;
use Alert;
use Spatie\Permission\Models\Role;


class ProfileController extends Controller
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

        $roles = Role::all();
        return view('profile.index', compact('roles','mesconges', 'sommes'));
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
        $filename = NULL;

        if($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalName();
            $location = public_path('/assets/images/users/'.$filename);
            Image::make($image)->save($location);   
        }

        $user = Auth::User();
        $user->photo = $filename;
        $user->save();

        Alert::success('Cool!', 'Votre photo a été changée');

        return redirect()->route('profile');
    
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
       $profile = auth()->user();
        
        $profile->update([
            'matricule'=>$request->matricule,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'tel'=>$request->tel,
            'adresse'=>$request->adresse,
        ]);

        Alert::success('Génial!', 'Vos informations ont été modifiées');

        return redirect()->route('profile');
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
