<?php
include 'header.php';
include 'footer.php';
$arraycontact = array();
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

function get_extra_phone($phone)
{
    $phoneNumbers = [];
    if ($phone != null) {
        $phone = preg_replace('/\s\s+/', '-', $phone);
        $phone = str_replace(': ', '-', $phone);
        $phone = str_replace(',', '-', $phone);
        if (!preg_match('(-|–|\/)', $phone)) {
            $phoneNumbers[] = preg_replace('/[^0-9]/', '', $phone);
        } else {
            $phone = preg_replace('/[^0-9\/\-\–]/', '', $phone);
            $phone = str_replace('/', '-', $phone);
            $phone = str_replace('–', '-', $phone);

            if (preg_match('(-)', $phone)) {
                $phoneArray = explode('-', $phone);
                foreach ($phoneArray as $_phone) {
                    if ($_phone) {
                        $phoneNumbers[] = $_phone;
                    }
                }
            } else if (preg_match('(\/)', $phone)) {
                $phoneArray = explode('/', $phone);
                foreach ($phoneArray as $_phone) {
                    if ($_phone) {
                        $phoneNumbers[] = $_phone;
                    }
                }
            } else if (preg_match('(–)', $phone)) {
                $phoneArray = explode('–', $phone);
                foreach ($phoneArray as $_phone) {
                    if ($_phone) {
                        $phoneNumbers[] = $_phone;
                    }
                }
            }

        }
    }
    return $phoneNumbers;
}

if (isset($phone) && is_array($phone)) {
    foreach ($phone as $i => $p) {
        if (isset($p) && !empty($p))
            $arraycontact[$i] = json_encode(['phone' => $p]);
    };
};
$firstname = $_POST['first_name'];
foreach ($firstname as $i => $first) {
    if (isset($arraycontact[$i])) {
        $data = json_decode($arraycontact[$i]);
        $data->first_name = $first;
        $arraycontact[$i] = $data;
    };
};
$lastname = $_POST['last_name'];
foreach ($lastname as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->last_name = $last;
        $arraycontact[$i] = $data;
    }
};

$extra_phone = preg_replace('/\s+/', '', $_POST['extra_phone']);
foreach ($extra_phone as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->extra_phone = ((object) explode(',',$last));
        $arraycontact[$i] = $data;
    }
};

$birthday = $_POST['birthday'];
foreach ($birthday as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->birthday = $last;
        $arraycontact[$i] = $data;
    }
};

$email = $_POST['email'];
foreach ($email as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->email = $last;
        $arraycontact[$i] = $data;
    }
};

$extra_email = $_POST['extra_email'];
foreach ($extra_email as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->extra_email = $last;
        $arraycontact[$i] = $data;
    }
};

$address = $_POST['address'];
foreach ($address as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->address = $last;
        $arraycontact[$i] = $data;
    }
};

$extra_address = $_POST['extra_address'];
foreach ($extra_address as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->extra_address = $last;
        $arraycontact[$i] = $data;
    }
};

$identify_card_id = $_POST['identify_card_id'];
foreach ($identify_card_id as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->identify_card_id = $last;
        $arraycontact[$i] = $data;
    }
};


$passport_number = $_POST['passport_number'];
foreach ($passport_number as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->passport_number = $last;
        $arraycontact[$i] = $data;
    }
};

$country = $_POST['country'];
foreach ($country as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->country = $last;
        $arraycontact[$i] = $data;
    }
};

$district = $_POST['district'];
foreach ($district as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->district = $last;
        $arraycontact[$i] = $data;
    }
};

$city = $_POST['city'];
foreach ($city as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->city = $last;
        $arraycontact[$i] = $data;
    }
};

$state = $_POST['state'];
foreach ($state as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->state = $last;
        $arraycontact[$i] = $data;
    }
};

$zipcode = $_POST['zipcode'];
foreach ($zipcode as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->zipcode = $last;
        $arraycontact[$i] = $data;
    }
};

$extra_id = $_POST['extra_id'];
foreach ($extra_id as $i => $last) {
    if (isset($arraycontact[$i])) {
        $data = $arraycontact[$i];
        $data->extra_id = $last;
        $arraycontact[$i] = $data;
    }
};

$addFriend = (isset($_POST['addFriend']) ? 1 : 0);
//add contact from file
if (isset($_FILES["myfile"])) {
    $filename = $_FILES['myfile']['tmp_name'];
    if ($_FILES['myfile']['size'] > 0 && $_FILES['myfile']['size'] < 10 * 1024 * 1024) {
        $file = fopen($filename, 'r');
        while (!feof($file)) {
            $column = fgetcsv($file);
            $extra_phone = get_extra_phone($column[$_POST['index_phone'] - 1]);
            $phone = $extra_phone[0];
            unset($extra_phone[0]);
            if (!empty($column[$_POST['index_phone'] - 1]))
                array_push($arraycontact, (
                    ['phone' => $phone,
                    'first_name' => (!empty($column[$_POST['index_firstname'] - 1]) ? $column[$_POST['index_firstname'] - 1] : ''),
                    'last_name' => (!empty($column[$_POST['index_lastname'] - 1]) ? $column[$_POST['index_lastname'] - 1] : ''),
                    'extra_phone' => $extra_phone,
                    'address' => (!empty($column[$_POST['index_address'] - 1]) ? trim($column[$_POST['index_address'] - 1]) : ''),
                    'extra_address' => (!empty($column[$_POST['index_extra_address'] - 1]) ? trim($column[$_POST['index_extra_address'] - 1]) : ''),
                    'email' => (!empty($column[$_POST['index_email'] - 1]) ? trim($column[$_POST['index_email'] - 1]) : ''),
                    'extra_mail' => (!empty($column[$_POST['index_extra_email'] - 1]) ? trim($column[$_POST['index_extra_email'] - 1]) : ''),
                    'birthday' => (!empty($column[$_POST['index_birthday'] - 1]) ? trim($column[$_POST['index_birthday'] - 1]) : ''),
                    'identify_card_id' => (!empty($column[$_POST['index_identify_card_id'] - 1]) ? trim($column[$_POST['index_identify_card_id'] - 1]) : ''),
                    'passport_number' => (!empty($column[$_POST['index_passport_number'] - 1]) ? trim($column[$_POST['index_passport_number'] - 1]) : ''),
                    'country' => (!empty($column[$_POST['index_country'] - 1]) ? trim($column[$_POST['index_country'] - 1]) : ''),
                    'district' => (!empty($column[$_POST['index_district'] - 1]) ? trim($column[$_POST['index_district'] - 1]) : ''),
                    'city' => (!empty($column[$_POST['index_city'] - 1]) ? trim($column[$_POST['index_city'] - 1]) : ''),
                    'state' => (!empty($column[$_POST['index_state'] - 1]) ? trim($column[$_POST['index_state'] - 1]) : ''),
                    'zipcode' => (!empty($column[$_POST['index_zipcode'] - 1]) ? trim($column[$_POST['index_zipcode'] - 1]) : ''),
                    'extra_id' => (!empty($column[$_POST['index_extra_id'] - 1]) ? trim($column[$_POST['index_extra_id'] - 1]) : '')

                ]));
        }
    }
}
$body = [
    'id' => (isset($_POST['id']) ? intval($_POST['id']) : '0'),
    'contacts' => json_encode($arraycontact),
    'idgroupcontact' => $_POST['groupcontact'],
    'addfriend' => $addFriend,
];
$url = 'http://localhost:2020/telegram/import_contact';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
    'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'Authorization: ' . $_SESSION['user_token']
]);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
$response = json_decode(curl_exec($curl), true);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
if ($httpcode == 200) {
    echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "Thêm người dùng thành công",
                text: "Thêm vào danh bạ thành công: ' . $response['contact_success'] . '/' . $response['all'] . ',Thêm vào bạn bè: ' . $response['friend_success'] . '",
              })
              .then((kq) => {
                if (kq && kq.value) {
                    window.location.href="getcontact.php?id=' . $_POST['id'] . '"; 
                } ';
    echo '})
              </script>';
} else if ($httpcode == 500)
    echo '
        <script>
            window.location.href="loginerror.php";
        </script>';
else
    echo '
        <script>
            window.location.href="badrequest.php";
        </script>';
?>

