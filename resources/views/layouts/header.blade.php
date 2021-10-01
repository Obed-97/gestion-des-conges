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
                    @if(count($mesconges) < 3)
                        @if($sommes < 30)
                        <li class="btn-group pull-right m-t-10 ">
                            <a href="#demande" type="button" class="btn btn-sm btn-primary  waves-effect waves-light"  aria-expanded="false" data-animation="fadein" data-plugin="custommodal"
                               data-overlaySpeed="200" data-overlayColor="#36404a">Demander un congé </a>
                        </li>
                        @endif
                    @else
                    
                    @endif
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
                <label>Début congé</label>
                <input id="d"   class="form-control" name="debut_conge"  type="date" required="" placeholder="Date début">
            </div>
            <div class="form-group">
                <label>Fin congé</label>
                <input  id="f" class="form-control " name="fin_conge"  type="date" required="" placeholder="Date fin">
            </div>
            <div class="form-group">
                <select id="type_conge_id" name="type_conge_id" class="form-control" required autocomplete="type_conge_id" autofocus  required="">
                    <option value="" selected>Type de congé</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->lib_type_conge}}</option>
                    @endforeach
                   
                </select> 
            </div>
            <div class="form-group">
                <input onclick="date(this)" id="js" class="form-control" name="nbjrs_conge"  type="number" autofocus required=""  placeholder="Nombre de jours">
            </div>
            <div class="form-group mb-5">
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
