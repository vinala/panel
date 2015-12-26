<?php 


$class=$_POST['new_models_class_name'];
$file=$_POST['new_models_file_name'];
$table=$_POST['new_models_table_name'];

$Root="../../";
if(!file_exists($Root."../app/models/$file.php"))
	{
		$myfile = fopen($Root."../app/models/$file.php", "w");
		$txt = "<?php\n\nuse Fiesta\Core\MVC\Model\Model;\n\n";

		$txt.="class $class extends Model\n{\n\t//Name of the table in database\n\tpublic static ".'$table'."='$table';\n\tprotected static ".'$foreignKeys=array();'."\n\n}";

		fwrite($myfile, $txt);
		fclose($myfile);
		//
		echo "Le model a été creé";
	}
	else
	{
		echo "Le fichier deja existe";
	}

 ?>