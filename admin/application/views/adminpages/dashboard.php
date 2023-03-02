<?php
require_once(APPPATH."views/includes/admin/header.php");
require_once(APPPATH."views/includes/admin/menu.php");
 ?>
	<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard</h1>
			<!-- end page-header -->
			
		<!-- begin row -->
            <div class="row">

                <!-- begin col-3 -->
                <div class="col-md-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat bg-primary text-white">
                        <div class="widget-stat-btn"></div>
                        <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Active Users</div>
                            <div class="widget-stat-number"><?= $totalProducts ?></div>
                            <div class="widget-stat-text"></div>
                        </div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->

                <!-- begin col-3 -->
                <div class="col-md-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat bg-inverse text-white">
                        <div class="widget-stat-btn"></div>
                        <div class="widget-stat-icon"><i class="fa fa-users"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">In Active User</div>
                            <div class="widget-stat-number"><?= $inactive ?></div>
                            <div class="widget-stat-text"></div>
                        </div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->

                <!-- begin col-3 -->
                <div class="col-md-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat bg-success text-white">
                        <div class="widget-stat-btn"></div>
                        <div class="widget-stat-icon"><i class="fa fa-diamond"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Withdraw requests</div>
                            <div class="widget-stat-number"><?= $withdraw ?></div>
                            <div class="widget-stat-text"></div>
                        </div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3">
                    <!-- begin widget -->
                    <div class="widget widget-stat bg-purple text-white">
                        <div class="widget-stat-btn"></div>
                        <div class="widget-stat-icon"><i class="fa fa-file"></i></div>
                        <div class="widget-stat-info">
                            <div class="widget-stat-title">Active Blog Post</div>
                            <div class="widget-stat-number"><?= $totalPosts ?></div>
                            <div class="widget-stat-text"></div>
                        </div>
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            
<?php

require_once(APPPATH."views/includes/admin/footer.php");
 ?>