@extends('layouts.master')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Bienvenue dans votre profile</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <div class="table-responsive">
                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                  <form class="mr-3 position-relative">
                                  </form>
                               </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">
                                  <a class="btn btn-outline-success" href="{{ url('directionsadd') }}">
                                     Modifier vos informations
                                   </a>
                                   <div class="card-body">
                                    <img src="" alt="Profile Image" class="img-fluid">
                                    <h4></h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Update Profile</h5>
                                </div>
                                <div class="card-body">
                                    <p>Here you can update your profile information:</p>
                                    <ul>
                                        <li><strong>Name:</strong> </li>
                                        <li><strong>Email:</strong>$</li>
                                        <li><strong>Profile Image:</strong> <img src="" alt="Profile Image" class="img-fluid"></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                 </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
</div>

@endsection

