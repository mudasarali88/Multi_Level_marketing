<!doctype html>
<html lang="en">
    <head>
        <!-- Basic page needs
        ============================================ -->
        <!-- <title> <?= $title;?> | Brands Valley </title>
        <meta name="Description"  content="<?= $description;?>" />
        <meta name="keywords"  content="<?= $keyword;?>" /> -->
             <?php if(!empty($title)){?>
             <title><?php echo $title; ?></title>
              <?php }else{ ?>
              <title>Be a Brand </title>
              <?php }
             if(!empty($description)) {?>
             <meta name="Description"  content="<?= $description;?>" />
             <?php }else{ ?>
             <meta name="description" content="Brands Valley is an advertising platform targeting clients either local or international who are looking for all kinds of branding.  ">
             <?php }
              if (!empty($keyword)) {?>
              <meta name="keywords"  content="<?= $keyword;?>" />
              <?php }else{ ?>
              <meta name="keywords" content="brands,marketing,advertising,advertisement,ad agency,clients,classifieds,targeted advertising ">
              <?php } ?>




       <!--  <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="p:domain_verify" content="4552c7c3a15804841e329b45f7fdffc1"/> -->
        <!-- Mobile specific metas
        ============================================ -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Favicon        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() . "assets/web/" ?>images/favicon.png?v=1">
		
        <!-- Google web fonts



        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <!-- Libs CSS
            ============================================ -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>css/animate.css">



        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>css/fontello.css">

        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>css/bootstrap.min.css">



        <link rel='stylesheet' href='<?= base_url() ?>assets/unitegallery/css/unite-gallery.css' type='text/css' />





        <link rel='stylesheet'href='<?= base_url() ?>assets/unitegallery/themes/default/ug-theme-default.css' type='text/css' />





        <!-- Theme CSS







            ============================================ -->



        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>js/layerslider/css/layerslider.css">



        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>js/owlcarousel/owl.carousel.css">







        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>js/arcticmodal/jquery.arcticmodal.css">






		<link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>plugins/menu/css/webslidemenu.css">
        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>css/style.css">
		<link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>fonts/proxima-nova-web-fonts-master/fonts.css">
		<link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>fonts/proxima-nova-web-fonts-master/fonts.min.css">

        <link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>js/rs-plugin/css/settings.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/web/plugins/product-quick-view-master/css/style.css"> <!-- Resource style -->
        <!-- JS Libs



            ============================================ -->



        <script src="<?= base_url() . "assets/web/" ?>js/modernizr.js"></script>







        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



    



        -->
        <style>



            .nopadding{



                padding: 0 !important;



                margin: 0 !important;



            }



            a{



                color:#000000;



                text-decoration: none !important;



            }



            .noarrow > a:before{



                content:'' !important;



            }



        </style>



        <!-- Old IE stylesheet



        ============================================ -->



        <!--[if lte IE 9]>



            <link rel="stylesheet" type="text/css" href="css/oldie.css">



        <![endif]-->



        <!-- Global site tag (gtag.js) - Google Analytics -->



        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115754358-1"></script>



        <script>



            window.dataLayer = window.dataLayer || [];



            function gtag() {



                dataLayer.push(arguments);



            }

            gtag('js', new Date());



            gtag('config', 'UA-115754358-1');

        </script>



    </head>

    <body class="front_page promo_popup">



        <!-- - - - - - - - - - - - - - Main Wrapper - - - - - - - - - - - - - - - - -->



        <div class="wide_layout">



            <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->



            
            <header id="header" class="type_6">



                <!-- - - - - - - - - - - - - - bottom part - - - - - - - - - - - - - - - - -->




                <div class="bottom_part">



                    <div class="container-fluid">



                        <div class="row">



                            <div class="main_header_row">



                                <div class="col-lg-3 col-md-5 col-sm-5">



                                    <a href="<?= base_url() ?>" class="logo">



                                        <img src="<?= base_url() . "assets/web/" ?>images/logo.png" alt="Brands Valley">



                                    </a>



                                </div><!--/ [col]-->

								<div class="col-lg-7 col-md-8 col-sm-8">
								
									
                                <form method="post" action="<?= base_url() ?>/home/setRegion">

                                    <ul class="formsection pull-right">
                                        <li class="col-lg-4 col-md-4 col-sm-12 padding-5px">
                                            <select class="open_categories " id="country" name="country" onchange="getStatesWithCountry(2);" >
                                                <option value="">Select Country</option>
                                                <?php
                                                foreach ($countries as $country) {
                                                    $country_id = $this->input->cookie('countryName', true);
                                                    // 
                                                    //$city_id = $this->input->cookie('cityName', true);
                                                    if ($country_id == $country->id) {
                                                        ?>
                                                        <option value="<?= $country->id ?>" class="animated_item" selected="selected"><?= $country->name ?></option>
                                                    <?php } else { ?>
                                                       <option value="<?= $country->id ?>" class="animated_item"><?= $country->name ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <li class="col-lg-4 col-md-4 col-sm-12 padding-5px">
                                           <?php
                                            $state_id = $this->input->cookie('stateName', true);
                                            if ($state_id != '')
                                                $states = $this->User_model->getSelectedRegin('states', $state_id);
                                            ?>
                                            <select class="open_categories " id="states" name="states"  onchange="getCitiesWithStates(2);">

                                                <?php if ($states) { ?>

                                                    <option value="<?= $states->id ?>"><?= $states->name ?></option>

                                                <?php } else { ?>

                                                    <option value="">Select State</option>

                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li class="col-lg-3 col-md-3 col-sm-12 padding-5px">
                                            <?php
                                            $city_id = $this->input->cookie('cityName', true);
                                            if ($city_id != '')
                                                $cities = $this->User_model->getSelectedRegin('cities', $city_id);
                                            ?>
                                            <select class="open_categories" id="city" name="city">
                                                <?php if ($cities) { ?>
                                                    <option value="<?= $cities->id ?>"><?= $cities->name ?></option>
                                                <?php } else { ?>
                                                    <option value="">Select City</option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li class="col-lg-1 col-md-1 col-sm-12 padding-5px">

                                            <button  type="submit" class="button_blue" name="goForCookies" id="goForCookies" style="padding: 10px 18px;">Go</button>

                                        </li>



                                    </ul>

                                </form>

								</div>
								<div class="col-lg-2 col-md-2 col-sm-2">
								
								<ul class="social_btns pull-right">
									<li>
										<a target="_blank" href="https://www.facebook.com/BusinessUp1/" class="icon_btn middle_btn social_facebook tooltip_container"><i class="icon-facebook-1"></i><span class="tooltip top">Facebook</span></a>
									</li>
									<li>
										<a href="https://plus.google.com/111942499114878334046" target="_blank" class="icon_btn middle_btn social_googleplus tooltip_container"><i class="icon-gplus-2"></i><span class="tooltip top">GooglePlus</span></a>
									</li>
									<li>
										<a href="https://twitter.com/brands_valley" target="_blank" class="icon_btn middle_btn  social_twitter tooltip_container"><i class="icon-twitter"></i><span class="tooltip top">Twitter</span></a>
									</li>
									<li>
										<a href="https://www.instagram.com/brandsvalleyinternational/" target="_blank" class="icon_btn middle_btn social_instagram tooltip_container"><i class="icon-instagram-4"></i><span class="tooltip top">Instagram</span></a>
									</li>
								</ul>
								</div>
                            </div><!--/ .main_header_row-->



                        </div><!--/ .row-->



                    </div><!--/ .container-->



                </div><!--/ .bottom_part -->







                <!-- - - - - - - - - - - - - - End of bottom part - - - - - - - - - - - - - - - - -->



                <!-- - - - - - - - - - - - - - Main navigation wrapper - - - - - - - - - - - - - - - - -->



                <div id="main_navigation_wrap">

                    <div class="container-fluid">

						<div class="search-area row">
							<div class="col-lg-2 col-md-2 col-sm-2 deliver">
							  <img src="<?= base_url() . "assets/web/" ?>images/map-icon.png" alt="search pointer" class="pull-left" style="margin-right: 10px;">
							  <p class="pull-left" style="color:#ffffff;">
								Deliver to<br><strong style="font-size: 20px;">Pakistan</strong>
							  </p>
							</div>
                            <div class="col-lg-2 col-md-2 col-sm-2 main-menu-cat">
                            <nav class="wsmenu clearfix">
                                
                                         <ul class="mobile-sub wsmenu-list">
                   
                                  
                                  <li><a href="#" class="navtext"><span>Shop By</span> <span>Department</span></a>
                                  
                                     <div class="wsshoptabing wstfullmenubg01 clearfix" id="allcategories">
                                        <div class="wsshoptabingwp clearfix">
                                        
                                        
                                      <ul class="wstabitem clearfix">
                                         <?php
                                         $index=1;
                                          foreach ($department as $depkey => $depvalue  ) { 
                                                ?>
                                            <?php foreach ($depvalue as $catProductFkey=>$catProductFVal){ ?>
                                        <?php   $catArray = explode('/', $catProductFkey); 
                                                $catName = $catArray[0]; 
                                                $catId = $catArray[1]; 
                                                $iconClass = $catArray[2]; 
                                                ?>
                                          <li class="<?=($index==1?'wsshoplink-active':'')?>"><a href="#wstabcontent<?=$catId?>"><i class="<?=($iconClass?$iconClass:'fa fa-male')?>" ></i> <?=$catName?></a></li>
                                      <?php $index++; }
                                      } ?>
                                      </ul>
                                        <div class="wstabcontent clearfix">
                                            <?php foreach ($department as $depkey => $depvalue  ) { 
                                                ?>
                                            <?php foreach ($depvalue as $catProductFkey=>$catProductFVal){ 
                                                // echo "<pre>"; var_dump($catProductFVal); 
                                                $catArray = explode('/', $catProductFkey); 
                                                $catId = $catArray[1]; 
                                                 ?>
                                            <div id="wstabcontent<?=$catId?>" class="wsshoptab-active clearfix">
                                                <div class="wstmegamenucoll clearfix">
                                                    <div class="row">
                                                        
                                                             <?php foreach ($catProductFVal as $finalKey ){
                                                // echo "<pre>"; var_dump($finalKey);
                                                             if($finalKey['subcat_title']){     ?>
                                                             <style type="text/css">
                                                                 .wstmenutag.greentag:after {
                                                                    border-color: transparent <?php echo $finalKey['badge_color'];  ?> transparent transparent !important;
                                                                }
                                                             </style> 
                                                        <div class="col-sm-4 col-md-4 col-lg-4 p_design">
                                                            <p><a href="#"><?= $finalKey['subcat_title']?><?= ($finalKey['badge_text']?'<span class="wstmenutag greentag" style="background-color:'.$finalKey['badge_color'].'">'.$finalKey['badge_text'].'</span>':'')?></a></p>
                                                            <?php if ($subCat) {?>
                                                            <p><a href="">dsfasdf</a></p>
                                                           <?php } ?>
                                                        </div>
                                                        <?php } 
                                                         } ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                             <?php  }
                                      } ?>
                                            
                                             </div>
                                         
                                        
                                        
                                        </div>
                                        </div>
                                        
                                        
                                  </li>
                                </ul>
                            </nav>
           
                            
                            </div>
							<div class="col-lg-5 col-md-6 col-sm-6 searching">
							
                                    <form method="get" id="searchForm" action="<?= base_url() ?>home/search/" class="clearfix search">

                                      

                                        <div class="search_category alignleft">

                                            <select class="open_categories" name="getCategory" id="getCategory" required="required">

                                                <option value="">Select Categories</option>

                                                <?php

                                                foreach ($Categories as $cat) {

                                                    ?>

                                                    <option value="<?= $cat['ID'] ?>" class="animated_item"<?=($cat['ID']==$_GET['getCategory']?'SELECTED':'')?>><?= $cat['cat_title'] ?></option>

                                                <?php } ?>

                                            </select>

                                        </div><!--/ .search_category.alignleft-->
										<!-- <input type="text" name="title" tabindex="1" placeholder="Search..." class="alignleft" required=""> -->
                                        <input list="browserss" type="text" name="browser" placeholder="Search..." class="alignleft" id="searchdatalist">
                                         
                                          <!-- <input type="submit"> -->

                                        <button type="submit" class="button_blue def_icon_btn alignleft"></button>

                                         <datalist id="browserss">
                                            
                                           <!--  <option value="Internet Explorer">
                                            <option value="Firefox">
                                            <option value="Chrome">
                                            <option value="Opera">
                                            <option value="Safari"> -->
                                          </datalist>

                                    </form><!--/ #search-->
                            </div>

                            <div class="col-lg-3 col-sm-3 login-sec">
                                    <!-- - - - - - - - - - - - - - End of wishlist & compare counters - - - - - - - - - - - - - - - - -->
							  <p class="pull-right" style="color:#ffffff;">
								<ul class="loginbar">
										<li><a class="small_link"><b>Hello,</b></a></li>
							
                                        <?php if ($this->session->userdata('user_loggedin')) { ?>







                                            <li><a href="<?= base_url(); ?>home/dashboard">My Account</a></li>







                                            <li><a class="small_link" href="<?= base_url(); ?>home/logout">Sign Out</a></li>







                                        <?php } ?>







                                        <?php if (!$this->session->userdata('user_loggedin')) { ?>







                                            <li> <a class="small_link" href="<?= base_url(); ?>home/login">Login</a></li>







                                            <li><a class="small_link" href="<?= base_url(); ?>home/register">Register</a></li>



                                        <?php } ?>
									</ul>
									   
							  </p>
                                </div><!--/ [col]-->
						</div>

                    </div><!--/ .container-->



                </div><!--/ .main_navigation_wrap-->



                <!-- - - - - - - - - - - - - - End of main navigation wrapper - - - - - - - - - - - - - - - - -->



            </header>
			

            <h1>this is content of the page</h1>

            

<!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

<hr>

<!-- - - - - - - - - - - - - - Footer section - - - - - - - - - - - - - - - - -->

<div class="footer_section">

                    <div class="container">

                        <div class="row">

                            <div class="col-md-3 col-sm-6">

                                <!-- - - - - - - - - - - - - - About us widget- - - - - - - - - - - - - - - - -->

                                <section class="widget">

                                    <h4>About Us</h4>

                                    <p class="about_us">
                                    Brands Valley is an advertising platform targetting clients either local or international who are looking for all kinds of branding. Brands Valley looks forward to companies or local businesses which are very quality conscious and we are aiming to provide extremely powerful concepts and techniques of advertisements for our clients.
                                    </p>
                                    <a href="<?= base_url() ?>" class="logo">
                                    <img src="<?= base_url() . "assets/web/" ?>images/footer-logo.png" alt="Brands Valley">
                                    </a>
                                </section>
                                
                                <!-- - - - - - - - - - - - - - End of about us widget - - - - - - - - - - - - - - - - -->

                            </div><!--/ [col]-->

                            <div class="col-md-2 col-sm-6">

                                <!-- - - - - - - - - - - - - - Information widget - - - - - - - - - - - - - - - - -->

                                <section class="widget">

                                    <h4>Information</h4>

                                    <ul class="list_of_links">

                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms &amp; Conditions</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">FAQ</a></li>

                                    </ul>

                                </section><!--/ .widget-->
                                
                                <!-- - - - - - - - - - - - - - End of information widget - - - - - - - - - - - - - - - - -->
                            
                            </div><!--/ [col]-->

                            <div class="col-md-2 col-sm-6">

                                <!-- - - - - - - - - - - - - - Extras widget - - - - - - - - - - - - - - - - -->

                                <section class="widget">

                                    <h4>Extras</h4>

                                    <ul class="list_of_links">

                                        <li><a href="#">Brands</a></li>
                                        <li><a href="#">Gift Vouchers</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Deals</a></li>

                                    </ul>

                                </section><!--/ .widget-->

                                <!-- - - - - - - - - - - - - - End of extras widget - - - - - - - - - - - - - - - - -->

                            </div><!--/ [col]-->

                            <div class="col-md-2 col-sm-6">

                                <!-- - - - - - - - - - - - - - My account widget - - - - - - - - - - - - - - - - -->

                                <section class="widget">

                                    <h4>My Account</h4>

                                    <ul class="list_of_links">

                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>

                                    </ul>

                                </section><!--/ .widget-->

                                <!-- - - - - - - - - - - - - - End my account widget - - - - - - - - - - - - - - - - -->

                            </div>

                            <div class="col-md-3 col-sm-6">

                                <!-- - - - - - - - - - - - - - Blog widget - - - - - - - - - - - - - - - - -->

                                <section class="widget">

                                    <h4>Contact Human Resources</h4>
                                    <ul class="list_of_infoblocks">

                                        <li>
                                            <i class="icon-location-1"></i>
                                            <h6>Address:</h6>
                                            <p>65 Main Road, PO BOX 28, PAK
                                            Kaiapoi 7442, Chirstal NZ</p>
                                        </li>

                                        <li>
                                            <i class="icon-phone"></i>
                                            <h6>Call Free</h6>
                                            <p>+ 92 332 400 1729</p>
                                            <p>+ 92 301 427 8992</p>
                                        </li>

                                        <li>
                                            <i class="icon-mail-1"></i>
                                            <h6>Email:</h6>
                                            <p>info@brandsvalley.net</p>
                                        </li>

                                    </ul>

                                </section><!--/ .widget-->

                                <!-- - - - - - - - - - - - - - End of blog widget - - - - - - - - - - - - - - - - -->

                            </div><!--/ [col]-->

                        </div><!--/ .row-->

                    </div><!--/ .container -->

                </div>

<div class="footer_section_2 align_center copyright-section">



    <div class="container">





        <!-- - - - - - - - - - - - - - Footer navigation - - - - - - - - - - - - - - - - -->
        <div class="copyright-sec">
        <p class="copyright" style="margin-bottom:0px;">Copyright &copy; <? date('y') ?></p>

        <nav class="footer_nav" style="margin-bottom:0px;">



            <ul class="bottombar">


<li><a href="<?= base_url(); ?>home">Brands Valley</a></li>
<li><a href="<?= base_url(); ?>home/TermsofService">Terms of services</a></li>
<li><a href="<?= base_url(); ?>home/TermsofService">Privacy Policy</a></li>



            </ul>



        </nav>

    <p class="copyright pull-left" style="margin-bottom:0px;">All Rights Reserved.</p>
    </div>


    </div><!--/ .container -->



</div><!--/ .footer_section-->



<!-- - - - - - - - - - - - - - End footer section - - - - - - - - - - - - - - - - -->



</footer>



<!-- - - - - - - - - - - - - - End Footer - - - - - - - - - - - - - - - - -->



</div><!--/ [layout]-->



<!-- - - - - - - - - - - - - - End Main Wrapper - - - - - - - - - - - - - - - - -->

<!-- Include Libs & Plugins

   

============================================ -->

<!-- model -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog cus-popup" role="document">
    <div class="modal-content">
    <div class="close-mod">
    <button type="button" class="button-mod" data-dismiss="modal"></button>
    </div>
      <div class="modal-body">
    <div class="prod-info-up">

        <!-- - - - - - - - - - - - - - Product image column - - - - - - - - - - - - - - - - -->

        <div class="col-sm-6 image_col">
<div id="emptyMsg"></div>
            <img id="modelImgProduct" class="center-block" src="" alt="">

        </div>

        <!-- - - - - - - - - - - - - - End of product image column - - - - - - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Product description column - - - - - - - - - - - - - - - - -->

        <div class="col-sm-6 dis-pro">
            <p id="productCtaModelTitle"></p>
            <h3><a  id="productModelTitle" href="#"></a></h3>

            <div class="description_section v_centered">

                <!-- - - - - - - - - - - - - - Product rating - - - - - - - - - - - - - - - - -->
            
                <ul class="rating">

                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li></li>
                    <li></li>

                </ul>
                <!-- - - - - - - - - - - - - - End of product rating - - - - - - - - - - - - - - - - -->

                <!-- - - - - - - - - - - - - - Reviews menu - - - - - - - - - - - - - - - - -->

                <ul class="topbar">

                    <li><a href="#" id="productModelCount"></a></li>

                </ul>

                <!-- - - - - - - - - - - - - - End of reviews menu - - - - - - - - - - - - - - - - -->

            </div>
                <p id="descriptions"></p>   

            <!-- <p class="product_price">$9.98 - $16.49</p> -->


            <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

            <div class="buttons_row">
                <a href="" class="middle_btn" id="detalPageLink">See product details</a>

            </div>

            <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

        </div>

        <!-- - - - - - - - - - - - - - End of product description column - - - - - - - - - - - - - - - - -->

      
      </div>
      <div class="cus-bought animated transparent" data-animation="fadeInDown">
                                <div class="col-sm-12">

                                    <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->
                                    
                                    <!-- <h1>Customers also bought</h1> -->

                                    <!-- - - - - - - - - - - - - - End banner - - - - - - - - - - - - - - - - -->


                            </div><!--/ [col]-->

                            <div class="col-sm-3 col-sm-offset-1">


                                    <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->
                                    
                                    <a href="#" class="banner">
                                        <img class="center-block" id="modelImgProduct1" src="" alt="">
                                    </a>

                                    <!-- - - - - - - - - - - - - - End banner - - - - - - - - - - - - - - - - -->


                            </div><!--/ [col]-->

                            <div class="col-sm-3">


                                    <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->

                                    <a href="#" class="banner">
                                        <img class="center-block" id="modelImgProduct2" src="" alt="">
                                    </a>

                                    <!-- - - - - - - - - - - - - - End banner - - - - - - - - - - - - - - - - -->

                            </div><!--/ [col]-->

                            <div class="col-sm-3">


                                    <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->
                                    
                                    <a href="#" class="banner">
                                        <img class="center-block" id="modelImgProduct3" src="" alt="">
                                    </a>

                                    <!-- - - - - - - - - - - - - - End banner - - - - - - - - - - - - - - - - -->


                            </div><!--/ [col]-->
                            
    
        </div>
    </div>

    </div>
  </div>
</div>
<!-- model -->
<script type="text/javascript">
function changeImage(element) {
document.getElementById('imageReplace').src = element;
}
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            /*    includedLanguages: 'fr,ru,en,ur',*/
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
            multilanguagePage: true,
            gaTrack: true,
            gaId: 'UA-XXXXX-X'},
        'google_translate_element');
    }

</script>

<script>
    var base_url = '<?= base_url() ?>';
</script>

<script src="<?= base_url() . "assets/web/" ?>js/jquery-2.1.1.min.js"></script>

<script>

$(document).ready(function ($) {
    size_li = $("#menus > li").size();
    console.log(size_li);
    value=7;
    $('#menus > li:lt('+value+')').show();
    $('#loadMore').click(function () {
        x=size_li;
        $('#menus > li:lt('+x+')').show();
        $('#loadMore').hide();
        $('#showLess').show();
    });
    $('#showLess').click(function () {
        x=size_li-value;
        $('#menus > li').not(':lt('+value+')').hide();
        $('#loadMore').show();
        $('#showLess').hide();
    });

    $(function(){
        $('#paymentMethod').change(function(){
            // alert('kjgkghk'); 
            var paymentMethod = $(this).val();
            var content ;
            if(paymentMethod==0){
                content = '';
            }
            if(paymentMethod=='jazzCash'){
                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" name="amount" placeholder=></div><div class="form-group"><label class="control-label">Transaction ID</label><div class="bv-slect-opt"><input maxlength="100" type="text" required="required" name="txnId" class="form-control" placeholder=></div></div><div class="form-group"><label class="control-label">Deposit Date</label><div class="bv-slect-opt"><input type="date" name="depositDate" required="required" class="form-control" placeholder=></div></div>';
                            
            }
            if(paymentMethod=='easyPesa'){
                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" name="amount" placeholder=></div><div class="form-group"><label class="control-label">Transaction ID</label><div class="bv-slect-opt"><input maxlength="100" type="text" required="required" name="txnId" class="form-control" placeholder=></div></div><div class="form-group"><label class="control-label">Deposit Date</label><div class="bv-slect-opt"><input type="date" name="depositDate" required="required" class="form-control" placeholder=></div></div>';
                            
            }
            if(paymentMethod=='uPesa'){
                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" name="amount" placeholder=></div><div class="form-group"><label class="control-label">Transaction ID</label><div class="bv-slect-opt"><input maxlength="100" type="text" required="required" name="txnId" class="form-control" placeholder=></div></div><div class="form-group"><label class="control-label">Deposit Date</label><div class="bv-slect-opt"><input type="date" name="depositDate" required="required" class="form-control" placeholder=></div></div>';
                            
            }
            if(paymentMethod=='ublOmni'){
                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" name="amount" placeholder=></div><div class="form-group"><label class="control-label">Transaction ID</label><div class="bv-slect-opt"><input maxlength="100" type="text" required="required" name="txnId" class="form-control" placeholder=></div></div><div class="form-group"><label class="control-label">Deposit Date</label><div class="bv-slect-opt"><input type="date" name="depositDate" required="required" class="form-control" placeholder=></div></div>';
                            
            }
            if(paymentMethod=='Paypal'){


                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" placeholder=></div><div class="form-group"><label class="control-label">Deposit Method</label><div class="bv-slect-opt"><select class="form-control"><option>Direct Deposit in bank Branch</option><option>Cash Paid</option><option>Not Deposited</option></select></div></div><div class="form-group"><label class="control-label">Bank in which deposit was made</label><div class="bv-slect-opt"><select class="form-control"><option>UBL Bank</option><option>HBL Bank</option><option>Bank AlFalah</option><option>MCB Bank</option><option>Habib Metro Bank</option></select></div></div><div class="form-group"><label class="control-label">Branch from which Deposit was made</label><input maxlength="100" type="text" required="required" class="form-control" placeholder=></div><div class="form-group"><label class="control-label">Date of Deposit</label><input type="date" class="form-control" id="pref_date"></div><input style="display:none;" type="checkbox" id="scd" name="safe" checked /><label for="scd"><span></span><b style="color:blue">Save Credit Information for the next time.</b></label><br/><p class="color">This will enable instant checkout in future <a href="#" style="color:red">Read More</a>.</p>';
                            
            }
            if(paymentMethod=='Stripe'){
                content = '<div class="form-group"><label class="control-label">Amount Deposited</label><input maxlength="100" type="text" required="required" class="form-control" placeholder=></div><div class="form-group"><label class="control-label">Deposit Method</label><div class="bv-slect-opt"><select class="form-control"><option>Direct Deposit in bank Branch</option><option>Cash Paid</option><option>Not Deposited</option></select></div></div><div class="form-group"><label class="control-label">Bank in which deposit was made</label><div class="bv-slect-opt"><select class="form-control"><option>UBL Bank</option><option>HBL Bank</option><option>Bank AlFalah</option><option>MCB Bank</option><option>Habib Metro Bank</option></select></div></div><div class="form-group"><label class="control-label">Branch from which Deposit was made</label><input maxlength="100" type="text" required="required" class="form-control" placeholder=></div><div class="form-group"><label class="control-label">Date of Deposit</label><input type="date" class="form-control" id="pref_date"></div><input style="display:none;" type="checkbox" id="scd" name="safe" checked /><label for="scd"><span></span><b style="color:blue">Save Credit Information for the next time.</b></label><br/><p class="color">This will enable instant checkout in future <a href="#" style="color:red">Read More</a>.</p>';
                            
            }
            
            $('#paymentfirm').html('');
            $('#paymentfirm').html(content);
        })
    })
});
///////
$('.quickViewToModelId').click(function(){
        var productId = $(this).attr('data-productId');
        console.log(productId); 
        $.post('<?=base_url()?>Home/getProductDetail/'+productId, function(resp){
            resp = $.parseJSON(resp);
            // console.log(resp);
            if(resp){
            $('#modelImgProduct').attr('src','');
            $('#modelImgProduct1').attr('src','');
            $('#modelImgProduct2').attr('src','');
            $('#modelImgProduct3').attr('src','');
            $('#productModelTitle').attr('href','');
            $('#productSeeDetailBtn').attr('href','');
            $('#productModelTitle').html('');
            $('#descriptions').html('');
            $('#productModelCount').html('');
            $('#productCtaModelTitle').html('');
            $('#detalPageLink').attr('href', '');
            $('#emptyMsg').html('');
            $('#modelImgProduct').attr('src', '<?= base_url()?>assets/images/'+resp.image_1);
            $('#modelImgProduct1').attr('src', '<?= base_url()?>assets/images/'+resp.image_1);
            $('#modelImgProduct2').attr('src', '<?= base_url()?>assets/images/'+resp.image_2);
            $('#modelImgProduct3').attr('src', '<?= base_url()?>assets/images/'+resp.image_3);
            $('#productModelTitle').attr('href', '<?= base_url()?>products/'+cleanString(resp.name)+'/'+resp.id);
            $('#productSeeDetailBtn').attr('href', '<?= base_url()?>products/'+cleanString(resp.name)+'/'+resp.id);
            $('#productModelTitle').html(resp.name);
            $('#descriptions').html(resp.des);
            $('#productModelCount').html(resp.counts);
            $('#productCtaModelTitle').html(resp.categoryName);
            $('#detalPageLink').attr('href', '<?= base_url()?>products/'+cleanString(resp.name)+'/'+resp.id);
            }
            else
            {
                $('#modelImgProduct').attr('src','');
                $('#modelImgProduct1').attr('src','');
                $('#modelImgProduct2').attr('src','');
                $('#modelImgProduct3').attr('src','');
            $('#productModelTitle').attr('href','');
            $('#productSeeDetailBtn').attr('href','');
            $('#productModelTitle').html('');
            $('#productModelCount').html('');
            $('#productCtaModelTitle').html('');
            $('#detalPageLink').attr('href', '');
            $('#emptyMsg').html('<p class="text-center text-danger">No data available</p>');
            }
            // console.log(resp); return;
        });
    });
    $('#modelImgProduct2').click(function(){
        var img_src = $(this).attr('src');
        $('#modelImgProduct').attr('src', '');
        $('#modelImgProduct').attr('src', img_src);
        // alert(img_src); return;
    })
    $('#modelImgProduct1').click(function(){
        var img_src = $(this).attr('src');
        $('#modelImgProducts').attr('src', '');
        $('#modelImgProducts').attr('src', img_src);
        // alert(img_src); return;
    })
    $('#modelImgProduct3').click(function(){
        var img_src = $(this).attr('src');
        $('#modelImgProducts').attr('src', '');
        $('#modelImgProducts').attr('src', img_src);
        // alert(img_src); return;
    })
    $('.modelImgProducts3').click(function(){
        var img_src = $(this).attr('src');
        // alert(img_src); return;
        $('.modelImgProducts').attr('src', '');
        $('.modelImgProducts').attr('src', img_src);
        $('.modelImgProducts').attr('data-zoom-image', '');
        $('.modelImgProducts').attr('data-zoom-image', img_src);
     })
    
    $('#searchdatalist').keyup(function(){
        var keywords = $(this).val();
        var cat_id = $('#getCategory').val();
        if(cat_id=='')
        {
            alert('Please Select A Category first');
            $('#getCategory').focus();
            return false;

        }
        
        $.post('<?=base_url()?>Home/getProductNameList/'+keywords+'/'+cat_id, function(resp){
            resp = $.parseJSON(resp);
            $('#browserss').html("");
            $('#browserss').html(resp);
            console.log(resp);
        });
    })

///////////
function cleanString(str)
{
    var newStr = str.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,'-');
    newStr = newStr.toLowerCase();
    newStr = newStr.split(' ').join('-');
    return newStr;
}
$('.add_to_cart').click(function(){
    var product_id      = $(this).attr('data-id');
    var cat_id          = $(this).attr('data-cat');
    var product_name    = $(this).attr('data-name');
    var img             = $(this).attr('data-img');
    var price           = $(this).attr('data-price');
    var qty             = $(this).attr('data-qty');

        // console.log(qty); return;
    $.post('<?=base_url()?>Home/cart', 
        {
            product_id:product_id, 
            cat_id:cat_id, 
            // brand_name:brand_name, 
            product_name:product_name, 
            // b_year:b_year,
            img:img, 
            price:price, 
            qty:qty 
        }, function(resp){
            resp = $.parseJSON(resp)
            if(resp.status == 'ok')
            {
                // $('.addtocartmsg').html('');
                // $('.addtocartmsg').show(500);
                window.location = "<?=base_url()?>";
            }

        })
})
</script>
<script type="text/javascript">
    $(function(){
        $('#signupCountry').change(function(){
            var countryId = $(this).val();
            // alert(countryId);
            $.post('<?=base_url()?>Home/getStatesByCountryId',{countryId:countryId}, function(resp){
                resp=$.parseJSON(resp);
                $('#signupState').html('');
                $('#signupState').html(resp.data);
                
            })
        });
        $('#signupState').change(function(){
            var stateId = $(this).val();
            $.post('<?=base_url()?>Home/getCityByStateId',{stateId:stateId}, function(resp){
                resp=$.parseJSON(resp);
                $('#signupCity').html('');
                $('#signupCity').html(resp.data);
                
            })
        });
        $('#saveDtaForSignup').click(function(){
            var customerType = $("input[name='pay']:checked"). val();
            
            var FirstName = $("input[name=FirstName]"). val();
            
            var lastName = $("input[name=lastName]"). val();
            
            var Email = $("input[name=Email]"). val();
            
            var Password = $("input[name=Password]"). val();
            

            var confirm = $("input[name=ConfirmPassword]"). val();
            var DOBMonth = $("#DOBMonth"). val();
            var DOBDay = $("#DOBDay"). val();
            var DOBYear = $("#DOBYear"). val();
                
            var gender = $("input[name='gender']:checked"). val();
            var signupCountry = $("#signupCountry"). val();
                
            var signupState = $("#signupState"). val();
                
            var signupCity = $("#signupCity"). val();
                
            var ZipCode = $("input[name='ZipCode']"). val();
                
            var Telephone = $("input[name='Telephone']"). val();
            var Address = $("textarea[name='address']"). val();
                
            $.post('<?=base_url()?>Home/insertSignupData',{
                customerType            :               customerType, 
                FirstName               :               FirstName, 
                lastName                :               lastName, 
                Email                   :               Email, 
                Password                :               Password, 
                confirm                 :               confirm, 
                DOBMonth                :               DOBMonth, 
                DOBDay                  :               DOBDay, 
                DOBYear                 :               DOBYear, 
                gender                  :               gender, 
                signupCountry           :               signupCountry,
                signupState             :               signupState, 
                signupCity              :               signupCity, 
                ZipCode                 :               ZipCode, 
                Telephone               :               Telephone,
                address                 :               Address
            }, function(resp){
                resp = $.parseJSON(resp);
                console.log(resp.data); 
                if(resp.data['status']=='200')
                {
                    // userIdSignup
                $("input[name='userIdSignup']"). val(resp.data['id']);

                }
                else
                {
                    if(resp.data['id']=='dup'){
                        var msg = 'Email Already in use please try an other one';
                    }else{
                        var msg = 'something went wrong please try again';
                    }
                    alert(msg);
                    return false;
                }
            })
            
            //alert(FirstName);
        



        })
    }) //onLoad
     function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
</script>

<!-- Bootstrap  -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- Include Libs & Plugins

============================================ -->

<script src="<?= base_url() . "assets/web/" ?>js/queryloader2.min.js"></script> 

<script src="<?= base_url() . "assets/web/" ?>js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/jquery.appear.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/owlcarousel/owl.carousel.min.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/jquery.countdown.plugin.min.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/jquery.countdown.min.js"></script>

<!--         <script src="<?= base_url() . "assets/web/" ?>twitter/jquery.tweet.min.js"></script> -->

<script src="<?= base_url() . "assets/web/" ?>js/colorpicker/colorpicker.js"></script>

<script src="<?= base_url() . "assets/web/" ?>js/retina.min.js"></script>
<script src="<?= base_url() . "assets/admin/js/jquery.blockUI.js" ?> "></script>
<script src="<?= base_url() . "assets/web/js/webcustom.js" ?> "></script>


<!--<script src="<?= base_url() . "assets/web/js/custom.js" ?> "></script>-->


<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js"></script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Theme files============================================ -->
<script type='text/javascript' src='<?= base_url() . "assets/web/" ?>plugins/menu/js/webslidemenu.js'></script>
<script type='text/javascript' src='<?= base_url() . "assets/web/" ?>plugins/zoom/jquery.elevatezoom.js'></script>
<script src="<?= base_url() . "assets/web/" ?>js/theme.plugins.js"></script>
<script src="<?= base_url() . "assets/web/" ?>js/theme.core.js"></script>
<script src="<?= base_url() . "assets/web/" ?>js/arcticmodal/jquery.arcticmodal.js"></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-common-libraries.js'></script>   
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-functions.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-thumbsgeneral.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-thumbsstrip.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-touchthumbs.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-panelsbase.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-strippanel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-gridpanel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-thumbsgrid.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-tiles.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-tiledesign.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-avia.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-slider.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-sliderassets.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-touchslider.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-zoomslider.js'></script> 
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-video.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-gallery.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-lightbox.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-carousel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/js/ug-api.js'></script>
<script type='text/javascript' src='<?= base_url() ?>assets/unitegallery/themes/default/ug-theme-default.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?= base_url() . "assets/web/plugins/product-quick-view-master/" ?>js/velocity.min.js"></script>
<script src="<?= base_url() . "assets/web/plugins/product-quick-view-master/" ?>js/main.js"></script> <!-- Resource jQuery -->
<script>
//initiate the plugin and pass the id of the div containing gallery images
$("#zoom_03").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: ''}); 

//pass the images to Fancybox
$("#zoom_03").bind("click", function(e) {  
  var ez =   $('#zoom_03').data('elevateZoom'); 
    $.fancybox(ez.getGalleryList());
  return false;
});
</script>
<script>
    $('#country_2').select2({
        placeholder: 'Select Countries'
    });

    $('#states_2').select2({
        placeholder: 'Select States'
    });

    $('#city_2').select2({
        placeholder: 'Select Cities'
    });


</script>
<script type = "text/javascript" >
    jQuery(document).ready(function () {

        jQuery("#gallery").unitegallery({
            theme_enable_text_panel: false,
        });


    });
</script>
<script>
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});

</script>
</body>

</html>

