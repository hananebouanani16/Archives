
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Yalidine</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Chart list Js -->
      <link rel="stylesheet" href="./js/chartist/chartist.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body class="sidebar-main-active right-column-fixed header-top-bgcolor">

    @yield('content')
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.html">
               <div class="iq-light-logo">

                <div class="iq-light-logo">
                    @yield('logo')
                    <img src="{{ asset('images/yal2.png') }}" class="img-fluid" alt="">
                </div>
                     <div class="iq-dark-logo">
                        <img src="images/yal2.png" class="img-fluid" alt="">
                     </div>
               </div>
               <div class="iq-dark-logo">
                  <img src="images/yal2.png" class="img-fluid" alt="">
               </div>

               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                    <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Home</span></li>
                    <li>
                       <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-star-line"></i><span>Finance</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                       <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li><a href="{{ route('finances.index') }}"><i class="ri-chat-check-line"></i>BRQ</a></li>

                       </ul>
                       <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li><a href="{{ route('finances.index') }}"><i class="ri-file-edit-line"></i>Décharge</a></li>
                     </ul>
                       <li>

                       <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-profile-line"></i><span>Opérations</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                       <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          <li><a href="{{ route('operations.index') }}"><i class="ri-profile-line"></i>Preuves de livraison</a></li>
                          <li><a href="{{ route('operations.index') }}"><i class="ri-file-edit-line"></i>Fiches de renseignements</a></li>
                          <li><a href="{{ route('operations.index') }}"><i class="ri-user-add-line"></i>Fiches d'expédition</a></li>
                       </ul>
                      <li>
                          <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-add-line"></i><span>R.H</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>

                      <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          <li><a href="{{ route('rhs.index') }}"><i class="ri-profile-line"></i>Contrats employés</a></li>
                          <li><a href="{{ route('rhs.index') }}"><i class="ri-profile-line"></i>Congés</a></li>
                          <li><a href="{{ route('rhs.index') }}"><i class="ri-profile-line"></i>Passations de consignes</a></li>
                       </ul>
                       </li>

                       <li>
                        <a href="{{ route('commercials.index') }}" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="ri-file-edit-line"></i>
                            <span>Commercials</span>
                            <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                        </a>                           <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li><a href="{{ route('commercials.index') }}"><i class="ri-profile-line"></i>Contrats client</a></li>
                            </ul>
                    </li>
                    <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Paramétrages</span></li>

                     <li><a href="todo.html" class="iq-waves-effect" aria-expanded="false"><i class="ri-chat-check-line"></i><span>Directions</span></a></li>
                     <li>
                        <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>personnels</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="profile.html"><i class="ri-admin-line"></i>Ajouter personnel</a></li>
                           <li><a href="profile-edit.html"><i class="ri-file-edit-line"></i>Modifier</a></li>
                           <li><a href="add-user.html"><i class="ri-user-add-line"></i>Supprimer</a></li>
                           <li><a href="user-list.html"><i class="ri-file-list-line"></i>Restaurer</a></li>
                        </ul>
                     </li>

                  </ul>
               </nav>

               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <div class="iq-light-logo">
                        <img src="{{ asset('images/yal2.png') }}" alt="Logo">
               </div>
               <div class="iq-dark-logo">
                <img src="{{ asset('images/yal2.png') }}" alt="Logo">
            </div>
                     <span>Yalidine</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="navbar-left">
                  <ul id="topbar-data-icon" class="d-flex p-0 topbar-menu-icon">
                     <li class="nav-item">
                        <a href="index.html" class="nav-link font-weight-bold search-box-toggle"><i class="ri-home-4-line"></i></a>
                     </li>
                     <li><a href="chat.html" class="nav-link"><i class="ri-message-line"></i></a></li>
                     <li><a href="profile.html" class="nav-link"><i class="ri-question-answer-line"></i></a></li>
                     <li><a href="todo.html" class="nav-link router-link-exact-active router-link-active"><i class="ri-chat-check-line"></i></a></li>
                  </ul>
                  <div class="iq-search-bar d-none d-md-block">
                     <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Type here to search...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        <div class="searchbox-datalink">
                           <h6 class="pl-3 pt-3 pb-3">Pages</h6>
                           <ul class="m-0 pl-3 pr-3 pb-3">
                              <li class="iq-bg-primary-hover rounded"><a href="index.html" class="nav-link router-link-exact-active router-link-active pr-2"><i class="ri-home-4-line pr-2"></i>Dashboard</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="dashboard-1.html" class="nav-link router-link-exact-active router-link-active pr-2"><i class="ri-home-3-line pr-2"></i>Dashboard-1</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="chat.html" class="nav-link"><i class="ri-message-line pr-2"></i>Chat</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="calendar.html" class="nav-link"><i class="ri-calendar-2-line pr-2"></i>Calendar</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="profile.html" class="nav-link"><i class="ri-profile-line pr-2"></i>Profile</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="todo.html" class="nav-link"><i class="ri-chat-check-line pr-2"></i>Todo</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="app/index.html" class="nav-link"><i class="ri-mail-line pr-2"></i>Email</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="pages-faq.html" class="nav-link"><i class="ri-compasses-line pr-2"></i>Faq</a></li>
                              <li class="iq-bg-primary-hover rounded"><a href="form-wizard.html" class="nav-link"><i class="ri-clockwise-line pr-2"></i>Form-wizard</a></li>
                           </ul>
                        </div>
                     </form>
                  </div>
               </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">

                        </li>

                        <li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <div id="lottie-beil"></div>
                              <span class="bg-danger dots"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>

                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Emma Watson Nik</h6>
                                             <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">95 MB</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New customer is join</h6>
                                             <small class="float-right font-size-12">5 days ago</small>
                                             <p class="mb-0">Jond Nik</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="images/user/03.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Two customer is left</h6>
                                             <small class="float-right font-size-12">2 days ago</small>
                                             <p class="mb-0">Jond Nik</p>
                                          </div>
                                       </div>
                                    </a>

                                 </div>
                              </div>
                           </div>
                        </li>

                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
                           <img src="images/user/02.jpg" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height text-white">Bouanani Hanane</h6>
                              <span class="font-size-12 text-white">Available</span>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello Nik jone</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-lock-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Privacy Settings</h6>
                                          <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="btn btn-primary dark-btn-primary" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>


            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body">
                            <a href="{{ route('finances.index') }}" class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="fontsize-sm m-0">Finance</p>
                                </div>
                                <div class="rounded-circle iq-card-icon dark-icon-light iq-bg-primary">
                                    <i class="ri-inbox-fill"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body">
                            <a href="{{ route('rhs.index') }}" class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="fontsize-sm m-0">R.H</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-price-tag-3-line"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                  <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body">
                            <a href="{{ route('operations.index') }}" class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="fontsize-sm m-0">Opérations</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-radar-line"></i></div>
                            </a>
                        </div>
                    </div>
                </div>

                  <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch ">
                        <div class="iq-card-body">
                            <a href="{{ route('commercials.index') }}" class="d-flex d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="fontsize-sm m-0">Commercial</p>
                                </div>
                                <div class="rounded-circle iq-card-icon iq-bg-info "><i class="ri-refund-line"></i></div>
                            </a>
                         </div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="background: transparent;">
                        <div class="iq-card-body rounded p-0 text-center" style="background: url(images/page-img/yal.jpg) no-repeat; background-size: cover; height: 415px;">
                            <div class="iq-caption">
                                <div class="card-body">
                                    @if (session('status'))
                                       <div class="alert alert-success" role="alert">
                                          {{ session('status') }}
                                       </div>
                                    @endif
                                    {{ __('You are logged in!') }}
                                 </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="background: transparent;">
                        <div class="iq-card-body rounded p-0 text-center" style="background: url(images/page-img/yal3.jpg) no-repeat; background-size: cover; height: 415px;">
                            <div class="iq-caption">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


       </div>

       </div>


 </div>

         <div class="iq-right-fixed">
            <div class="iq-card mb-0" style="box-shadow: none;">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                    <h4 class="card-title">Carte Mondiale</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <div class="dropdown">
                        <span class="dropdown-toggle" id="dropdownMenuButton-five" data-toggle="dropdown">
                            <!-- Contenu du dropdown ici -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="iq-card-body">
                <div id="chartdiv"></div>
            </div>
        </div>
        <br>
        <h3> To-Do List</h3>
        <style>
            /* Styles CSS pour la to-do list */
            body {
                font-family: Arial, sans-serif;
            }
            #task-list {
                list-style: none;
                padding: 0;
            }
            .task-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                padding: 8px;
            }
            .task-item .task-text {
                flex: 1;
            }
            .task-item .delete-button {
                background-color: #ff5733;
                color: #fff;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
            }
            /* Style personnalisé pour le bouton "Ajouter" */
            .add-button {
                background-color: #8b5cf6; /* Couleur violette claire */
                color: #fff;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        @php
        $iduser = Auth::user()->id;
        $activityLogsbyuser = DB::table('activity_logs')
          ->select('*')
            ->where('activity_logs.user_id', '=', $iduser)
            ->get()
            ->toArray();
    @endphp


    <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModal2Label" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-right:1200px;">
    <div class="modal-content" style="margin-top:200px;width:1200px;margin-right:1500px;" >

        <div class="container" style="margin-top: 50px;">
            <h2><b>HISTORIQUE D'ACTIVITES</b></h2>
            <div class="activity-feed">
                @foreach($activityLogsbyuser as $activite)
                    <div class="feed-item">
                        <div class="date">{{ $activite->created_at }}</div>
                        <div class="text">Vous avez {{ $activite->activity }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Insérez ici la partie de la carte géographique -->
        <div class="iq-card-body">
            <div id="chartdiv"></div>
        </div>

        <div class="task-input">
            <input type="text" id="task" placeholder="Ajouter une nouvelle tâche">
            <!-- Utilisez la classe "add-button" pour styliser le bouton -->
            <button class="add-button" onclick="addTask()">Ajouter</button>
        </div>

        <ul id="task-list">
            <!-- Les tâches seront ajoutées ici -->
        </ul>

        <script>
            function addTask() {
                var taskInput = document.getElementById("task");
                var taskText = taskInput.value.trim();

                if (taskText !== "") {
                    var taskList = document.getElementById("task-list");
                    var listItem = document.createElement("li");
                    listItem.className = "task-item";
                    listItem.innerHTML = `
                        <span class="task-text">${taskText}</span>
                        <button class="delete-button" onclick="deleteTask(this)">Supprimer</button>
                    `;
                    taskList.appendChild(listItem);

                    // Réinitialiser le champ de saisie
                    taskInput.value = "";
                }
            }

            function deleteTask(button) {
                var taskList = document.getElementById("task-list");
                var listItem = button.parentElement;
                taskList.removeChild(listItem);
            }
        </script>
            </div>
        </div>
    </div>

         </div>

      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">

               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2023 <a href="https://yalidine.com/">Yalidine</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>


      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
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
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- Morris JavaScript -->
      <script src="js/morris.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- ChartList Js -->
      <script src="js/chartist/chartist.min.js"></script>
      <!-- Chart Custom JavaScript -->
      <script async src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</html>
