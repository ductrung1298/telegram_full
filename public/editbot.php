<?php 
    $id=isset($_GET['id'])?intval($_GET['id']):0;
    $code=isset($_GET['code'])?($_GET['code']):'';
    if ($id!=0 && $code!='')
        {
        $url='localhost:3000/telbot/getbot?id='.$id.'&code='.$code;
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
            'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx'
        ]);
        $response = json_decode(curl_exec($curl), true);
        $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
        if ($httpcode!=200)
        {
            header('Location: badrequest.php');
        }
        curl_close($curl);
    }
    else header('Location: badrequest.php');
?>
<?php
    include 'header.php';?>
<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="index.php" class="kt-subheader__breadcrumbs-link">
                            Crawler </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="telegram.php" class="kt-subheader__breadcrumbs-link">
                            Telegram </a>
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
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="telegram.php" role="tab"
                                    aria-selected="false">
                                    <i class="flaticon-bell"></i> Tài khoản
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon-bell"></i> BOT Telegram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group row form-group-marginless kt-margin-t-20">
                        <label class="col-10 text-left"><strong>CHỈNH SỬA CẤU HÌNH BOT
                                TELEGRAM <?php echo $response['username']; ?>
                            </strong></label><br>
                        <div class="form-group col-lg-12 row mt-4 loichao">
                            <label class="col-12 text-left"><strong>Lời chào khi đăng kí
                                kênh:</strong></label>
                            <?php 
                            $response['greeting']=json_decode($response['greeting'], true);
                            if (!empty($response['greeting']))
                            foreach($response['greeting'] as $loichao) {
                                                        echo '
                                                        <div class="col-lg-12 kt-margin-t-20 row">
                                                         <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                                             <div class="input-group">
                                                                <textarea rows="1" cols="10" class="form-control"
                                                                     name="loichao">'.$loichao['text'].'</textarea>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-2 col-md-1">
                                                             <div class="input-group">
                                                                 <label for="checkid" class="form-control"><input type="checkbox" id="checkid" name="checkid" '.(($loichao['userid']==1)?"checked":"").'> Đính kèm mã ID</label> 
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-1 col-md-1 add-loichao kt-margin-b-5" style="display:none;">
                                                             <i class="far fa-plus-square"
                                                                 style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                                         </div>
                                                         <div class="col-lg-1 col-md-1 delete-loichao kt-margin-b-5"
                                                             >
                                                             <i class="far fa-minus-square"
                                                                 style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                                         </div>
                                                     </div>';
                                                    }
                                                    echo '
                                                    <div class="col-lg-12 kt-margin-t-20 row">
                                                        <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                                            <div class="input-group">
                                                            <textarea rows="1" cols="10" class="form-control"
                                                                    name="loichao" placeholder="Chào mừng bạn đã đến với ..."></textarea>
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
                                                    </div>';
                                                ?>
                        </div>
                        <div class="col-lg-3">
                            <label>Đính kèm danh sách kết nối cộng đồng: </label>
                            <input type="checkbox" class="col-lg-3 form-control invitation"
                                <?php if ($response['invitation']==1) echo "checked"?>>
                        </div>
                        <div class="form-group col-lg-9 row ketnoi">
                            <div class="kt-margin-t-5 col-lg-12 row">
                                <div class="col-lg-6 col-md-6">
                                    <label>Text hiển thị:</label>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <label>Đường dẫn:</label>
                                </div>
                            </div>
                            <?php
                            $response['listconnect']=json_decode($response['listconnect'], true); 
                            if (!empty($response['listconnect']))
                            foreach($response['listconnect'] as $connect)
                            {
                            echo '
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            name="text" value="'.$connect['text'].'">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-2 kt-margin-b-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            name="url" value="'.$connect['url'].'">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 add-url kt-margin-b-5" style="display:none;">
                                    <i class="far fa-plus-square"
                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 delete-url kt-margin-b-5"
                                    >
                                    <i class="far fa-minus-square"
                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                </div>
                            </div>';
                            };
                            echo '
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            name="text" placeholder="Tên website">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-2 kt-margin-b-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            name="url" placeholder="https://eplus.vn/">
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
                            </div>';
                            ?>
                        </div>
                        <div class="form-group col-lg-12 row mt-4 loichao2">
                        <?php
                            $response['greeting2']=json_decode($response['greeting2'], true); 
                            if (!empty($response['greeting2']))
                            foreach($response['greeting2'] as $loichao)
                            {
                            echo '
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <textarea rows="1" cols="10" class="form-control"
                                            name="loichao2">'.$loichao['text'].'</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-1">
                                    <div class="input-group">
                                        <label for="checkid2" class="form-control"><input type="checkbox" id="checkid2" name="checkid2" '.(($loichao['userid']==1)?"checked":"").'> Đính kèm mã ID</label> 
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 add-loichao2 kt-margin-b-5" style="display:none;">
                                    <i class="far fa-plus-square"
                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 delete-loichao2 kt-margin-b-5">
                                    <i class="far fa-minus-square"
                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                </div>
                            </div>';
                            };
                            ?>
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-9 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <textarea rows="1" cols="10" class="form-control"
                                            name="loichao2" placeholder="Chào mừng bạn đã đến với ..."></textarea>
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
                            </div>
                        </div>
                        <div class="form-group col-lg-12 row mt-4 autosendmes">
                        <label class="col-10 text-left"><strong>Hẹn giờ tự động gửi tin nhắn</strong></label>
                        <div class=" kt-margin-t-5 col-lg-12 row">
                            <div class="col-lg-6 col-md-5">
                                <label> <strong>Nội dung tin nhắn:</strong></label>
                            </div>
                            <div class="col-lg-1 col-md-5">
                                <label> <strong>Đính kèm liên kết:</strong></label>
                            </div>  
                            <div class="col-lg-4 col-md-5">
                                <label><strong>Thời gian gửi tin:</strong></label>
                            </div>
                        </div>
                        <?php
                            $response['autosendmsg']=json_decode($response['autosendmsg'], true); 
                            if (!empty($response['autosendmsg']))
                            foreach($response['autosendmsg'] as $mes)
                            {
                            echo '
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <textarea rows="1" cols="10" class="form-control"
                                            name="message">'.$mes['msg'].'</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <input type="checkbox" name= "attach" class="form-control" '.(($mes['attach']==1)?"checked":"").'>
                                </div>
                                <div class="col-lg-4 col-md-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Sau</span>
                                        </div>
                                        <input type="number" name="day" class="form-control col-lg-2" value="'.$mes["day"].'">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ngày subscribe. Lúc</span>
                                        </div>
                                        <input type="time" name="hours" class="form-control col-lg-4" value="'.$mes["hours"].':'.$mes["mins"].'">
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 add-automsg kt-margin-b-5" style="display:none;">
                                    <i class="far fa-plus-square"
                                        style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-1 col-md-1 delete-automsg kt-margin-b-5">
                                    <i class="far fa-minus-square"
                                        style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                </div>
                                <div class="col-lg-7 mt-2 row col-md-2 link_url '.(($mes['attach']==1)?"display-block":"").'" style="display:none;">';
                                if ($mes['attach']==1) {
                                    foreach ($mes['linkattach'] as $attach) {
                                        echo '
                                        <div class="col-lg-12 kt-margin-t-20 row">    
                                            <div class="col-lg-5 col-md-2">
                                                <div class="input-group">
                                                    <textarea rows="1" cols="10" name="link_text" class="form-control" placeholder="Đường dẫn hiển thị">'.$attach["link_text"].'</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-2">
                                                <div class="input-group">
                                                    <textarea rows="1" cols="10" name="link" class="form-control" placeholder="Liên kết">'.$attach["link"].'</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5" style="display:none;">
                                            <i class="far fa-plus-square"
                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5">
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>';
                                    }
                                    echo '
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
                                            <div class="col-lg-1 col-md-1 add-link_url kt-margin-b-5" >
                                            <i class="far fa-plus-square"
                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                            </div>
                                            <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
                                                <i class="far fa-minus-square"
                                                    style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                            </div>
                                        </div>';
                                }
                                echo '
                                </div>
                            </div>';
                            };
                            ?>
                            <div class="col-lg-12 kt-margin-t-20 row">
                                <div class="col-lg-6 col-md-7 kt-margin-b-5">
                                    <div class="input-group">
                                        <textarea rows="1" cols="10" class="form-control"
                                            name="message" placeholder="Tin nhắn"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <input type="checkbox" class="form-control" name="attach">
                                </div>
                                <div class="col-lg-4 col-md-1">
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
                                <div class="col-lg-7 mt-2 row col-md-2 link_url" style="display:none;">
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
                                                style=" font-size: 3rem; color: #1dc9b7; cursor: pointer;"></i>
                                        </div>
                                        <div class="col-lg-1 col-md-1 delete-link_url kt-margin-b-5" style="display:none;">
                                            <i class="far fa-minus-square"
                                                style=" font-size: 3rem; color: #fd1361; cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <label>Chỉ định người dùng được nhấn báo cáo (Nhập ID trả về khi
                                đăng kí thành công): </label>
                            <input type="text" class="form-control idbaocao"
                                value="<?php echo $response['idbaocao'];?>">
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="button" class="btn btn-success updatebot">Cập
                                    nhật</button>
                                <button type="reset" class="btn btn-secondary">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('input[name="attach"]').click(function() {
        if ($(this).is(":checked"))
            $(this).parent().parent().children().last().addClass('display-block');
        else $(this).parent().parent().children().last().removeClass('display-block');
    }) 
    $('.updatebot').on('click', function() {
        var connect=[];
        $('input[name="text"]').map(function() {
            if ($(this).val()!='')
            connect.push({"text": $(this).val()})
        })
        let index=0;
        $('input[name="url"]').map(function() {
            if ($(this).val()!='')
            {
                connect[index].url=$(this).val();
                index++;
            }
        })
        let greeting=[];
        $('textarea[name="loichao"').map(function() {
            if ($(this).val()!='')
            greeting.push({"text": $(this).val()})
        })
        index=0;
        $('input[name="checkid"]').map(function() {
            if (greeting[index])
            {
                greeting[index].userid=($(this).prop('checked')==true)?1:0;
                index++;
            }
        })
        let greeting2=[];
        $('textarea[name="loichao2"').map(function() {
            if ($(this).val()!='')
            greeting2.push({"text": $(this).val()})
        })
        index=0;
        $('input[name="checkid2"]').map(function() {
            if (greeting2[index])
            {
                greeting2[index].userid=($(this).prop('checked')==true)?1:0;
                index++;
            }
        })
        let msgauto=[];
        $('textarea[name="message"').map(function() {
            if ($(this).val()!='')
            msgauto.push({"msg": $(this).val()})
        })
        index=0;
        $('input[name="attach"]').map(function() {
            if (msgauto[index]) 
                {
                    if ($(this).is(':checked'))
                        msgauto[index].attach=1;
                    else msgauto[index].attach=0;
                    index++;
                }
        })
        index=0;
        $('.link_url').map(function() {
            if (msgauto[index])
            {
                if ($(this).hasClass("display-block"))
                    {
                        let arraylink=[];
                        $(this).children().map(function() {
                            if ($(this).find('textarea[name="link"]').val()!="")
                            {
                                let link={
                                "link_text": ($(this).find('textarea[name="link_text"]').val()),
                                "link": ($(this).find('textarea[name="link"]').val())
                                }
                                arraylink.push(link);
                            }
                        })
                        msgauto[index].linkattach=arraylink;
                    }
                else msgauto[index].linkattach=[];
                index++;
            }
        })
        index=0;
        $('input[name="day"]').map(function() {
            if (msgauto[index])
            {
                msgauto[index].day=Number($(this).val());
                index++;
            }
        })
        index=0;
        $('input[name="hours"]').map(function() {
            if (msgauto[index])
            {
                msgauto[index].hours=($(this).val().slice(0,2)=="")?"00":$(this).val().slice(0,2);
                msgauto[index].mins=($(this).val().slice(3,5)=="")?"00":$(this).val().slice(3,5);
                index++;
            }
        })
        $.ajax({
            type: "POST",
            url: "./createapp.php",
            data: {
                "function": "updatebot",
                "id": <?php echo $id; ?>,
                "idbaocao": $('.idbaocao').val(),
                "greeting": JSON.stringify(greeting),
                "greeting2": JSON.stringify(greeting2),
                "invitation": ($('.invitation').prop('checked') ==true)?1:0,
                "connect": JSON.stringify(connect),
                "autosendmsg": JSON.stringify(msgauto),
            },
            success: function(data) {
                if (data == "success") {
                    alert("Cập nhật thành công");
                    window.location.href="telegram.php";
                } else
                alert("Cập nhật thất bại");
            }
        })
    });
})
</script>