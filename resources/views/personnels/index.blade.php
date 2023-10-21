@extends('layouts.master')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Liste des directions</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                <form class="pull-left">
                                    <input type="search" class="form-control" id="directionSearch" placeholder="Search" onkeyup="rechercher3()">
                                </form>

                                <script>
                                    function rechercher3() {
                                        var query = document.getElementById('directionSearch').value.toLowerCase();
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
                                  <br>
                               </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">

                                  <a class="btn btn-outline-success" href="{{ url('directionsadd') }}">
                                     Nouvelle direction
                                   </a>

                                 </div>
                            </div>
                         </div>


                         <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                        <th>Nom</th>
                       <th>Prénom</th>
                       <th>Ville</th>
                       <th>Téléphone</th>
                       <th>Date_Recru</th>


                       <th>Actions</th>

                      </tr>
                  </thead>
                  <tbody>
                    @foreach($personnels as $personnel)
                <tr>
                    <td>{{ $personnel->nom}}</td>
                    <td>{{ $personnel->prenom }}</td>
                    <td>{{ $personnel->ville }}</td>
                    <td>{{ $personnel->telephone1 }}</td>
                    <td>{{ $personnel->date_recrutement}}</td>
                    <td>
                        <div class="flex align-items-center list-user-action">
                            <button class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Voir les détails" onclick="window.location.href='{{ route('personnels.show', $personnel->id) }}'"><i class="ri-eye-line"></i></button>


                            </form>                                            </div>
                    </td>
                </tr>
            @endforeach

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
@endsection

