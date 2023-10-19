<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnels.index')->with('personnels', $personnels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //$directions = Direction::select('ID_DR5', 'intitule_direction')->get();
        // $wilayas = Wilaya::select('ID_Wilayas', 'Intitule_Wilaya')->get();
        //return view('personnels.create', compact('directions', 'wilayas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personnel = new Personnel();
        $personnel->nom = $request->input('nom');
        $personnel->prenom = $request->input('prenom');
        $personnel->adresse = $request->input('adresse');
        $personnel->ville = $request->input('ville');
        $personnel->email = $request->input('email');
        $personnel->telephone1 = $request->input('telephone1');
        $personnel->telephone2 = $request->input('telephone2');
        $personnel->date_recrutement = $request->input('date_recrutement');
        $personnel->date_naissance = $request->input('date_naissance');
        $personnel->lieu_naissnace = $request->input('lieu_naissnace');
        $personnel->situation_familiale = $request->input('situation_familiale');
        $personnel->id_direction = $request->input('id_direction');
        $personnel->save();
        return redirect()->route('personnels.index')->with('success', 'Ajouter avec succès !');
    }
    //Recuperer un livre puis le saisir dans le formulaire
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        //$directions = Direction::all();
        // $wilayas = Wilaya::all();
        return view('personnels.modifierpersonnel', compact('personnel', 'directions', 'wilayas'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personnel = Personnel::find($id);
        return view('personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $personnel = Personnel::find($id);
        $personnel->nom = $request->input('nom');
        $personnel->prenom = $request->input('prenom');
        $personnel->adresse = $request->input('adresse');
        $personnel->ville = $request->input('ville');
        $personnel->email = $request->input('email');
        $personnel->telephone1 = $request->input('telephone1');
        $personnel->telephone2 = $request->input('telephone2');
        $personnel->date_recrutement = $request->input('date_recrutement');
        $personnel->date_naissance = $request->input('date_naissance');
        $personnel->lieu_naissnace = $request->input('lieu_naissnace');
        $personnel->situation_familiale = $request->input('situation_familiale');
        $personnel->id_direction = $request->input('id_direction');
        $personnel->direction = $request->input('direction');
        $personnel->save();
        return redirect()->route('personnels.index')->with('success', 'Mise à jour réussie !');
        // return redirect()->route('personnels.index', ['IDPersonnels' => $IDPersonnels]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        return redirect()->route('personnels.index')
            ->with('success', 'Personnel supprimé avec succès');
    }
}
