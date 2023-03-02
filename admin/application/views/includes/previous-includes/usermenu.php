
<aside class="col-md-3 col-sm-4 acc-left">
	<div class="card hovercard">                <div class="cardheader">                </div>                <div class="avatar-pic">                    <img src="<?= base_url() . "assets/web/" ?>images/dp.png">                </div>                <div class="info">                    <div class="title">                        <a target="_blank" href=""><?= $userinfo[0]['FirstName'] ?> <?= $userinfo[0]['LastName'] ?></a>                    </div>                    <div class="desc"><?= $userinfo[0]['Email'] ?></div>					<div class="desc"><img src="<?= base_url() . "assets/web/" ?>images/dp-rate.png"></div>                    <div class="desc"><?= $userinfo[0]['description'] ?></div>                </div>    </div>
    <!-- - - - - - - - - - - - - - Information - - - - - - - - - - - - - - - - -->

    <section class="section_offset acc-my-menu">

        <ul class="theme_menu">
			<li class="acc_menu">My Account</li>						<li class="<?php echo $class = ($this->uri->segment(2) == 'userProfile' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/userProfile"><img src="<?= base_url() . "assets/web/" ?>images/profile.png">My Account</a></li>
            <li class="<?php echo $class = ($this->uri->segment(2) == 'setting' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/setting"><img src="<?= base_url() . "assets/web/" ?>images/setting.png">Change Password</a></li>
            <li class="<?php echo $class = ($this->uri->segment(2) == 'dashboard' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/dashboard"><img src="<?= base_url() . "assets/web/" ?>images/setting.png">My Profile</a></li>
			<li class="<?php echo $class = ($this->uri->segment(2) == 'addAds' ? 'current' : ''); ?>"><a  <?=($userinfo[0]['paymentStatus']==0?'title="Please pay to use premium functions"':'href="'.base_url().'home/addAds"')?> ><img src="<?= base_url() . "assets/web/" ?>images/an_add.png">Publish an Ad</a></li>
            <!-- <li class="<?php echo $class = ($this->uri->segment(2) == 'AddProduct' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/AddProduct">Add Products</a></li>
            <li class="<?php echo $class = ($this->uri->segment(2) == 'MyProducts' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/MyProducts">View All Products</a></li>
            -->

            <!-- <li class="<?php echo $class = ($this->uri->segment(2) == 'viewAds' ? 'current' : ''); ?>"><a href="<?= base_url() ?>home/Viewads"><img src="<?= base_url() . "assets/web/" ?>images/add_view.png">View an Add</a></li> -->

            <li class="<?php echo $class = ($this->uri->segment(2) == 'viewAds' ? 'current' : ''); ?>"><a <?=($userinfo[0]['paymentStatus']==0?'title="Please pay to use premium functions"':'href="'.base_url().'home/adsHistory"')?> ><img src="<?= base_url() . "assets/web/" ?>images/add_view.png">Ads History</a></li>

            <li class="<?php echo $class = ($this->uri->segment(2) == 'paymentHistory' ? 'current' : ''); ?>"><a <?=($userinfo[0]['paymentStatus']==0?'title="Please pay to use premium functions"':'href="'.base_url().'home/paymentHistory"')?>><img src="<?= base_url() . "assets/web/" ?>images/payment.png">Payment History</a></li>

            <li class="<?php echo $class = ($this->uri->segment(2) == 'payment' ? 'current' : ''); ?>"><a <?=($userinfo[0]['paymentStatus']==1?'title="You have No pending payments"':'href="'.base_url().'payment"')?>><img src="<?= base_url() . "assets/web/" ?>images/payment.png">Payments</a></li>
            <li class=""><a href=""><img src="<?= base_url() . "assets/web/" ?>images/history.png" style="    width: 24px;">Order History</a></li>
            <li><a onclick="return confirm('Are you want to logout from the system??');" href="<?= base_url() ?>home/logout"><img src="<?= base_url() . "assets/web/" ?>images/logout.png"> Sign Out</a></li>


        </ul>

    </section><!--/ .section_offset -->

    <!-- - - - - - - - - - - - - - End of information - - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->

    <div class="section_offset">

        <a href="#" class="banner">

            <img src="images/banner_img_10.png" alt="">

        </a>

    </div>

    <!-- - - - - - - - - - - - - - End of banner - - - - - - - - - - - - - - - - -->

</aside><!--/ [col]-->

