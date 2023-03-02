<?php
require_once('inc/header.php');
require_once('inc/side.php');
$ref = refferalsByUser($_SESSION['user']['refId'], $_SESSION['user']['refId2']);
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
  /*border: 1px solid #ccc;*/
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
  /*border: 1px solid #e9453f;*/
}

.treedipendisiri li a:hover + ul li::after,
.treedipendisiri li a:hover + ul li::before,
.treedipendisiri li a:hover + ul::before,
.treedipendisiri li a:hover + ul ul::before {
  border-color: #e9453f;
}
/*//////////////////*/

.tooltiptext4 {
    visibility: hidden;
    width: 150px;
    height: 50px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 10px;
    box-sizing: border-box;
    position: absolute;
    z-index: 1;
    top: -56px;
    right: -19px;
}

.tooltiptext4::after {
    content: "";
    position: absolute;
    bottom: -20px;
    left: 61px;
    border-width: 10px;
    border-style: solid;
    border-color: black transparent transparent transparent;
}

.tooltip-col:hover .tooltiptext4 {
    visibility: visible;
}
/**/
</style>

    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h3> My Refferals Tree</h3>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 treedipendisiri">
                <h3 class="text-center"><!-- Plan A Tree --></h3>
                <!-- <?php echo "<pre>"; var_dump($_SESSION); ?> -->
                <ul ><li><a>
                  <img class="img img-circle" style="border: 1px solid #000;" src="images/<?= (!empty($_SESSION['user']['Image'])?$_SESSION['user']['Image']:'dunny.jpg') ?>">
                  <h4><?= $_SESSION['user']['FirstName']?> <?= $_SESSION['user']['LastName']?></h4>
                  </a>
            <?php              
                    $html = prinChildQuestions($_GET['refId']);
                    echo $html;
       //prinChildQuestions($_SESSION['user']['refId']);
            ?>
            </div>
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 treedipendisiri">
                <h3 class="text-center">Plan B Tree</h3>
            <?php   
                    if ($_SESSION['user']['refId2']) {
                                   # code...
                echo '<ul >
                        <li>
                          <a>
                            <img src="images/'.(!empty($_SESSION['user']['Image'])?$_SESSION['user']['Image']: 'dunny.jpg').'">
                            <h4>'.$_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'].'</h4>'
                            .$_SESSION['user']['Email'].'
                          </a>';
                    $html = prinChildQuestions($_SESSION['user']['refId2']);
                    echo $html;
                               }else{
                                echo '<p class="alert alert-success text-center">No Data Available</p>';
                               }           
       //prinChildQuestions($_SESSION['user']['refId']);
            ?>
            </div> -->
            </div>
    </section>
</div>
<?php require_once('inc/footer.php'); ?>
