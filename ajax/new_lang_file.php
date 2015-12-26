<?php 

$dir=$_POST['lang_dir_name_2'];
$file=$_POST['lang_file_name'];

$Root="../../";
if(!file_exists($Root."../app/lang/$dir/$file.php"))
	{
		$myfile = fopen($Root."../app/lang/$dir/$file.php", "w");
		$txt = "<?php\n\n";

		$txt.="return array(\n\t'var_lan_name_1' => 'var_lang_value_1',\n\t'var_lan_name_2' => 'var_lang_value_2'\n);";

		fwrite($myfile, $txt);
		fclose($myfile);
		//
		echo "Le fichier langue a été creé";
	}
	else
	{
		echo "Le fichier deja existe";
	}

 ?>