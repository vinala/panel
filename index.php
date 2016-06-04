<?php 
//
if( ! class_exists("Config")) die("");
//
use Lighty\Panel;

$rot="app/pages/panel";
$root="./app/pages/panel";
$rooot=$root;


$path = Panel::getPath();
$appPath="../app/";


// Login

if(isset($_POST['password_1']) && isset($_POST['password_2']) && !empty($_POST['password_1']) && !empty($_POST['password_1']))
{
	if($_POST['password_1']==Config::get('panel.password1') && $_POST['password_2']==Config::get('panel.password2')) 
		$_SESSION['lighty_pnl_fst_pass']=$_POST['password_1'];
}

if(isset($_GET['logout']) && $_GET['logout']="1") {
	$_SESSION['lighty_pnl_fst_pass']="";unset($_SESSION['lighty_pnl_fst_pass']);}


if(!isset($_SESSION['lighty_pnl_fst_pass']) || empty($_SESSION['lighty_pnl_fst_pass']))
	include "../$path"."src/views/loggin.php";

else if($_SESSION['lighty_pnl_fst_pass']==Config::get('panel.password1'))
	include "../$path"."src/views/home.php";
