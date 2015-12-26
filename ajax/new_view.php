<?php 

// $class=$_POST['new_view_class_name'];
$file	=	$_POST['new_view_file_name'];
$file	=	str_replace(".", "/", $file);
$pos 	= 	strpos($file, "/");
$Root	=	"../../";
if($pos){
	$file		= 	explode("/", $file);
	$structure 	=   $Root."../app/views/".$file[0]."/";
	if(mkdir($structure, 0777, true)) {
		if(strpos($file[1], ".")){
			$ext 		= 	explode(".", $file[1]);
			$extention 	= 	$ext[1] ?  $ext[1] : "php";
			echo CreatView($file[1], $Root."../app/views/".$file[0]."/", $extention);
		}else{
			echo CreatView($file[1], $Root."../app/views/".$file[0]."/", "php");
		}
	}else{
		echo ('Echec lors de la création des répertoires...');
	}
}else{
	if(strpos($file, ".")){
		$ext 		= 	explode(".", $file);
		$extention 	= 	$ext[1] ?  $ext[1] : "php";
		echo CreatView($file, $Root."../app/views/", $extention);
	}else{
		echo CreatView($file, $Root."../app/views/", "php");
	}
}

//

function CreatView($file, $path, $ext = 'php'){
	if(!file_exists($path."$file.php")){
			$myfile = fopen($path."$file.php", "w");
			if($ext == 'tpl'){
				$txt ="{* View file  : $file *} \n";
			}elseif($ext == 'php'){
				$txt = "<?php\n\n";
				$txt.="/**\n* View file  : $file\n*/\n\n";
			}
			

			fwrite($myfile, $txt);
			fclose($myfile);
			//
			return "Le view a été creé";
	}else{
			return "Le fichier deja existe";
	}	
}


?>