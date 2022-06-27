<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>LMS</title>
        <link rel="stylesheet" href="sidebar.css" />
        <link rel="stylesheet" href="../dashboard-admin/dashboard.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
        />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            charset="utf-8"
        ></script>
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
                        <a href="#" class="menu-btn">
                            <i class="fas fa-home"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="#profile" class="menu-btn">
                            <i class="fas fa-user-plus"></i
                            ><span
                                >Akun
                                <i class="fas fa-chevron-down drop-down"></i
                            ></span>
                        </a>
                        <div class="sub-menu">
                            <a href="#"
                                ><i class="fas fa-users"></i
                                ><span>Guru</span></a
                            >
                            <a href="#"
                                ><i class="fas fa-user"></i
                                ><span>Siswa</span></a
                            >
                        </div>
                    </li>
                    <li class="item logout">
                        <a href="#" class="menu-btn">
                            <i class="fas fa-sign-out-alt"></i
                            ><span>Logout</span>
                        </a>
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--contoh main-->
            <div class="main-container">
                <div class="card">
                    <h1 class="title">Dashboard</h1>
                    <div class="dashInfo">
                        <div class="dashItem">
                            <span class="dashTitle">Total Course:</span>
                            <div class="dashCount">
                                <span class="count">3</span>
                            </div>
                        </div>
                        <div class="dashItem">
                            <span class="dashTitle">Total Siswa:</span>
                            <div class="dashCount">
                                <span class="count">7</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
                <div class="card">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".sidebar-btn").click(function () {
                    $(".wrapper").toggleClass("collapse");
                });
            });
        </script>
    </body>
</html>
