<?php
$id=isset($_GET['id'])?intval($_GET['id']):0;
$user=isset($_GET['user'])?intval($_GET['user']):0;
include 'header.php';
if ($id!=0 && $user!=0) {
    $url='http://localhost:3000/telegram/get_contact?idgroupcontact='.$id.'&idaccount='.$user;
    $curl=curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
        'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
        'Authorization: '.$_SESSION['user_token']
    ]);
    $list_user_in_contact=json_decode(curl_exec($curl), true);
    $httpcode=curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);

    include 'connection.php';
    $group = new Connection();
    $value = $group->connect('telegram/get_contact?idcontact='.$id);
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
                        <a href="getcontact.php?id=<?php echo $user; ?>" class="kt-subheader__breadcrumbs-link">
                            Danh bạ </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Quản lý danh bạ </a>
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
                                    <i class="flaticon2-group"></i>Danh bạ
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
                                        <h3>
                                            Danh bạ: <?php 
                                                echo $value['Name'];
                                            ?>
                                            <hr>
                                        </h3>
                                        
                                        <h4 class="kt-font-danger">Danh sách thành viên</h4>
                                        
                                        <div class="kt-section__content">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First_name</th>
                                                        <th>Last_name</th>
                                                        <th>Phone_Number</th>
                                                        <th>Danh bạ khác</th>
                                                        <th>Bạn bè</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($list_user_in_contact))
                                                    foreach($list_user_in_contact as $index => $contact)
                                                    {
                                                    echo ' <tr>
                                                        <th scope="row">'.((int)$index+1).'</th>
                                                        <td>
                                                            <label>
                                                                '.(isset($contact['user_first_name'])?$contact['user_first_name']:'').'
                                                            </label>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($contact['user_last_name'])?$contact['user_last_name']:'').'</label>
                                                        </td>';
                                                        echo '<td>
                                                            <label>'.(isset($contact['phone'])?$contact['phone']:'').'
                                                            </label>
                                                        </td>';
                                                        $data = isset($contact['othergroup']) ? $contact['othergroup'] : [];

                                                        echo '<td>';
                                                        foreach($data as $key => $item) {
                                                            if ($item!= $value["Name"])
                                                            echo '<span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill m-1">'.$item.'</span>';
                                                        }
                                                        
                                                        echo '</td>';
                                                        
                                                        echo '<td>
                                                            '. ((isset($contact['user_id'])) ? '<button class="btn btn-sm btn-outline-success"><i class="la la-check"></i></button>' : '') .'
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