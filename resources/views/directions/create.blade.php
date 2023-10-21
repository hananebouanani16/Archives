

@extends('layouts.master')
@section('content')

<style>
    #content-page {
        padding-top: 20px; /* adjust as needed */
    }

    .container {
        margin-top: 20px; /* adjust as needed */
    }

    .iq-card-header {
        margin-bottom: 1px;
    }

    .form-control {
        width: 100%;
    }
    .full-width {
    width: 100%;
}
</style>
<br>
<br>
<br>
<br>
<div id="content-page" class="content-page">

    <div class="container">
        <b><h5 style="color: #262BC0"> Nouvelle direction</h5></b>
        <div class="iq-card">


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style=".iq-card-header margin-bottom: 1px;">
                                <h4>Fiche de créations des directions</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div>
                                        <form id="form1" action="{{ route('directions.store') }}" method="POST" >
                                            @csrf
                                            <div class="form-group"  style="display:flex; flex-direction:row;align-items: center;">
                                              <div class="form-group mr-2" >
                                                <label class="code_direction_label" for="code_direction">Code</label>
                                                <input type="text" class="form-control" id="code_direction" name="code_direction" style="width: 290px;" value="/<?php echo date('y'); ?>">
                                            </div>
                                            <div class="form-group mr-2">
                                                <label class="type_direction_label" for="type_direction">Type</label>
                                                <select name="type_direction" class="form-control" id="type_direction" style="width: 290px;height: 44px;">
                                                    <option value="DG">Direction Générale</option>
                                                    <option value="DR">Direction Régionale</option>
                                                    <option value="Antenne">Antenne</option>
                                                </select>
                                            </div>

                                            <div class="form-group mr-2">
                                                <label class="nom_parent_label" for="nom_parent">Parent</label>
                                                <select name="nom_parent" class="form-control" id="nom_parent" style="width: 290px;height: 44px;"></select>
                                            </div>
                                            </div>
                                            <script>
                                                const typeDirectionSelect = document.querySelector("#type_direction");
                                                const parentDirectionSelect = document.querySelector("#nom_parent");

                                                // fonction pour ajouter des options au menu déroulant "parent_direction" en fonction de la valeur sélectionnée dans "type_direction"
                                                function ajouterOptionsParentDirection() {
                                                    // supprimer les options existantes
                                                    parentDirectionSelect.innerHTML = "";

                                                    // obtenir la valeur sélectionnée dans "type_direction"
                                                    const typeDirection = typeDirectionSelect.value;

                                                    // ajouter les options appropriées
                                                    if (typeDirection === "DG") {
                                                        ajouterOptionParentDirection("DG");
                                                    } else if (typeDirection === "DR") {
                                                        ajouterOptionParentDirection("DG");
                                                    } else if (typeDirection === "Antenne") {
                                                        ajouterOptionParentDirection("Direction Régionale Centre");
                                                        ajouterOptionParentDirection("Direction Régionale Annaba");
                                                        ajouterOptionParentDirection("Direction Régionale Ghardaïa");
                                                        ajouterOptionParentDirection("Direction Régionale Oran");
                                                        ajouterOptionParentDirection("Direction Régionale Sétif");
                                                        ajouterOptionParentDirection("Direction Régionale Tlemcen");
                                                    }
                                                }

                                                // fonction pour ajouter une option au menu déroulant "parent_direction"
                                                function ajouterOptionParentDirection(value) {
                                                    const option = document.createElement("option");
                                                    option.value = value;
                                                    option.textContent = value;
                                                    parentDirectionSelect.appendChild(option);
                                                }

                                                // ajouter un écouteur d'événement pour détecter les changements dans "type_direction" et mettre à jour les options dans "parent_direction"
                                                typeDirectionSelect.addEventListener("change", ajouterOptionsParentDirection);

                                                // ajouter les options initiales dans "parent_direction"
                                                ajouterOptionsParentDirection();
                                            </script>
                                            <div class="form-group"  style="display:flex; flex-direction:row;align-items: center;">
                                              <div class="form-group mr-2" >
                                                <label class="intitule_direction" for="intitule_direction">Intitulé</label>
                                                <input type="text" class="form-control" id="intitule_direction" name="intitule_direction" style="width: 290px;">
                                              </div>
                                              <div class="form-group mr-2" >
                                                <label class="tel1_direction_label" for="tel1_direction">Tel1</label>
                                                <input type="text" class="form-control" id="tel1_direction" name="tel1_direction" style="width: 290px;">
                                              </div>
                                              <div class="form-group mr-2" style="width: 300px;">
                                                <label class="tel2_direction_label" for="tel2_direction">Tel2</label>
                                                <input type="text" class="form-control" id="tel2_direction" name="tel2_direction" style="width: 290px;" >
                                              </div>
                                            </div>
                                            <div class="form-group"  style="display:flex; flex-direction:row;align-items: center;">
                                                <div class="form-group mr-2" >
                                                <label class="fax_direction_label" for="fax_direction">Fax</label>
                                                <input type="text" class="form-control" id="fax_direction" name="fax_direction" style="width: 290px;">
                                            </div>
                                                <div class="form-group mr-2" >
                                                    <label class="email_direction_label" for="email_direction">Email</label>
                                                    <input type="email" class="form-control" id="email_direction" name="email_direction" style="width: 290px;">
                                                </div>
                                                    <div class="form-group mr-2" >
                                                        <label class="responsable_direction_label" for="responsable_direction">Responsable</label>
                                                        <input type="text" class="form-control" id="responsable_direction" name="responsable_direction" style="width: 290px;">
                                                      </div>
                                                </div>
                                                <div class="form-group"  style="display:flex; flex-direction:row;align-items: center;">
                                                <div class="form-group mr-2">
                                                    <label class="memo_direction_label" for="memo_direction">Memo</label>
                                                    <input type="text" class="form-control" id="memo_direction" name="memo_direction" style="width: 290px;">
                                                </div>
                                                <div class="form-group">
    <label for="adresse_direction">Adresse:</label>
    <input type="text" class="form-control" id="adresse_direction" name="adresse_direction">
</div>
                                                <div class="form-group mr-2">
                                                    <label class="creer_le_direction_label" for="creer_le_direction">Créer le</label>
                                                  <input type="date" class="form-control" id="creer_le_direction" name ="creer_le_direction" style="width: 290px;">
                                                </div>
                                                <div class="form-group mr-2" >
                                                    <label class="creer_par_direction_label" for="memo_direction">Créer par</label>
                                                  <input type="text" class="form-control" id="creer_par_direction" name="creer_par_direction"style="width: 290px;" >
                                                </div>
                                                </div>
                                                <div class="form-group"  style="display:flex; flex-direction:row;align-items: center;">
                                                    <div class="form-group mr-2">
                                                  <label class="modifie_le_direction_label" for="modifie_le_direction">Modifier le</label>
                                                  <input type="date" class="form-control" id="modifie_le_direction" name="modifie_le_direction" style="width: 290px;" >
                                                </div>
                                                <div class="form-group mr-2">
                                                    <label class="modifie_par_direction_label" for="modifie_par_direction">Modifier par</label>
                                                  <input type="text" class="form-control" id="modifie_par_direction" name="modifie_par_direction" style="width: 290px;">
                                                </div>
                                                <div class="form-group mr-2">
                                                    <label class="mobile_direction_label" for="mobile_direction">Mobile</label>
                                                <input type="text" class="form-control" id="mobile_direction" name="mobile_direction" style="width: 305px;" >


                                                </div>
                                                <select name="id_wilaya" required>
    <option value="">Select a Wilaya</option>
    @foreach($wilayas as $wilaya)
        <option value="{{ $wilaya->id_wilaya }}" >
            
            {{ $wilaya->nom_wilaya }}
        </option>
    @endforeach
</select>
                                                </div>
                                                <button class="btn btn-success" type="submit" onclick="showSuccessAlert()">Ajouter</button>
                                            </form>

                                            <script>
                                                function showSuccessAlert() {
                                                    alert('direction ajoutée avec succès !');
                                                }
                                            </script>
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
