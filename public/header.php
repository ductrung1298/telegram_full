<?php
session_start();
if (!isset($_SESSION['user_token'])) {
    header("Location: login.php");
}
function getName($uri)
{
    $result = '';
    for ($i = strlen($uri) - 1; $i > 0; $i--) {
        if ($uri[$i] != '/') {
            $result .= $uri[$i];
        } else break;
    }
    return substr(strrev($result), 0, (strpos(strrev($result), ".php") != null) ? strpos(strrev($result), ".php") + 4 : (strlen(strrev($result)) - 1));
}

function khong_dau($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}

$uriName = getName($_SERVER['REQUEST_URI']);

$crawlWebName = [
    "crawb-status.php",
    "crawb-config.php",
    "crawb-datasource.php"
];
$botTelegramName = [
    "list-bot-telegram.php",
    "add-bot-telegram.php",
    "editbot.php"
];
$documentName = [
    "crawb-document.php",
    "tele-document.php",
    "bot-telegram-document.php",
];
$toolTelegramName = [
    "add-account-tool-telegram.php",
    "getdialogs.php",
];
$contact = [
    "getcontact.php",
    "getcategory.php",
    "groupcontact.php"
];

?>
<!DOCTYPE html>


<html lang="en">

<!-- begin::Head -->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>Mydas.Life</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->
    <!-- datatable -->
    <link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="../assets/media/logos/logo_mydas_finall_01_uMl_icon.ico"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> -->
    <link href="../assets/css/eplus.css" rel="stylesheet" type="text/css"/>

    <?= $style ?>
   
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="index.php">
            <img alt="Logo" class="logo_web" src="../assets/media/logos/LOGO MYDAS FINAL-01.png"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
             id="kt_aside">

            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="index.php">
                        <img alt="Logo" class="logo_web" style="max-width: 4em;"
                             src="../assets/media/logos/LOGO MYDAS FINAL-01.png">
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
                     data-ktmenu-dropdown-timeout="500">
                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item <?php echo ($uriName == 'index.php' || $uriName == "") ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true"><a href="index.php" class="kt-menu__link "><i
                                        class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span
                                        class="kt-menu__link-text">Trang chủ</span></a></li>
                        </li>
                       <!--  <li class="kt-menu__item <?php echo in_array($uriName, $contact) ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true"><a href="getcontact.php" class="kt-menu__link "><i
                                        class="kt-menu__link-icon flaticon-book"></i><span class="kt-menu__link-text">Danh bạ</span></a>
                        </li> -->

                        <li class="kt-menu__item kt-menu__item--submenu <?php echo in_array($uriName, $contact) ? 'kt-menu__item--active kt-menu__item--open' : '' ?>"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-icon flaticon-book"></i><span
                                        class="kt-menu__link-text">Danh bạ</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item <?php echo $uriName == 'getcontact.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="getcontact.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                                    class="kt-menu__link-text">Danh sách danh bạ</span><span
                                                    class="kt-menu__link-badge"></span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'getcategory.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="getcategory.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                                    class="kt-menu__link-text">Chuyên mục</span><span
                                                    class="kt-menu__link-badge"></span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="kt-menu__item kt-menu__item--submenu <?php echo in_array($uriName, $crawlWebName) ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-icon flaticon2-laptop"></i><span
                                        class="kt-menu__link-text">Crawler Website</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item <?php echo $uriName == 'crawb-status.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="crawb-status.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                                    class="kt-menu__link-text">Trạng thái</span><span
                                                    class="kt-menu__link-badge"></span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'crawb-config.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="crawb-config.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                                    class="kt-menu__link-text">Cấu hình</span><span
                                                    class="kt-menu__link-badge"></span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'crawb-datasource.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="crawb-datasource.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                                    class="kt-menu__link-text">Nguồn dữ liệu</span><span
                                                    class="kt-menu__link-badge"></span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="kt-menu__item  kt-menu__item--submenu <?php echo in_array($uriName, $toolTelegramName) ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-icon flaticon2-telegram-logo"></i><span
                                        class="kt-menu__link-text">Tool telegram</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                                class="kt-menu__link"><span
                                                    class="kt-menu__link-text">Pages</span></span></li>
                                    <li class="kt-menu__item <?php echo in_array($uriName, $accountToolTelegramName) ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="add-account-tool-telegram.php"
                                                                class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Tài khoản</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item kt-menu__item--submenu <?php echo in_array($uriName, $botTelegramName) ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-icon flaticon2-browser-2"></i><span
                                        class="kt-menu__link-text">Bot telegram</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                                class="kt-menu__link"><span class="kt-menu__link-text">Subheaders</span></span>
                                    </li>
                                    <li class="kt-menu__item <?php echo $uriName == 'list-bot-telegram.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="list-bot-telegram.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Danh sách</span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'add-bot-telegram.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="add-bot-telegram.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Tạo tài khoản</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu <?php echo in_array($uriName, $documentName) ? 'kt-menu__item--active' : '' ?>"
                            aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                                                                       class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-icon flaticon2-console"></i><span
                                        class="kt-menu__link-text">Tài liệu hướng dẫn</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                                class="kt-menu__link"><span
                                                    class="kt-menu__link-text">General</span></span></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'crawb-document.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="crawb-document.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Crawl website</span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'tele-document.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="tele-document.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Tool Telegram</span></a></li>
                                    <li class="kt-menu__item <?php echo $uriName == 'bot-telegram-document.php' ? 'kt-menu__item--active' : '' ?>"
                                        aria-haspopup="true"><a href="bot-telegram-document.php" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Bot Telegram</span></a></li>
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
                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                            class="la la-close"></i></button>
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu"
                         class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                    </div>
                </div>

                <!-- end: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">


                    <!--begin: User Bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="kt-header__topbar-user">
                                <span class="kt-header__topbar-welcome kt-hidden-mobile"><?php echo $_SESSION["username"]; ?></span>
                                <img alt="Pic" class="kt-radius-100" src="../assets/media/users/default.jpg"/>

                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->

                                <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <!--begin: Navigation -->
                            <div class="kt-notification d-flex align-items-end flex-column">
                                <div class="kt-notification__custom kt-space-between">
                                    <a href="logout.php" class="btn btn-label btn-label-brand btn-sm btn-bold">Đăng
                                        xuất</a>
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

    <?php 
        echo "<pre>";
        print_r($_SESSIOn['user_token']);
        echo "</pre>";
    ?>