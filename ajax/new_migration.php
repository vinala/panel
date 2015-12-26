<?php 

use Fiesta\Core\Glob\App;
use Fiesta\Core\Database\Migration;

//path to Root Folder
$Root="../../";

// calling the framework
include_once $Root.'../core/Ini.php';
App::run(null,$Root,false,true,false);

//
	$time2=date("Y/m/d H:i:s",time());
	$time=time();
	$name=$_POST['migname'];
	// $object=$_POST['object'];
	
	$myfile = fopen($Root."../app/schemas/".$time."_".$name.".php", "w");
	$txt = "<?php\n\n";

	$txt.="/* Schema info\n* @date : ".$time2."(".$time.")\n* @name : ".$name."\n\n\n\n";

	$txt .= "\t/**\n\t * Run the schemas.\n\t*/\n";

	$txt .= "\tfunction up()\n\t{\n\t\treturn true;\n\n";

	$txt .= "\t\t/* Ex.\treturn Schema::create('tbl_test',function(".'$tab'.")\n\t\t\t{\n\t\t\t\t".'$tab->string("column");'."\n\t\t\t});\n\t\t\t*/";

	$txt .= "\n\t}\n\n";

	$txt .= "\t/**\n\t * Reverse the schemas.\n\t*/\n";

	$txt .= "\tfunction down()\n\t{\n\t\treturn true;\n\n";

	$txt .= "\t\t// Ex.\t return Schema::drop('tbl_test');\n\n";

	$txt .= "\t}\n\n";

	
	$txt .= "?>\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	//
	if(!Schema::existe(Config::get('database.migration'))) 
	{
		Schema::create(Config::get('database.migration'),function($tab)
		{
			$tab->inc("pk_schema");
			$tab->string("name_schema");
			$tab->timestamp("date_schema");
			$tab->string("status_schema");
			$tab->string("type_schema");
		});
	}
	//
	Database::exec("insert into ".Config::get('database.migration')."(name_schema,date_schema,status_schema,type_schema) values('".$name."','".$time."','init','table')");
	//
	Migration::updateRegister($time."_".$name,"init",$Root);

	echo "la schema a été ajoutéé";

	

 ?>
