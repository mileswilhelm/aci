<?php
	$language = $frm->translatePages(ltrim($_SERVER['REQUEST_URI'], "/"), $_COOKIE['lang'], 2);
	
	if($_COOKIE['lang'] != $language){
		setcookie('lang', $language, time()+31536000, '/');
		$frm->language = $language;
		header('Location: '.$_SERVER['REQUEST_URI']);
	}

	
	if($members->is_user() && $members->user_info['category'] != 0){
		//Check if user is logged in and part of a group (meaning is a distributor)
		$distributor = TRUE;
	} else {
		$distributor = FALSE;
	}

	?>
<?php
	
	if ($_COOKIE['lang'] != 'spanish') // *** Page content for English website
		{
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta name="msvalidate.01" content="3C597C2A6D8230E7902D99F1D9AF8D98" />
	<meta name="google-site-verification" content="0WUPTH-snBbGc2eMDX_e94bB2zbpcG2lbVVpti9adHg" />
	<title><?=$siteTitle?></title>
    <base href="<?=(!empty($frm->config['force_https'])) ? 'https' :
		'http'?>://<?=$frm->site_domain() . _SITE_PATH?>/" />
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <meta http-equiv="content-language" content="en" />
	<meta name="author" content="ACI Hoist and Crane" />
	<meta name="rating" content="general" />
	<meta name="page-type" content="document" />
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msnbot" content="<?=$metarobots?>" />
    <meta name="revisit-after" content="7 days" />
	<meta name="copyright" content="<?=$metacopyright?>" />
	<meta name="keywords" content="ACI Hoist and Crane, <?=$metaKeys?>" />
	<meta name="description" content="<?=$metaDesc?>" />
    <meta property="og:title" content="<?=$siteTitle?>" />
    <meta property="og:description" content="<?=$metaDesc?>" />
    <meta property="og:url" content="<?=(!empty($frm->config['force_https'])) ? 'https' :
		'http'?>://www.<?=$frm->site_domain() . _SITE_PATH . $_SERVER['REQUEST_URI']?>" />
    <meta property="og:site_name" content="<?=$frm->config['sitename']?>" /> 
    <meta property="og:email" content="<?=$frm->config['contactemail']?>" />
    <meta property="og:phone_number" content="<?=$frm->config['contactphone']?>" />
    <?php
		
		if(isset($_REQUEST['plugin'])) {
			
			if($_REQUEST['plugin'] == 'Products' && isset($_REQUEST['id'])) {
				?>
        <meta property="og:type" content="product" />
        <?php } elseif($_REQUEST['plugin'] == 'Blog' && isset($_REQUEST['id'])) { ?>
        <meta property="og:type" content="blog" />
        <?php } elseif($_REQUEST['plugin'] == 'News' && isset($_REQUEST['id'])) { ?>
        <meta property="og:type" content="article" />
        <?php }} else { ?>
        <meta property="og:type" content="website" />
    <?php } ?> 
    <?php if(count($item_info['image'])>0) { ?>
    <meta property="og:image" content="<?=(!empty($frm->config['force_https'])) ? 'https' :
			'http'?>://www.<?=$frm->site_domain() . _SITE_PATH?>/uploads/<?=$_REQUEST['plugin']?>/<?=$item_info['image'][0]['bid']?>/thumb-<?=$item_info['image'][0]['image']?>" />
    <?php } ?> 
    <link rel="index" title="<?=$frm->config['sitename']?>" href="<?=(!empty($frm->config['force_https'])) ? 'https' :
		'http'?>://www.<?=$frm->site_domain()?>/" />
    <?php if(file_exists(_SITE_PATH.'/rss.xml')) { ?>
        <link rel="alternate" type="application/rss+xml" title="Latest News (RSS 2.0)" href="<?=(!empty($frm->config['force_https'])) ? 'https' :
			'http'?>://www.<?=$frm->site_domain()?>/rss.xml" /> 
    <?php } ?>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.red.css" rel="stylesheet" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<meta name="theme-color" content="#0C4985">
    <!-- Favicon and apple touch icons-->
    <link rel="icon" type="image/png" href="http://i.imgur.com/vfHAx6l.jpg">
    <!--<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" /> -->
	<!-- Attach the Table CSS and Javascript 
	<link rel="stylesheet" href="css/responsive-tables.css">
	<script src="js/responsive-tables.js"></script> -->
	<style>
	</style>
	<noscript>
		<style>li.dropdown:hover > ul.dropdown-menu{display: block;}</style>
	</noscript>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <!-- #### JAVASCRIPT FILES ### -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>');
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>
    <script src="js/scroll.js"></script>
    <!--[if lte IE 7]>
        <script type="text/javascript" src="js/ie6pngfix.js"></script>
        <script type="text/javascript">
            DD_belatedPNG.fix('img, ul, ol, li, div, p, a, h1, h2, h3, h4, h5, h6, span, input');
        </script>
        <script type="text/javascript" src="js/lte-ie7.js"><script>
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
    <![endif]-->
	<?=(isset($code)) ? $code."\n" :
		''?>
	    <?php if(!empty($jQuery)) { ?>
    <script type="text/javascript">
        $(function() {
            <?=$jQuery?>
        });
    </script>
    <?php } ?>
    <?php if(!empty($meta_info['google_analytics_code'])) { ?>
    <script type="text/javascript">
    	<?=$meta_info['google_analytics_code']?>
    </script>
    <?php } ?>
<script type="text/javascript"> <!-- Google Analytics -->
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-947936-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- ThomasNet -->
<script type="text/javascript">
document.write(unescape("%3Cscript src='" + document.location.protocol + "//www.webtraxs.com/trxscript.php' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
_trxid = "acihoist";
webTraxs();
</script>
<noscript><img src="http://www.webtraxs.com/webtraxs.php?id=acihoist&st=img" alt=""></noscript>
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K6KRLJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K6KRLJ');</script>
<!-- End Google Tag Manager -->
<div id="all">
              <header>
            <!-- *** TOP *** -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contact us at 1-866-424-6478 toll free!</p>
                            <p class="hidden-md hidden-lg"><a href="#"><i class="fa fa-phone"></i></a>  <a href="#"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="#" class="external twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email"><i class="fa fa-envelope"></i></a>
                            </div>
                            <div class="login">
                                <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                                <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** TOP END *** -->
            <!-- *** NAVBAR *** -->
            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand home" href="index.html">
                                <img src="img/aci_hoist_logo.png" alt="ACI Hoist and Crane" class="hidden-xs hidden-sm">
                                <img src="img/aci_hoist_logo.png" alt="ACI Hoist and Crane" class="visible-xs visible-sm"><span class="sr-only">ACI Hoist and Crane - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->
                        <div class="navbar-collapse collapse" id="navigation">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown active">
                                    <a href="index.html">Home</a>
                                </li>
								<!-- ========== FULL WIDTH MEGAMENU ================== -->
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Products <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5>Hoists</h5>
                                                        <ul>
                                                            <li><a href="electric_chain_hoists.html">Electric Chain Hoists</a>
                                                            </li>
                                                            <li><a href=".html">Manual Hoists</a>
                                                            </li>
                                                            <li><a href=".html">Wire Rope Hoists</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Cranes</h5>
                                                        <ul>
                                                            <li><a href=".html">End Trucks</a>
                                                            </li>
                                                            <li><a href="crane_kits.html">Crane Kits</a>
                                                            </li>
                                                            <li><a href=".html">Festoon Systems</a>
                                                            </li>
                                                            <li><a href=".html">Conductor Bar Systems</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Trolleys</h5>
                                                        <ul>
                                                            <li><a href=".html">Push Trolleys</a>
                                                            </li>
															<li><a href=".html">Geared Trolleys</a>
                                                            </li>
															<li><a href=".html">Motorized Trolleys</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h5>Pendants</h5>
                                                        <ul>
                                                            <li><a href=".html">100 Series Pendants</a>
                                                            </li>
                                                            <li><a href=".html">100 Series Pendant Accessories</a>
                                                            </li>
                                                            <li><a href=".html">T Series Pendants</a>
                                                            </li>
                                                            <li><a href=".html">T Series Pendant Accessories</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Wireless Remotes</h5>
                                                        <ul>
                                                            <li><a href=".html">200 Series Remotes</a>
                                                            </li>
                                                            <li><a href=".html">400 Series Remotes</a>
                                                            </li>
                                                            <li><a href=".html">500 Series Remotes</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h5>Slings</h5>
                                                        <ul>
                                                            <li><a href=".html">Eye &amp; Eye Slings</a>
                                                            </li>
                                                            <li><a href=".html">Single Ply Endless Slings</a>
                                                            </li>
                                                            <li><a href=".html">Double Ply Endless Slings</a>
                                                            </li>
                                                            <li><a href=".html">Round Slings</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Material Handling</h5>
                                                        <ul>
                                                            <li><a href=".html">Transfer Carts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h5>Lifting Equipment</h5>
                                                        <ul>
                                                            <li><a href=".html">Crane Scales</a>
                                                            </li>
                                                            <li><a href=".html">Lifting Magnets</a>
                                                            </li>
                                                            <li><a href=".html">Clamps</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Accessories</h5>
                                                        <ul>
                                                            <li><a href=".html">Shackles</a>
                                                            </li>
                                                            <li><a href=".html">Ratchet Load Binders</a>
                                                            </li>
                                                            <li><a href=".html">Cable Tie Guns</a>
                                                            </li>
                                                            <li><a href=".html">Connectors</a>
                                                            </li>
                                                            <li><a href=".html">Terminals</a>
                                                            </li>
															<li><a href=".html">Tie Wraps</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                </li>
                                <!-- ========== FULL WIDTH MEGAMENU END ================== -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="faq.html">FAQ</a>
                                        </li>
                                        <li><a href="literature.html">Literature</a>
                                        </li>
                                        <li><a href="gallery.html">Gallery</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="#">About Us</a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contact Us <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="contact_us.html">Contact Us</a>
                                        </li>
                                        <li><a href="quote_request.html">Quote Request</a>
                                        </li>
                                        <li><a href="distributor.html">Become a Distributor</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                        <div class="collapse clearfix" id="search">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                </span>
                                </div>
                            </form>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
                <!-- /#navbar -->
            </div>
            <!-- *** NAVBAR END *** -->
        </header>
        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password">
                            </div>
                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is quick, makes checkout simple, and makes you eligible for future offers and updates!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- *** LOGIN MODAL END *** -->
        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>PAGE TITLE (or product title)</h1>
						<p class="lead text-muted">Short Desc. (PRODUCTS ONLY)</p>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a>
                            </li>
							<li>$CURRENT_PAGE <!-- PHP THIS -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<!-- *** BREADCRUMBS END *** -->
		
		<!-- *** CONTENT *** -->
		
		<!-- End of content -->	
		
<!-- *** FOOTER ***
_________________________________________________________ -->
        <footer id="footer">
            <div class="container">
			   <div class="col-md-6 col-sm-6 text-center">
                    <h4>About us</h4>
                    <p>ACI Hoist & Crane manufactures top-quality hoists, rigging, crane components, and more. We provide a wide selection of lifting solutions for an array of applications.</p>
                    <hr>
                    <h4>Join our monthly newsletter</h4>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>
                    </span>
                        </div>
                        <!-- /input-group -->
                    </form>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <!-- /.col-md-3 -->
                <div class="col-md-6 col-sm-6 text-center">
                    <h4>Contact</h4>
				<div class="row">
				   <div class="col-md-6 col-sm-6">
						<p>
							<strong>ACI Hoist & Crane</strong>
							<br>2721 NE 4th Ave
							<br>Pompano Beach, FL 33064 
						</p>
					</div>
					<div class="col-md-6 col-sm-6">
						<p>
							<strong>Phone:</strong>
							<a href="tel:+18664246478">1-866-424-6478</a>
							<br><strong>Fax:</strong>
							(954) 272-0334
							<br><strong>Email:</strong>
							info@acihoist.com
						</p>
					</div>
				</div>
				<div class="row"><div class="col-md-12 col-sm-6 text-center">
                    <a href="contact.html" class="btn btn-small btn-template-main">Go to contact page</a>
                    <hr class="hidden-md hidden-lg hidden-sm">
				</div></div>
                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /#footer -->
        <!-- *** FOOTER END *** -->
		<!-- *** TO TOP ***
_________________________________________________________ -->
			<a href="#" class="to-top text-center"><i class="fa fa-chevron-up"></i></a>
		<!-- *** TO TOP END *** -->
        <!-- *** COPYRIGHT ***
_________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2016. ACI Hoist and Crane</p>
                    <p class="pull-right">Template by <a href="http://bootstrapious.com">Bootstrap 4 Themes</a> with support from <a href="http://kakusei.cz">http://kakusei.cz</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->
        <!-- *** COPYRIGHT END *** -->
    </div>
    <!-- /#all -->
</body>
</html>
<?php } ?>