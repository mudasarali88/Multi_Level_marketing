<?php
require_once("assets/connect.php");
// var_dump(require_once("assets/connect.php")); die;
require_once(APPPATH . "views/includes/admin/header.php");
require_once(APPPATH . "views/includes/admin/menu.php");
?>

<style type="text/css">
    .treedipendisiri {
  /*-webkit-transform: rotate(180deg);
          transform: rotate(180deg);
  -webkit-transform-origin: 50%;
          transform-origin: 50%;*/
          background: #ecf0f5;
}

.treedipendisiri ul {
  position: relative;
  padding: 1em 0;
  white-space: nowrap;
  margin: 0 auto;
  text-align: center;
}
.treedipendisiri ul::after {
  content: '';
  display: table;
  clear: both;
}

.treedipendisiri li {
  display: inline-block;
  vertical-align: top;
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 1em .5em 0 .5em;
}
.treedipendisiri li::before, .treedipendisiri li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 50%;
  border-top: 1px solid #ccc;
  width: 50%;
  height: 1em;
}
.treedipendisiri li::after {
  right: auto;
  left: 50%;
  border-left: 1px solid #ccc;
}
.treedipendisiri li:only-child::after, .treedipendisiri li:only-child::before {
  display: none;
}
.treedipendisiri li:only-child {
  padding-top: 0;
}
.treedipendisiri li:first-child::before, .treedipendisiri li:last-child::after {
  border: 0 none;
}
.treedipendisiri li:last-child::before {
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
}
.treedipendisiri li:first-child::after {
  border-radius: 5px 0 0 0;
}

.treedipendisiri ul ul::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  border-left: 1px solid #ccc;
  width: 0;
  height: 1em;
}

.treedipendisiri li a {
  border: 1px solid #ccc;
  padding: .5em .75em;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
  color: #333;
  position: relative;
  top: 1px;
  /*-webkit-transform: rotate(180deg);
          transform: rotate(180deg);*/
}

.treedipendisiri li a:hover,
.treedipendisiri li a:hover + ul li a {
  background: #e9453f;
  color: #fff;
  border: 1px solid #e9453f;
}

.treedipendisiri li a:hover + ul li::after,
.treedipendisiri li a:hover + ul li::before,
.treedipendisiri li a:hover + ul::before,
.treedipendisiri li a:hover + ul ul::before {
  border-color: #e9453f;
}
</style>
    <!-- begin #content -->
    <div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Admin</a></li>
        <li class="active">User List </li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">User List</h1>
    <!-- end page-header -->

    <div class="row m-t-20">
        <!-- begin section-container -->
        <div class="section-container section-with-top-border">
            <!-- begin panel -->
            <div class="panel pagination-inverse clearfix m-b-0">
                <!-- <table id="data-table"  class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th>Sr#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Refferral Id</th>
                        <th>Refferal Count</th>
                        <th>View</th>
                        <!-- <th>Image</th> ->
                        <th>Action</th>
                    </tr>
                    </thead>
                </table> -->
                <?php
                $refIdo = $this->uri->segment(3);
                  $this->db->where("ID='$refIdo'");
                
                    $emailUser = $this->db->select('*')->from('users')->get()->row_array();
                    // var
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 treedipendisiri">
                <h3 class="text-center">Plan B Tree</h3>
                <ul ><li><a>
                  <!-- <?= $emailUser?> -->
                  <img src="<?=base_url()?>../images/<?=(!empty($emailUser['Image'])?$emailUser['Image']: 'dunny.jpg')?>">
                  <h4><?=$emailUser['FirstName']?> <?=$emailUser['LastName']?></h4>
                 <h4> <?=$emailUser['Email']?></h4>
                </a>
            <?php              
                    $html = prinChildQuestionsAdvance($this->uri->segment(3), $emailUser['spackage']);
                    echo $html;
       //prinChildQuestions($_SESSION['user']['refId']);
            ?>
            </div>
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 treedipendisiri">
                <h3 class="text-center">Plan B Tree</h3>
            <?php   
                    
                echo '<ul ><li><a>'.$userinfo[0]['Email'].'</a>';
                    $html = prinChildQuestions($this->uri->segment(3));
                    echo $html;
                                          
       //prinChildQuestions($_SESSION['user']['refId']);
            ?>
            </div> -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end section-container -->

    </div>
    <!-- end row -->


<?php
require_once(APPPATH . "views/includes/admin/footer.php");
?>