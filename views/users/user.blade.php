
@extends('layouts.master')
@section('content')

<

    <!-- Page Content  -->
 <div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">User List</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                  <form class="mr-3 position-relative">
                                     <div class="form-group mb-0">
                                        <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                     </div>
                                  </form>
                               </div>
                            </div>
                                                       @auth

                            <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">
                                  <a class="iq-bg-primary" href="javascript:void();" >
                                     Print
                                   </a>
                                   @can('Create_user')
  <a class="btn btn-outline-success" href="{{ url('/user/create') }}">
      Ajouter Utilisateur
  </a>

@endcan


                                 </div>
                            </div>
                         </div>

                         <div class="btn-group" style="margin-top:50px;" >


@if(Auth::user()->type_utilisateur == -1)
<a href="{{ url('user/') }}" class="btn dark-icon" style="background-color:#03165B;color:#fff;" checked>tout</a>
<a href="{{ url('user/1/filtrer') }}" class="btn dark-icon " style="background-color:#03165B;color:#fff;">admin DR </a>
<a href="{{ url('user/0/filtrer') }}" class="btn dark-icon " style="background-color:#03165B;color:#fff;">Gestionnaire DR</a>
<a href="{{ url('user/2/filtrer') }}" class="btn dark-icon " style="background-color:#03165B;color:#fff;">Gestionnaire Antenne</a>
@elseif(Auth::user()->type_utilisateur == 0)
<a href="{{ url('user/0/filtrer') }}" class="btn dark-icon btn-primary" style="background-color:#03165B;color:#fff;">Gestionnaire DR</a>
<a href="{{ url('user/2/filtrer') }}" class="btn dark-icon btn-primary" style="background-color:#03165B;color:#fff;">Gestionnaire Antenne</a>
@endif
                 </div>
                         <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info" style="margin-top:50px;">
                           <thead>
                               <tr>

                                  <th>Name</th>
                                  <th>Contact</th>
                                  <th>Email</th>
                                  <th>Type Utilisateur</th>
                                  <th>Personnel</th>
                                  <th>Direction</th>
                                  <th>Status</th>
                                   <th>role</th>

                                  <th>date Inscription</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           @if(Auth::User()->type_utilisateur == -1 ||Auth::User()->type_utilisateur == 0 )
                            @foreach($datas['list'] as $data)
                               <tr>



                               <td>{{  $data ->name}}</td>
                               <td>{{  $data ->tel}}</td>
                               <td>{{  $data ->email}}</td>
                               <td>{{  $data ->type_utilisateur}}</td>
                                 <td>{{ $data ->Nom_Personnels }}</td>
                                <td>{{ $data ->Intitule_direction }}</td>

                               <td>{{  $data ->status}}</td>
                                <td>{{  $data ->role}}</td>
                               <td>{{  $data ->created_at}}</td>



                                 <td>

                              <div class="flex align-items-center list-user-action">
                             <a class="iq-bg-primary" href="{{url('/user/' .$data->id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="show" ><i class="ri-eye-line"></i></a>
                                  @can('modify_user')
                                      <a class="iq-bg-primary" href="{{url('/user/' .$data->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" ><i class="ri-pencil-line"></i></a>



                                      @endcan
                                      @can('delete_user')
                                      <form method="POST" action="{{ url('user/'. $data->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ method_field('DELETE') }}
                                              {{ csrf_field() }}
                                        <button class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line"></i></button>
                                          </form>
                                          @endcan
                                     </div>
                                  </td>
                               </tr>
                              @endforeach

                              @endif
                           </tbody>
                         </table>
                      </div>
                       @endauth
                         <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                               <span>Showing 1 to 5 of 5 entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                     </li>
                                  </ul>
                               </nav>
                            </div>
                         </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
 </div>


 <script>

document.getElementById("show-user").addEventListener("click", function() {
$('#detail-modal').modal('show');
});
</script>



 @endsection

