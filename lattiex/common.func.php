<?php

//字符串过滤函数
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);//stripslashes()返回一个去除转义反斜线后的字符串（\' 转换为 ' 等等）。双反斜线（\\）被转换为单个反斜线（\）。 
  $data = htmlspecialchars($data,ENT_COMPAT,'ISO-8859-1');
  return $data;
}

function toupper($str){
	$str = trim($str);
	$str = strtoupper($str);
	return $str;
}

//加密解密函数
function encrypt($string,$operation,$key=''){
    $key=md5($key);
    $key_length=strlen($key);
      $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
    $string_length=strlen($string);
    $rndkey=$box=array();
    $result='';
    for($i=0;$i<=255;$i++){
           $rndkey[$i]=ord($key[$i%$key_length]);
        $box[$i]=$i;
    }
    for($j=$i=0;$i<256;$i++){
        $j=($j+$box[$i]+$rndkey[$i])%256;
        $tmp=$box[$i];
        $box[$i]=$box[$j];
        $box[$j]=$tmp;
    }
    for($a=$j=$i=0;$i<$string_length;$i++){
        $a=($a+1)%256;
        $j=($j+$box[$a])%256;
        $tmp=$box[$a];
        $box[$a]=$box[$j];
        $box[$j]=$tmp;
        $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
    }
    if($operation=='D'){
        if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8)){
            return substr($result,8);
        }else{
            return'';
        }
    }else{
        return str_replace('=','',base64_encode($result));
    }
} 
//用法：函数encrypt($string,$operation,$key)中$string：需要加密解密的字符串；$operation：判断是加密还是解密，E表示加密，D表示解密；$key：密匙。

//获取客户端ip
function  get_client_ip() {
	$IPaddress='';
	/* if (isset($_SERVER)){
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$IPaddress = $_SERVER["HTTP_CLIENT_IP"];
		} else {
			$IPaddress = $_SERVER["REMOTE_ADDR"];
		}
	} else {
		if (getenv("HTTP_X_FORWARDED_FOR")){
			$IPaddress = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("HTTP_CLIENT_IP")) {
			$IPaddress = getenv("HTTP_CLIENT_IP");
		} else {
			$IPaddress = getenv("REMOTE_ADDR");
		}
	} */
	$IPaddress = $_SERVER['HTTP_CDN_SRC_IP'];
	return $IPaddress;
}

//判断手机型号
function get_mobile_agent(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (stripos($user_agent, "iPhone")!==false) {
        $brand = 'iPhone';
    }else if (stripos($user_agent, "SAMSUNG")!==false || stripos($user_agent, "Galaxy")!==false || strpos($user_agent, "GT-")!==false || strpos($user_agent, "SCH-")!==false || strpos($user_agent, "SM-")!==false) {
        $brand = '三星';
    } else if (stripos($user_agent, "Huawei")!==false || stripos($user_agent, "Honor")!==false || stripos($user_agent, "H60-")!==false || stripos($user_agent, "H30-")!==false) {
        $brand = '华为';
    } else if (stripos($user_agent, "Lenovo")!==false) {
        $brand = '联想';
    } else if (strpos($user_agent, "MI-ONE")!==false || strpos($user_agent, "MI 1S")!==false || strpos($user_agent, "MI 2")!==false || strpos($user_agent, "MI 3")!==false || strpos($user_agent, "MI 4")!==false || strpos($user_agent, "MI-4")!==false) {
        $brand = '小米';
    } else if (strpos($user_agent, "HM NOTE")!==false || strpos($user_agent, "HM201")!==false) {
        $brand = '红米';
    } else if (stripos($user_agent, "Coolpad")!==false || strpos($user_agent, "8190Q")!==false || strpos($user_agent, "5910")!==false) {
        $brand = '酷派';
    } else if (stripos($user_agent, "ZTE")!==false || stripos($user_agent, "X9180")!==false || stripos($user_agent, "N9180")!==false || stripos($user_agent, "U9180")!==false) {
        $brand = '中兴';
    } else if (stripos($user_agent, "OPPO")!==false || strpos($user_agent, "X9007")!==false || strpos($user_agent, "X907")!==false || strpos($user_agent, "X909")!==false || strpos($user_agent, "R831S")!==false || strpos($user_agent, "R827T")!==false || strpos($user_agent, "R821T")!==false || strpos($user_agent, "R811")!==false || strpos($user_agent, "R2017")!==false) {
        $brand = 'OPPO';
    } else if (strpos($user_agent, "HTC")!==false || stripos($user_agent, "Desire")!==false) {
        $brand = 'HTC';
    } else if (stripos($user_agent, "vivo")!==false) {
        $brand = 'vivo';
    } else if (stripos($user_agent, "K-Touch")!==false) {
        $brand = '天语';
    } else if (stripos($user_agent, "Nubia")!==false || stripos($user_agent, "NX50")!==false || stripos($user_agent, "NX40")!==false) {
        $brand = '努比亚';
    } else if (strpos($user_agent, "M045")!==false || strpos($user_agent, "M032")!==false || strpos($user_agent, "M355")!==false) {
        $brand = '魅族';
    } else if (stripos($user_agent, "DOOV")!==false) {
        $brand = '朵唯';
    } else if (stripos($user_agent, "GFIVE")!==false) {
        $brand = '基伍';
    } else if (stripos($user_agent, "Gionee")!==false || strpos($user_agent, "GN")!==false) {
        $brand = '金立';
    } else if (stripos($user_agent, "HS-U")!==false || stripos($user_agent, "HS-E")!==false) {
        $brand = '海信';
    } else if (stripos($user_agent, "Nokia")!==false) {
        $brand = '诺基亚';
    } else {
        $brand = '其他设备';
    }
    return $brand;
}
/**
*根据ip获取地市
**/
function GetIpLookup($ip = ''){  
	if(empty($ip)){  
		$ip = GetIp();  
	}  
	$res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
	if(empty($res)){ return false; }  
	$jsonMatches = array();  
	preg_match('#\{.+?\}#', $res, $jsonMatches);  
	if(!isset($jsonMatches[0])){ return false; }  
	$json = json_decode($jsonMatches[0], true);  
	if(isset($json['ret']) && $json['ret'] == 1){  
		$json['ip'] = $ip;  
		unset($json['ret']);  
	}else{  
		return false;  
	}  
	return $json;  
} 
/**
*根据ip获取地市 by ip138
**/
function getDatabyip($ip){ 
$datatype = 'txt';
$url = 'http://api.ip138.com/query/?ip='.$ip.'&datatype='.$datatype;
$header = array('token:b22502511cb8c36e02c0a40f1c6e751a');
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3); 
$handles = curl_exec($ch); 
curl_close($ch); 
return $handles; 
}

/**
*根据手机号获取信息
**/
function getMobileLookup($mobile){
    $sms = array('province'=>'', 'supplier'=>'');    //初始化变量
    //根据淘宝的数据库调用返回值
    $url = "http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel=".$mobile."&t=".time();
 
    $content = file_get_contents($url);
    $sms['province'] = substr($content, "56", "4");  //截取字符串
    $sms['supplier'] = substr($content, "81", "4");
    return $sms;
}
/**
*根据ip138手机号获取信息
**/
function getDatatel($mobile){ 
	$datatype = 'txt';
	$url = 'http://api.ip138.com/mobile/?mobile='.$mobile.'&datatype='.$datatype;
	$header = array('token:60fdff3b5f3437794382177c443685fd');
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
	curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,3); 
	$handles = curl_exec($ch); 
	curl_close($ch); 
	return $handles; 
}
/**
*安全过滤函数
**/
function check_input($str)
{
	$str = str_replace("\r\n","",$str);
	$str = str_replace("\n","",$str);
	$str = str_replace("\r","",$str);
	$str = str_replace("'","&#39",$str);
	$str = str_replace("\""," ",$str);
	$str = str_replace("'\'"," ",$str);
	$str = str_replace("\'"," ",$str);
	$str = str_replace("<","＜",$str);
	$str = str_replace(">","＞",$str);
	$str = str_replace("php","",$str);
	//$str = str_replace("?","？",$str);
	$str = str_replace("eval","",$str);
	//$str = str_replace("%","％",$str);
	$str = str_replace("$","",$str);
	$str = str_replace("script"," ",$str);
	//$str = str_replace("="," ",$str);
	$str = str_replace("and"," ",$str);
	$str = str_replace("select"," ",$str); 
	$str = str_replace("delete"," ",$str);
	$str = str_replace("update"," ",$str);
	$str = str_replace("|"," ",$str);
	$str = str_replace("&"," ",$str);
	$str = str_replace(";"," ",$str);
	$str = str_replace("@"," ",$str);
	$str = str_replace('"'," ",$str);
	$str = str_replace("()"," ",$str);
	$str = str_replace("+"," ",$str);
	$str = str_replace("CR"," ",$str);
	$str = str_replace("LF"," ",$str);
	$str = str_replace(","," ",$str);
	return  $str;
}
?>
