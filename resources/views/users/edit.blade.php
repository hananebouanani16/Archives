
@extends('layouts.master')
  @section('content')
  <div id="content-page" class="content-page">
    <div class="container" margin-top="200">

      <div class="col-sm-12 col-lg-6">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Ajouter utilisateur</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">

                           <form  action=" {{ url('user') }}" method="post" id="wrapper3" >
                              @csrf
                              <div class="form-row">
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$user['u']->name}}" required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">email</label>
                                    <input type="email" class="form-control" id="validationCustom02" name="email"   value="{{$user['u']->email}}" required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">role</label>
                                    <select class="form-control" id="validationCustom04" name="role"   required>
                                       <option selected  value="{{$user['u']->role}}">{{$user['u']->role}}</option>

                                       @foreach($user['all'] as $data)
                                       <option id="{{$data->role}}">  {{$data->role}}</option>
                                       @endforeach

                                    </select>
                                    <div class="invalid-feedback">
                                       Please select a valid state.
                                    </div>
                                 </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">téléphone</label>
                                    <input type="tel" class="form-control" id="validationCustom03" name="tel" value="{{$user['u']->tel}}" required>
                                    <div class="invalid-feedback">
                                       Please provide a valid city.
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Type</label>
                                    <select class="form-control" id="validationCustom04" name="type" required>
                                       <option selected disabled value="{{$user['u']->name}}">{{$user['u']->name}}</option>
                                       <option value="-1">ADMIN DG</option>
                                       <option value="1">ADMIN DR</option>
                                        <option value="0">GESTIONNAIRE</option>
                                    </select>
                                    <div class="invalid-feedback">
                                       Please select a valid state.
                                    </div>
                                 </div>

                              <div class="form-group">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                       You must agree before submitting.
                                    </div>
                                 </div>
                              </div>
                              <button class="btn btn-primary" type="submit">Update</button>
                           </form>
                        </div>
                     </div>
                     </div></div>
       <script src="js/jquery.min.js"></script>

      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
 @endsection
