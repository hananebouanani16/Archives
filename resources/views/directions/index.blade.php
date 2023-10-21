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
                                <form action="{{ route('directions.restoreAll') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir restaurer tous les directions ?');">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ml-2">Restaurer tout</button>
                                </form>
                                  <a class="btn btn-outline-success" href="{{ route('directions.create') }}">
                                     Nouvelle direction
                                   </a>

                                 </div>
                            </div>
                         </div>
                         <div class="btn-group">
                            <a href="{{ url('/directions?type_direction=') }}" class="btn dark-icon btn-primary">Tous</a>
                            <a href="{{ url('/directions?type_direction=DG&num_parent=0') }}" class="btn dark-icon btn-primary {{ request('type_direction') == 'DG' ? 'active' : '' }}">DG</a>
                            <a href="{{ url('/directions?type_direction=DR&num_parent_=1') }}" class="btn dark-icon btn-primary {{ request('type_direction') == 'DR' ? 'active' : '' }}">DR</a>
                            <a href="{{ url('/directions?type_direction=Antenne') }}" class="btn dark-icon btn-primary {{ request('type_direction') == 'Antenne' ? 'active' : '' }}">Antenne</a>
                        </div>

                         <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                        <th>Parent</th>
                       <th>Code</th>
                       <th>Intitulé</th>
                       <th>Adresse</th>
                       <th>Tel1 </th>


                       <th>Actions</th>

                      </tr>
                  </thead>
                  <tbody>
                   @foreach($directions as $direction)
                      <tr>
                        <td >{{ $direction->nom_parent}}</td>
                       <td >{{ $direction->code_direction }}</td>
                       <td >{{ $direction->intitule_direction}}</td>
                       <td >{{ $direction->adresse_direction }}</td>
                       <td >{{ $direction->tel1_direction }}</td>



                       <td>
                        <div class="flex align-items-center list-user-action">
                            <button class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Voir les détails"onclick="window.location.href='{{ route('directions.show', $direction->ID_DR5) }}'"
><i class="ri-eye-line"></i></button>

                            <button class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='{{ route('directions.edit', $direction->ID_DR5) }}'"
><i class="ri-pencil-line"></i></button>
<form action="{{ route('directions.destroy', $direction->ID_DR5) }}" method="POST"
 style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette direction ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ri-delete-bin-line"></i></button>
                            </form>                                            </div>
                    </td>
                        </div>
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

