
@extends('layouts.master')

@section('content')


   <div id="content-page" class="content-page" >
<div class="container" >


 <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-informations-generales-tab" data-toggle="tab" href="#nav-informations-generales" role="tab" aria-controls="nav-informations-generales" aria-selected="true">Informations Générales</a>
      <a class="nav-item nav-link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="false">Détails</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-informations-generales" role="tabpanel" aria-labelledby="nav-informations-generales-tab">
      <div class="row">
        <div class="col-md-4"><strong>ID utilisateur :</strong> {{$users['info']->id}}</div>
        <div class="col-md-4"><strong>Nom utilisateur :</strong> {{$users['info']->name}}</div>
        <div class="col-md-4"><strong>Date D'inscriptions' :</strong> {{$users['info']->created_at}}</div>
      </div>
      <hr>
            <div class="row">

                    <div class="col-md-4"><strong>Type utilisateur :</strong> {{$users['info']->type_utilisateur}} </div>

                    <div class="col-md-4"><strong>direction :</strong> {{$users['dir']->Intitule_direction}} </div>
                    <div class="col-md-4"><strong>Personnel :</strong> {{$users['dir']->Nom_Personnels}} </div>




            </div>
            <hr>
            <div class="row">

                    <div class="col-md-4"><strong>Email :</strong> {{$users['info']->email}} </div>

                    <div class="col-md-4"><strong>Téléphone :</strong> {{$users['info']->tel}} </div>




            </div>



      </div>
    <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
      <h3>Détails</h3>
               <div class="row">

                     <div class="col-md-8"><strong>Groupes users :</strong> {{$users['info']->email}} </div>

                  </div>
                  <hr>
                   <div class="row">

                     <div class="col-md-2"><strong>Roles : </div>

                     <div class="role-tags">
            @foreach($users['role'] as $role)
              <span class="tag tag-primary">{{$role->nom_module}}</span>
            @endforeach
          </div>

                    </div>
                    <hr>
             <div class="row">
                                  <div class="col-md-2"><strong>Permissions : </div>


<div class="role-tags">
            @foreach($users['perm'] as $perm)
              <span class="tag tag-primary">{{$perm->intitule_object}}</span>
            @endforeach
          </div>
                </div>






                  </div>
  </div>
        </div>
        </div>
        @endsection
        <style type="text/css">
		body {
			font-family: Arial, sans-serif;
			background-color: #F2F2F2;
			margin: 0;
		}
        .container{
			max-width: 600px;
            margin-left:100px;
			padding: 20px;
			background-color: #FFFFFF;
			box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
			border-radius: 10px;
		}

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

        </style>
