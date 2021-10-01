<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\MescongesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PersonnelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('not', [CongeController::class, 'not'])->name('not');


Route::group(['middleware'=>['auth']], function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//le personnel
    Route::get('/personnel', [PersonnelController::class, 'index'])->name('Personnel');

//mon profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/changer', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('/profile/mettre-a-jour/{id}', [ProfileController::class, 'update'])->name('profile.update');

//historique
    Route::get('/historique', [HistoriqueController::class, 'index'])->name('historique');

//conges
    Route::get('/conge', [CongeController::class, 'index'])->name('Conge');
    Route::get('/conge/creer', [CongeController::class, 'create'])->name('Conge.create');
    Route::get('/conge/gerer/{id}', [CongeController::class, 'edit'])->name('Conge.edit');
    Route::put('/conge/valide/{id}', [CongeController::class, 'valide_directeur'])->name('Conge.valide');
    Route::put('/conge/favorable/{id}', [CongeController::class, 'valide_section'])->name('Conge.favorable');
    Route::put('/conge/refuse/{id}', [CongeController::class, 'refuse'])->name('Conge.refuse');
    Route::put('/conge/autorise/{id}', [CongeController::class, 'autorise'])->name('Conge.autorise');
    Route::put('/conge/annule/{id}', [CongeController::class, 'annule'])->name('Conge.annule');
    Route::put('/conge/traite/{id}', [CongeController::class, 'valide_division'])->name('Conge.traite');
    Route::put('/conge/accepte/{id}', [CongeController::class, 'valide_service'])->name('Conge.accepte');
    Route::put('/conge/rejete/{id}', [CongeController::class, 'rejete'])->name('Conge.rejete');
    Route::put('/conge/invalide/{id}', [CongeController::class, 'invalide'])->name('Conge.invalide');
    Route::put('/conge/nonfavorable/{id}', [CongeController::class, 'nonfavorable'])->name('Conge.nonfavorable');
    Route::get('/reccherche', [CongeController::class, 'recherche'])->name('Conge.recherche');

//mesconges
    Route::get('/mesconge', [MescongesController::class, 'index'])->name('Mesconges');
    Route::delete('/mesconge/supprimer/{id}', [MescongesController::class, 'destroy'])->name('Mesconges.destroy');

//demander_congé
    Route::get('/demander_conge', [DemandeController::class, 'index'])->name('demande');
    Route::post('/demande_envoyer', [DemandeController::class, 'store'])->name('demande.store');

//ouvrir pdf
    Route::get('/ouvrir/{pdf}', [CongeController::class, 'fiche'])->name('ouvrir');


//service
    Route::get('/service', [ServiceController::class, 'index'])->name('Service');
    Route::get('/service/nouveau', [ServiceController::class, 'create'])->name('Service.create');
    Route::post('/service/nouveau/ajouter', [ServiceController::class, 'store'])->name('Service.store');
    Route::get('/service/modifier/{id}', [ServiceController::class, 'edit'])->name('Service.edit');
    Route::put('/service/mise-a-jour/{id}', [ServiceController::class, 'update'])->name('Service.update');
    Route::delete('/service/supprimer/{id}', [ServiceController::class, 'destroy'])->name('Service.destroy');

//type
    Route::get('/types', [TypeController::class, 'index'])->name('Type');
    Route::get('/types/nouveau', [TypeController::class, 'create'])->name('Type.create');
    Route::post('/types/nouveau/ajouter', [TypeController::class, 'store'])->name('Type.store');
    Route::get('/types/modifier/{id}', [TypeController::class, 'edit'])->name('Type.edit');
    Route::put('/types/mise-a-jour/{id}', [TypeController::class, 'update'])->name('Type.update');
    Route::delete('/types/supprimer/{id}', [TypeController::class, 'destroy'])->name('Type.destroy');

//affectation
    Route::get('/affectation', [AffectationController::class, 'index'])->name('Affectation');
    Route::get('/affectation/nouveau', [AffectationController::class, 'create'])->name('Affectation.create');
    Route::post('/affectation/nouveau/ajouter', [AffectationController::class, 'store'])->name('Affectation.store');
    Route::get('/affectation/modifier/{id}', [AffectationController::class, 'edit'])->name('Affectation.edit');
    Route::put('/affectation/mise-a-jour/{id}', [AffectationController::class, 'update'])->name('Affectation.update');
    Route::delete('/affectation/supprimer/{id}', [AffectationController::class, 'destroy'])->name('Affectation.destroy');

//permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('Permission');
    Route::get('/permissions/nouveau', [PermissionController::class, 'create'])->name('Permission.create');
    Route::post('/permissions/nouveau/ajouter', [PermissionController::class, 'store'])->name('Permission.store');
    Route::get('/permissions/modifier/{id}', [PermissionController::class, 'edit'])->name('Permission.edit');
    Route::put('/permissions/mise-a-jour/{id}', [PermissionController::class, 'update'])->name('Permission.update');
    Route::delete('/permissions/supprimer/{id}', [PermissionController::class, 'destroy'])->name('Permission.destroy');

//roles
    Route::get('/roles', [RoleController::class, 'index'])->name('Role');
    Route::get('/roles/nouveau', [RoleController::class, 'create'])->name('Role.create');
    Route::post('/roles/nouveau/ajouter', [RoleController::class, 'store'])->name('Role.store');
    Route::get('/roles/modifier/{id}', [RoleController::class, 'edit'])->name('Role.edit');
    Route::put('/roles/mise-a-jour/{id}', [RoleController::class, 'update'])->name('Role.update');
    Route::delete('/roles/supprimer/{id}', [RoleController::class, 'destroy'])->name('Role.destroy');



    
});

require __DIR__.'/auth.php';
