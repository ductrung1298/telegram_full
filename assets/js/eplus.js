$(document).ready(function () {
    $('.list-dom-get-detail').on('click touch', '.add-dom-detail', function (event) {

        let gdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-6 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control" name="select[]" placeholder="div .class p">
            </div>
            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

        </div>
        <div class="col-lg-3 col-md-3 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control" name="name[]" placeholder=".....">
            </div>
            <!-- <span class="form-text text-danger">Enable clear and today helper buttons</span> -->

        </div>
        <div class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
            <select class="form-control kt-input type-dom" name="type[]" data-col-index="2">
                <option value=1>Selector</option>  
                <option value=2>Xpath</option> 
                                                                                  
                </select>
        </div>
        <div class="col-lg-1 col-md-1 delete-dom-detail kt-margin-b-5" style="display:none;">
            <i class="far fa-minus-square" style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 add-dom-detail kt-margin-b-5">
            <i class="far fa-plus-square" style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
    </div>`;
        $('.list-dom-get-detail .add-dom-detail').remove();
        $('.list-dom-get-detail .delete-dom-detail').last().addClass('display-block');
        $('.list-dom-get-detail').append(gdom);
    });

    $('.list-dom-replace').on('click touch', '.add-dom-replace', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
         <div class="col-lg-6 col-md-6 kt-margin-b-5">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Chuỗi cần thay .....">
             </div>
            
         </div>
         <div class="col-lg-5 col-md-5 kt-margin-b-5">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Thay bằng chuỗi .....">
             </div>
             
         </div>
         <div class="col-lg-1 col-md-1 delete-dom-replace kt-margin-b-5" style="display: none;">
                 <i class="far fa-minus-square" style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
         </div>
         <div class="col-lg-1 col-md-1 add-dom-replace kt-margin-b-5">
             <i class="far fa-plus-square" style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
         </div>
     </div>`;
        $('.list-dom-replace .add-dom-replace').remove();
        $('.list-dom-replace .delete-dom-replace').last().addClass('display-block');
        $('.list-dom-replace').append(rdom);
    });

    $('.list-dom-replace-select').on('click touch', '.add-dom-replace-select', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
         <div class="col-lg-6 col-md-5 kt-margin-b-5">
             <div class="input-group">
                 <input type="text" class="form-control" name="selectsel[]" placeholder="Chuỗi cần thay .....">
             </div>
            
         </div>
         <div class="col-lg-3 col-md-4 kt-margin-b-5">
             <div class="input-group">
                 <input type="text" class="form-control" name="stringreplacesel[]" placeholder="Thay bằng chuỗi .....">
             </div>
         </div>
         <div class="col-lg-2 col-md-1 type-dom-detail kt-margin-b-5">
            <select class="form-control kt-input type-dom" name="typesel[]" data-col-index="2">
                <option value=1>Selector</option>  
                <option value=2>Xpath</option> 
                                                                                
            </select>
        </div>
         <div class="col-lg-1 col-md-1 delete-dom-replace-select kt-margin-b-5" style="display: none;">
                 <i class="far fa-minus-square" style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
         </div>
         <div class="col-lg-1 col-md-1 add-dom-replace-select kt-margin-b-5">
             <i class="far fa-plus-square" style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
         </div>
     </div>`;
        $('.list-dom-replace-select .add-dom-replace-select').remove();
        $('.list-dom-replace-select .delete-dom-replace-select').last().addClass('display-block');
        $('.list-dom-replace-select').append(rdom);
    });

    $('.list-dom-get-detail').on('click touch', '.delete-dom-detail', function (event) {
        $(this).parent().remove();
    });
    $('.list-dom-replace').on('click touch', '.delete-dom-replace', function (event) {
        $(this).parent().remove();
    });
    $('.list-dom-replace-select').on('click touch', '.delete-dom-replace-select', function (event) {
        $(this).parent().remove();
    });

    $("select.get-list-tool").change(function () {
        let selected = $(this).children("option:selected").val();
        if (selected == 'datetodate') {
            $('.set-time-run-auto').removeClass('display-block');
            $('.date-to-date').addClass('display-block');
        } else {
            $('.date-to-date').removeClass('display-block');
            $('.set-time-run-auto').addClass('display-block');
        }
    });
    $("select.type-pagination").change(function () {
        let selected = $(this).children("option:selected").val();
        if (selected == 'number') {
            $('.type-pagination-scroll').removeClass('display-block');
            $('.type-pagination-numberpage').removeClass('display-block');
            $('.type-pagination-number').removeClass('display-block');
            $('.type-pagination-number').addClass('display-block');
        }
        else if (selected == 'scroll') {
            $('.type-pagination-number').removeClass('display-block');
            $('.type-pagination-scroll').removeClass('display-block');
            $('.type-pagination-scroll').addClass('display-block');
            $('.type-pagination-numberpage').removeClass('display-block');
            $('.type-pagination-numberpage').addClass('display-block');
        }
    });
    $("select.type-save").change(function () {
        let selected = $(this).children("option:selected").val();
        if (selected == 0) {
            $('.diachi-chaytool').removeClass('display-block');
            $('.diachi-luutin').removeClass('display-block');
            $('.diachi-luutin').addClass('display-block');
            $('.option-db').removeClass('display-block');
            $('.option-api').removeClass('display-block');
            $('.option-api').addClass('display-block');
            $('.database-host').removeClass('display-block');
            $('.database-name').removeClass('display-block');
            $('.database-socketpath').removeClass('display-block');
        } else {
            $('.diachi-luutin').removeClass('display-block');
            $('.option-api').removeClass('display-block');
            $('.database-socketpath').removeClass('display-block');
            $('.database-socketpath').addClass('display-block');
            $('.database-host').removeClass('display-block');
            $('.database-host').addClass('display-block');
            $('.database-name').removeClass('display-block');
            $('.database-name').addClass('display-block');
            $('.diachi-chaytool').removeClass('display-block');
            $('.diachi-chaytool').addClass('display-block');
            $('.option-db').removeClass('display-block');
            $('.option-db').addClass('display-block');
        }
    });
    $("select.bot-send").change(function () {
        let select = $(this).children("option:selected").val();
        $.ajax({
            'url': 'http://http://192.168.1.13:3000/toolget/getconfigtelbyid',
            'method': 'GET',
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            'data': {
                'id': select
            }
        }).done(function (response) {
            if (response) {
                let option = '';
                let listgroup = JSON.parse(response.listgroup);
                for (let index of listgroup) {
                    option += '<option value=' + index.id + '>' + index.title + '</option>';
                }
                $('select.group-send').children().remove();
                $('select.group-send').append(option);
            }
        })
    });
    $("select.type-send").change(function () {
        let selected = $(this).children("option:selected").val();
        // gui 1 lan
        if (selected == 0) {
            $('.sendloop').removeClass('display-block');
            $('.set-time-run-auto').removeClass('display-block');
            $('.date-to-date').removeClass('display-block');
            $('.sendone').removeClass('display-block');
            $('.sendone').addClass('display-block');
        }
        else {
            // gui chu ki
            $('.sendone').removeClass('display-block');
            $('.sendloop').removeClass('display-block');
            $('.sendloop').addClass('display-block');
            if ($('select.get-list-tool').children('option:selected').val() == 'datetodate') {
                $('.set-time-run-auto').removeClass('display-block');
                $('.date-to-date').addClass('display-block');
            }
            else {
                $('.date-to-date').removeClass('display-block');
                $('.set-time-run-auto').addClass('display-block');
            }
        }
    })
    // $('#inputtimesend').pickatime({
    //     // 12 or 24 hour
    //     twelvehour: true,
    //     });
    $('#kt_datepicker_7').datetimepicker({
        // todayHighlight: true,
        // autoclose: true,
        // format: 'yyyy.mm.dd hh:ii',
        // pickerPosition: 'bottom-left',
        // templates: {
        //     leftArrow: '<i class="la la-angle-left"></i>',
        //     rightArrow: '<i class="la la-angle-right"></i>',
        // },
        // use24hours: true,
        // icons: {
        //     time: "fa fa-clock-o",
        //     date: "fa fa-calendar",
        //     up: "fa fa-arrow-up",
        //     down: "fa fa-arrow-down"
        // }
    });
    $('.list-contact').on('click touch', '.add-phone', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-3 input-group">
        <input type="text" class="form-control" name="phone[]" placeholder="+84xxxxxxxxx"
            >
        </div>
        <div class="col-lg-3 input-group">
            <input type="text" class="form-control" name="first_name[]" placeholder="First_name"
               >
        </div>
        <div class="col-lg-3 input-group">
            <input type="text" class="form-control" name="last_name[]" placeholder="Last_name"
                >
        </div>
        <div class="col-lg-1 col-md-1 delete-phone kt-margin-b-5"
            style="display: none;">
            <i class="far fa-minus-square"
            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
        <div
            class="col-lg-1 col-md-1 add-phone kt-margin-b-5">
            <i class="far fa-plus-square"
            style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
     </div>`;
        $('.list-contact .add-phone').remove();
        $('.list-contact .delete-phone').last().addClass('display-block');
        $('.list-contact').append(rdom);
    });
    $('.list-contact').on('click touch', '.delete-phone', function (event) {
        $(this).parent().remove();
    });
    $('.ketnoi').on('click touch', '.add-url', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-6 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control"
                    name="text" placeholder="Tên hiển thị">
            </div>
        </div>
        <div class="col-lg-5 col-md-2 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control"
                    name="url" placeholder="Đường dẫn đính kèm">
            </div>
        </div>
        <div class="col-lg-1 col-md-1 add-url kt-margin-b-5">
            <i class="far fa-plus-square"
                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete-url kt-margin-b-5"
            style="display:none;">
            <i class="far fa-minus-square"
                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
    </div>`;
        $('.ketnoi .add-url').remove();
        $('.ketnoi .delete-url').last().addClass('display-block');
        $('.ketnoi').append(rdom);
    });
    $('.ketnoi').on('click touch', '.delete-url', function (event) {
        $(this).parent().remove();
    });
    $('.loichao').on('click touch', '.add-loichao', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-9 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control"
                    name="loichao" placeholder="Chào mừng bạn đã đến với ...">
            </div>
        </div>
        <div class="col-lg-2 col-md-1">
            <div class="input-group">
                <label for="checkid" class="form-control"><input type="checkbox" id="checkid" name="checkid"> Đính kèm mã ID</label> 
            </div>
        </div>
        <div class="col-lg-1 col-md-1 add-loichao kt-margin-b-5">
            <i class="far fa-plus-square"
                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete-loichao kt-margin-b-5"
            style="display:none;">
            <i class="far fa-minus-square"
                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
    </div>`;
        $('.loichao .add-loichao').remove();
        $('.loichao .delete-loichao').last().addClass('display-block');
        $('.loichao').append(rdom);
    });
    $('.loichao').on('click touch', '.delete-loichao', function (event) {
        $(this).parent().remove();
    });
    $('.loichao').on('click touch', '.add-loichao2', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-9 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control"
                    name="loichao" placeholder="Chào mừng bạn đã đến với ...">
            </div>
        </div>
        <div class="col-lg-2 col-md-1">
            <div class="input-group">
                <label for="checkid" class="form-control"><input type="checkbox" id="checkid" name="checkid"> Đính kèm mã ID</label> 
            </div>
        </div>
        <div class="col-lg-1 col-md-1 add-loichao2 kt-margin-b-5">
            <i class="far fa-plus-square"
                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete-loichao2 kt-margin-b-5"
            style="display:none;">
            <i class="far fa-minus-square"
                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
    </div>`;
        $('.loichao2 .add-loichao2').remove();
        $('.loichao2 .delete-loichao2').last().addClass('display-block');
        $('.loichao2').append(rdom);
    });
    $('.loichao2').on('click touch', '.delete-loichao2', function (event) {
        $(this).parent().remove();
    });
}); //end ready