<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DateEcheanceContrat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DirectionController extends Controller
{
    public function create()
    {
        $wilayas = DB::table('wilayas')->get();
        return view('directions.create', compact('wilayas'));
    }
    

    public function index(Request $request)
    {
        $userRole = Auth::user()->Role; // Get the role of the logged-in user
    
        $type_direction = $request->get('type_direction');
        $num_parent_direction = $request->get('num_parent');
    
        $query = Direction::query();
    
        // Filter directions by type if provided
        if ($type_direction == 'DG') {
            $query->where('num_parent', 10);
        } elseif ($type_direction == 'DR') {
            $query->where('num_parent', 1);
        } elseif ($type_direction == 'Antenne') {
            $query->whereBetween('num_parent', [2, 7]);
        }
    
        // Filter by id_wilaya if the user is not a 'Big boss'
        if ($userRole !== 'Big boss') {
            $userWilayaId = Auth::user()->id_wilaya;
            $query->where('id_wilaya', $userWilayaId);
        }
    
        $directions = $query->orderBy('intitule_direction')->get();
    
        return view('directions.index', compact('directions'));
    }
    


    public function store(Request $request)
    {
        $user = User::all();
        $direction = new Direction();
        $direction->code_direction  = $request->input('code_direction');
        $direction->intitule_direction = $request->input('intitule_direction');
        $direction->adresse_direction = $request->input('adresse_direction');
        $direction->tel1_direction = $request->input('tel1_direction');
        $direction->tel2_direction = $request->input('tel2_direction');
        $direction->mobile_direction = $request->input('mobile_direction');
        $direction->fax_direction = $request->input('fax_direction');
        $direction->email_direction = $request->input('email_direction');
        $direction->responsable_direction = $request->input('responsable_direction');
        $direction->memo_direction = $request->input('memo_direction');
        $direction->creer_le_direction = $request->input('creer_le_direction');
        $direction->id_wilaya = $request->input('id_wilaya');
        $direction->creer_par_direction = $request->input('creer_par_direction');
        $direction->modifie_le_direction = $request->input('modifie_le_direction');
        $direction->modifie_par_direction = $request->input('modifie_par_direction');
        $direction->type_direction = $request->input('type_direction');
        $direction->num_parent = $request->input('num_parent');

        $direction->nom_parent = $request->input('nom_parent');
        $direction->save();
        // dd("hhh");
      //  Notification::send($user, new DateEcheanceContrat($direction->type_direction));
        // dd("gggg");
        return redirect('/directions');
    }
    public function edit($ID_DR5)
    {
        $direction = Direction::find($ID_DR5);
        $wilayas = DB::table('wilayas')->get();
        return view('directions.modifierdirection', compact('direction', 'wilayas'));
    }
    public function destroy($ID_DR5)
    {
        $directions = Direction::find($ID_DR5);
        $directions->delete();
        return redirect('/directions');
    }

    public function restoreAll()
    {
        // Restaurer tous les enregistrements supprimés
        Direction::onlyTrashed()->restore();
        return redirect('/directions');
    }

    public function show($ID_DR5)
    {
        $directions = Direction::find($ID_DR5);
        $wilayaName = DB::table('wilayas')->where('id_wilaya', $directions->id_wilaya)->value('nom_wilaya');
    
        return view('directions.show', compact('directions', 'wilayaName'));
    }
    
    public function update(Request $request, $ID_DR5)
    {

        $direction = Direction::find($ID_DR5);
        $direction->code_direction  = $request->input('code_direction');
        $direction->intitule_direction = $request->input('intitule_direction');
        $direction->adresse_direction = $request->input('adresse_direction');
        $direction->id_wilaya = $request->input('id_wilaya');
        $direction->cp_direction = $request->input('cp_direction');
        $direction->tel1_direction = $request->input('tel1_direction');
        $direction->tel2_direction = $request->input('tel2_direction');
        $direction->mobile_direction = $request->input('mobile_direction');
        $direction->fax_direction = $request->input('fax_direction');
        $direction->email_direction = $request->input('email_direction');
        $direction->responsable_direction = $request->input('responsable_direction');
        $direction->memo_direction = $request->input('memo_direction');
        $direction->creer_le_direction = $request->input('creer_le_direction');
        $direction->creer_par_direction = $request->input('creer_par_direction');
        $direction->modifie_le_direction = $request->input('modifie_le_direction');
        $direction->modifie_par_direction = $request->input('modifie_par_direction');
        $direction->type_direction = $request->input('type_direction');
        $direction->num_parent = $request->input('num_parent');
        $direction->save();
        // dd("hhh");
        //  Notification::send($user, new DateEcheanceContrat($direction->type_direction));
        // dd("gggg");
        return redirect('/directions');
    }
}
