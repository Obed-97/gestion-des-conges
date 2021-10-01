<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>AGETIC - Gestion des congés</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            
        	<div class="m-t-40 card-box">
            <div class="text-center">
            <img src="{{asset('assets/images/agetic.png')}}" width="100" height="70">
            <h4 class=" font-bold m-b-0">Connexion</h4>
        	</div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('password.email') }}">
          			  @csrf

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20 mb-0">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Envoyer
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
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	</body>
</html>