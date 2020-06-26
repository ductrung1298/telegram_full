<?php
    include 'header.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $url = 'http://localhost:2020/telegram/get_dialogs';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'Authorization: '.$_SESSION['user_token']
    ]);
    // response
    $list_group_chat = json_decode(curl_exec($curl), true);
    curl_close($curl);

    foreach($list_group_chat as $group ) 
    {
        echo '<pre>';
        echo print_r($group);
        echo '</pre>';
    } 
    
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app"
        id="kt_content">
       
        <!-- begin:: Content -->
        <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit">
            <div class="kt-portlet kt-portlet--last">
                <div class="kt-portlet__body">
                    <div class="kt-searchbar">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg></span></div>
                            <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="kt-widget kt-widget--users kt-mt-20">
                        <div class="kt-scroll kt-scroll--pull">
                            <div class="kt-widget__items">
                                <?php 
                                    if (!empty($list_group_chat))
                                    foreach($list_group_chat as $group ) {
                                        echo '
                                        <div class="kt-widget__item">
                                            <span class="kt-media kt-media--circle">
                                                <img src="../assets/media/users/300_9.jpg" alt="image">
                                            </span>
                                            <div class="kt-widget__info">
                                                <div class="kt-widget__section">
                                                    <a href="#" class="kt-widget__username">'.(isset($group['from_first_name'])?$group['from_first_name']:"").'</a>
                                                    <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                                                </div>
                                                <span class="kt-widget__desc">
                                                    '.(isset($group['message'])?$group['message']:"").'
                                                </span>
                                            </div>
                                            <div class="kt-widget__action">
                                                <span class="kt-widget__date">36 Mines</span>
                                                <span class="kt-badge kt-badge--success kt-font-bold">7</span>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="kt-widget__item">
                                    <span class="kt-media kt-media--circle">
                                        <img src="../assets/media/users/300_9.jpg" alt="image">
                                    </span>
                                    <div class="kt-widget__info">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">Matt Pears</a>
                                            <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                                        </div>
                                        <span class="kt-widget__desc">
                                            Head of Development
                                        </span>
                                    </div>
                                    <div class="kt-widget__action">
                                        <span class="kt-widget__date">36 Mines</span>
                                        <span class="kt-badge kt-badge--success kt-font-bold">7</span>
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <span class="kt-media kt-media--circle">
                                        <img src="../assets/media/users/100_7.jpg" alt="image">
                                    </span>
                                    <div class="kt-widget__info">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">Charlie Stone</a>
                                            <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                                        </div>
                                        <span class="kt-widget__desc">
                                            Art Director
                                        </span>
                                    </div>
                                    <div class="kt-widget__action">
                                        <span class="kt-widget__date">5 Hours</span>
                                        <span class="kt-badge kt-badge--success kt-font-bold">2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--head-lg- kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">

                                <!--begin:: Aside Mobile Toggle -->
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop" id="kt_chat_aside_mobile_toggle">
                                    <i class="flaticon2-open-text-book"></i>
                                </button>

                                <!--end:: Aside Mobile Toggle-->
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-left dropdown-menu-md">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                                    <span class="kt-nav__link-text">Groups</span>
                                                    <span class="kt-nav__link-badge">
                                                        <span class="kt-badge kt-badge--brand kt-badge--inline">new</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Privacy</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                            </div>
                            <div class="kt-chat__center">
                                <div class="kt-chat__label kt-hidden">
                                    <a href="#" class="kt-chat__title">Jason Muller</a>
                                    <span class="kt-chat__status">
                                        <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                    </span>
                                </div>
                                <div class="kt-chat__pic">
                                    <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="top" title="Jason Muller" data-original-title="Tooltip title">
                                        <img src="../assets/media/users/300_12.jpg" alt="image">
                                    </span>
                                    <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="top" title="Nick Bold" data-original-title="Tooltip title">
                                        <img src="../assets/media/users/300_11.jpg" alt="image">
                                    </span>
                                    <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="top" title="Milano Esco" data-original-title="Tooltip title">
                                        <img src="../assets/media/users/100_14.jpg" alt="image">
                                    </span>
                                    <span class="kt-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-placement="top" title="Teresa Fox" data-original-title="Tooltip title">
                                        <img src="../assets/media/users/100_4.jpg" alt="image">
                                    </span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon2-add-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Messaging
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                    <span class="kt-nav__link-badge">
                                                        <span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                            <div class="kt-chat__messages">
                                <div class="kt-chat__message">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-success">
                                        How likely are you to recommend our company to your<br>
                                        friends and family?
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-brand">
                                        Hey there, we’re just writing to let you know that you’ve been<br>
                                        subscribed to a repository on GitHub.
                                    </div>
                                </div>
                                <div class="kt-chat__message">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/300_11.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Nick Bold</span></a>
                                        <span class="kt-chat__datetime">50 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-success">
                                        Ok, Understood!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-brand">
                                        You’ll receive notifications for<br>
                                        all issues, pull requests!
                                    </div>
                                </div>
                                <div class="kt-chat__message">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/100_14.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Milano Esco</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-success">
                                        You were automatically <b class="kt-font-brand">subscribed</b> because you’ve<br>
                                        been given access to the repository
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-brand">
                                        You can unwatch this repository immediately by clicking here: <a href="#" class="kt-font-bold kt-link">https://github.com</a>
                                    </div>
                                </div>
                                <div class="kt-chat__message">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-success">
                                        Discover what students who viewed Learn Figma - UI/UX Design Essential Training also viewed
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="../assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text kt-bg-light-brand">
                                        Most purchased Business courses during this sale!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea style="height: 50px" placeholder="Type here..."></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#"><i class="flaticon2-link"></i></a>
                                    <a href="#"><i class="flaticon2-photograph"></i></a>
                                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button" class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply">reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
    ?>
