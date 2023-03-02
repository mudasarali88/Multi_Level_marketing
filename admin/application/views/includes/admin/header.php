<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />

        <title>MLM</title>

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
        <link href=" <?= base_url() . "assets/admin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" ?>" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="<?= base_url() . "assets/admin/plugins/bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/font-awesome/css/font-awesome.min.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/css/animate.min.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/css/style.min.css" ?>" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
        <link href="<?= base_url() . "assets/admin/plugins/bootstrap-calendar/css/bootstrap_calendar.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/DataTables/media/css/dataTables.bootstrap.min.css" ?> " rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/DataTables/extensions/FixedHeader/css/fixedHeader.bootstrap.min.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" ?>" rel="stylesheet" />
        <link href="<?= base_url() . "assets/admin/plugins/gritter/css/jquery.gritter.css" ?>" rel="stylesheet" />	
        <link href="<?= base_url() . "assets/admin/plugins/parsley/src/parsley.css" ?>" rel="stylesheet" />	
        <link href="<?= base_url() . "assets/admin/css/custom.css" ?>" rel="stylesheet" />	
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?= base_url() . "assets/admin/plugins/pace/pace.min.js" ?>"></script>
        <!-- ================== END BASE JS ================== -->
        <!--[if lt IE 9]>
            <script src="assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">

            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- begin container-fluid -->
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>admin" class="navbar-brand"><img src="<?= base_url() . "assets/admin/img/logo.png" ?>" class="logo" alt="" /> M L M</a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin navbar-right -->
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

                                <?php $userinfo = Admininfo($this->session->userdata('ID')); ?>
                                <span class="image">
                                    <?php if (empty($userinfo[0]['Image'])) { ?>
                                        <img src="<?= base_url() . "assets/admin/img/user_profile.jpg" ?>" alt="" />
                                    <?php } else { ?>
                                        <img src="<?= base_url() . "assets/images/" . $userinfo[0]['Image'] ?>" alt="" />                                                        
                                    <?php } ?>
                                </span>
                                <span class="hidden-xs"><?= $userinfo[0]['FirstName'] . " " . $userinfo[0]['LastName'] ?> </span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?= base_url() ?>admin/editProfile">Edit Profile</a></li>
                                <li><a href="<?= base_url() ?>admin/setting">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url() ?>admin/logOut">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end navbar-right -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end #header -->
