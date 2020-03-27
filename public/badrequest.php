<?php
    include "header.php";
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Dashboard </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="dashboard.php" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Lỗi </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Subheader -->
        <!-- begin:: Content -->
        <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link"
                                    href="index.php" role="tab" aria-selected="false">
                                    <i class="flaticon-bell"></i>Trang chủ
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row ">
                        <div class="kt-section col-12">
                        <h1 align="center">Đã xảy ra một số lỗi</h1>
                        <h1 align="center">Vui lòng thử lại sau</h1>
                        <div class="col-lg-12 mt-5 text-center bt-end">
                            <a href="dashboard.php" class="btn btn-success"><i class="flaticon-home-1"></i> Quay về trang chủ</a>
                        </div>
                        <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>