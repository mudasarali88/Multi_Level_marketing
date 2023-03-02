<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>
 <?php require_once('login_fun.php');
ob_start();
if (!isset($_SESSION["username"]) ) {
     header('location:index.php');
	}
?> <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Download
        
      </h1>
   
    </section>

    <!-- Main content -->
    <section class="content">
   

               <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9  ">
                        <!-- /content_begin-->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <h3> Free Downloads</h3>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table width=100% border=0 cellspacing=2 cellpadding=0><tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<TR>
<TD>
<a class="link2" href="?nav=home"><b>Home</b></a> | <a class="link2" href="?nav=browse"><b>Browse</b></a> | <a class="link2" href="?nav=recent"><b>Recent Files</b></a></TD>
<TD align="right">
<form action="?nav=search_results" method="post"><INPUT type="text" class="input1" size="30" name="search">
<INPUT type="submit" value=" Search Files">
</form>
</TD>
</TR>
</table>
<div class="line-hor"></div></td></tr><tr><td><table width=100% border=0 cellspacing=1 cellpadding=1><tr><td width='50%' style='vertical-align: top;'><TABLE width="100%" border="0" cellspacing="0" cellpadding="1"><TR><TD style="padding:4px;color:#ffffff;background-color:#4F4F4F"><b>Most Recent Files</b></TD></TR></TABLE><table width=100% border=0 cellspacing=1 cellpadding=1><tr><td><a class=link2 href="?nav=display&file=2">English Presentation</a></td></tr></table></td><td width='50%' style='vertical-align: top;'><TABLE width="100%" border="0" cellspacing="0" cellpadding="1"><TR><TD style="padding:4px;color:#ffffff;background-color:#4F4F4F"><b>Popular Downloads</b></TD></TR></TABLE><TABLE width=100% border=0 cellspacing=1 cellpadding=1><TR><TH class=subtitle width=70%>File</TH><TH class=subtitle width=30%>Downloads</TH></TR><TR><TD><a class=link2 href="?nav=display&file=2">English Presentation</a></TD><TD>4</TD></TR></TABLE></td>

</tr>

</table><table width=100% border=0 cellspacing=1 cellpadding=1><tr><td colspan=2><TABLE width="100%" border="0" cellspacing="0" cellpadding="1"><TR><TD style="padding:4px;color:#ffffff;background-color:#4F4F4F"><b>Download Categories</b></TD></TR></TABLE><br /></td></tr><tr><td valign=top width=50% style="padding:4px;"><a style='text-decoration:none;' href="?nav=browse&category=presentation"><TABLE width="100%" border="0" cellspacing="0" cellpadding="1"><TR><TD style="padding:4px;border-bottom:1px solid #4F4F4F"><b>presentation</b></TD></TR></TABLE></a><table border=0 cellpadding=5 cellspacing=5><tr><td valign=top colspan=2><b>English powerpoint presentation</b><br /></td></tr></table></td><td></td></tr></table></td></tr></table>        <br />
        <br />
        <br />
        <br />
        <br />
    </div>
</div>
</div>





    </section>
  </div>
  <!-- /.content-wrapper -->
 <?php require_once('inc/footer.php');?>
