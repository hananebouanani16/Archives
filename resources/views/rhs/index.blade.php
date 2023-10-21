@extends('layouts.master')



@section('content')



<!--Modal add service !-->



<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">



  <div class="modal-dialog" role="document">



     <div class="modal-content">



        <div class="modal-header">



           <h5 class="modal-title" id="serviceModalLabel">Ajouter un service</h5>



           <button type="button" class="close" data-dismiss="modal" aria-label="Close">



           <span aria-hidden="true">&times;</span>



           </button>



        </div>



        <div class="modal-body">



<form  action=" {{ url('service') }}" method="post" id="wrapper3" >



                        @csrf







                      <div class="form-group">



                         <label for="intitule_service">Intitule Service:</label>







                         <input type="text" class="form-control"  name="intitule_service" required>



                      </div>



                      <div class="form-group">



                          <label for="note_service">Note Service:</label>







                          <input type="text" class="form-control"  name="note_service" required>



                       </div>



          <div class="modal-footer">



           <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>



      <button class="btn btn-primary" type="submit">Enregistrer</button>



        </div>



          </form>



        </div>







     </div>



  </div>



</div>



</div>







<!--pop up modify service!-->



<div class="modal fade" id="serviceModify" tabindex="-1" role="dialog" aria-labelledby="serviceModifyModalLabel" aria-hidden="true" data-backdrop="static">



  <div class="modal-dialog" role="document">



     <div class="modal-content">



        <div class="modal-header">



           <h5 class="modal-title" id="serviceModifyModalLabel">Modifier le service</h5>



           <button type="button" class="close" data-dismiss="modal" aria-label="Close">



           <span aria-hidden="true">&times;</span>



           </button>



        </div>



        <div class="modal-body">



<form action="{{ url('edit') }}" method="post" id="wrapper3" >



                        @csrf







                      <div class="form-group">



                         <label for="intitule_service">Intitule Service:</label>







                         <input type="text" class="form-control"  name="intitule_service"  required>



                      </div>



                      <div class="form-group">



                          <label for="note_service">Note Service:</label>







                          <input type="text" class="form-control"  name="note_service"  required>







                       </div>



          <div class="modal-footer">



           <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>



      <button class="btn btn-primary" type="submit">Modifier</button>



        </div>



          </form>



        </div>







     </div>



  </div>



</div>



</div>















<!-- Pop up add fonction!-->



<div class="modal fade" id="fonctionModal" tabindex="-1" role="dialog" aria-labelledby="fonctionModalLabel" aria-hidden="true">



  <div class="modal-dialog" role="document">



     <div class="modal-content">



        <div class="modal-header">



           <h5 class="modal-title" id="fonctionModalLabel">Ajouter une fonction</h5>



           <button type="button" class="close" data-dismiss="modal" aria-label="Close">



           <span aria-hidden="true">&times;</span>



           </button>



        </div>



        <div class="modal-body">



<form  action=" {{ url('fonction') }}" method="post" id="wrapper3" >



                        @csrf







                      <div class="form-group">



                         <label for="intitule">Intitule fonction:</label>







                         <input type="text" class="form-control"  name="intitule_fonction" required>



                      </div>



                      <div class="form-group">



                          <label for="intitule">memo fonction:</label>







                          <input type="text" class="form-control"  name="memo_fonction" required>



                       </div>



          <div class="modal-footer">



           <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>



      <button class="btn btn-primary" type="submit">Enregistrer</button>



        </div>



          </form>



        </div>







     </div>



  </div>



</div>



</div>



 <div id="content-page" class="content-page">



  <div class="container" margin-top="100">



            <div class="iq-card">



               <div class="iq-card-header d-flex justify-content-between">



               </div>



















  <div class="container-fluid">















      <div class="iq-card-body">



                         <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">



                            <li class="nav-item">



                               <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill" role="tab" aria-controls="pills-home" aria-selected="true">Contrats employé<s></s></a>



                            </li>







                            <li class="nav-item">



                               <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill" role="tab" aria-controls="pills-profile" aria-selected="false">Passation de consignes</a>



                            </li>



                            <li class="nav-item">



                               <a class="nav-link" id="pills-contact-tab-fill" data-toggle="pill" href="#pills-contact-fill" role="tab" aria-controls="pills-contact" aria-selected="false">Congés</a>



                            </li>



                         </ul>







                         <div class="tab-content" id="pills-tabContent-1">



                            <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">







                              <h4 class="card-title">Liste des contrats employés</h4>















<form class="pull-left">



  <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" onkeyup="rechercher()">



</form>







<script>



  function rechercher() {



      var query = document.getElementById('exampleInputSearch').value.toLowerCase();



      var table = document.getElementById('user-list-table');



      var rows = table.getElementsByTagName('tr');







      for (var i = 1; i < rows.length; i++) { // Commence à 1 pour exclure l'en-tête



          var cells = rows[i].getElementsByTagName('td');



          var found = false;







          for (var j = 0; j < cells.length; j++) {



              var cellText = cells[j].innerText.toLowerCase();

              if (cellText.includes(query)) {

                  found = true;

                  break;
 }

     }







          if (found) {



              rows[i].style.display = 'table-row';



          } else {



              rows[i].style.display = 'none';



          }



      }



  }



</script>







                                      <style>



                                          mark {



                                              background-color: yellow;



                                              font-weight: bold;



                                          }



                                      </style>











                                  </form>



                                      <span class="table-add float-right mb-3 mr-2">



                                      <div class="user-list-files d-flex float-right">







                                          <div class="d-flex justify-content-between align-items-center">



                                          <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>















                                              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>











                                          </div>







                                  </div>



                                  </span>



                                  <div style="display: block; overflow: auto ;width:100%;">



                                    <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                              <th>Titre</th>
                                                  <th> Date</th>
                                                  <th>Document</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>



                                    </table>
                                      </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">







                                 <h4 class="card-title">Liste des passations de consignes</h4>



                                 <form class="pull-left">



                                  <input type="search" class="form-control" id="consultantSearch" placeholder="Search" onkeyup="rechercher2()">



                              </form>







                              <script>



                                  function rechercher2() {



                                      var query = document.getElementById('consultantSearch').value.toLowerCase();



                                      var table = document.getElementById('user-list-table');



                                      var rows = table.getElementsByTagName('tr');







                                      for (var i = 1; i < rows.length; i++) { // Commence à 1 pour exclure l'en-tête



                                          var cells = rows[i].getElementsByTagName('td');



                                          var found = false;







                                          for (var j = 0; j < cells.length; j++) {



                                              var cellText = cells[j].innerText.toLowerCase();







                                              if (cellText.includes(query)) {



                                                  found = true;



                                                  break;



                                              }



                                          }







                                          if (found) {



                                              rows[i].style.display = 'table-row';



                                          } else {



                                              rows[i].style.display = 'none';



                                          }



                                      }



                                  }



                              </script>







                                                                      <style>



                                                                          mark {



                                                                              background-color: yellow;



                                                                              font-weight: bold;



                                                                          }



                                                                      </style>



                                      <span class="table-add float-right mb-3 mr-2">



                                      <div class="user-list-files d-flex float-right">







                                      <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>







                                  </div>



                                  </span>



                                   <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">



                                       <thead>



                                           <tr>



                                              <th>Date</th>



                                              <th>Document</th>



                                              <th>Actions</th>







                                           </tr>



                                       </thead>



                                        <tbody>







                                        </tbody>



                                        </table>



                                  </div>







                                   <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel" aria-labelledby="pills-contact-tab-fill">







                                    <div class="row gutters-sm">



      <div class="col-md-4 d-none d-md-block">



        <div class="card">



          <div class="card-body">



            <nav class="nav flex-column nav-pills nav-gap-y-1">



              <a href="#lieux" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">



                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign mr-2">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M19 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2"></path>
                  </svg>
                  Congé sans solde
              </a>

              <a href="#nature_t" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">



                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart mr-2">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>Maternité


              </a>



              <a href="#annuel" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded ">



                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>Congé annuel



            </a>



            <a href="#nature" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">



                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-md mr-2">
                    <path d="M16 13.5a4 4 0 0 0-8 0m-5 4a4 4 0 0 1 7-2.5"/>
                    <circle cx="8" cy="7" r="4"/>
                    <line x1="20" y1="8" x2="20" y2="14"/>
                    <line x1="23" y1="11" x2="17" y2="11"/>
                </svg>
                Maladie



            </a>



            <a href="#familial" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">


                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                  </svg>
                Evènements familials



            </a>



            </nav>



          </div>



        </div>



      </div>



      <div class="col-md-8">



        <div class="card">
          <div class="card-header border-bottom mb-3 d-flex d-md-none">
            <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
              <li class="nav-item">
                <a href="#lieux" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
              </li>-
              <li class="nav-item">
                <a href="#nature_t" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
              </li>
              <li class="nav-item">
                <a href="#annuel" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
              </li>-
              <li class="nav-item">
                <a href="#nature" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
              </li>
              <li class="nav-item">
                <a href="#lieux" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
              </li>
              <li class="nav-item">
                <a href="#events" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
              </li>
            </ul>
          </div>
          <div class="card-body tab-content">
            <div class="tab-pane active" id="lieux">
            <div class="iq-card-body">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2">
                    <div class="user-list-files d-flex float-right">
                    <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>
                    </div>
                    </span>
                        <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                  <th>Titre</th>
                                      <th> Date</th>
                                      <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($documents as $document)
                              @if($document->type === 'congé sans sold')
                                  <tr>
                                      <td>{{ $document->title}}</td>
                                      <td>{{ $document->creation_date}}</td>
                                      <td>
                                          <!-- Créez un lien cliquable vers le document PDF -->
                                          <a href="{{ asset($document->file_path) }}" target="_blank">Voir le document</a>
                                      </td>
                                          <!-- Ajoutez ici des actions liées au document de type "Maternité" -->
                                      </td>
                                  </tr>
                              @endif
                          @endforeach

                            </tbody>



                        </table>



                       </div>



                   </div>
            </div>
            <div class="tab-pane" id="nature_t">
              <div class="iq-card-body">
                <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2">
                              <div class="user-list-files d-flex float-right">
                                <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>
                            </div>
                          </span>
                         <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                          <thead>
                              <tr>
                                <th>Titre</th>
                                    <th> Date</th>
                                    <th>Document</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($documents as $document)
                            @if($document->type === 'Maternité')
                                <tr>
                                    <td>{{ $document->title}}</td>
                                    <td>{{ $document->creation_date}}</td>
                                    <td>
                                        <!-- Créez un lien cliquable vers le document PDF -->
                                        <a href="{{ asset($document->file_path) }}" target="_blank">Voir le document</a>
                                    </td>
                                        <!-- Ajoutez ici des actions liées au document de type "Maternité" -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                          </tbody>
                      </table>
                       </div>
                   </div>
            </div>
            <div class="tab-pane" id="annuel">
                <div class="iq-card-body">
                  <div id="table" class="table-editable">
                  <span class="table-add float-right mb-3 mr-2">
                                <div class="user-list-files d-flex float-right">
                                  <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>
                              </div>
                            </span>
                           <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                  <th>Titre</th>
                                      <th> Date</th>
                                      <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($documents as $document)
                              @if($document->type === 'congé annuel')
                                  <tr>
                                      <td>{{ $document->title}}</td>
                                      <td>{{ $document->creation_date}}</td>
                                      <td>
                                          <!-- Créez un lien cliquable vers le document PDF -->
                                          <a href="{{ asset($document->file_path) }}" target="_blank">Voir le document</a>
                                      </td>
                                          <!-- Ajoutez ici des actions liées au document de type "Maternité" -->
                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                            </tbody>
                        </table>
                         </div>
                     </div>
              </div>
              <div class="tab-pane" id="nature">
                <div class="iq-card-body">
                  <div id="table" class="table-editable">
                  <span class="table-add float-right mb-3 mr-2">
                                <div class="user-list-files d-flex float-right">
                                  <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>
                              </div>
                            </span>
                           <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                  <th>Titre</th>
                                      <th> Date</th>
                                      <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($documents as $document)
                              @if($document->type === 'Maladi')
                                  <tr>
                                      <td>{{ $document->title}}</td>
                                      <td>{{ $document->creation_date}}</td>
                                      <td>
                                          <!-- Créez un lien cliquable vers le document PDF -->
                                          <a href="{{ asset($document->file_path) }}" target="_blank">Voir le document</a>
                                      </td>
                                          <!-- Ajoutez ici des actions liées au document de type "Maternité" -->
                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                            </tbody>
                        </table>
                         </div>
                     </div>
              </div>

              <div class="tab-pane" id="familial">
    <div class="iq-card-body">
        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2">
                <div class="user-list-files d-flex float-right">
                    <a class="btn btn-outline-success" href="{{ route('scan.page') }}">Scanner un fichier</a>
                    <button class="btn btn-secondary dropdown-toggle ml-2" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filterDropdown">
                        <a class="dropdown-item"  onclick="filterTable('mariage')">Mariage</a>
                        <a class="dropdown-item"  onclick="filterTable('paternité')">Paternité</a>
                        <a class="dropdown-item"  onclick="filterTable('décét')">Décés</a>
                    </div>
                </div>
            </span>
            <table id="fonctions-table" class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="document-table-body">
    @include('rhs.table_rows', ['documents' => $documents])
</tbody>
            </table>
        </div>
    </div>
</div>















          </div>



        </div>



      </div>



    </div>







  </div>







                         </div></div>                     </div>



                         </div>



                      </div>



                      </div>



</div>



</div>
<script>
function filterTable(filterValue) {
    $.ajax({
        url: '{{ route('rhs.index') }}',
        type: 'GET',
        data: {filter: filterValue},
        success: function(data) {
            $('#fonctions-table tbody').html(data);
        },
        error: function(error) {
            alert('An error occurred. Please try again.');
            console.log(error); // This will log any errors in the console.
        }
    });
}


</script>








@endsection

