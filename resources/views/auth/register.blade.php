<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('assets/images/agetic.png')}}">

        <title>AGETIC - Gestion des congés</title>

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-inscription">
        	<div class="m-t-40 card-box">
                <div class="text-center">
            <img src="{{asset('assets/images/agetic.png')}}" width="100" height="70">
                    <h4 class=" font-bold m-b-0">Inscription</h4>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                    @csrf

                    	<div class="form-group ">
							<div class="col-xs-12">
								<input id="matricule" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule" autofocus type="text" required="" placeholder="Matricule">

								@error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group ">
							<div class="row">
								<div class="col-md-6">
								<input id="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus type="text" required="" placeholder="Nom">

								@error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-6">
								<input id="prenom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="Prénom" autofocus type="text" required="" placeholder="prenom">

								@error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							</div>
						</div>

						<div class="form-group ">
							<div class="row">
								<div class="col-md-6">
								<input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" required="" placeholder="Email">

								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-6">
								<input id="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus type="text" required="" placeholder="Téléphone">

								@error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							</div>
							
						</div>
						<div class="form-group ">
							<div class="col-xs-12">
								<select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required autocomplete="role_id" autofocus  required="">
									<option value="" selected>Votre profile</option>
									@foreach($roles as $role)
									<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
									
								</select> 

								@error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<textarea id="adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="name" autofocus type="text" required="" placeholder="Adresse"></textarea>

								@error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
							</div>
						</div>
						<div class="form-group ">
							<div class="row">
								<div class="col-md-6">
								<input id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus type="password" required="" placeholder="Mot de passe">

								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-6">
								<input id="password-confirm" class="form-control @error('tel') is-invalid @enderror" name="password_confirmation" value="{{ old('tel') }}" required autocomplete="new-password" autofocus type="password" required="" placeholder="Confirmer mot de passe">

							</div>
							</div>
							
						</div>

						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-primary btn-bordred btn-block waves-effect waves-light" type="submit">
									s'inscrire
								</button>
							</div>
						</div>

					</form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-white">Vous avez déjà un compte?<a href="{{route('login')}}" class="text-white m-l-5"><b>Se connecter</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->




        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/detect.js')}}"></script>
        <script src="{{asset('assets/js/fastclick.js')}}"></script>
        <script src="{{asset('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('assets/js/jquery.app.js')}}"></script>

	</body>
</html>