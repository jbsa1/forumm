<link rel="icon" href="./fav.jpg" type="image/jpg" size="50px">
<script src="./assets/js/ngomen.js"></script>

<?php
include "./inc/config-konek.php";
session_start();
$querypost = mysqli_query($db, "SELECT*FROM post ORDER BY id_post DESC");
$query1 = mysqli_query($db, "SELECT*FROM user ORDER BY tanggal_login_user DESC");
if (@$_SESSION["user"]) {
    $dataliatkomen = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM lihat WHERE user_lihat='$_SESSION[user]' AND apa_lihat='komentar'"));
    mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$_SESSION[user]'");
    $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
    $data2 = mysqli_fetch_array($query2);
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <style>
        a:focus {
            color: #2a6496;
        }
    </style>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">REKAT<br></a>
                </div>

                <div class="header-right">
                    <a href="./?p=user&user=<?php echo $data2["user_user"]; ?>#post" class="btn btn-warning" title="Postingan Kamu">
                        <b>
                            <?php
                            if ($data2["level_user"] == 1) {
                                $querypostinganuser = mysqli_query($db, "SELECT*FROM post");
                            } else {
                                $querypostinganuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$_SESSION[user]'");
                            }
                            $cekpostinganuser = mysqli_num_rows($querypostinganuser);
                            echo $cekpostinganuser;
                            ?>
                        </b>
                        <i class="fa fa-pencil fa-2x"></i></a>
                    <a href="./?p=komentar&post_user=<?php echo $data2["user_user"]; ?>" class="btn btn-primary" title="Notifikasi Komentar">
                        <b>
                            <?php
                            if ($data2["level_user"] == 1) {
                                $querykomentaruser = mysqli_query($db, "SELECT*FROM komentar");
                            } else {
                                $querykomentaruser = mysqli_query($db, "SELECT*FROM komentar WHERE penulis_post='$data2[user_user]' AND penulis_komentar!='$_SESSION[user]'");
                            }
                            $cekkomentaruser = mysqli_num_rows($querykomentaruser);
                            echo $cekkomentaruser;
                            ?>
                        </b>
                        <i class="fa fa-comment-o fa-2x"></i>
                        <?php
                        if ($dataliatkomen["lihat"] == 1) {
                        ?>
                            <li class="badge" style="color:darkred;position: 4px;">Baru</li>
                        <?php
                        } else {
                        }
                        ?>
                    </a>


                    <a href="./?p=jempol&post_user=<?php echo $data2["user_user"]; ?>" class="btn btn-primary" title="Notifikasi Jempol">
                        <b>
                            <?php
                            $queryjempoluser = mysqli_query($db, "SELECT*FROM suka_post WHERE penulis_post='$data2[user_user]' AND user_suka!='$_SESSION[user]'");
                            $querylihatjempol = mysqli_query($db, "SELECT*FROM lihat WHERE user_lihat = '$_SESSION[user]' AND apa_lihat='like'");
                            $datajempoluser = mysqli_fetch_array($querylihatjempol);
                            $cekjempoluser = mysqli_num_rows($queryjempoluser);

                            echo $cekjempoluser;

                            ?>
                        </b>
                        <i class="fa fa-thumbs-up fa-2x"></i> <?php
                                                                if ($datajempoluser["lihat"] == 1) {
                                                                ?>
                            <li class="badge" style="color:darkred;position: 4px;">Baru</li>
                        <?php
                                                                } else {
                                                                }
                        ?>
                    </a>


                    <button onclick="window.location='./login/logout.php';" class="btn btn-danger" title="Minggat"><i class="fa fa-sign-out fa-2x"></i></button>

                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <div class="user-img-div">
                                <?php
                                if ($data2["pp_user"] == '') {
                                ?>
                                    <a href="./assets/img/user/user.jpg"><img src="assets/img/user/user.jpg" class="img-thumbnail"></a>
                                <?php
                                } else {
                                ?>
                                    <a href="./assets/img/user/<?php echo $data2["pp_user"]; ?>"><img src="assets/img/user/<?php echo $data2["pp_user"]; ?>" class="img-thumbnail"></a>
                                <?php
                                }
                                ?>

                                <div class="inner-text">
                                    <a style="color:white" href="./?p=user&user=<?php echo $data2["user_user"]; ?>"><?php echo $data2["nama_user"]; ?></a><br>
                                    <?php echo $data2["user_user"]; ?>
                                    <br />
                                    <?php
                                    if ($data2["status_user"] == 'Online') {
                                    ?>
                                        <a href="#" class="btn btn-success btn-circle" style="width:10px;height:10px;"></a> Online
                                    <?php
                                    } elseif ($data2["status_user"] == 'Offline') {
                                    ?>
                                        <a href="#" class="btn btn-default btn-circle" style="width:10px;height:10px;"></a> Offline
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <small>Login : <?php echo $data2["tanggal_login_user"]; ?> </small>
                                </div>
                            </div>

                        </li>


                        <li>
                            <a title="Halaman Utama" class="active-menu" href="./"><i class="fa fa-home "></i>Beranda</a>
                        </li>
                        <li>
                            <a href="#" title="Tentang Saya"><i class="fa fa fa-user "></i><?php echo $data2["nama_user"]; ?> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a title="Profil Saya" href="./?p=user&user=<?php echo $data2["user_user"]; ?>"><i class="fa fa-smile-o"></i>Profil</a>
                                </li>
                                <li>
                                    <a title="Pengaturan Akun" href="./?p=edit&profil=<?php echo $data2["user_user"]; ?>"><i class="fa fa-gears"></i>Pengaturan</a>
                                </li>
                                <li>
                                    <a href="./?p=posting&profil=<?php echo $data2["user_user"]; ?>"><i class="fa fa-pencil"></i>Buat Postingan</a>
                                </li>
                                <li>
                                    <a href="./?p=galeriku&by=<?php echo $data2["user_user"]; ?>" title="Foto Dari Semua Postingan Saya"><i class="fa fa-photo"></i>Galeri Saya</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#" title="Tentang Seluruh Pengguna"><i class="fa fa fa-users "></i>Pengguna<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./?p=daftar_pengguna" title="Pengguna Terdaftar"><i class="fa fa-list"></i>Daftar Pengguna</a>
                                </li>

                            </ul>
                        <li>
                            <a href="#" title="Daftar Pengguna Online"><i class="fa fa fa-circle "></i>Online <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                $querypenggunaonline = mysqli_query($db, "SELECT*FROM user WHERE status_user='Online' ORDER BY tanggal_login_user DESC");
                                while ($datapenggunaonline = mysqli_fetch_array($querypenggunaonline)) {
                                ?>
                                    <li>
                                        <a title="<?php echo $datapenggunaonline["nama_user"]; ?> Sedang Online" href="./?p=user&user=<?php echo $datapenggunaonline["user_user"]; ?>"><i class="fa fa-user"></i><?php echo $datapenggunaonline["nama_user"]; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                        </li>
                    </ul>
                    </li>
                    <li>
                        <a href="./?p=galeri" title="Semua Foto Di Postingan"><i class="fa fa-photo"></i>Galeri</a>
                    </li>
                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <?php
                $user = @$_GET["user"];
                $p = @$_GET["p"];
                if ($user) {
                    include 'inc/user.php';
                } elseif (empty($p)) {
                    include 'inc/dashboard.php';
                } elseif ($p == 'beranda') {
                    include 'inc/dashboard.php';
                } elseif ($p == 'post') {
                    include 'inc/read.php';
                } elseif ($p == 'daftar_pengguna') {
                    include 'inc/member.php';
                } elseif ($p == 'edit') {
                    include 'inc/edit-user.php';
                } elseif ($p == 'komentar') {
                    include "inc/komentar-kamu.php";
                } elseif ($p == 'posting') {
                    include 'inc/newpost.php';
                } elseif ($p == 'galeri') {
                    include 'inc/galeri.php';
                } elseif ($p == 'jempol') {
                    include 'inc/jempol.php';
                } elseif ($p == 'galeriku') {
                    include 'inc/galeriku.php';
                } elseif ($p == 'diskusi') {
                    include 'inc/diskusi.php';
                } else {
                    echo "<script>window.location='./error';</script>";
                }
                ?>
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->

        <div id="footer-sec">
            &copy; 2016 8.5 Web Grup(q) Gefivenco <span style="float:right;">Design By : <b>Pelajar SMPN 1 Metro</b>
        </div>
        <!-- /. FOOTER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">

        <!--====== Title ======-->
        <title>REKAT - Bersama Bantu Sesama</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

        <!--====== Slick CSS ======-->
        <link rel="stylesheet" href="assets/css/slick.css">

        <!--====== Font Awesome CSS ======-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--====== Line Icons CSS ======-->
        <link rel="stylesheet" href="assets/css/LineIcons.css">

        <!--====== Animate CSS ======-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--====== Magnific Popup CSS ======-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <!--====== Bootstrap CSS ======-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!--====== Default CSS ======-->
        <link rel="stylesheet" href="assets/css/default.css">

        <!--====== Style CSS ======-->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>
        <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


        <!--====== PRELOADER PART START ======-->

        <div class="preloader">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--====== PRELOADER PART ENDS ======-->

        <!--====== HEADER PART START ======-->

        <header class="header-area">
            <div class="navbar-area headroom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="index.html">
                                    <img src="assets/images/rekat.png" alt="Logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>



                                <div class="navbar-btn d-none d-sm-inline-block">
                                    <a href="./login/"><button class="main-btn"> Masuk</button></a>
                                </div>
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- navbar area -->

            <div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(assets/images/header-hero.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb-5">
                            <div class="header-hero-content">
                                <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Aksi</b> <span>Sosial.</span> </b></h1>
                                <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Mari bersama membantu sesama</p>

                            </div> <!-- header hero content -->
                        </div>
                        <div class="col-lg-7 mt-5">
                            <p><a href="facebook.com">Tentang Kami</a></p>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->

            </div> <!-- header hero image -->
            </div> <!-- header hero -->
        </header>

        <!--====== HEADER PART ENDS ======-->


        <!--====== FOOTER PART START ======-->




        <!--====== FOOTER PART ENDS ======-->








        <!--====== Jquery js ======-->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

        <!--====== Bootstrap js ======-->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!--====== Slick js ======-->
        <script src="assets/js/slick.min.js"></script>

        <!--====== Isotope js ======-->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>

        <!--====== Counter Up js ======-->
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>

        <!--====== Circles js ======-->
        <script src="assets/js/circles.min.js"></script>

        <!--====== Appear js ======-->
        <script src="assets/js/jquery.appear.min.js"></script>

        <!--====== WOW js ======-->
        <script src="assets/js/wow.min.js"></script>

        <!--====== Headroom js ======-->
        <script src="assets/js/headroom.min.js"></script>

        <!--====== Jquery Nav js ======-->
        <script src="assets/js/jquery.nav.js"></script>

        <!--====== Scroll It js ======-->
        <script src="assets/js/scrollIt.min.js"></script>

        <!--====== Magnific Popup js ======-->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>

        <!--====== Main js ======-->
        <script src="assets/js/main.js"></script>

    </body>

    </html>

<?php
}
?>