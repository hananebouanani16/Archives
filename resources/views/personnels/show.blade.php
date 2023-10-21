@extends('layouts.master')
@section('content')

<style>
    .container {
        margin-top: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #262BC0;
        color: #fff;
        padding: 15px;
        text-align: center;
    }

    .card-title {
        font-size: 24px;
        margin: 0;
    }

    .card-body {
        padding: 20px;
    }

    .personnel-info {
        font-size: 16px;
    }

    .personnel-info strong {
        font-weight: bold;
        color: #262BC0;
    }

    .personnel-info p {
        margin: 5px 0;
    }
</style>

<div id="content-page" class="content-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fiche des informations des personnels</h4>
                    </div>
                    <div class="card-body">
                        <div class="personnel-info">
                            <p><strong>Nom :</strong> {{ $personnel->nom }}</p>
                            <p><strong>Prénom :</strong> {{ $personnel->prenom }}</p>
                            <p><strong>Adresse :</strong> {{ $personnel->adresse }}</p>
                            <p><strong>Email :</strong> {{ $personnel->email }}</p>
                            <p><strong>Téléphone :</strong> {{ $personnel->telephone1 }}</p>
                            <p><strong>Date de naissance :</strong> {{ $personnel->telephone2 }}</p>
                            <p><strong>Lieu de naissance :</strong> {{ $personnel->lieu_naissance }}</p>
                            <p><strong>Date de recrutement :</strong> {{ $personnel->date_recrutement }}</p>
                            <p><strong>Situation familiale :</strong> {{ $personnel->situation_familiale }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
