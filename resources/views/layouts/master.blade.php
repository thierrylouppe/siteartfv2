<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminitration site ARTF</title>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <x-navbar />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-bold" style="font-size: 1.3em;"><b>ARTF</b>GestSite.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                    <div class="image">
                        <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="mr-3 img-size-50 img-circle">
                    </div>
                    <div class="info">
                        <a href="#"
                            class="d-block ellipsis">{{ \Illuminate\Support\Str::ucfirst(userFullName()) }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <x-menu />
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield("contenu")

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <x-usersidebar />
        <!-- /.control-sidebar -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.0
            </div>
            <strong>Copyright © 2021 <a href="http://artf.cg">artf.cg</a>.</strong> All rights
            reserved.
        </footer>


    </div>
    <!-- ./wrapper -->

     

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('js/app.js') }}"></script>

    {{-- Script pour message succès --}}
    <script>
        window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            toast:true,
            title: event.detail.message || 'Opération effectuée avec succès !',
            showConfirmButton: false,
            timer: 5000
        })
        });
    </script>
    

     @livewireScripts

   

</body>

</html>
