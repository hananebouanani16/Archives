<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Objet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class groupe_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groupe::all();
        $elem['role'] = Module::all();


        $elem['perm'] = Objet::all();
        $datas['admin'] = Auth::user()->type_utilisateur;
        $datas['c'] = DB::table('users')
            ->join('personnels', 'personnels.id', '=', 'users.idperso')
            ->join('directions', 'directions.ID_DR5', '=', 'personnels.id_direction')
            ->select('personnels.nom', 'users.id', 'users.name', 'users.type_utilisateur', 'users.role', 'users.created_at', 'users.email', 'personnels.situation_familiale', 'directions.Intitule_direction')

            ->get();
        $elem['user'] = NULL;
        if ($datas['admin'] == '-1') {
            $elem['user'] = $datas['c'];
        } else if ($datas['admin'] == '0') {

            $perso = Auth::user()->idperso;



            $dat = DB::table('users')
                ->join('personnels', 'personnels.id', '=', 'users.idperso')
                ->join('directions', 'directions.ID_DR5', '=', 'personnels.id_direction')
                ->where('users.idperso', '=', $perso)
                ->select('directions.ID_DR5')
                ->first();






            $elem['user'] = DB::table('users')
                ->join('personnels', 'personnels.id', '=', 'users.idperso')
                ->join('directions', 'directions.ID_DR5', '=', 'personnels.id_direction')
                ->select('users.id', 'users.name', 'users.tel', 'users.type_utilisateur', 'users.role', 'users.created_at', 'users.email', 'users.status', 'directions.num_parent', 'directions.Intitule_direction', 'personnels.Nom_Personnels', 'directions.ID_DR5')
                ->where('directions.num_parent', '=', $dat->ID_DR5)
                ->orWhere('personnels.id_direction', '=', $dat->ID_DR5)

                ->get();
        }

        return view('users.groupeUsers', ['groups' => $groups, 'elem' => $elem]);
    }


    public function show(Groupe $group)
    {
        // Vérifier si le groupe a été trouvé

        $groupes['elem'] = DB::table('groupes')
            ->select('intitule_groupe', 'id_groupe')
            ->where('id_groupe', '=', $group->id_groupe)
            ->first();
        $groupes['user'] = DB::table('group_users')
            ->join('users', 'group_users.user_id', '=', 'users.id')
            ->select('users.name', 'users.id')
            ->where('group_users.groupe_id_groupe', '=', $groupes['elem']->id_groupe)
            ->get();
        $groupes['nbr'] = DB::table('group_users')
            ->join('users', 'group_users.user_id', '=', 'users.id')
            ->select('users.name', 'users.id')
            ->where('group_users.groupe_id_groupe', '=', $groupes['elem']->id_groupe)
            ->count();

        $groupes['role'] = $modules = DB::table('groupe_modules')
            ->join('groupes', 'groupe_modules.groupe_id_groupe', '=', 'groupes.id_groupe')
            ->join('modules', 'modules.id', '=', 'groupe_modules.module_id')
            ->select('modules.nom_module')
            ->where('groupes.id_groupe', '=', $group->id_groupe)
            ->get();
        $groupes['perm'] = $modules = DB::table('groupe_objects')
            ->join('groupes', 'groupe_objects.groupe_id_groupe', '=', 'groupes.id_groupe')
            ->join('objets', 'objets.NUM_OBJECT', '=', 'groupe_objects.objet_id')
            ->select('objets.intitule_object')
            ->where('groupes.id_groupe', '=', $group->id_groupe)
            ->get();

        $groups = Groupe::all();


        return view('users.groupeUsers', ['groupes' => $groupes, 'groups' => $groups]);
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
        $groupe = new Groupe();
        $groupe->intitule_groupe = $request->input('intitule');
        $groupe->intitule_groupe = $request->input('intitule');
        $groupe->id_direction = $request->input('type_dr');


        $groupe->save();
        $group = $request->input('roles');

        $groupe->role()->attach($group);
        $perm = $request->input('permissions');
        $groupe->perm()->attach($perm);
        $user = $request->input('user');
        $groupe->users()->attach($user);

        DB::commit();

        return redirect('groupe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        $group = Groupe::findOrFail($id);
        $group->{$request->input('field')} = $request->input('value');
        if ($group->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
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
