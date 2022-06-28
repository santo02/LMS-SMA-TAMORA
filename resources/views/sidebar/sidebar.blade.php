<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>LMS</title>
        <link rel="stylesheet" href="sidebar.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/sidebar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/list-style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/course.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"/>
        <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel ="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <div class="header-menu">
                    <div class="title">LMS</div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
            <!--header menu end-->

            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <div class="profile">
                        <img src="logo-sidebar.png" alt="" />
                    </div>
                    <li class="item">
                        <a href="{{Route('dashboard')}}" class="menu-btn">
                            <i class="fas fa-home"></i><span>Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i><span>Akun
                                <i class="fas fa-chevron-down drop-down"></i ></span>
                        </a>
                        <div class="sub-menu">
                            <a href="{{Route('list-guru')}}"
                                ><i class="fas fa-users"></i
                                ><span>Guru</span></a>
                            <a href="{{Route('list-siswa')}}"
                                ><i class="fas fa-user"></i
                                ><span>Siswa</span></a>
                        </div>
                    </li>
                    @elseif(Auth::user()->role == 'teacher')
                    <li class="item">
                        <a href="{{Route('mycourse')}}" class="menu-btn">
                            <i class="fas fa-user-plus"></i>My Course
                        </a>
                    </li>
                    <li class="item" >
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i>Profile
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i>Customer  Service
                        </a>
                    </li>
                    @else
                      <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i>My Course
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i>Profile
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i>Customer Service
                        </a>
                    </li>

                    @endif
                    <li class="item logout">
                        <a href="{{route('logout')}}" class="menu-btn">
                            <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->

            <!--contoh main-->
            <div class="main-container">
                @yield('content')
            </div>

        </div>
        <script src ="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src ="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src ="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"
      ></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#example').DataTable();
    });
 </script>
           {{-- // <script type="text/javascript">
    //             $(document).ready(function () {
    //                 $(".sidebar-btn").click(function () {
    //                     $(".wrapper").toggleClass("collapse");
    //                 });
    //             });
    //         </script> --}}
    </body>
</html>
