<?php 

	$name=$_POST['lang_dir_name'];

	$Root="../../";
	if(mkdir ($Root."../app/lang/".$name))
		echo "le dossier a été creé";
	else echo "le dossier ne veut pas cree";
	

	

 ?>