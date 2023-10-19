<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Objet;
use App\Models\Module_objet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //$roles = Module::all();
        $subquery = DB::table('users_modules')
            ->select(DB::raw('MIN(module_id) as module_id'))
            ->groupBy('module_id');




        $roles = DB::table('modules')
            ->leftJoin('users_modules', 'modules.id', '=', 'users_modules.module_id')
            ->leftJoin('users', 'users_modules.user_id', '=', 'users.id')
            ->select('modules.nom_module', 'modules.id', DB::raw('COUNT(users.id) as user_count'))
            ->groupBy('modules.id', 'modules.nom_module')
            ->whereNull('modules.deleted_at')
            ->get();







        $rolesChunks = $roles->chunk(3);
        $permissions['o'] = Objet::all();
        $permissions['m'] = Objet::all();
        $perso = Auth::user()->idperso;
        $dat = DB::table('users')
            ->join('personnels', 'personnels.IDPersonnels', '=', 'users.idperso')
            ->join('directions', 'directions.ID_DR5', '=', 'personnels.id_direction')
            ->where('users.idperso', '=', $perso)
            ->select('directions.ID_DR5')
            ->first();
        $permissions['p'] = DB::table('users')
            ->join('personnels', 'personnels.IDPersonnels', '=', 'users.idperso')
            ->join('directions', 'directions.ID_DR5', 'personnels.id_direction')
            ->select('*')
            ->where('personnels.id_direction', '=', $dat->ID_DR5)
            ->Orwhere('directions.num_parent', '=', $dat->ID_DR5)

            ->get();
        foreach ($permissions['m']  as $permission) {
            // récupère les modules qui ont l'objet avec NUM_OBJECT correspondant à la permission
            $modules = DB::table('module_objets')
                ->join('objets', 'objets.id', '=', 'module_objets.objet_id')
                ->join('modules', 'modules.id', '=', 'module_objets.module_id')
                ->whereNull('modules.deleted_at')
                ->select('modules.nom_module', 'objets.id')
                ->where('objets.id', '=', $permission->id)
                ->get();
            $permission->modules = $modules;
            // fait quelque chose avec les modules récupérés
            // ...
        }




        return view('ROLE', ['roles' => $roles, 'permissions' => $permissions]);
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
        $role = new Module();
        $role->nom_module = $request->input('rolee');

        $role->intitule_objet = $request->input('rolee');


        $role->save();

        $permissions = $request->input('permissions');
        $role->permissions()->attach($permissions);


        DB::commit();
        return redirect('rolee');
    }
    public function getUsersForRole(Request $request)
    {
        $permissions['o'] = Objet::all();
        $permissions['m'] = Objet::all();
        $perso = Auth::user()->idperso;

        $permissions['p'] = DB::table('users')
            ->join('personnels', 'personnels.IDPersonnels', '=', 'users.idperso')
            ->select('*')
            ->where('users.idperso', '=', $perso)
            ->get();
        foreach ($permissions['m']  as $permission) {
            // récupère les modules qui ont l'objet avec NUM_OBJECT correspondant à la permission
            $modules = DB::table('module_objets')
                ->join('objets', 'objets.id', '=', 'module_objets.objet_id')
                ->join('modules', 'modules.id', '=', 'module_objets.module_id')
                ->select('modules.nom_module', 'objets.id')
                ->where('objets.id', '=', $permission->id)
                ->get();
            $permission->modules = $modules;
            // fait quelque chose avec les modules récupérés
            // ...
        }
        $roles = Module::all();
        $roleId = $request->input('role_id');

        $users = DB::table('users_modules')
            ->join('users', 'users.id', '=', 'users_modules.user_id')
            ->select('*')
            ->where('users_modules.module_id', '=', $roleId)
            ->get();
        // console.log($roles);
        return view('ROLE', ['users' => $users, 'roles' => $roles, 'permissions' => $permissions]);
    }
    public function add(Request $request)
    {

        $perm = new Objet();
        $perm->intitule_object = $request->input('intitule');
        $perm->save();
        return redirect('rolee');
    }
    public function adduser(Request $request, $id)
    {
        $users = $request->input('multiple_selection_users');
        //dd($users);
        //dd($request->all());
        if ($users !== null) {
            // dd("hhhhhhhhh");
            foreach ($users as $use) {

                /*$module = DB::table('modules')
        ->select('num_module')
        ->where('modules.num_module', '=', $id)
        ->first();
        dd($module);*/
                if ($id) {
                    DB::table('users_modules')->insert([
                        'user_id' => $use,
                        'module_id' => $id
                    ]);
                }
            }
        }
        return redirect('rolee');
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
    public function destroy($num_module)
    {
        $module = Module::where('id', '=', $num_module)->first();

        if ($module) {
            $module->delete();
        }
        return redirect('rolee');
    }
}
