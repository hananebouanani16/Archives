@extends('layouts.app')

@section('content')
 <head>
      <!-- Required meta tags -->

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Yalidine</title>
      <!-- Favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico" />
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

<section class="text-center" style="
  padding: 2rem;
  border: 2px solid #ccc;
  border-radius: 10px;
  margin: 5rem auto;
  max-width: 1200px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #fff;
  position: relative;
  overflow: hidden;
  background-image: linear-gradient(to bottom, #fff, #f5f5f5);
">
  <!-- Contenu de la section -->



  <!-- Background image -->
<div class="p-5 bg-image" style="
    background-image: url('/images/red.jpg');
    height: 250px;
    position: relative;
">
  <img src="{{ asset('images/yal4.png') }}" class="img-fluid" style="
    position: absolute;
    top: 20%;
    left: 80px;
    transform: translate(-50%, -50%);
    width: 150px; /* Ajoutez la largeur souhaitée */
    filter: brightness(0) invert(1); /* Ajoutez un effet d'inversion (blanc sur fond sombre) */
  " alt="Logo gauche">



  <h1 style="
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-weight: bold;
    text-shadow: 2px 2px 2px rgba(0,0,0,0.8);
  ">Yalidine Express</h1>
</div>


  <div class="card mx-auto shadow-5-strong custom-card" style="
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    font-size: 0.8rem;
    padding: 1rem;
    max-width: 70%;
    margin-top: -50px;
    ">

  <!-- Le contenu de votre div card ici -->

   <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <h2 class="fw-bold mb-5">Connectez-vous maintenant</h2>


                                   <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 text-center"> <!-- Utilisez col-md-12 pour occuper toute la largeur -->
                            <button type="submit" class="btn btn-danger btn-lg">
                                {{ __('Connexion') }}
                            </button>
                        </div>
                    </div>



                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>


</section>



@endsection
