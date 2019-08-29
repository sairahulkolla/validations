<?php
include("config.php");

require_once('MysqliDb.php');
error_reporting(E_ALL);
$action = 'adddb';
$data = array();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new Mysqlidb (DBHOSTNAME,DBUNAME,DBPASSWORD,DBDATABASENAME);
//$db->where("id = ?", Array(1));


if(isset($_REQUEST['src']) && $_REQUEST['src']=='api'){
    $handle = fopen('php://input','r');
    $jsonInput = fgets($handle);
    $json_decode = json_decode($jsonInput,true);
    header('Content-Type:application/json');
    if(isset($json_decode['securecode']) && $json_decode['securecode']=='##GET@USERS##'){
        $data['records']=$db->get ("wgj_premium_packages",array(0,10),"*");
        $data['status']='200';
    }else{
        $data['status']='500';
        $data['message']='Invalid Securecode';
    }
    echo json_encode($data);exit;
}
$apidata['securecode']='##GET@USERS##';
$file="testprepare.php?src=api";
print_r(apiRequest(json_encode($apidata),$file));
function apiRequest($json_encode,$file)
{
$url = 'https://www.wisdomjobsgulf.com/'.$file;
$domain ="www.wisdomjobsgulf.com";
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type:application/json','Host: '.$domain));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_encode);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$res = curl_exec($curl);
/*print_r($res);
exit;*/
curl_close($curl);
return $res;
}
?>
