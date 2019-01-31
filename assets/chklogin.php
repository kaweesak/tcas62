<?php

session_start();
error_reporting(0);

$ldapconfig['host'] = 'sdu-ldap.dusit.ac.th'; //'sdu-ldap1.dusit.ac.th';
$ldapconfig['port'] = 389;
$ldapconfig['basedn'] = 'dc=dusit,dc=ac,dc=th';
$ldapconfig['authrealm'] = 'SDU Authentication LDAP';

function ldap_authenticate($txtuser, $txtpass) {
    global $ldapconfig;

    if ($txtuser != "" && $txtuser != "") {
        $ds = @ldap_connect($ldapconfig['host'], $ldapconfig['port']);
        $r = @ldap_search($ds, $ldapconfig['basedn'], 'uid=' . $txtuser);
        if ($r) {
            $result = @ldap_get_entries($ds, $r);
            if ($result[0]) {
                if (@ldap_bind($ds, $result[0]['dn'], $txtpass)) {
                    //print_r($result[0]);
                    //break;

                    return $result[0];
                }
            }
        }
    }
    header('WWW-Authenticate: Basic realm="' . $ldapconfig['authrealm'] . '"');
    header('HTTP/1.0 401 Unauthorized');
    return null;
}

$key = "022445000" . date(dmY);

function encrypt($string, $key) {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result.=$char;
    }

    return base64_encode($result);
}

$check = ldap_authenticate($_POST["u_user"], $_POST["u_pass"]);
if ($check) {
    $txt_user = encrypt($_POST['u_user'], $key);

//    print_r($check["displayname"]["0"]);

    // $data['u_user'] = $check["displayname"]["0"];  // ส่งชื่อกลักลับมา
    // $data['u_id'] = $check["hrcode"]["0"];  // ส่งชื่อกลักลับมา
    // $data['facultycode'] = $check["facultycode"]["0"];  // ส่งชื่อกลักลับมา
    $data['uid'] = $check["uid"]["0"];  // ส่งชื่อกลักลับมา
   // print_r($check);

    echo json_encode($data);
    
//            print_r($check);
//  	echo $check["gecos"]["0"]." ".$check["hrcode"]["0"];
//	$_SESSION["txtuser"]=$_POST['txtuser'];
//	echo $_SESSION["txtuser"];
//	echo "<meta http-equiv='refresh' content='0;URL=panel_user.php'>";
} else {
// 	echo "<meta http-equiv='refresh' content='0;URL=check_user.php'>";
    //	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
}

