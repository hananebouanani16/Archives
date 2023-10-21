@extends('layouts.master')
@section('content')

<br>
<br>
<br>
<br>
<div id="content-page" class="content-page">

    <b><h5 style="color: #262BC0"> Détails de la direction: </h5></b>
    <div class="iq-card">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style=".iq-card-header margin-bottom: 1px;">
                            <h4>Fiche des informations des directions</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <strong>Code: </strong> {{ $directions->code_direction }} <br>
                                        <strong>Type: </strong> {{ $directions->type_direction }} <br>
                                        <strong>Nom parent:</strong> {{ $directions->nom_parent }}<br>
                                        <strong>Wilaya:</strong> {{ $wilayaName}}<br> <!-- Displaying the Wilaya name here -->
                                        <strong>Intitulé:</strong> {{ $directions->intitule_direction }}<br>
                                        <strong>Téléphone 1:</strong>{{ $directions->tel1_direction }}<br>
                                        <strong>Téléphone 2:</strong>{{ $directions->tel2_direction }}<br>
                                        <strong>Fax:</strong>{{ $directions->fax_direction }}<br>
                                        <strong>Email:</strong>{{ $directions->email_direction }}<br>
                                        <strong>Responsable:</strong>{{ $directions->responsable_direction }}<br>
                                        <strong>Memo:</strong>{{ $directions->memo_direction }}<br>
                                        <strong>Crée le:</strong>{{ $directions->creer_le_direction }}<br>
                                        <strong>Crée par:</strong>{{ $directions->creer_par_direction }}<br>
                                        <strong>Modifié le:</strong>{{ $directions->modifie_le_direction }}<br>
                                        <strong>Modifié par:</strong>{{ $directions->modifie_par_direction }}<br>
                                        <strong>Mobile:</strong>{{ $directions->mobile_direction }}<br>
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
