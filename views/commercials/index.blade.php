@extends('layouts.master')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Liste des contrats client</h4>
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
                                     scanner contrat client
                                   </a>

                                 </div>
                            </div>
                         </div>
                         <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                        <th>Date</th>
                        <th>Contrat client</th>
                       <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>





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

