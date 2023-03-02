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






		<link rel="stylesheet" href="<?= base_url() . "assets/web/" ?>plugins/menu/css/webslidemblmenu.css">
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
										<a target="_blank" href="https://www.facebook.com/BusinessUp1/" class="icon_btn middle_btn social_facebook"><i class="icon-facebook-1"></i></a>
									</li>
									<li>
										<a href="https://plus.google.com/111942499114878334046" target="_blank" class="icon_btn middle_btn social_googleplus"><i class="icon-gplus-2"></i></a>
									</li>
									<li>
										<a href="https://twitter.com/brands_valley" target="_blank" class="icon_btn middle_btn  social_twitter"><i class="icon-twitter"></i></a>
									</li>
									<li>
										<a href="https://www.instagram.com/brandsvalleyinternational/" target="_blank" class="icon_btn middle_btn social_instagram"><i class="icon-instagram-4"></i></a>
									</li>
								</ul>
								</div>
                            </div><!--/ .main_header_row-->



                        </div><!--/ .row-->



                    </div><!--/ .container-->



                </div><!--/ .bottom_part -->







                <!-- - - - - - - - - - - - - - End of bottom part - - - - - - - - - - - - - - - - -->



                <!-- - - - - - - - - - - - - - Main navigation wrapper - - - - - - - - - - - - - - - - -->


				<div class="um_menu" style="position: relative;">	
					<div class="container-fluid">
						<div class="nav-locale-us nav-lang-en nav-ssl nav-unrec nav-opt-sprite umer"> 
						<div id="navbar" role="navigation" class="nav-sprite-v1 nav-bluebeacon search-area row"> 
							<div id="nav-belt"> 
								<div id="nav-flyout-anchor">
									<div id="nav-flyout-shopAll" class="nav-catFlyout nav-flyout" style="display: none; position: absolute; top: 43px; left: 375px;">
										<div class="nav-arrow" style="position: absolute; left: 99.5781px;">
											<div class="nav-arrow-inner"></div>
										</div>
										<div class="nav-template nav-flyout-content nav-tpl-itemList">
                                        <?php foreach ($categories as $category): ?>
                                            
                                            <span class="nav-hasPanel nav-item"> 
                                                <span class="nav-text"><?=$category['cat_title']?></span> 
                                            </span> 
                                        <?php endforeach ?>
                                        <!-- 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text">Amazon Music</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text">Appstore for Android</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text">Echo &amp; Alexa</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text">Fire Tablets</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text" >Fire TV</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text" >Kindle E-readers &amp; Books</span> 
											</span> 
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text" >Books &amp; Audible</span> 
											</span>
											<span class="nav-hasPanel nav-item"> 
												<span class="nav-text" >Electronics, Computers &amp; Office</span> 
											</span>
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text" >Beauty &amp; Health</span> 
											</span> 
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text" >Toys, Kids &amp; Baby</span> 
											</span> 
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text" >Clothing, Shoes &amp; Jewelry</span> 
											</span>
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text" >Sports &amp; Outdoors</span> 
											</span> 
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text" >Automotive &amp; Industrial</span> 
											</span> 
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text">Home Services</span> 
											</span> 
											<span class=" nav-hasPanel nav-item"> 
												<span class="nav-text">Credit &amp; Payment Products</span> 
											</span>  -->
											<!-- <a href="#" class="nav-link nav-carat nav-item"> <i class="nav-icon"></i> 
												<span class="nav-text">Full Store Directory</span> 
											</a>  -->
										</div>
										<div class="nav-subcats" style="height: 525px; overflow: visible; display: block; width: auto;">
											
                                            <div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
												<img src="<?= base_url() . "assets/web/images/ummenu" ?>/video.png" alt="Video" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
												<div class="nav-column nav-column-first"> 
													<span class=" nav-title nav-item"> 
														<span class="nav-text">Amazon Video</span> 
													</span> 
													<div class="nav-panel"> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All Videos</span> 
															<span class="nav-subtext">All TV shows, movies, and more</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Included with Prime</span> 
															<span class="nav-subtext">Amazon Originals, exclusives, and more</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Amazon Channels</span> 
															<span class="nav-subtext">HBO, SHOWTIME, STARZ, and more</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Rent or Buy</span> 
															<span class="nav-subtext">New releases, latest seasons, and more</span> 
														</a> 
														<div class="nav-divider">
														</div> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Your Watchlist</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Your Video Library</span> 
														</a> 
														<a href="#" class="nav-link nav-item">
															<span class="nav-text">Watch Anywhere</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Getting Started</span> 
														</a> 
													</div> 
												</div>
												<div class="nav-column nav-column-notfirst nav-column-break"> 
													<span class=" nav-title nav-item"> 
														<span class="nav-text">More to Explore</span> 
													</span> 
													<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Originals</span> 
														<span class="nav-subtext">Amazon Original Series and Movies</span> 
													</a> 
													</div> 
												</div>
											</div>
											<!-- <div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2 nav-colcount-0" style="display: none;">
												<img src="<?= base_url() . "assets/web/images/ummenu" ?>/music.png" alt="Music" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 517px;">
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Stream Music</span> 
												</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Music Unlimited</span> 
													<span class="nav-subtext">Stream tens of millions of songs with weekly new releases</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Prime Music</span> 
													<span class="nav-subtext">Prime members can stream a growing selection of 2 million songs - all ad-free</span> 
												</a> 
												<div class="nav-divider">
												</div> 
												<a href="#" class="nav-link nav-item" target="_blank"> 
													<span class="nav-text">Open Web Player</span> 
													<span class="nav-subtext">music.amazon.com</span> 
												</a> 
											</div> 
											<div class="nav-divider">
											</div> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Buy Music</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">CDs &amp; Vinyl</span> 
													<span class="nav-subtext">Purchase millions of albums and vinyl records</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Download Store</span> 
													<span class="nav-subtext">Buy albums and songs</span> 
												</a> 
											</div> 
										</div> -->
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2 nav-colcount-0" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/appstore.png"class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 522px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Appstore for Android</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">All Apps and Games </span> 
													<span class="nav-subtext">Shop over 800,000 apps and games</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Games</span> 
													<span class="nav-subtext">Shop new, bestselling, and free games</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Coins</span> 
													<span class="nav-subtext">Spend Less, Play More</span> 
												</a> 
												<div class="nav-divider"></div> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Download Amazon Appstore</span> 
														<span class="nav-subtext">Install on your Android phone</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Amazon Apps</span> 
														<span class="nav-subtext">Kindle, Shopping, MP3, IMDb, and more</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Your Apps and Devices</span> 
														<span class="nav-subtext">View your apps and manage your devices</span> 
													</a> 
											</div> 
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/ecko.png" class="nav-promo" style="bottom: -24px; right: -15px; width: 498px; height: 557px;"> 
										<div class="nav-column nav-column-first"> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Echo &amp; Alexa</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">All-New Echo</span> 
													<span class="nav-subtext">Always ready, connected, and fast</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Introducing Echo Plus</span> 
													<span class="nav-subtext">With built-in smart home hub</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Echo Dot</span> 
													<span class="nav-subtext">Add Alexa to any room</span> 
												</a> 
												<div class="nav-divider"></div>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Introducing Echo Spot</span> 
													<span class="nav-subtext">Stylish, compact Echo with a screen</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Echo Show</span> 
													<span class="nav-subtext">Now Alexa can show you things</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Echo Look</span> 
													<span class="nav-subtext">Love your look. Every day.</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">See all devices with Alexa</span> 
													<span class="nav-subtext">Compare devices, learn about Alexa, and more</span> 
												</a> 
											</div> 
										</div>
										<div class="nav-column nav-column-notfirst nav-column-break"> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Content &amp; Resources</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Meet Alexa</span> 
													<span class="nav-subtext">Discover all the things you can do with Alexa</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Alexa App</span> 
													<span class="nav-subtext">For Fire OS, Android, iOS, and desktop browsers</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Alexa Calling and Messaging</span> 
													<span class="nav-subtext">A new way to be together with family and friends</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Alexa Voice Shopping</span> 
													<span class="nav-subtext">Order millions of products and access exclusive&nbsp;deals&nbsp;with Prime</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Alexa Smart Home</span> 
													<span class="nav-subtext">Control smart home devices with Alexa</span> 
												</a> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Alexa Skills</span> 
													<span class="nav-subtext">Personalize your experience with skills</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Music Unlimited</span> 
													<span class="nav-subtext">Stream tens of millions of songs with weekly new releases</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Audible Audiobooks</span> 
													<span class="nav-subtext">Your entire Audible library available on Echo</span> 
												</a> 
											</div> 
										</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/fire.png" alt="Fire" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
												<div class="nav-column nav-column-first"> 
													<span class=" nav-title nav-item"> 
														<span class="nav-text">Fire Tablets</span> 
													</span> 
													<div class="nav-panel"> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire 7</span> 
															<span class="nav-subtext">Our best-selling Fire tablet—now even better</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire HD 8</span> 
															<span class="nav-subtext">Up to 12 hours of battery. Vibrant HD display. Fast performance.</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire HD 10</span> 
															<span class="nav-subtext">1080p Full HD. 32 GB storage. Now with Alexa hands-free.</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire 7 Kids Edition</span> 
															<span class="nav-subtext">If they break it, return it and we’ll replace it. No questions asked.</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire HD 8 Kids Edition</span>
															<span class="nav-subtext">Up to 12 hours of battery. 2X the storage. 8” HD display.Our best kids’ tablet ever.</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Accessories</span> 
															<span class="nav-subtext">Cases, chargers, sleeves and more</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">See all Fire tablets</span> 
															<span class="nav-subtext">Compare tablets, find deals, and more</span> 
														</a> 
													</div> 
												</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Content &amp; Resources</span> 
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Prime Photos</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Amazon Drive</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Prime Video</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Apps &amp; Games</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Digital Music</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Kindle Books</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Kindle Unlimited</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Amazon FreeTime Unlimited</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Newsstand</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Manage Your Content and Devices</span>
													</a> 
												</div> 
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/firetv.png" alt="Fire TV" class="nav-promo" style="bottom: -14px; right: -20px; width: 519px; height: 522px;">								 
												<div class="nav-column nav-column-first"> 
													<span class=" nav-title nav-item"> 
														<span class="nav-text">Watch and Play</span> 
													</span> 
													<div class="nav-panel"> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire TV</span> 
															<span class="nav-subtext">4K Ultra HD and HDR streaming media player with voice remote</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Fire TV Stick</span> 
															<span class="nav-subtext">The next generation of our bestselling Fire TV Stick</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">All-New Fire TV + HD Antenna</span> 
															<span class="nav-subtext">No cable required. Watch TV live. Stream on-demand.</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">Fire TV Edition Smart TVs</span> 
															<span class="nav-subtext">With true-to-life 4K Ultra HD picture quality and Fire TV built in</span> 
														</a> 
														<a href="#" class="nav-link nav-item"> 
															<span class="nav-text">See Fire TV Family</span> 
															<span class="nav-subtext">Compare media players, find deals, and more</span> 
														</a> 
													</div> 
												</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Movies, TV, and Games</span> 
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Prime Video</span> 
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Amazon Video</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Fire TV Apps &amp; Channels</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Games for Fire TV</span> 
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Prime Photos</span> 
													</a>
												</div> 
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/ebooks.png" class="nav-promo" style="bottom: -26px; right: -20px; width: 519px; height: 535px;">
											<div class="nav-column nav-column-first"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Kindle E-readers</span> 
												</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle</span> 
													<span class="nav-subtext">Small, light, and perfect for reading</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle Paperwhite</span> 
													<span class="nav-subtext">Our best-selling Kindle—now even better</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle Voyage</span> 
													<span class="nav-subtext">Passionately crafted for readers</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle Oasis</span> 
													<span class="nav-subtext">Reimagined design. Perfectly balanced.</span>
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle for Kids Bundle</span> 
													<span class="nav-subtext">It's not screen time - it's book time</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Accessories</span>
													<span class="nav-subtext">Covers, chargers, sleeves and more</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">See all Kindle E-readers</span> 
													<span class="nav-subtext">Compare e-readers, find deals, and more</span> 
												</a> 
											</div> 
											<div class="nav-divider"></div> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Kindle Store</span> 
												</span>
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Kindle Books</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Newsstand</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Kindle Unlimited</span> 
														<span class="nav-subtext">Unlimited reading &amp; listening</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Prime Reading</span> 
													</a>
												</div> 
											</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Apps &amp; Resources</span> 
												</span>
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Free Kindle Reading Apps</span> 
														<span class="nav-subtext">For PC, iPad, iPhone, Android, and more</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Kindle Cloud Reader</span> 
														<span class="nav-subtext">Read your Kindle books in a browser</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Manage Your Content and Devices</span> 
													</a> 
												</div> 
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2 nav-colcount-0" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/book.png" alt="A Life" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;"> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Books</span> 
											</span>
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Books</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Children's Books</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">AbeBooks.com</span> 
													<span class="nav-subtext">Rare and collectible books</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Magazines</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Textbooks</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Textbook Rentals</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Sell Us Your Books</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Prime Student</span> 
												</a> 
											</div> 
											<div class="nav-divider"></div> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Kindle Books</span> 
												</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle Books</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kindle Unlimited</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Prime Reading</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Whispersync for Voice</span> 
													<span class="nav-subtext">Switch between reading and listening</span>
												</a> 
											</div> 
											<div class="nav-divider"></div> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Audible Audiobooks</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Audible Membership</span> 
													<span class="nav-subtext">Try Audible &amp; get 2 free audiobooks</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Audible Audiobooks</span> 
												</a> 
											</div> 
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/electronic.png" alt="Get" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
											<div class="nav-column nav-column-first"> 
												<span class=" nav-title nav-item"> 
												<span class="nav-text">Electronics</span> 
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">TV &amp; Video</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Home Audio &amp; Theater</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Camera, Photo &amp; Video</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Cell Phones &amp; Accessories</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Headphones</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Video Games</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Bluetooth &amp; Wireless Speakers</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Car Electronics</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Musical Instruments</span> 
													</a> <a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Wearable Technology</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Electronics Showcase</span> 
													</a> 
												</div> 
											</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Computers</span> 
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Computers &amp; Tablets</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Monitors</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Accessories</span> 
														<span class="nav-subtext">For computers, laptops &amp; tablets</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text"> Networking </span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Drives &amp; Storage</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Computer Parts &amp; Components</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Software</span> 
														<span class="nav-subtext">Downloads, subscriptions &amp; more</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Printers &amp; Ink</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Office &amp; School Supplies</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Trade In Your Electronics</span> 
													</a> 
												</div> 
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/health.png" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Beauty &amp; Health</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="" class="nav-link nav-item"> 
													<span class="nav-text">All Beauty</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Luxury Beauty</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Professional Skin Care</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Salon &amp; Spa</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Men’s Grooming</span> </a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Health, Household &amp; Baby Care</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Vitamins &amp; Dietary Supplements</span> 
												</a> 
											</div> 
											<div class="nav-divider"></div> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Deals &amp; Prime Exclusives</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Subscribe &amp; Save</span> 
													<span class="nav-subtext">Up to 15% off, free shipping, and more</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Prime Pantry</span> 
													<span class="nav-subtext">Everyday essentials in everyday sizes</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Sample Boxes</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Coupons</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Elements</span> 
												</a> 
											</div> 
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/toys.png" alt="toys" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Toys, Kids &amp; Baby</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Toys &amp; Games</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Baby</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Video Games for Kids</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Family</span> 
													<span class="nav-subtext">Prime members save up to 20% on diapersand baby food</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Baby Registry</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Kids Birthdays</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">All-New Fire Kids Edition tablets</span> 
													<span class="nav-subtext">Not a toy, a full-featured Fire tablet</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Launchpad</span> 
													<span class="nav-subtext">Shop innovative new toys</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Elements</span> 
													<span class="nav-subtext">Premium products. Transparent origins. Exclusive to Prime. </span>
												</a> 
											</div> 
											<div class="nav-divider"></div>
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Clothing &amp; Shoes</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">For Girls</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">For Boys</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">For Baby</span> 
												</a> 
											</div> 
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/fashion.png" class="nav-promo" style="bottom: -14px; right: -20px; width: 519px; height: 525px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Amazon Fashion</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Women</span> </a> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Men</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Girls</span> 
												</a> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Boys</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Baby</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Luggage</span> 
												</a> 
											</div> 
											<div class="nav-divider"></div> 
											<span class=" nav-title nav-item"> 
												<span class="nav-text">More to Explore</span> 
											</span> 
											<div class="nav-panel">
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Our Brands</span> 
													<span class="nav-subtext">Exclusively for Amazon Prime customers</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Shopbop.com</span> 
													<span class="nav-subtext">Eligible for Amazon Prime shipping benefits</span>
												</a> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">EastDane.com</span>
													<span class="nav-subtext">Eligible for Amazon Prime shipping benefits</span> 
												</a> 
											</div> 
										</div>
									
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/outdoors.png" alt="NFL" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
											<div class="nav-column nav-column-first"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Sports</span>
												</span> 
												<div class="nav-panel">
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Athletic Clothing</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Exercise &amp; Fitness</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Hunting &amp; Fishing</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Team Sports</span> 
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Fan Shop</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Golf</span> 
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Leisure Sports &amp; Game Room</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Sports Collectibles</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">All Sports &amp; Fitness</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">New Gear Innovations</span> 
														<span class="nav-subtext">Shop Amazon Launchpad</span> 
													</a> 
												</div> 
											</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Outdoors</span> 
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Camping &amp; Hiking</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Cycling</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Outdoor Clothing</span>
													</a>
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Scooters, Skateboards &amp; Skates</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Water Sports</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Winter Sports</span> 
													</a> 
														<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Climbing</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Accessories</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">All Outdoor Recreation</span> 
													</a> 
												</div> 
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2" style="display: none;">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/cars.png" alt="cars" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 535px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Automotive</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Automotive Parts &amp; Accessories</span>
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Automotive Tools &amp; Equipment</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Car/Vehicle Electronics &amp; GPS</span> 
												</a> <a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Tires &amp; Wheels</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Motorcycle &amp; Powersports</span> 
												</a> 
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Vehicles</span> 
													<span class="nav-subtext">See specs, read reviews, and ask owners</span>
												</a>
												<div class="nav-divider"></div>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Your Garage</span>
													<span class="nav-subtext">Find parts for your vehicles</span>
												</a>
											</div>
											<div class="nav-divider"></div>
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Industrial &amp; Scientific</span> 
											</span> 
											<div class="nav-panel"> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Industrial Supplies</span>
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Lab &amp; Scientific</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Janitorial</span>
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Safety</span> 
												</a> 
												<a href="#" class="nav-link nav-item">
													<span class="nav-text">Food Service</span> 
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Material Handling</span> 
												</a>
												<div class="nav-divider"></div> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Business</span> 
													<span class="nav-subtext">Shopping for work? Register a free account</span> 
												</a> 
											</div> 
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/clean.png" alt="Book" class="nav-promo" style="bottom: -24px; right: -20px; width: 519px; height: 522px;">
											<div class="nav-column nav-column-first"> 
												<span class=" nav-title nav-item">
													<span class="nav-text">Smart Home Services</span>
													<span class="nav-subtext">Available in select cities</span>
												</span> 
												<div class="nav-panel"> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">In-Home Smart Home Consultation</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Phone Smart Home Consultation</span>
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Smart Lock Installation</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Ring Video Doorbell Pro Installation</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Arlo Cameras Installation</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Thermostat Installation</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Lutron Caseta Light Switch Installation</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">All Smart Home Services</span> 
													</a> 
												</div> 
											</div>
											<div class="nav-column nav-column-notfirst nav-column-break"> 
												<span class=" nav-title nav-item"> 
													<span class="nav-text">Home Services</span>
													<span class="nav-subtext">Handpicked pros. Happiness Guarantee.</span> 
												</span> 
												<div class="nav-panel">
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Computer &amp; Electronics</span>
														<span class="nav-subtext">PC set up, iPhone repair, TV installation</span> 
													</a>
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Home Improvement &amp; Repair</span> 
														<span class="nav-subtext">Furniture assembly, Leaky faucet</span> 
													</a>
													<div class="nav-divider"></div>
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Assembly</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Cleaning</span>
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">Plumbing</span>
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Electrical</span> 
													</a> 
													<a href="#" class="nav-link nav-item">
														<span class="nav-text">Home Theater</span> 
													</a> 
													<a href="#" class="nav-link nav-item"> 
														<span class="nav-text">All Services</span> 
														<span class="nav-subtext">Available in select cities</span>
													</a> 
												</div>
											</div>
										</div>
										<div class="nav-template nav-subcat nav-tpl-itemList nav-colcount-2">
											<img src="<?= base_url() . "assets/web/images/ummenu" ?>/credit.png" alt="Card." class="nav-promo" style="bottom: -14px; right: -20px; width: 519px; height: 522px;">
											<span class=" nav-title nav-item"> 
												<span class="nav-text">Credit Cards</span>
											</span> 
											<div class="nav-panel"> 
											<a href="#" class="nav-link nav-item"> 
												<span class="nav-text">Amazon.com Store Card</span> 
												<span class="nav-subtext">Special financing on eligible orders</span> 
											</a>
											<a href="#" class="nav-link nav-item">
												<span class="nav-text">Amazon Rewards Visa Signature Cards</span> 
												<span class="nav-subtext">Get rewarded for every purchase</span>
											</a> 
											<a href="#" class="nav-link nav-item">
												<span class="nav-text">Amazon.com Corporate Credit Line</span> 
												<span class="nav-subtext">Pay-in-full and revolving credit lines</span>
											</a> 
											<a href="#" class="nav-link nav-item"> 
												<span class="nav-text">Credit Card Marketplace</span>
												<span class="nav-subtext">Find a credit card that’s right for you</span> 
											</a>
											</div>
											<div class="nav-divider"></div> 
											<span class=" nav-title nav-item">
												<span class="nav-text">Payment Products</span>
											</span> 
											<div class="nav-panel">
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Shop with Points at Amazon</span>
													<span class="nav-subtext">Use your rewards points for purchases</span>
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Cash</span> 
													<span class="nav-subtext">Add cash to your Amazon Balance</span> 
												</a>
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Currency Converter</span>
													<span class="nav-subtext">Pay in your local currency</span> 
												</a>
												<a href="/Amazon-Allomp;node=11453461011" class="nav-link nav-item"> 
													<span class="nav-text">Amazon Allowance</span> 
													<span class="nav-subtext">An easy way to fund shopping on Amazon</span>
												</a> 
												<a href="#" class="nav-link nav-item"> 
													<span class="nav-text">Reload Your Amazon Balance</span> 
													<span class="nav-subtext">Add funds directly with a credit or debit card</span>
												</a> 
											</div>
										</div>
										</div>
									</div>
										
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 deliver">
							  <img src="<?= base_url() . "assets/web/" ?>images/map-icon.png" alt="search pointer" class="pull-left" style="margin-right: 10px;">
							  <p class="pull-left" style="color:#ffffff;">
								Deliver to<br><strong style="font-size: 20px;">Pakistan</strong>
							  </p>
							</div>
							<div id="nav-main" class="nav-sprite col-md-2"> 
								<div class="nav-shop-all">
									<div id="nav-shop"> 
										<a href="#" class="nav-a nav-a-2 nav-single-row-link" id="nav-link-shopall" tabindex="36">
											<span class="nav-line-1">Shop by</span>
											<span class="nav-line-2">Departments
												<span class="nav-icon nav-arrow" style="visibility: visible;"></span>
											</span>
										</a>
									</div> 
								</div> 
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







                                            <li><a onclick="return confirm('Are you want to logout from the system??');" class="small_link" href="<?= base_url(); ?>home/logout">Sign Out</a></li>







                                        <?php } ?>







                                        <?php if (!$this->session->userdata('user_loggedin')) { ?>







                                            <li> <a class="small_link" href="<?= base_url(); ?>home/login">Login</a></li>







                                            <li><a class="small_link" href="<?= base_url(); ?>home/register">Register</a></li>



                                        <?php } ?>
                                         <li><a class="small_link" href="<?= base_url(); ?>home/myCart">MyCart<span class="badge badge-danger"><?=count($this->cart->contents());?></span></a></li>
									</ul>
									   
							  </p>
                                </div><!--/ [col]-->
						
							<div id="nav-cover" style="z-index: 1; height: 4451px; display: none; opacity: 0.6;"></div>
						</div> 
					</div>
					</div>
				</div>


                <!-- - - - - - - - - - - - - - End of main navigation wrapper - - - - - - - - - - - - - - - - -->



            </header>
            <div class="wsmenucontainer mobile-main-menu2 clearfix">
<div class="overlapblackbg"></div>
<div class="mobile header">
<div class="offheader">  
  <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
  <div class="smllogo"><a href="<?= base_url() ?>" class="logo">




                                        <img src="<?= base_url() . "assets/web/" ?>images/logo.png" alt="Brands Valley">



                                    </a></div>

<ul class="loginbar-mobile">
                                        <li><i class="fas fa-user-circle fa-2x"></i></li>
                            
                                        <?php if ($this->session->userdata('user_loggedin')) { ?>
                                            <li><a class="small_link" href="<?= base_url(); ?>home/logout">Sign Out</a></li>
                                        <?php } ?>
                                        <?php if (!$this->session->userdata('user_loggedin')) { ?>
                                            <li> <a class="small_link" href="<?= base_url(); ?>home/login">Login</a></li>
                                        <?php } ?>
                                    </ul>
                                                                
</div>
<div class="mobile-search">

                    <div class="container-fluid">

                        <div class="search-area-mobile row">
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                            
                                    <form method="get" id="searchForm" action="<?= base_url() ?>home/searchDetails" class="clearfix search">

                                      

                                        <div class="search_category alignleft">

                                            <select class="open_categories" name="getCategory" id="getCategory" required="required">

                                                <option value="">All</option>

                                                <?php

                                                foreach ($Categories as $cat) {

                                                    ?>

                                                    <option value="<?= $cat['ID'] ?>" class="animated_item"><?= $cat['cat_title'] ?></option>

                                                <?php } ?>

                                            </select>

                                        </div><!--/ .search_category.alignleft-->
                                        <input type="text" name="title" tabindex="1" placeholder="Search..." class="alignleft" required="">

                                        <button type="submit" class="button_blue def_icon_btn alignleft"></button>



                                    </form><!--/ #search-->
                            </div>
                        </div>

                    </div><!--/ .container-->



                </div><!--/ .main_navigation_wrap-->
</div>



<div class="header">
  
     
    
    <!--Main Menu HTML Code-->
    <nav class="wsmenu clearfix">
      <ul class="mobile-sub wsmenu-list clearfix">
      
        <li><a href="/bv-demo/home/login" class="active"><i class="fas fa-user-circle fa-2x"></i><span class="hometext">&nbsp;&nbsp;Hello, Sign In</span></a></li>
        <li><a href="#"><i class="fa fa-align-justify"></i>&nbsp;&nbsp;Shop By Department <span class="arrow"></span></a>
          <ul class="wsmenu-submenu">
            <li><a href="#">Website Design </a></li>
            <li><a href="#">Ecommerce Solutions</a></li>
            <li><a href="#">Website Development</a></li>
            <li><a href="#">Open Source Development</a>
              <ul class="wsmenu-submenu-sub">
                <li><a href="#">Submenu item 1</a></li>
                <li><a href="#">Submenu item 2</a></li>
                <li><a href="#">Submenu item 3</a></li>
                <li><a href="#">Submenu item 4</a>
                <ul class="wsmenu-submenu-sub-sub">
                <li><a href="#"><i class="fa fa-angle-right"></i>Submenu item 1</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Submenu item 2</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Submenu item 3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Submenu item 4</a></li>
              </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
       <li><a href="#"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Deliver to Pakistan<span class="arrow"></span></a>
          <ul class="wsmenu-submenu">
            <li>
            <div class="col-lg-12 col-md-12 col-sm-12">
                                
                                    
                                <form method="post" action="<?= base_url() ?>/home/setRegion">

                                    <ul class="formsection">





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
                                
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!--Menu HTML Code-->
    
    
    
    
  </div>



   
    


 
  
</div>

<div class="empty-after-head"></div>
			