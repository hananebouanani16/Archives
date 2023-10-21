
@extends('layouts.master')
  @section('content')
      <!--popup-->
      <?php


       $elem['role']=DB::table('modules')
       ->select('*')->get();



       $elem['perm']=DB::table('objets')
       ->select('*')->get();
       //select users
          $datas['admin']=Auth::user()->type_utilisateur;
       $datas['c']=DB::table('users')
      ->join('personnels','personnels.IDPersonnels','=','users.idperso')
      ->join('directions','directions.ID_DR5','=','personnels.id_direction')
      ->select('personnels.Nom_Personnels','users.id','users.name','users.tel','users.type_utilisateur','users.role','users.created_at','users.email','users.status','directions.Intitule_direction','directions.ID_DR5')

       ->get();
       $elem['user']=NULL;
    if( $datas['admin']=='-1')
     {
         $elem['user']=$datas['c'];
     }
      else if($datas['admin']=='0')
	{

    $perso=Auth::user()->idperso;
    $dat=DB::table('users')
    ->join('personnels','personnels.IDPersonnels','=','users.idperso')
     ->join('directions','directions.ID_DR5','=','personnels.id_direction')
     ->where('users.idperso','=',$perso)
     ->select('directions.ID_DR5')
     ->first();
      $elem['user']=DB::table('users')
     ->join('personnels','personnels.IDPersonnels','=','users.idperso')
     ->join('directions','directions.ID_DR5','=','personnels.id_direction')
     ->select('users.id','users.name','users.tel','users.type_utilisateur','users.role','users.created_at','users.email','users.status','directions.num_parent','directions.Intitule_direction','personnels.Nom_Personnels','directions.ID_DR5')
     ->where('directions.num_parent','=',$dat->ID_DR5)
     ->orWhere('personnels.id_direction', '=', $dat->ID_DR5)

     ->get();
     }


      ?>
      <!--contenu-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
                              <div class="modal-dialog" role="document" >
                                 <div class="modal-content" style="width:1000px; margin-left:-400px;">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Ajouter un groupe d'utilisateur</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                           <form  action=" {{ url('groupe') }}" method="post" id="wrapper3" >
                                                    @csrf
                                                  <div class="form-group">
                                                <div class="row" style="width:1000px;">
                                                 <div class="col-md-4 mb-2">

                                                     <label for="intitule">Intitule Groupe:</label>

                                                     <input type="text" class="form-control"  name="intitule" required>
                                                  </div>
                                                  <div class="col-md-4 mb-2">

                                                     <label for="intitule">Type direction :</label>

                                                    <select class="form-control" id="validationCustom04" name="type_dr" required>
                                                       <option selected disabled value="">Select..</option>

                                                        @foreach($elem['user'] as $dir)

                                                       <option value="{{$dir->ID_DR5}}">{{ $dir->Intitule_direction }}</option>
                                                       @endforeach

                                                    </select>
                                                    <div class="invalid-feedback">
                                                       Please select a valid state.
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 mb-2">
                                    <label for="validationCustom04">roles</label>
                                    <select multiple class="form-control" id="validationCustom06" name="roles[]" >
                                          @foreach($elem['role'] as $role)
                                          <option value="{{ $role->id }}">{{ $role->id }}</option>
                                          @endforeach
                                       </select>
                                    <div class="invalid-feedback">
                                       Please select a valid state.
                                    </div>
                                 </div>
                                 </div>
                                 </div>
                                  <div class="form-group">
                                  <label>Permissions</label>
                                  <div class="row">
                                    @foreach($elem['perm'] as $permission)
                                      <div class="col-md-6">
                                        <div class="custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" id="{{ $permission->id }}" name="permissions[]" value="{{$permission->id}}">
                                          <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->intitule_object }}</label>
                                        </div>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>

                                <hr>
                               <div class="container" style="width:850px;height:200px;">
    <div class="col-md-4 mb-2">
        <label for="validationCustom04">roles</label>
        <div class="input-group">
            <select multiple class="form-control" id="validationCustom70" name="user[]">
                @foreach($elem['user'] as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
       <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="add-users-btn">&#8250;</button>
</div>







        </div>
        <div class="invalid-feedback">
            Please select a valid state.
        </div>
    </div>

    <div class="col-md-4 mb-2">
        <table class="table">
            <thead>
                <tr>
                    <th>users</th>
                </tr>
            </thead>
            <tbody id="users-table">
                <!-- Add selected users here -->
            </tbody>
        </table>
    </div>
</div>








                                      <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button class="btn btn-primary" type="submit">save changes</button>
                                    </div>
                                      </form>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>
                        </div>
  <div id="content-page" class="content-page">


<div class="container2" style="width:4000px;" >

  <div class="left">
  <span class="table-add d-inline-block align-middle mb-3 mr-2 mx-auto text-center" style="max-width:50%; margin-top: 20px;">


                            <div class="user-list-files d-flex">
                             <!--button pour le popup-->
                            <a class="btn btn-outline-success" href="#" data-toggle="modal" data-target="#exampleModal">Nouveau Groupe</a>
                                <a class="iq-bg-primary" href="javascript:void(0);">Imprimer</a>
                            </div>
                        </span>
                        <table class="table small-table table-bordered table-responsive-md table-striped text-center mx-auto" style="max-width:100%;">
                            <thead>
                                <tr>
                                    <th>Intitulé</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr data-id="{{ $group->id_groupe }}">
                                        <td>{{ $group->intitule_groupe }}</td>
                                        <td>
                                        <div class="flex align-items-center list-user-action">

                                     <a class="iq-bg-primary" href="{{ route('groups.show', $group->id_groupe) }}"  data-toggle="tooltip" data-placement="top" title="" data-original-title="show" ><i class="ri-eye-line"></i></a>


                                     <a class="iq-bg-primary" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line"></i></a>
                                     <button class="edit-btn">Modifier</button>

                                     <button class="save-btn" style="display:none">Sauvegarder</button>

                                        <form method="POST" action="#" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                          <button class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line"></i></button>
                                            </form>
                                       </div>
                                                   </td
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>






  </div>
  <div class="right">
    <!-- Contenu de la partie droite -->
     @if (isset($groupes))
    <div class="row" style="margin-left:200px;">
  <div class="card-header">
    <h4>{{ $groupes['elem']->intitule_groupe }}</h4>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#informations" role="tab">Informations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#roles_permissions" role="tab">Roles &amp; Permissions</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="informations" role="tabpanel">


<div class="row" style="margin-left:20px;">
  <div class="col-sm"><b>Id:</b>{{ $groupes['elem']->id_groupe }}</div>
  <div class="col-sm"><b>Nombre d'utilisateurs:</b>{{ $groupes['nbr'] }}</div>
</div>
<hr id="ri">
<div class="row" style="margin-left:20px;">
  <div class="col-sm"><b>Utilisateurs de ce groupe :</b></div>
  <div class="col-sm"><input type="search" name="_methode" placeholder="book,id..."></div>
</div>
          <div class="card-body px-0 pb-2" style="margin-left:20px;">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"><b>Id</b></th>
                    <th scope="col"><b>Utilisateur</b></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($groupes['user'] as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

        </div>
      </div>

      <div class="tab-pane" id="roles_permissions" role="tabpanel">
             <div class="container">

  <table class="table">
    <thead>
      <tr>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="role-tags">
            @foreach($groupes['role'] as $groupe)
              <span class="tag tag-primary">{{$groupe->nom_module}}</span>
            @endforeach
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table">
    <thead>
      <tr>
        <th>Permissions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="role-tags">
            @foreach($groupes['perm'] as $groupe)
              <span class="tag tag-primary">{{$groupe->intitule_object}}</span>
            @endforeach
          </div>
        </td>
      </tr>
    </tbody>
  </table>





  </div>


</div>



      </div>
    </div>
  </div>
</div>

</div>

@endif


  <div class="barriere"></div>
</div>
</div>
@endsection

 <style type="text/css">
 .tag {
  display: inline-block;
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  font-weight: 600;
  line-height: 1.5;
  border-radius: 0.25rem;
  text-transform: uppercase;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.tag-primary {
  background-color: #007bff;
  color: #fff;
}

.tag-success {
  background-color: #28a745;
  color: #fff;
}

.tag-warning {
  background-color: #ffc107;
  color: #212529;
}

.tag-danger {
  background-color: #dc3545;
  color: #fff;
}

.tag:hover {
  background-color: #fff;
  color: #212529;
}


 .container2 {
			max-width: 1300px;
            margin-right:50px;
            margin-top:100px;

            margin-left:50px;
			padding: 20px;
			background-color: #FFFFFF;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
			border-radius: 10px;
              height: 800px;
                overflow: hidden;
                               display: flex;



		}
.container {
               display: flex;
  height: 700px;
  overflow: hidden;
  width:2500px;
			max-width: 3000px;
			margin: 10px auto;
			padding: 20px;
			background-color: #FFFFFF;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
			border-radius: 10px;
            overflow: hidden;
		}

.left {
  flex: 1;
  overflow-y: scroll;
}

.right {
  flex: 1;
  overflow-y: scroll;
}

.barriere {
  width: 10px;
  background-color: #ccc;
  cursor: col-resize;
}
</style>
<script>




   $(document).ready(function() {
    $('#add-users-btn').click(function() {
        var selectedUsers = $('#validationCustom70').val();
        var tableBody = $('#users-table tbody');
        tableBody.empty();
        selectedUsers.forEach(function(userId) {
            var userName = $('#validationCustom70 option[value="' + userId + '"]').text();
            tableBody.append('<tr><td>' + userName + '</td></tr>');
        });
    });
});

</script>


