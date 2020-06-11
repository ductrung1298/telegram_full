<?php
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $url='http://localhost:2020/telegram/get_dialogs';
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $dialogs =json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);

    //Code written by purpledesign.in Jan 2014
    function dateDiff($date)
    {
            $mydate= date("d/m/Y H:i:s");
            $theDiff="";
            //echo $mydate;//2014-06-06 21:35:55
            $datetime1 = date_create($date);
            $datetime2 = date_create($mydate);
            if ($datetime1 && $datetime2) 
            {
                $interval = date_diff($datetime1, $datetime2);
                //echo $interval->format('%s Seconds %i Minutes %h Hours %d days %m Months %y Year    Ago')."<br>";
                $min=$interval->format('%i');
                $sec=$interval->format('%s');
                $hour=$interval->format('%h');
                $mon=$interval->format('%m');
                $day=$interval->format('%d');
                $year=$interval->format('%y');
                if($interval->format('%i%h%d%m%y')=="00000")
                {
                    //echo $interval->format('%i%h%d%m%y')."<br>";
                    return $sec." Seconds";
                } 

                else if($interval->format('%h%d%m%y')=="0000"){
                return $min." Minutes";
                }


                else if($interval->format('%d%m%y')=="000"){
                return $hour." Hours";
                }


                else if($interval->format('%m%y')=="00"){
                return $day." Days";
                }

                else if($interval->format('%y')=="0"){
                return $mon." Months";
                }

                else{
                return $year." Years";
                }
            }
            else return $date;
    }
?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_chat_aside_close">
                <i class="la la-close"></i>
            </button>

            <!--End:: App Aside Mobile Toggle-->

            <!--Begin:: App Aside-->
            <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit"
                id="kt_chat_aside">

                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__body">
                        <div class="kt-searchbar">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg></span></div>
                                <input type="text" class="form-control" placeholder="Search"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="kt-widget kt-widget--users kt-mt-20">
                            <div class="kt-scroll kt-scroll--pull">
                                <div class="kt-widget__items">
                                    <?php
                                if (!empty($dialogs))
                                    foreach($dialogs as $dialog) {
                                        
                                        echo '
                                        <div class="kt-widget__item">
                                            <div class="kt-widget__head"> 
                                                <span class="kt-widget__desc">'.$dialog['user_name'].'</span>
                                            </div>
                                            <div class="kt-widget__info" data-id_account="'.(isset($dialog['user_id'])?$dialog['user_id']:"").'" data-_="'.$dialog['to_id']['_'].'" data-user_id="'.(isset($dialog['to_id']['user_id'])?$dialog['to_id']['user_id']:"").'" 
                                            data-access_hash="'.(isset($dialog['to_id']['access_hash'])?$dialog['to_id']['access_hash']:"").'" 
                                            data-channel_id="'.(isset($dialog['to_id']['channel_id'])?$dialog['to_id']['channel_id']:"").'"
                                            data-chat_id="'.(isset($dialog['to_id']['chat_id'])?$dialog['to_id']['chat_id']:"").'">
                                                <div class="kt-widget__section">
                                                    <a class="kt-widget__username">'.(($dialog['to_id']['_']=="peerUser")?((isset($dialog['to_id']['first_name'])?$dialog['to_id']['first_name']:"").' ' . (isset($dialog['to_id']['last_name'])?$dialog['to_id']['last_name']:"")):$dialog['to_id']['title']).'</a>
                                                </div>
                                                <span class="kt-widget__desc">
                                                    '.(isset($dialog['from_first_name'])?$dialog['from_first_name']:(isset($dialog['from_id'])?$dialog['from_id']:"")).' : '.($dialog['message']).'
                                                </span>
                                            </div>
                                            <div class="kt-widget__action">
                                                <span class="kt-widget__date">'.(isset($dialog['date'])?dateDiff(date("d/m/Y H:i:s",$dialog['date']) ):"").'</span>
                                            </div>
                                        </div>' ;
                                    } 
                            ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Portlet-->
            </div>

            <!--End:: App Aside-->
            <div class="loading kt-spinner kt-spinner--v2 kt-spinner--lg kt-spinner--warning" style="display: none;"><!-- Place at bottom of page --></div>

            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
                <div class="kt-chat">
                    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
                        <div class="kt-portlet__head">
                            <div class="kt-chat__head ">
                                <div class="kt-chat__left">

                                    <!--begin:: Aside Mobile Toggle -->
                                    <button type="button"
                                        class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop"
                                        id="kt_chat_aside_mobile_toggle">
                                        <i class="flaticon2-open-text-book"></i>
                                    </button>

                                    <!--end:: Aside Mobile Toggle-->
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="flaticon-more-1"></i>
                                        </button>
                                        <div
                                            class="dropdown-menu dropdown-menu-fit dropdown-menu-left dropdown-menu-md">

                                            <!--begin::Nav-->
                                            <ul class="kt-nav">
                                                <li class="kt-nav__item">
                                                    <a href="#" class="kt-nav__link">
                                                        <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                        <span class="kt-nav__link-text">Chi tiết</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <!--end::Nav-->
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-chat__center">
                                    <div class="kt-chat__label">
                                        <a href="#" class="kt-chat__title">Tên cuộc trò chuyện</a>
                                        <span class="kt-chat__status">
                                            <span class="kt-badge kt-badge--dot kt-badge--success kt-chat__status_online"></span> Trạng thái online
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-chat__right">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="flaticon2-add-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                                <div class="kt-chat__messages">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-chat__input">
                                <div class="kt-chat__editor">
                                    <textarea name="message" style="height: 50px" placeholder="Type here..."></textarea>
                                </div>
                                <div class="kt-chat__toolbar">
                                    <div class="kt_chat__actions">
                                        <button type="button"
                                            class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply_1" data-id=0 data-type=0 data-user_id=0 data-access_hash=0
                                            data-chat_id=0 data-channel_id=0 >reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--End:: App Content-->
        </div>

        <!--End::App-->
    </div>

    <!-- end:: Content -->
</div>

<?php
include 'footer.php';
?>
<script>
    jQuery(document).ready(function($) {

        $('.kt-widget__info').click(function() {
            if ($(this).data('id_account')) {
                $('.loading').addClass('display-block');
                let id = $(this).data('id_account'),
                type =  $(this).data('_'),
                chat_id = $(this).data('chat_id'),
                user_id =  $(this).data('user_id'),
                access_hash = $(this).data('access_hash'),
                channel_id = $(this).data('channel_id');
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "get_history",
                        "id": $(this).data('id_account'),
                        "type": $(this).data('_'),
                        "chat_id": $(this).data('chat_id'),
                        "user_id" : $(this).data('user_id'),
                        "access_hash": $(this).data('access_hash'),
                        "channel_id": $(this).data('channel_id')
                    },
                    success: function (dt) {
                        $('.loading').removeClass('display-block');
                        if (dt && dt.length!=0) {
                            dt = JSON.parse(dt);
                            if (dt.messages) {
                                $('.kt-chat__title').text("");
                                $('.kt-chat__title').text(dt.title);
                                if (dt.count && dt.count>1) $('.kt-chat__status').text(dt.count + " thành viên");
                                let html = '';
                                for (let mes of dt.messages) {
                                    if (mes.message)
                                    html = html + `
                                    <div class="kt-chat__message ${((mes.me)?"kt-chat__message--right":"")}">
                                        <div class="kt-chat__user">
                                            
                                            <a href="#" class="kt-chat__username">${(((mes.from_first_name)?mes.from_first_name:"") + " " +((mes.from_last_name)?mes.from_last_name:""))}</span></a>
                                            <span class="kt-chat__datetime">${new Date(mes.date *1000).toLocaleString()}</span>
                                        </div>
                                        <div class="kt-chat__text kt-bg-light-success">
                                            ${mes.message}
                                        </div>
                                    </div>
                                    `;
                                }
                                $('.kt-chat__messages').html(html);
                                document.querySelector('.kt-chat__reply_1').dataset.id=id;
                                if (type=="peerUser") 
                                {
                                    document.querySelector('.kt-chat__reply_1').dataset.type=0;
                                    document.querySelector('.kt-chat__reply_1').dataset.user_id=user_id;
                                    document.querySelector('.kt-chat__reply_1').dataset.access_hash=access_hash;
                                }
                                else if (type=="peerChat")
                                { 
                                    document.querySelector('.kt-chat__reply_1').dataset.type=1;
                                    document.querySelector('.kt-chat__reply_1').dataset.chat_id=chat_id;
                                }
                                else if (type=="peerChannel") 
                                {
                                    document.querySelector('.kt-chat__reply_1').dataset.type=3;
                                    document.querySelector('.kt-chat__reply_1').dataset.channel_id=channel_id;
                                    document.querySelector('.kt-chat__reply_1').dataset.access_hash=access_hash;
                                }
                            }
                        }
                    }
                })
            }
        })

        $('.kt-chat__reply_1').click(function() {
            if ($(this).data('id')!=0 ) {
                $.ajax({
                    url: "./createapp.php",
                    type: "POST",
                    data: {
                        "function": "sendMessage",
                        "id": $(this).data('id'),
                        "type": $(this).data('type'),
                        "type_time": 0,
                        "user_id": $(this).data('user_id'),
                        "access_hash": $(this).data('access_hash'),
                        "chat_id": $(this).data('chat_id'),
                        "channel_id": $(this).data('channel_id'),
                        "message": $('textarea[name="message"]').val(),
                    },
                    success: function (dt) {
                        if (dt) {
                            console.log(dt);
                        }
                        else {
                            Swal.fire(
                                'Lỗi...',
                                'Lỗi khi gửi tin nhắn. Vui lòng thử lại',
                                'error',
                            );
                        }
                    }
                })
            }
            else Swal.fire(
                'Lỗi...',
                'Lỗi khi gửi tin nhắn. Vui lòng thử lại',
                'error',
            );
        })
    })
</script>