$(document).ready(function () {

    //bot telegram 
    $('.from').on('click touch', '.add_from', function (event) {
        let rdom = `
        <div class="row col-lg-12">
            <div class="col-lg-10">
                <input type="text" class="form-control" name="from"
                placeholder="Username Channel">
            </div>
            <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5"
                style="display: none;">
                <i class="far fa-minus-square"
                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
            </div>
            <div
                class="col-lg-1 col-md-1 add_from kt-margin-b-5">
                <i class="far fa-plus-square"
                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
        </div>
        `;
        $(this).parent().find('.delete_from').addClass('display-block');
        $(this).parent().parent().append(rdom);
        $(this).remove();
    });
    $('.from').on('click touch', '.delete_from', function (event) {
        $(this).parent().remove();
    });
    $('.to').on('click touch', '.add_to', function (event) {
        let rdom = `
        <div class="row col-lg-12">
            <div class="col-lg-10">
                <input type="text" class="form-control" name="to"
                placeholder="ID hoặc Username">
                </div>
            <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5"
                style="display: none;">
                <i class="far fa-minus-square"
                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
            </div>
            <div
                class="col-lg-1 col-md-1 add_to kt-margin-b-5">
                <i class="far fa-plus-square"
                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
        </div>
        `;
        $(this).parent().find('.delete_to').addClass('display-block');
        $(this).parent().parent().append(rdom);
        $(this).remove();
    });
    $('.to').on('click touch', '.delete_to', function (event) {
        $(this).parent().remove();
    });

    $('.list_command').on('click touch', '.add_command', function (event) {
        let rdom = `
        <div class="col-lg-12 command kt-margin-t-20 row">
            <div class="col-lg-2">
                <input type="text" name="ontext" class="form-control" placeholder="Câu lệnh">
            </div>
            <div class="col-lg-5">
                <textarea rows="2" cols="50" name="reply"></textarea>
            </div>
            <div class="col-lg-4 button_url">
                <div class="row">
                    <div class="col-lg-5"> 
                        <input type="text" name="text_link" class="form-control" placeholder="Tên hiển thị">
                    </div>
                    <div class="col-lg-5"> 
                        <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
                    </div>
                    <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" >
                        <i class="far fa-plus-square"
                            style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                    </div>
                    <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5" style="display: none;">
                        <i class="far fa-minus-square"
                            style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 add_command kt-margin-b-5" >
                <i class="far fa-plus-square"
                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
            <div class="col-lg-1 col-md-1 delete_command kt-margin-b-5" style="display: none;">
                    <i class="far fa-minus-square"
                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                </div>
        </div>
        `;
        $('.list_command .add_command').remove();
        $('.list_command .delete_command').addClass('display-block');
        $('.list_command').append(rdom);
        // ta dao
        $('.button_url').on('click touch', '.add_button_url', function (event) {
            let rdom = `
            <div class="row mt-2">
                <div class="col-lg-5"> 
                    <input type="text" name="text_link" class="form-control" placeholder="Tên hiển thị">
                </div>
                <div class="col-lg-5"> 
                    <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
                </div>
                <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" >
                    <i class="far fa-plus-square"
                        style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                </div>
                <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5" style="display: none;">
                    <i class="far fa-minus-square"
                        style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                </div>
            </div>
            `;
            $(this).parent().children().last().addClass('display-block');
            $(this).parent().parent().append(rdom);
            $(this).remove();
        });
        $('.button_url').on('click touch', '.delete_button_url', function (event) {
            $(this).parent().remove();
        });

    });
    $('.list_command').on('click touch', '.delete_command', function (event) {
        $(this).parent().remove();
    });

    $('.button_url').on('click touch', '.add_button_url', function (event) {
        let rdom = `
        <div class="row mt-2">
            <div class="col-lg-5"> 
                <input type="text" name="text_link" class="form-control" placeholder="Tên hiển thị">
            </div>
            <div class="col-lg-5"> 
                <input type="text" name="link" class="form-control" placeholder="Đường dẫn">
            </div>
            <div class="col-lg-1 col-md-1 add_button_url kt-margin-b-5" >
                <i class="far fa-plus-square"
                    style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
            <div class="col-lg-1 col-md-1 delete_button_url kt-margin-b-5" style="display: none;">
                <i class="far fa-minus-square"
                    style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
            </div>
        </div>
        `;
        $(this).parent().children().last().addClass('display-block');
        $(this).parent().parent().append(rdom);
        $(this).remove();
    });
    $('.button_url').on('click touch', '.delete_button_url', function (event) {
        $(this).parent().remove();
    });

    $('.list_forward').on('click touch', '.add_forward', function(event) {
        let rdom=`
        <div class="col-lg-12 kt-margin-t-20 row">
            <select class="col-lg-2 form-control typeto">
                <option value="1">Channel-Group</option>
                <option value="0">Channel-Channel</option>
            </select>
            <div class="col-lg-3 from">
                <div class="row col-lg-12">
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="from"
                        placeholder="Username Channel" value="">
                    </div>
                    <div
                        class="col-lg-1 col-md-1 add_from kt-margin-b-5" >
                        <i class="far fa-plus-square"
                            style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                    </div>
                    <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5"
                    style="display: none;">
                        <i class="far fa-minus-square"
                            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 to">
                <div class="row col-lg-12">
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="to"
                        placeholder="ID hoặc Username" value="">
                    </div>
                    <div class="col-lg-1 col-md-1 add_to kt-margin-b-5" >
                        <i class="far fa-plus-square"
                            style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                    </div>
                    <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5"
                    style="display: none;">
                        <i class="far fa-minus-square"
                            style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 ">
                <input type="number" class="form-control countdown">
            </div>
            <div class="col-lg-2">
                <select class="form-control typesend" name="typesend">
                    <option value=1>Forward</option>
                    <option value=0>Gửi tin nhắn</option>
                </select>
            </div>
            <div class="col-lg-1 col-md-1 add_forward kt-margin-b-5" >
                <i class="far fa-plus-square"
                    style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
            <div class="col-lg-1 col-md-1 delete_forward kt-margin-b-5" style="display: none;">
                <i class="far fa-minus-square"
                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
            </div>
        </div>
        `;
        $('.list_forward .add_forward').remove();
        $('.list_forward .delete_forward').addClass('display-block');
        $('.list_forward').append(rdom);
        // đây là đoạn code tà đạo, ai đọc vào không nên làm theo :)
        $('.from').on('click touch', '.add_from', function (event) {
            let rdom2 = `
            <div class="row col-lg-12 mt-2">
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="from"
                    placeholder="Username Channel">
                </div>
                <div
                    class="col-lg-1 col-md-1 add_from kt-margin-b-5">
                    <i class="far fa-plus-square"
                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                </div>
                <div class="col-lg-1 col-md-1 delete_from kt-margin-b-5"
                    style="display: none;">
                    <i class="far fa-minus-square"
                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                </div>
            </div>
            `;
            $(this).parent().children().last().addClass('display-block');
            $(this).parent().parent().append(rdom2);
            $(this).remove();
        });
        $('.from').on('click touch', '.delete_from', function (event) {
            $(this).parent().remove();
        });
        $('.to').on('click touch', '.add_to', function (event) {
            let rdom2 = `
            <div class="row col-lg-12">
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="to"
                    placeholder="ID hoặc Username">
                    </div>
                <div class="col-lg-1 col-md-1 add_to kt-margin-b-5">
                    <i class="far fa-plus-square" style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                </div>
                <div class="col-lg-1 col-md-1 delete_to kt-margin-b-5"
                    style="display: none;">
                    <i class="far fa-minus-square"
                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                </div>
            </div>
            `;
            $(this).parent().children().last().addClass('display-block');
            $(this).parent().parent().append(rdom2);
            $(this).remove();
        });
        $('.to').on('click touch', '.delete_to', function (event) {
            $(this).parent().remove();
        });
    })
    $('.list_forward').on('click touch', '.delete_forward', function(event) {
        $(this).parent().remove();
    })

    //
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
    $('#kt_datepicker_7').datetimepicker({
    });
    var stt = 1;
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
         <div class="modal fade" id="detail_one_${stt}" tabindex="-1" role="dialog"
                                                             aria-labelledby="detail_oneTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết user ${stt} muốn thêm</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-marginless">
                                                                            <label>Extra Phone ( <span class="text-muted">Mỗi số cách nhau một dấu phẩy</span> ) </label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_phone[]" aria-describedby="basic-addon2">
                                                                            </div>
                                                                            <label>Birthday</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="birthday[]" aria-describedby="basic-addon2">
                                                                            </div>
                                                                            <label>Email</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="email[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Extra Email</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_email[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Address</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="address[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Extra Address</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_address[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Identify Card ID</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="identify_card_id[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Passport Number</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="passport_number[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Country</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="country[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>District</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="district[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>City</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="city[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>State</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="state[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Zipcode</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="zipcode[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <label>Extra ID</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="extra_id[]" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        <div class="col-lg-1 col-md-1 detail_one_user kt-margin-b-5">
                                                               <p class="fas fa-info-circle" data-toggle="modal"
                                                        data-target="#detail_one_${stt}" style="font-size: 3rem; color: dimgrey; cursor: pointer;"></p>
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
        stt++;
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
    $('.loichao2').on('click touch', '.add-loichao2', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-9 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <input type="text" class="form-control"
                    name="loichao2" placeholder="Chào mừng bạn đã đến với ...">
            </div>
        </div>
        <div class="col-lg-2 col-md-1">
            <div class="input-group">
                <label for="checkid2" class="form-control"><input type="checkbox" id="checkid2" name="checkid2"> Đính kèm mã ID</label> 
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
    $('.autosendmes').on('click touch', '.add-automsg', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-5 col-md-7 kt-margin-b-5">
            <div class="input-group">
                <textarea rows="1" cols="10" class="form-control"
                    name="message" placeholder="Tin nhắn"></textarea>
            </div>
        </div>
        <div class="col-lg-1">
            <input type="checkbox" class="form-control" name="attach">
        </div>
        <div class="col-lg-5 col-md-1">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Sau</span>
            </div>
            <input type="number" name="day" class="form-control col-lg-2">
            <div class="input-group-prepend">
                <span class="input-group-text">ngày subscribe. Lúc</span>
            </div>
            <input type="time" name="hours" class="form-control col-lg-4">
            </div>
        </div>
        <div class="col-lg-1 col-md-1 add-automsg kt-margin-b-5">
            <i class="far fa-plus-square"
                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete-automsg kt-margin-b-5" style="display:none;">
            <i class="far fa-minus-square"
                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
        </div>
        <div class="col-lg-12 mt-2 row col-md-2 link_url" style="display:none;">
            <div class="col-lg-12 kt-margin-t-20 row">
                <div class="col-lg-5 col-md-2">
                    <div class="input-group">
                        <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị"></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-2">
                    <div class="input-group">
                        <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết"></textarea>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5">
                    <i class="far fa-plus-square"
                        style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
                </div>
                <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
                    <i class="far fa-minus-square"
                        style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
                </div>
            </div>
        </div>
    </div>`;
        $('.autosendmes .add-automsg').remove();
        $('.autosendmes .delete-automsg').last().addClass('display-block');
        $('.autosendmes').append(rdom);
        $('input[name="attach"]').click(function() {
            if ($(this).is(":checked"))
                $(this).parent().parent().children().last().addClass('display-block');
            else $(this).parent().parent().children().last().removeClass('display-block');
        })
        $('.link_url').on('click touch', '.add-link_url', function (event) {
            let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
            <div class="col-lg-5 col-md-2">
                <div class="input-group">
                    <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-2">
                <div class="input-group">
                    <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết"></textarea>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5">
                <i class="far fa-plus-square"
                    style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
            </div>
            <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
                <i class="far fa-minus-square"
                    style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
            </div>
        </div>
    </div>`;
            $(this).parent().children().last().addClass('display-block');
            $(this).parent().parent().append(rdom);
            $(this).remove();
        });
        $('.link_url').on('click touch', '.delete-link_url', function (event) {
            $(this).parent().remove();
        });
    });
    $('.autosendmes').on('click touch', '.delete-automsg', function (event) {
        $(this).parent().remove();
    });
    $('.link_url').on('click touch', '.add-link_url', function (event) {
        let rdom = `<div class="col-lg-12 kt-margin-t-20 row">
        <div class="col-lg-5 col-md-2">
            <div class="input-group">
                <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị"></textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-2">
            <div class="input-group">
                <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết"></textarea>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5">
            <i class="far fa-plus-square"
                style=" font-size: 2rem; color: #1dc9b7; cursor: pointer;"></i>
        </div>
        <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
            <i class="far fa-minus-square"
                style=" font-size: 2rem; color: #fd1361; cursor: pointer;"></i>
        </div>
    </div>
</div>`;
        $(this).parent().children().last().addClass('display-block');
        $(this).parent().parent().append(rdom);
        $(this).remove();
    });
    $('.link_url').on('click touch', '.delete-link_url', function (event) {
        $(this).parent().remove();
    });
    $('.list_btn_inline').on('click touch', '.add-btn-inline', function(event) {
        let rdom = `<div class="row col-lg-12 inlines">
                        <input type="text" class="form-control col-lg-5 btn_inline mt-3"
                            placeholder="Text hiển thị">
                        <input type="text" class="form-control col-lg-5 id_used mt-3"
                            value="0">
                        <div class="col-lg-1 col-md-1 add-btn-inline kt-margin-b-5 mt-3">
                            <i class="far fa-plus-square"
                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                        </div>
                        <div class="col-lg-1 col-md-1 delete-btn-inline kt-margin-b-5 mt-3"
                            style="display:none;">
                            <i class="far fa-minus-square"
                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                        </div>
                    </div>`;
        $('.list_btn_inline .add-btn-inline').remove();
        $('.list_btn_inline .delete-btn-inline').last().addClass('display-block');
        $('.list_btn_inline').append(rdom);
    })
    $('.list_btn_inline').on('click touch', '.delete-btn-inline', function(event) {
        $(this).parent().remove();
    })
}); //end ready