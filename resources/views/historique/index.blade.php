@section('title', 'Welcome Admin')

@extends('master')

@section('content')
<!-- Navigation Bar-->

<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                    <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                    <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Adminto</span>-->
                <!--</a>-->
                <!-- Image Logo -->
                 <!-- LOGO -->
                <div  >
                    <img src="{{asset('assets/images/agetic.png')}}" width="100" height="70">
                    <a href="{{route('dashboard')}}" class="text-white" ><span>AGETIC <span></span></span></a>
                </div> 


            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="hide-phone">
                        
                    </li>
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="mdi mdi-bell-outline noti-icon"></i>
                                    </a>
                                    <div id="n">
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>

                    <li class="dropdown notification-list">

                        <a class="nav-link dropdown-toggle text-white waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">

                            <img src="/assets/images/users/{{auth()->user()->photo}}" width="150" height="150"  class="rounded-circle mr-2">
                            {{auth()->user()->prenom}}  - {{auth()->user()->role['name']}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="{{route('profile')}}" class="dropdown-item notify-item">
                                <i class="ti-user m-r-5"></i> Mon profile
                            </a>


                            <!-- item-->
                            <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item notify-item">
                                <i class="ti-power-off m-r-5"></i> Déconnexion
                            </button>
                            </form>

                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="{{route('dashboard')}}"><i class="mdi mdi-view-dashboard"></i> <span> Tableau de bord </span> </a>
                    </li>
                    @role('Directeur')
                    
                    @else
                    <li class="has-submenu">
                        <a href="{{route('historique')}}"><i class="fa fa-list"></i> <span>  Historiques </span> </a>
                    </li>
                    @endrole
                    
                    
                    <li class="has-submenu">
                        <a href="#"><i class="fa-spin fa fa-spinner"></i> <span> Gestion des congés</span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    @role('Agent')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Type')}}">Types de congé</a></li>
                                    @endrole

                                    @role('Chef de section')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Conge')}}">Congés à gerer</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                    @role('Chef de division')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Conge')}}">Congés à gerer</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                    @role('Chef de service')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Conge')}}">Congés à gerer</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                    @role('DRH')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Conge')}}">Congés à gerer</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                    @role('Directeur')
                                    <li><a href="{{route('Conge')}}">Tous les congés</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                    @role('Administrateur')
                                    <li><a href="{{route('Mesconges')}}">Mes congés</a></li>
                                    <li><a href="{{route('Conge')}}">Congés à gerer</a></li>
                                    <li><a href="{{route('Type')}}">Types de congés</a></li>
                                    @endrole

                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-institution"></i><span> Administration </span> </a>
                        <ul class="submenu">
                            @role('Directeur')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Personnel')}}"> Le personnel</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('DRH')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Personnel')}}"> Le personnel</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('Administrateur')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Personnel')}}"> Le personnel</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('Chef de service')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('Agent')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('Chef de division')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole
                            @role('Chef de section')
                            <li><a href="{{route('Service')}}"> Les services</a></li>
                            <li><a href="{{route('Affectation')}}"> Les affectations</a></li>
                            @endrole

                        </ul>
                    </li>
                    @role('Administrateur')
                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-table"></i> <span> Permissions et rôles</span> </a>
                        <ul class="submenu">
                            <li><a href="{{route('Permission')}}">Permissions</a></li>
                            <li><a href="{{route('Role')}}">Rôles</a></li>
                        </ul>
                    </li>
                    @endrole
                    
                  
                    @can('demander')
                    
                        <li class="btn-group pull-right m-t-10 ">
                            <a href="#demande" type="button" class="btn btn-sm btn-primary  waves-effect waves-light"  aria-expanded="false" data-animation="fadein" data-plugin="custommodal"
                               data-overlaySpeed="200" data-overlayColor="#36404a">Demander un congé </a>
                        </li>
                        
                    @endcan
                </ul>
                <!-- End navigation menu -->
                    
                <!-- end page title end breadcrumb -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
 
<!-- Modal -->
<div id="demande" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Fermer</span>
    </button>
        <img src="{{asset('assets/images/agetic.png')}}" width="100" height="70">
    <div class="custom-modal-text text-left">
        <form role="form" action="{{route('demande.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Type de congé</label>

                <select id="type_conge_id" name="type_conge_id" class="form-control" required autocomplete="type_conge_id" autofocus  required="">
                    <option value="" selected>Choisir un type</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->lib_type_conge}} </option>
                    @endforeach
                   
                </select> 
            </div>
            <div class="form-group">
                <label>à partir du :</label>
                <input id="d"   class="form-control" name="debut_conge"  type="date" required="" placeholder="Date début">
            </div>
            <div class="form-group">
                <label>Jusqu'au :</label>
                <input id="f"   class="form-control" name="fin_conge"  type="date" required="" placeholder="Date fin">
            </div>
            
            <div class="form-group">
                <label>Nombre de jours</label>
                <input onclick="date(this)" id="js" class="form-control" name="nbjrs_conge"  type="number" autofocus required=""  placeholder="Nombre de jours">
            </div>
            <div class="form-group mb-5">
                <label>Fichier PDF*:</label>
                 <input type="file" name="file"  class="dropify " data-height="90" />
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Envoyer</button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light m-l-10" onclick="Custombox.close();">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    
    function date() {
        
    var debut = document.getElementById('d').value;

    var de = new Date(debut)

    var fin = document.getElementById('f').value;

    var fi = new Date(fin)


    var temps = fi.getTime() - de.getTime(); 

    var jours = temps/(1000 * 3600 *24);

    document.getElementById('js').value = jours;

    return jours

    }
    
</script>

<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-20">
           
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="timeline ">
            @forelse($historique as $historique)
            <article class="timeline-item"  >
                <div class="timeline-desk">
                    <div class="panel">
                        <div class="panel-body">
                            <span class="arrow"></span>
                            <span class="timeline-icon bg-custom"><i class="mdi mdi-circle"></i></span>
                            
                                <h4 class="mb-2">Le {{date('d M Y', strtotime($historique->created_at));}}</h4>
                                <p class="mb-4">à {{date('h:i:s', strtotime($historique->created_at));}}</p>
                                
                           
                            <b class="timeline-date  "><a href="{{route('ouvrir', $historique->id)}}"><i style="font-size: 30px; color: red;" class="fa fa-file-pdf-o"></i></a> 
                                {{$historique->type_conge['lib_type_conge']}}
                                @if($historique->statut == 'Nouvelle demande')
                                  <span class="badge badge-warning">{{$historique->statut}}</span>
                                @elseif($historique->statut == 'Congé autorisé') 
                                  <span class="badge badge-success">{{$historique->statut}}</span>
                                @elseif($historique->statut == 'Validé par la direction') 
                                  <span class="badge badge-success">{{$historique->statut}}</span>
                                @elseif($historique->statut == 'Validé par le service') 
                                  <span class="badge badge-primary">{{$historique->statut}}</span>
                                @elseif($historique->statut == 'Validé par la division')
                                  <span class="badge badge-secondary">{{$historique->statut}}</span>
                                @elseif($historique->statut == 'Validé par la section')
                                  <span class="badge badge-pink">{{$historique->statut}}</span>
                                @else
                                  <span class="badge badge-danger">{{$historique->statut}}</span>
                                @endif 
                            </b>

                        </div>
                    </div>
                </div>
            </article>
            @empty
            <h4 class="text-center m-t-40">Vous n'avez pas encore passer une demande de congé</h4>
            @endforelse
        </div>
    </div>
</div>
<!-- end row -->


</div> <!-- end container -->


@endsection