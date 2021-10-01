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
                        @if(auth()->user()->conges->sum("type_conge['nbjours']") < 30)
                        <li class="btn-group pull-right m-t-10 ">
                            <a href="#demande" type="button" class="btn btn-sm btn-primary  waves-effect waves-light"  aria-expanded="false" data-animation="fadein" data-plugin="custommodal"
                               data-overlaySpeed="200" data-overlayColor="#36404a">Demander un congé </a>
                        </li>
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
                <!-- end page title end breadcrumb -->
                @role('Directeur')
                <div class="row">
                     <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            
                            <h4 class="header-title mt-0 m-b-30">Demandes de congés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round"  data-width="80" data-height="80" data-fgColor="#188ae2"
                                           data-bgColor="#8cdbfd" value="{{count($conge)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($conge)}} </h2>
                                    <p class="text-muted m-b-10"> Demandes</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            
                            <h4 class="header-title mt-0 m-b-30">Conngés autorisés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-width="80" data-height="80" data-fgColor="#10c469"
                                           data-bgColor="#a8ecac" value="{{count($congesAutorises)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($congesAutorises)}} </h2>
                                    <p class="text-muted m-b-10">Congés</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title mt-0 m-b-30">Demandes encours</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                           data-bgColor="#FFE6BA" value="{{count($congesEncours)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>
                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($congesEncours)}} </h2>
                                    <p class="text-muted m-b-10">Demandes</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                     <div class="col-xl-3 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title mt-0 m-b-30">Congés réfusés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-width="80" data-height="80" data-fgColor="#d60a0a"
                                           data-bgColor="#e79d9d" value="{{count($congesRefuses)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>
                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($congesRefuses)}} </h2>
                                    <p class="text-muted m-b-10">Congés</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                @else
                 <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            
                            <h4 class="header-title mt-0 m-b-30">Demandes de congés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round"  data-min="0" data-max="3" data-width="80" data-height="80" data-fgColor="#188ae2"
                                           data-bgColor="#8cdbfd" value="{{count($mesconges)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($mesconges)}} </h2>
                                    <p class="text-muted m-b-10"> Demandes</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            
                            <h4 class="header-title mt-0 m-b-30">Conngés autorisés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-min="0" data-max="3" data-width="80" data-height="80" data-fgColor="#10c469"
                                           data-bgColor="#a8ecac" value="{{count($mesCongesAutorises)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($mesCongesAutorises)}} </h2>
                                    <p class="text-muted m-b-10">Congés</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title mt-0 m-b-30">Demandes encours</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-min="0" data-max="3" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                           data-bgColor="#FFE6BA" value="{{count($mesCongesEncours)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>
                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($mesCongesEncours)}} </h2>
                                    <p class="text-muted m-b-10">Demandes</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                     <div class="col-xl-3 col-md-6">
                        <div class="card-box">

                            <h4 class="header-title mt-0 m-b-30">Congés réfusés</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-linecap="round" data-min="0" data-max="3" data-width="80" data-height="80" data-fgColor="#d60a0a"
                                           data-bgColor="#e79d9d" value="{{count($mesCongesRefuses)}}"
                                           data-skin="tron" data-angleOffset="0" data-readOnly=true
                                           data-thickness=".3"/>
                                </div>
                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{count($mesCongesRefuses)}} </h2>
                                    <p class="text-muted m-b-10">Congés</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                @endrole

                <!-- end row -->
                <div id="container" class="mb-2"></div>
                </div>
        <!-- end wrapper -->


@endsection
@section('extra-js')
@role('Administrateur')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var datas = <?php echo json_encode($datas)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des demandes de congé en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: {
            title: {
                text: 'Nombre des demandes'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Nouvelle demande',
            type: 'areaspline',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole

@role('Directeur')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var datas = <?php echo json_encode($datas)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des demandes de congé en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: {
            title: {
                text: 'Nombre des demandes'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Nouvelle demande',
            type: 'areaspline',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole

@role('Agent')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var donnees = <?php echo json_encode($donnees)?>;


    Highcharts.chart('container', {
        title: {
            text: 'Statistiques de mes  congés en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: [{
                    title: {
                        text: 'Mes demandes'
                    },

                }, ],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mes demandes',
            type: 'areaspline',
            data: donnees
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole
@role('Chef de section')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var donnees = <?php echo json_encode($donnees)?>;
    var section = <?php echo json_encode($section)?>;


    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des  congés en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: [{
                    title: {
                        text: 'Mes demandes'
                    },

                },{
                    title: {
                        text: 'Demandes à gerer'
                    },
                }
                ],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mes demandes',
            type: 'column',
            data: donnees
        },{
            name: 'Demande à gerer',
            type: 'areaspline',
            color: '#71b6f9',
            data: section
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole
@role('Chef de division')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var donnees = <?php echo json_encode($donnees)?>;
    var division = <?php echo json_encode($division)?>;


    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des  congés en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: [{
                    title: {
                        text: 'Mes demandes'
                    },

                },{
                    title: {
                        text: 'Demandes à gerer'
                    },
                }
                ],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mes demandes',
            type: 'column',
            data: donnees
        },{
            name: 'Demande à gerer',
            type: 'areaspline',
            color: '#71b6f9',
            data: division
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole
@role('Chef de service')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var donnees = <?php echo json_encode($donnees)?>;
    var service = <?php echo json_encode($service)?>;


    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des  congés en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: [{
                    title: {
                        text: 'Mes demandes'
                    },

                },{
                    title: {
                        text: 'Demandes à gerer'
                    },
                }
                ],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mes demandes',
            type: 'column',
            data: donnees
        },{
            name: 'Demande à gerer',
            type: 'areaspline',
            color: '#71b6f9',
            data: service
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole
@role('DRH')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script type="text/javascript">
    var donnees = <?php echo json_encode($donnees)?>;
    var drh = <?php echo json_encode($drh)?>;


    Highcharts.chart('container', {
        title: {
            text: 'Statistiques des  congés en <?php echo date('Y')?>'
        },
        subtitle: {
            text: 'Source: AGETIC'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                'Octobre', 'Novembre', 'Decembre'
            ]
        },
        yAxis: [{
                    title: {
                        text: 'Mes demandes'
                    },

                },{
                    title: {
                        text: 'Demandes à gerer'
                    },
                }
                ],
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mes demandes',
            type: 'column',
            data: donnees
        },{
            name: 'Demande à gerer',
            type: 'areaspline',
            color: '#71b6f9',
            data: drh
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endrole
@endsection

