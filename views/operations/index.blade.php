@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container" margin-top="100">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
             <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist" style="width: 100%; justify-content: space-between;">
              <li class="nav-item" style="width: 33.33%;">
                  <a class="nav-link active" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill" role="tab" aria-controls="pills-home" aria-selected="true">Preuves de livraison</a>
              </li>
              <li class="nav-item" style="width: 33.33%;">
                  <a class="nav-link" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill" role="tab" aria-controls="pills-profile" aria-selected="false">Fiche de renseignement</a>
              </li>
              <li class="nav-item" style="width: 33.33%;">
                  <a class="nav-link" id="pills-contact-tab-fill" data-toggle="pill" href="#pills-contact-fill" role="tab" aria-controls="pills-contact" aria-selected="false">Congés</a>
              </li>
          </ul>
            </div>

            <div class="container-fluid">
                <div class="iq-card-body">
                    <div class="tab-content" id="pills-tabContent-1">
                        <div class="tab-pane fade show active" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                            <!-- Contenu de l'onglet "Preuves de livraison" -->
                            <h4 class="card-title">Liste des BRQs</h4>
                            <form class="pull-left">
                                <input type="search" class="form-control" id="example2" placeholder="Search">
                            </form>
                            <span class="table-add float-right mb-3 mr-2">
                                <div class="user-list-files d-flex float-right">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn btn-outline-success" href="{{ url('personnelsadd') }}">Scanner un BRQ</a>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    </div>
                                </div>
                            </span>
                            <table id="user-list-table" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Ajoutez les lignes de votre table ici -->
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-profile-tab-fill">
                            <!-- Contenu de l'onglet "Fiche de renseignement" -->
                            <h4 class="card-title">Liste des décharges</h4>
                            <form class="pull-left">
                                <input type="search" class="form-control" id="consul" placeholder="Search">
                            </form>
                            <span class="table-add float-right mb-3 mr-2">
                                <div class="user-list-files d-flex float-right">
                                    <a class="btn btn-outline-success" href="{{ url('consultantsadd') }}">Scanner une fiche de renseignement</a>
                                </div>
                            </span>
                            <table id="user-list" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Ajoutez les lignes de votre table ici -->
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="pills-contact-fill" role="tabpanel" aria-labelledby="pills-contact-tab-fill">
                            <!-- Contenu de l'onglet "Congés" -->
                            <h4 class="card-title">Liste des fiches d'expédition</h4>
                            <form class="pull-left">
                                <input type="search" class="form-control" id="example1" placeholder="Search">
                            </form>
                            <span class="table-add float-right mb-3 mr-2">
                                <div class="user-list-files d-flex float-right">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a class="btn btn-outline-success" href="{{ url('personnelsadd') }}">Scanner une fiche d'expédition</a>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    </div>
                                </div>
                            </span>
                            <table id="user" class="table table-striped table-borderless mt-4" role="grid" aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Ajoutez les lignes de votre table ici -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
