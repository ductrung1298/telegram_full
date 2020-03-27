<?php
	session_start();
	if (!isset($_SESSION['user_token'])){
		header("Location: login.php");
	}
	function getName($uri) {
		$result = '';
		for ($i = strlen($uri)-1; $i > 0 ; $i--) { 
			if ($uri[$i] != '/') {
				$result .= $uri[$i];
			}
			else break;
		}
		return substr(strrev($result), 0, (strpos(strrev($result),".php")!=null) ? strpos(strrev($result),".php")+4 : (strlen(strrev($result))-1));
	}

	$uriName = getName($_SERVER['REQUEST_URI']);
	
	$crawlWebName = [
		"crawb-status.php",
		"crawb-config.php",
		"crawb-datasource.php"
	];
	$botTelegramName = [
		"list-bot-telegram.php",
		"add-bot-telegram.php"
	];
	$documentName = [
		"crawb-document.php",
		"tele-document.php"
	];
	$toolTelegramName = [
		"add-account-tool-telegram.php",
		"getcontact.php",
		"groupcontact.php",
		"getdialogs.php"
	];
	$accountToolTelegramName = [
		"add-account-tool-telegram.php",
		"getcontact.php",
		"groupcontact.php",
		"getdialogs.php"
	];


?>
<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Metronic | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="../assets/media/logos/eplusicon.ico" />

		<link href="../assets/css/eplus.css" rel="stylesheet" type="text/css" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" class="logo_web" src="../assets/media/logos/epluslogo.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="dashboard.php">
								<img alt="Logo" class="logo_web" style="max-width: 4em;" src="../assets/media/logos/epluslogo.png">
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__item <?php echo $uriName == 'dashboard.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="index.php" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
								
								<li class="kt-menu__item kt-menu__item--submenu <?php echo in_array($uriName, $crawlWebName) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-telegram-logo"></i><span class="kt-menu__link-text">Crawler Website</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
                                            <li class="kt-menu__item <?php echo $uriName == 'crawb-status.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="crawb-status.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Trạng thái</span><span class="kt-menu__link-badge"></span></a></li>
                                            <li class="kt-menu__item <?php echo $uriName == 'crawb-config.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="crawb-config.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Cấu hình</span><span class="kt-menu__link-badge"></span></a></li>
                                            <li class="kt-menu__item <?php echo $uriName == 'crawb-datasource.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="crawb-datasource.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Nguồn dữ liệu</span><span class="kt-menu__link-badge"></span></a></li>
										</ul>
									</div>
								</li>
								<!-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-laptop"></i><span class="kt-menu__link-text">Tool Telegram</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pages</span></span></li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 4</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing Tables</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing Tables 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing Tables 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing Tables 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing Tables 4</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoices</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/invoices/invoice-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoice 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/invoices/invoice-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoice 2</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/faq/faq-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ 1</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">User Pages</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 4</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-5.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 5</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-6.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 6</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 4</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-5.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 5</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-6.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 6</span></a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li> -->
								
								<li class="kt-menu__item  kt-menu__item--submenu <?php echo in_array($uriName, $toolTelegramName) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-laptop"></i><span class="kt-menu__link-text">Tool telegram</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pages</span></span></li>
											<li class="kt-menu__item <?php echo in_array($uriName, $accountToolTelegramName) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="add-account-tool-telegram.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tài khoản</span></a></li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Danh bạ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="list-account-tool-telegram.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Danh sách</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Thêm người dùng vào danh sách</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 4</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Friend</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Danh sách</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/pricing/pricing-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Thêm mới</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tin nhắn</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/invoices/invoice-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Nhắn tin nhóm chát (telegram)</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/invoices/invoice-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Nhắn tin người dùng</span></a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="kt-menu__item kt-menu__item--submenu <?php echo in_array($uriName, $botTelegramName) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-browser-2"></i><span class="kt-menu__link-text">Bot telegram</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Subheaders</span></span></li>
											<li class="kt-menu__item <?php echo $uriName == 'list-bot-telegram.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="list-bot-telegram.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Danh sách</span></a></li>
											<li class="kt-menu__item <?php echo $uriName == 'add-bot-telegram.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="add-bot-telegram.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tạo tài khoản</span></a></li>
										</ul>
									</div>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu <?php echo in_array($uriName, $documentName) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-console"></i><span class="kt-menu__link-text">Tài liệu hướng dẫn</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
											<li class="kt-menu__item <?php echo $uriName == 'crawb-document.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="crawb-document.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Crawl website</span></a></li>
											<li class="kt-menu__item <?php echo $uriName == 'tele-document.php' ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="tele-document.php" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tool Telegram</span></a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
							</div>
						</div>

						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">


							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
										<img alt="Pic" class="kt-radius-100" src="../assets/media/users/300_13.jpg" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->

										<!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden" alt="Pic" src="../assets/media/users/300_13.jpg" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
										</div>
										<div class="kt-user-card__name">
											EPLUS
										</div>
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										<div class="kt-notification__custom kt-space-between">
											<a href="logout.php" class="btn btn-label btn-label-brand btn-sm btn-bold">Đăng xuất</a>
											<!-- <a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						