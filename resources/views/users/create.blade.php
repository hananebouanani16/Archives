
@extends('layouts.master')
  @section('content')
<style>
   .iq-card {
      background-color: #f7f7f7;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   .iq-card-header {
      padding: 10px;
      border-radius: 5px 5px 0 0;
   }

   .card-title {
      color: #03165B;
      font-size: 20px;
      margin-bottom: 0;
   }

   .iq-card-body {
      margin-top: 20px;
   }

   .form-control {
      background-color: #fff; /* Fond blanc */
      border: none;
      border-radius: 0;
      box-shadow: none;
      color: #03165B;
   }

   .form-control:focus {
      background-color: #ffffff; /* Fond blanc */
      box-shadow: none;
      outline: none;
   }

   select.form-control {
      height: auto;
   }

   .valid-feedback,
   .invalid-feedback {
      display: none;
      color: #dc3545;
   }

   .form-check-label {
      color: #03165B;
      margin-left: 5px;
   }

   .btn-primary {
      background-color: #03165B;
      border: none;
   }

   .btn-primary:hover {
      background-color: #021148;
   }
</style>



  <div id="content-page" class="content-page" >
    <div class="container"  style="width:1500px;background-color:#f7f7f7;">
    @php
      $perso=Auth::user();
    @endphp
      <div class="col-sm-12 col-lg-6">
                     <div class="iq-card" style="width:1000px;margin-left:200px;">
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
                                    <label for="validationCustom01">Nom Utilisateur</label>
                                    <input type="text" class="form-control" style="background-color:#fff;" id="validationCustom01" name="name" required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <input type="email" class="form-control" style="background-color:#fff;"   id="validationCustom02" name="email"    required>
                                    <div class="valid-feedback">
                                       Looks good!
                                    </div>
                                 </div>


                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Téléphone</label>
                                    <input type="tel" class="form-control" style="background-color:#fff;" id="validationCustom03" name="tel" required>
                                    <div class="invalid-feedback">
                                       Please provide a valid city.
                                    </div>
                                 </div>
                                @php
    $users_perso = DB::table('users')
        ->select('users.idperso')
        ->get();
@endphp

<div class="col-md-6 mb-3">
    <label for="validationCustom22">Personnel</label>
    <select class="form-control" id="validationCustom22" name="perso" required>
        <option selected disabled value="">Sélectionnez..</option>
        @foreach($elem['perso'] as $perm)
            @php
                $isIncluded = $users_perso->contains('idperso', $perm->IDPersonnels);
            @endphp
            <option value="{{$perm->IDPersonnels}}" data-id_dr5="{{$perm->ID_DR5}}" data-id_num="{{$perm->num_parent}}"
                @if($isIncluded) disabled @endif>
                {{ $perm->Nom_Personnels }} {{ $perm->Prenom_Personnels }}
            </option>
        @endforeach
    </select>
    @if($isIncluded)
        <div class="invalid-feedback">Ce personnel a déjà un compte utilisateur.</div>
    @endif
</div>

                                 <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Type</label>
                                    <select class="form-control" id="validationCustom04" name="type" required>
                                       <option selected disabled value="">Select..</option>
                                       <option value="-1">ADMIN DG</option>
                                       <option value="0">ADMIN DR</option>
                                        <option value="1">GESTIONNAIRE DR</option>

                                        <option value="2">GESTIONNAIRE ANTENNE</option>
                                    </select>
                                    <div class="invalid-feedback">
                                       Please select a valid state.
                                    </div>
                                 </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="validationCustom90">Roles</label>
                                    <select multiple class="form-control" id="validationCustom90f" name="roles[]" >
                                          @foreach($elem['role'] as $role)
                                          <option value="{{$role->id }}">{{ $role->nom_module }}</option>
                                          @endforeach
                                       </select>
                                    <div class="invalid-feedback">
                                       Please select a valid state.
                                    </div>
                                 </div>






                                                                     <div class="col-md-12 mb-3">
                                       <label for="validationCustom06">Groupes</label>
                                       <select multiple class="form-control" id="validationCustom06" name="groupes[]" >
                                          @foreach($elem['groupe'] as $groupe)
                                          <option value="{{ $groupe->id_groupe }}">{{ $groupe->intitule_groupe }}</option>
                                          @endforeach
                                       </select>
                                       <div class="invalid-feedback">
                                          Please select at least one group.
                                       </div>
                                    </div>
                                                     <div class="col-md-12 mb-3">
                                       <label for="validationCustom80">Permissions</label>
                                       <select multiple class="form-control" id="validationCustom80" name="perm[]" >
                                          @foreach($elem['perm'] as $perm)
                                          <option value="{{ $perm->id }}">{{ $perm->intitule_object }}</option>
                                          @endforeach
                                       </select>
                                       <div class="invalid-feedback">
                                          Please select at least one group.
                                       </div>
                                    </div>





                              </div>
                              <div class="form-group">
   <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
         J'accepte les termes et conditions
      </label>
      <div class="invalid-feedback">
         Vous devez accepter avant de soumettre.
      </div>
   </div>
</div>
<button class="btn btn-primary" type="submit" style="background-color:#03165B">Envoyer le formulaire</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Votre code JavaScript utilisant $
    $('#validationCustom22').change(function() {
        var selectedOption = $(this).find(':selected');
        var id_dr5 = selectedOption.data('id_dr5');
        var numparent = selectedOption.data('id_num');
        console.log(id_dr5); // Affiche la valeur de ID_DR5 sélectionnée
        console.log("num parent",numparent); // Affiche la valeur de ID_DR5 sélectionnée
        if (id_dr5 === 1) {
                    $('#validationCustom04').find('option').remove();
                        $('#validationCustom04').append('<option value="-1">ADMIN DG</option>');


                                console.log("true2"); // Affiche la valeur de ID_DR5 sélectionnée

        } else if (numparent == 1) {
    console.log("true"); // Affiche la valeur de ID_DR5 sélectionnée

    $('#validationCustom04').prop('disabled', false);

    // Supprimer les options existantes
    $('#validationCustom04').find('option').remove();

    // Ajouter les nouvelles options
    $('#validationCustom04').append('<option selected disabled value="">Select..</option>');
    $('#validationCustom04').append('<option value="0">ADMIN DR</option>');
    $('#validationCustom04').append('<option value="1">GESTIONNAIRE DR</option>');
}
else
{
        $('#validationCustom04').find('option').remove();


    $('#validationCustom04').append('<option value="2">GESTIONNAIRE ANTENNE</option>');


}


    });
</script>


 @endsection
