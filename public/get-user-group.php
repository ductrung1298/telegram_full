<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
include 'header.php';
if ($id!=0) {
    $url='http://localhost:2020/telegram/get_list_group_chat_telegram?id='.$id;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_group_chat=json_decode(curl_exec($curl), true);
    $list_group=$list_group_chat['chats'];
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
}
?>
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader mb-5 kt-grid__item" id="kt_subheader">
            <div class="kt-container ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        Tool Telegram </h3>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="add-account-tool-telegram.php" class="kt-subheader__breadcrumbs-link">
                            Tài khoản </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Danh sách group chat Telegram </a>
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
                                <a class="nav-link active" data-toggle="tab"
                                    href="#kt_portlet_base_demo_1_1_tab_content" role="tab" aria-selected="true">
                                    <i class="flaticon2-group"></i>Danh sách group chat
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">
                            <div class="kt-portlet__body">
                                <div class="row ">
                                    <div class="kt-section col-12">                                        
                                        <div class="kt-section__content">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Số lượng</th>
                                                        <th>Kiểu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($list_group))
                                                    foreach($list_group as $index => $group)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>
                                                            <label>
                                                                '.(isset($group['id'])?$group['id']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td>
                                                            <a href="list_user_in_group.php?id='.$id.(($group['_']=="chat")?("&chat_id=".$group['id']):("&channel_id=".$group['id']."&access_hash=".$group['access_hash'])).'">'.(isset($group['title'])?$group['title']:'').'</a>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($group['count'])?$group['count']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td><span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">
                                                            '. ((($group['_'])=="chat") ? "GROUP" : ($group['_']=="channel" && isset($group['megagroup']))? "SUPER GROUP" : "CHANNEL") .'</span>
                                                        </td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</script>