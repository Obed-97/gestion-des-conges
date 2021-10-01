
<!-- Modal-Effect -->
        <script src="{{asset('assets/plugins/custombox/dist/custombox.min.js')}}"></script>
        <script src="{{asset('assets/plugins/custombox/dist/legacy.min.js')}}"></script>


    <!-- jQuery  -->

    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

    <!-- KNOB JS -->
    <!--[if IE]>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery-knob/excanvas.js')}}"></script>
    <![endif]-->
    <script src="{{asset('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{asset('assets/pages/jquery.dashboard.js')}}"></script>

     <!-- Toastr js -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/jquery.core.js')}}"></script>
    <script src="{{asset('assets/js/jquery.app.js')}}"></script>

    <!-- file uploads js -->
    <script src="{{asset('assets/plugins/fileuploads/js/dropify.min.js')}}"></script>

    <script type="text/javascript">
            $('.dropify').dropify({
                messages: {
                    'default': 'Uploader votre fichier - PDF*',
                    'replace': 'Remplacer le fichier',
                    'remove': 'Supprimer',
                    'error': 'Ooops, une erreur.'
                },
                error: {
                    'fileSize': 'La taille du fichier est grande (1M max).'
                }
            });
    </script>


    <script type="text/javascript">
     
          onload=notifc()
          let c = 0;
          function notifc(){
            
          let path = "{{ route('not')}}";
          let http = new XMLHttpRequest();
          http.open('GET', path, false);
           

          http.send(null);

          let response = http.responseText;

          if(response == 'Congé autorisé'){
            document.getElementById('n').innerHTML="<div class=\"noti-dot\"> <span class=\"dot\"></span> <span class=\"pulse\"></span></div>"
          }

        }
    </script>
 