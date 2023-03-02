<aside class="main-sidebar">
    <section class="sidebar">
      <!-- search form -->
      <form action="#"  class="sidebar-form"> </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li>
          <a href="network.php">
            <i class="fa fa-globe"></i>
            <span>Network</span>
           
          </a>
        </li>
        <li>
          <a href="user_earning.php">
            <i class="fa fa-dollar"></i><span>Earnings</span>
           
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Genealogy</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="userTree.php?refId=<?=$_SESSION['user']['refId']?>"><i class="fa fa-circle-o"></i>Genealogy 1</a></li>
            <li><a href="userTree.php?refId=<?=$_SESSION['user']['ID']?>"><i class="fa fa-circle-o"></i>Genealogy 2</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="user_fund.php">
            <i class="fa fa-credit-card"></i> <span>Fund Transfer</span>
            
          </a>
        </li> -->
        <li><a href="admin/home"><i class="fa fa-money"></i> <span>E-Commerce</span></a></li>

       <li><a href="withdrawl.php"><i class="fa fa-money"></i> <span>Withdraw</span></a></li>  
          
          <!-- <li>
          <a href="">
            <i class="fa fa-money"></i><span>Order</span>
            
          </a>
      
        </li> -->
          
          

        <!-- <li class="treeview">
          <a href="3">
            <i class="fa fa-check-circle"></i><span>Epin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="ePIN.php"><i class="fa fa-circle-o"></i><span>ePIN</span></a></li>
            <li><a href="purchase_ePIN.php"><i class="fa fa-circle-o"></i><span>Purchase ePIN</span></a></li>
              
          </ul>
        </li> -->
          

        <!-- <li>
          <a href="hits.php">
            <i class="fa fa-money"></i> <span>Hits</span>
            
          </a>
      
        </li> -->
          
        <li>
          <a href="user_inbox.php">
            <i class="fa fa-money"></i> <span>Inbox</span>
            
          </a>
      
        </li>
          
          
        <li >
          <a href="userbroadcast.php">
            <i class="fa fa-money"></i><span>Broadcast</span> 
            
          </a>
      
        </li>

      
       <li>
          <a href="basic_details.php">
            <i class="fa fa-user"></i><span>Account Settings</span>
           </a>
        </li>


   <li>
          <a href="logout.php">
            <i class="fa fa-sign-out"></i><span>Logout</span>
          </a>
        </li>
          
          
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

