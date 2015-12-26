<?php 

$nom=$_POST['seedname_name'];

$Root="../../";
if(!file_exists($Root."../app/seeds/$nom.php"))
	{
		$myfile = fopen($Root."../app/seeds/$nom.php", "w");
		$txt = "<?php\n\nuse Fiesta\Core\Database\Seeder;\n\n";

		$txt.="/**\n* class de seeder $nom\n*/\n\nclass $nom extends Seeder\n{\n";

		//datatable name
		$txt.="\t/*\n\t* Name of DataTable\n\t*/\n\tpublic ".'$table="tbl_user";'."\n\n";

		//run
		$txt.="\t/*\n\t* Run the Database Seeder\n\t*/\n\tpublic function run()\n\t{\n\t\t".'$dataTable = array();'."\n\t\t//\n\t\t".'$dataTable[] = array(/* Data Fields */);'."\n\t\t//\n\t\t".'Schema::table($this->table)->insert($dataTable);'."\n\t}\n}";

		

		fwrite($myfile, $txt);
		fclose($myfile);
		//
		echo "le seeder est créé";
	}
	else
	{
		echo "Le fichier deja existe";
	}

?>