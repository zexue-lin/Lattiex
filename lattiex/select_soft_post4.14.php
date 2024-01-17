<?php
/**
 * �������
 *
 * @version        $Id: select_soft_post.php 1 9:43 2010��7��8��Z tianya $
 * @package        DedeCMS.Dialog
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.dedecms.com/usersguide/license.html
 * @link           http://www.dedecms.com
 */

if(!isset($cfg_basedir))
{
    include_once(dirname(__FILE__).'/config.php');
}
if(empty($imgfile)) $imgfile = '';
if(empty($uploadmbtype)) $uploadmbtype = '�������';
if(empty($bkurl)) $bkurl = 'select_soft.php';
$CKEditorFuncNum = (isset($CKEditorFuncNum))? $CKEditorFuncNum : 1;
$newname = ( empty($newname) ? '' : preg_replace("#[\\ \"\*\?\t\r\n<>':\/|]#", "", $newname) );

if(!is_uploaded_file($imgfile))
{
    ShowMsg("��û��ѡ���ϴ����ļ���ѡ����ļ���С��������!", "-1");
    exit();
}

//�����������֧�ֵĸ���
$cfg_softtype = 'txt|doc|xls|ppt|wps|docx|xlsx|pptx|pdf|rar|zip|jpg|png|gif|bmp|jpeg';
$cfg_imgtype = 'jpg|png|gif|bmp|jpeg';
$cfg_softtype = str_replace('||', '|', $cfg_softtype);
$imgfile_name = trim(preg_replace("#[ \r\n\t\*\%\\\/\?><\|\":]{1,}#", '', $imgfile_name));

if(!preg_match("#\.(".$cfg_softtype.")#i", $imgfile_name))
{
    ShowMsg("�����ϴ���{$uploadmbtype}��������б������ϵͳ����չ���޶������ã�","");
    exit();
}

$nowtme = time();

if(preg_match("#\.(".$cfg_imgtype.")#i", $imgfile_name))
{
	$activepath = '/uploads/allimg';
}else{
	$activepath = $cfg_soft_dir;
}

//�ļ�����ǰΪ�ֹ�ָ���� �����Զ�����
if(!empty($newname))
{
    $filename = $newname;
    if(!preg_match("#\.#", $filename)) $fs = explode('.', $imgfile_name);
    else $fs = explode('.', $filename);
    if(preg_match("#".$cfg_not_allowall."#", $fs[count($fs)-1]))
    {
        ShowMsg("��ָ�����ļ�����ϵͳ��ֹ��",'javascript:;');
        exit();
    }
    if(!preg_match("#\.#", $filename)) $filename = $filename.'.'.$fs[count($fs)-1];
}else{
    $filename = $cuserLogin->getUserID().'-'.dd2char(MyDate('ymdHis',$nowtme)).mt_rand(10000, 99999) . mt_rand(10000, 99999);
    $fs = explode('.', $imgfile_name);
    if(preg_match("#".$cfg_not_allowall."#", $fs[count($fs)-1]))
    {
        ShowMsg("���ϴ���ĳЩ���ܴ��ڲ���ȫ���ص��ļ���ϵͳ�ܾ�������",'javascript:;');
        exit();
    }
    $filename = $filename.'.'.$fs[count($fs)-1];
}
$mdir = MyDate($cfg_addon_savetype, $nowtme);
if(!is_dir($cfg_basedir.$activepath."/$mdir"))
{
    MkdirAll($cfg_basedir.$activepath."/$mdir",$cfg_dir_purview);
    CloseFtp();
}
$filename = $mdir.'/'.$filename;
$fullfilename = $cfg_basedir.$activepath.'/'.$filename;
$fullfileurl = $activepath.'/'.$filename;
move_uploaded_file($imgfile,$fullfilename) or die("�ϴ��ļ��� $fullfilename ʧ�ܣ�");

if($cfg_remote_site=='Y' && $remoteuploads == 1)
{
    //����Զ���ļ�·��
    $remotefile = str_replace(DEDEROOT, '', $fullfilename);
    $localfile = '../..'.$remotefile;
    //����Զ���ļ���
    $remotedir = preg_replace('/[^\/]*\.('.$cfg_softtype.')/', '', $remotefile);
    $ftp->rmkdir($remotedir);
    $ftp->upload($localfile, $remotefile);
}
@unlink($localfile);
if($imgfile_type == 'application/x-shockwave-flash')
{
    $mediatype=2;
}
else if(preg_match('#image#i', $imgfile_type))
{
    $mediatype=1;
}
else if(preg_match('#audio|media|video#i', $imgfile_type))
{
    $mediatype=3;
}
else
{
    $mediatype=4;
}

$inquery = "INSERT INTO `#@__uploads`(arcid,title,url,mediatype,width,height,playtime,filesize,uptime,mid)
   VALUES ('0','$filename','$fullfileurl','$mediatype','0','0','0','{$imgfile_size}','{$nowtme}','".$cuserLogin->getUserID()."'); ";

$dsql->ExecuteNoneQuery($inquery);
$fid = $dsql->GetLastID();
AddMyAddon($fid, $fullfileurl);
@unlink($fullfilename);
if ($GLOBALS['cfg_html_editor']=='ckeditor' && $CKUpload)
{
	
    $fileurl = $activepath.'/'.$filename;
    $fileurl = "https://u3.huatu.com".$remotefile;
    $message = '';

	$jsonResult = array("uploaded"=>1,"fileName"=>$filename,"url"=>$fileurl);
	$str = json_encode($jsonResult);
    // $str='<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$CKEditorFuncNum.', \''.$fileurl.'\', \''.$message.'\');</script>';
    exit($str);
}
ShowMsg("�ɹ��ϴ��ļ���",$bkurl."?comeback=".urlencode($filename)."&f=$f&CKEditorFuncNum=$CKEditorFuncNum&activepath=".urlencode($activepath)."&d=".time());
exit();
