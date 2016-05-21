<?php

namespace Pikia\Vendor\Panel;
//
use Lighty\Kernel\Foundation\Application;
use Lighty\Kernel\Database\Seeder;
use Lighty\Kernel\Database\Migration;
use Lighty\Kernel\Config\Config;
use Lighty\Kernel\Database\Schema;
use Lighty\Kernel\Database\Database;
use Lighty\Kernel\Objects\DateTime as Time;
use Lighty\Kernel\Router\Route;
use Lighty\Kernel\Objects\Strings;
use Lighty\Kernel\Filesystem\Filesystem;

/**
* File for Panel features
*/
class Panel
{

	/**
	 * Path of panel in the project
	 */
	protected static $path = "vendor/lighty/panel/index.php";

	/**
	 * Path of root panel
	 */
	protected static $root = "vendor/lighty/panel/";

	/**
	 * Version of the panel
	 */
	public static function version()
	{
		return "Pikia Panel v".(new Filesystem)->get(Application::$root.self::$root."version.md");
	}

	public static function run()
	{
		if(Config::get('panel.enable'))
		{
			Route::get(Config::get('panel.route'),function(){
				include "../".self::$path;
			});
			//
			Route::get(Config::get('panel.route')."/{op}",function($op){

				//check if prefixe existe in this Kernel version
				//  $prefixe = Config::check('security.prefix') ? Config::get('security.prefix')."_" : "" ;
				$prefixe = "";
				//
				switch ($op) {
					case $prefixe.'new_seed' : Seeds::add(); break;
					case $prefixe.'exec_migration' : Migrations::exec(); break;
					case $prefixe.'rollback_migration' : Migrations::rollback(); break;
					case $prefixe.'new_migration' : Migrations::add(); break;
					case $prefixe.'new_controller' : Controller::create(); break;
					case $prefixe.'new_dir_lang' : Lang::createDir(); break;
					case $prefixe.'new_file_lang' : Lang::createFile(); break;
					case $prefixe.'new_link' : Link::create(); break;
					case $prefixe.'new_model' : Model::create(); break;
					case $prefixe.'new_view' : View::create(); break;
					case $prefixe.'exec_cos_migration' : Migrations::exec_cos(); break;
					case $prefixe.'rollback_cos_migration' : Migrations::rollback_cos(); break;
				}
			});
		}
	}

	public static function getPath()
	{
		$rPath = "";
		$paths = Strings::splite(self::$path,"/");
		for ($i=0; $i < count($paths) - 1; $i++) $rPath .= $paths[$i]."/";
		//
		return $rPath;
	}
}

/**
* Seeds class
*/
class Seeds
{

	public static function exec()
	{
		echo Seeder::ini();
	}

	public static function add()
	{
		$nom=$_POST['seedname_name'];
		$Root="../";
		//
		if(!file_exists($Root."app/seeds/$nom.php"))
		{
		 	$myfile = fopen($Root."app/seeds/$nom.php", "w");
			$txt = self::set($nom);
			//
			fwrite($myfile, $txt);
			fclose($myfile);
			//
			echo "le seeder est créé";
		}
		else echo "Le fichier deja existe";
	}

	public static function set($nom)
	{
		$txt = "<?php\n\nuse Lighty\Kernel\Database\Seeder;\n\n";
		$txt.="/**\n* class de seeder $nom\n*/\n\nclass $nom extends Seeder\n{\n";

		//datatable name
		$txt.="\t/*\n\t* Name of DataTable\n\t*/\n\tpublic ".'$table="tbl_user";'."\n\n";

			//run
		$txt.="\t/*\n\t* Run the Database Seeder\n\t*/\n\tpublic function run()\n\t{\n\t\t".'$dataTable = array();'."\n\t\t//\n\t\t".'$dataTable[] = array(/* Data Fields */);'."\n\t\t//\n\t\t".'Schema::table($this->table)->insert($dataTable);'."\n\t}\n}";

		return $txt;
	}
}

/**
* Migrations class
*/
class Migrations
{
	public static function exec()
	{
		$Root="../";
		$r=glob($Root."app/schemas/*.php");
		//
		$pieces=array();
		$pieces1=array();
		$pieces2=array();
		//
		$time="";
		$name="";
		//
		$f = array();
		foreach ($r as $key) {
			$pieces = explode("app/schemas/", $key);
			$pieces1 = explode("_", $pieces[1]);
			$time=$pieces1[0];
			$p=explode(".", $pieces1[1]);
			$name=$p[0];
			$f[]=$pieces1[0];
			$pieces2[]=$pieces[1];
			$full_name=$pieces1[0]."_".$name;
		}
		//
		$mx=max($f);
		//
		$ind=0;$i=0;
		//
		foreach ($pieces2 as $value) {
			
			if (strpos($value,$mx) !== false) $ind=$i;

			$i++;
		}
		$link=$r[$ind];
		//

		try {
			include_once $link;
			
			if(up())
			{
				$full_name=$time."_".$name;
				if(Schema::existe(Config::get('database.migration')))
				{
					Database::exec("update ".Config::get('database.migration')." set status_schema='executed' where name_schema='".$name."' and date_schema='".$time."'");

				}
				Migration::updateRegister($full_name,"exec",$Root);
				echo "Schéma executé";
				
			}
			else echo "Schema n'est pas executé".Database::execErr();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public static function set($name,$Unixtime,$Datetime)
	{
		$txt = "<?php\n\n";
		$txt.="/* Schema info\n* @date : ".$Datetime."(".$Unixtime.")\n* @name : ".$name."\n\n\n\n";
		$txt .= "\t/**\n\t * Run the schemas.\n\t*/\n";
		$txt .= "\tfunction up()\n\t{\n\t\treturn true;\n\n";
		$txt .= "\t\t/* Ex.\treturn Schema::create('$name',function(".'$tab'.")\n\t\t\t{\n\t\t\t\t".'$tab->string("name");'."\n\t\t\t});\n\t\t\t*/";
		$txt .= "\n\t}\n\n";
		$txt .= "\t/**\n\t * Reverse the schemas.\n\t*/\n";
		$txt .= "\tfunction down()\n\t{\n\t\treturn true;\n\n";
		$txt .= "\t\t// Ex.\t return Schema::drop('$name');\n\n";
		$txt .= "\t}\n\n";
		$txt .= "?>\n";
		return $txt;
	}

	public static function create()
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

	public static function insert($name,$time)
	{
		Database::exec("insert into ".Config::get('database.migration')."(name_schema,date_schema,status_schema,type_schema) values('".$name."','".$time."','init','table')");
	}

	public static function add()
	{
		$Datetime=date("Y/m/d H:i:s",time());
		$Unixtime=time();
		$name=$_POST['migname'];
		$Root="../";
		//
		$myfile = fopen($Root."app/schemas/".$Unixtime."_".$name.".php", "w");
		//
		fwrite($myfile, self::set($name,$Unixtime,$Datetime));
		fclose($myfile);
		//
		if(!Schema::existe(Config::get('database.migration'))) self::create();
		//
		self::insert($name,$Unixtime);
		//
		Migration::updateRegister($Unixtime."_".$name,"init",$Root);

		echo "la schema a été ajoutéé";
	}

	public static function rollback()
	{
		$Root="../";
		$r=glob("../app/schemas/*.php");
		//
		$pieces=array();
		$pieces1=array();
		$pieces2=array();
		$full_names=array();
		//
		$time="";
		$name="";
		//
		$f = array();
		foreach ($r as $key) {
			//echo $key."\n";
			$pieces = explode("app/schemas/", $key);
			$pieces1 = explode("_", $pieces[1]);
			$time=$pieces1[0];
			$p=explode(".", $pieces1[1]);
			$name=$p[0];
			$f[]=$pieces1[0];
			$pieces2[]=$pieces[1];
			//
			$full_names=$pieces1[0]."_".$name;
		}
		$mx=max($f);
		//
		$ind=0;$i=0;
		//
		foreach ($pieces2 as $value) {
			
			if (strpos($value,$mx) !== false) $ind=$i;

			$i++;
		}
		$link=$r[$ind];
		//
		try {
			include_once $link;
			
			if(down())
			{
				
				if(Schema::existe(Config::get('database.migration')))
				{
					Database::exec("update ".Config::get('database.migration')." set status_schema='rolledback' where name_schema='".$name."' and date_schema='".$time."'");
				}
				$full_names=$time."_".$name;
				Migration::updateRegister($full_names,"rollback",$Root);
				echo "Schéma annulé";
				
			}
			else echo "Schema n'est pas annulé".Database::execErr();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public static function rollback_cos() /* Beta */
	{
		$Root = "../";
		$r=glob("../app/schemas/*.php");

		$r2=array();
		$r2=array();
		foreach ($r as $value) {

		$temp1=explode("schemas/",$value);
		$temp2=explode("_",$temp1[1]);
		$temp3=explode(".",$temp2[1]);
		$ex=$temp3[0];
		//

		if($ex==$_POST['exec_cos_migrate_select'])
			{
				$r2[]=$ex;
				$r3[]=$temp2[0];

			}
		}
		$v="";
		//
		if(count($r2)>1)
		{
			for ($i=1; $i < count($r2); $i++) { 
				error_log($r3[$i].'*/*'.$r3[$i-1]);
				if($r3[$i]>=$r3[$i-1])
				{
					$v="../app/schemas/".$r3[$i]."_".$r2[$i].".php";
					$full_name=$r3[$i]."_".$r2[$i];
				}
			}
		}
		else
		{
			$v="../app/schemas/".$r3[0]."_".$r2[0].".php";
			$full_name=$r3[0]."_".$r2[0];
		}


		try {
			include_once $v;
			if(down())
			{
				Migration::updateRegister($full_name,"rollback",$Root);
				echo "Schéma annulée";
			}
			else echo Database::execErr();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public static function exec_cos() /* Beta */
	{
		$Root = "../";
		$r=glob("../app/schemas/*.php");

		$r2=array();
		$r2=array();
		foreach ($r as $value) {

		$temp1=explode("schemas/",$value);
		$temp2=explode("_",$temp1[1]);
		$temp3=explode(".",$temp2[1]);
		$ex=$temp3[0];
		//
		if($ex==$_POST['exec_cos_migrate_select'])
			{
				$r2[]=$ex;
				$r3[]=$temp2[0];
			}
		}
		$v="";
		$full_name="";
		//
		if(count($r2)>1)
		{
			for ($i=1; $i < count($r2); $i++) { 
				error_log($r3[$i].'*/*'.$r3[$i-1]);
				if($r3[$i]>=$r3[$i-1])
				{
					$v="../app/schemas/".$r3[$i]."_".$r2[$i].".php";
					$full_name=$r3[$i]."_".$r2[$i];
				}
			}
		}
		else
		{
			$v="../app/schemas/".$r3[0]."_".$r2[0].".php";
			$full_name=$r3[0]."_".$r2[0];
		}


		try {
			include_once $v;
			if(up())
			{
				Migration::updateRegister($full_name,"exec",$Root);
				echo "Schéma executé";
			}
			else echo Database::execErr();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}


/**
* Controller class
*/
class Controller
{
	public static function create()
	{
		$addRoute = $_POST['new_controller_add_route'];
		$class = $_POST['new_controller_class_name'];
		$file = $_POST['new_controller_file_name'];
		$Root = "../";
		//
		if(!file_exists($Root."app/controllers/$file.php")){
			$myfile = fopen($Root."app/controllers/$file.php", "w");
			$txt = self::set($class);
			fwrite($myfile, $txt);
			fclose($myfile);
			//
			self::addRoute($addRoute,$file);
			echo "le controller est créé";
		}
		else echo "Le fichier deja existe";

	}

	public static function set($class)
	{
		$txt = "<?php\n\n use Lighty\Kernel\MVC\Controller\Controller;\n\n";
		$txt.="/**\n* class de controller $class\n*/\n\nclass $class extends Controller\n{\n\t";

		//view
		$txt.="\n\t\n\tpublic static ".'$id = null'.";\n\tpublic static ".'$object = null'.";\n\n";

		//index
		$txt.="\n\t/**\n\t * Display a listing of the resource.\n\t *\n\t * \n\t * @return Response\n\t */";
		$txt.="\n\tpublic static function index()\n\t{\n\t\t//\n\t}";

		//show
		$txt.="\n\n\n\t/**\n\t * Get the resource by id\n\t *\n\t * @param id(mixed) id of the object \n\t * @return Response\n\t */";
		$txt.="\n\tpublic static function show(".'$id'.")\n\t{\n\t\t//\n\t}";

		//add
		$txt.="\n\n\n\t/**\n\t * Show the form for creating a new resource.\n\t *\n\t  * @return Response\n\t */";
		$txt.="\n\tpublic static function add()\n\t{\n\t\t//\n\t}";

		//insert
		$txt.="\n\n\n\t/**\n\t * Insert newly created resource in storage.\n\t *\n\t  * @return Response\n\t */";
		$txt.="\n\tpublic static function insert()\n\t{\n\t\t//\n\t}";

		//edit
		$txt.="\n\n\n\t/**\n\t * Show the form for editing the specified resource.\n\t *\n\t * @param id(mixed) id of the object \n\t * @return Response\n\t */";
		$txt.="\n\tpublic static function edit(".'$id'.")\n\t{\n\t\t//\n\t}";

		//update
		$txt.="\n\n\n\t/**\n\t * Update the specified resource in storage.\n\t *\n\t * @param id(mixed) id of the object \n\t * @return Response\n\t */";
		$txt.="\n\tpublic static function update(".'$id=null'.")\n\t{\n\t\t//\n\t}";

		//delete
		$txt.="\n\n\n\t/**\n\t * Delete the specified resource in storage.\n\t *\n\t * @param id(mixed) id of the object \n\t * @return Response\n\t */";
		$txt.="\n\tpublic static function delete(".'$id'.")\n\t{\n\t\t//\n\t}";

		$txt.="\n}";
		return $txt;
	}

	public static function addRoute($addRoute , $file)
	{
		$Root = "../";
		//
		if(isset($addRoute)) $add_route = $addRoute;
		else $add_route = false;
		//
		if($add_route)
		{
			$RouterFile 	= $Root."app/http/Routes.php";
			$RouterContent 	 = "\n\n// $file Route \n";
			$RouterContent 	.= 'Route::controller("'.$file.'","'.$file.'");';
			//
			file_put_contents($RouterFile, $RouterContent, FILE_APPEND | LOCK_EX);
		}
	}
}

/**
* Language class
*/
class Lang
{
	public static function createDir()
	{
		$name=$_POST['lang_dir_name'];
		$Root="../";
		if(mkdir ($Root."app/lang/".$name))
			echo "le dossier a été creé";
		else echo "le dossier ne veut pas cree";
	}

	public static function createFile()
	{
		$dir=$_POST['lang_dir_name_2'];
		$file=$_POST['lang_file_name'];

		$Root="../";
		if(!file_exists($Root."app/lang/$dir/$file.php"))
			{
				$myfile = fopen($Root."app/lang/$dir/$file.php", "w");
				$txt = self::set();
				//
				fwrite($myfile, $txt);
				fclose($myfile);
				//
				echo "Le fichier langue a été creé";
			}
			else echo "Le fichier deja existe";
	}

	public static function set()
	{
		return "<?php\n\nreturn array(\n\t'var_lan_name_1' => 'var_lang_value_1',\n\t'var_lan_name_2' => 'var_lang_value_2'\n);";
	}
}

/**
* Link class
*/
class Link
{
	public static function create()
	{
		$time = Time::now();
		$name=$_POST['link_name'];
		if(empty($name)) $name=$time;
		//
		$Root="../";
		if(!file_exists($Root."app/links/".$name.".php"))
		{
			$myfile = fopen($Root."app/links/".$name.".php", "w");
			$txt = self::set($name);
			fwrite($myfile, $txt);
			fclose($myfile);
			//
			echo "Le fichier link a été creé";
		}
		else echo "Le fichier deja existe";
	}

	public static function set($name)
	{
		$txt = "<?php\n\n";
		$txt.="/*\n\tlinks of ".$name."\n*/\n\n";
		$txt .= "return array(\n\t'link_name_1' => 'link_value_1',\n\t'link_name_2' => 'link_value_2'\n);";
		$txt .= "\n\n?>";

		return $txt;
	}
}

/**
* Model class
*/
class Model
{
	public static function create()
	{
		
		$class=$_POST['new_models_class_name'];
		$file=$_POST['new_models_file_name'];
		$table=$_POST['new_models_table_name'];

		
		if(!file_exists("../app/models/$file.php"))
			{
				$myfile = fopen("../app/models/$file.php", "w");
				$txt = self::set($class , $table);

				fwrite($myfile, $txt);
				fclose($myfile);
				//
				echo "Le model a été creé";
			}
			else echo "Le fichier deja existe";
	}

	public static function set($class , $table)
	{
		$txt = "<?php\n\nuse Lighty\Kernel\MVC\Model\Model;\n\n";
		$txt.="class $class extends Model\n{\n\t//Name of the table in database\n\tpublic static ".'$table'."='$table';\n\tprotected static ".'$foreignKeys=array();'."\n\n}";
		//
		return $txt;
	}
}

/**
* View class
*/
class View
{
	protected static function replace($name)
	{
		return str_replace(".", "/", $name);
	}
	public static function create()
	{
		$file	=	self::replace($_POST['new_view_file_name']);
		$pos 	= 	strpos($file, "/");
		$Root	=	"../";
		if($pos)
		{
			$file		= 	explode("/", $file);
			$structure 	=   "../app/views/".$file[0]."/";
			//
			if(mkdir($structure, 0777, true)) 
			{
				if(strpos($file[1], "."))
				{
					$ext 		= 	explode(".", $file[1]);
					$extention 	= 	$ext[1] ?  $ext[1] : "php";
					//
					echo self::CreatView($file[1], "../app/views/".$file[0]."/", $extention);
				}
				else echo self::CreatView($file[1], "../app/views/".$file[0]."/", "php");
			}
			else echo ('Echec lors de la création des répertoires...');
			
		}
		else
		{
			if(strpos($file, "."))
			{
				$ext 		= 	explode(".", $file);
				$extention 	= 	$ext[1] ?  $ext[1] : "php";
				//
				echo self::CreatView($file, "../app/views/", $extention);
			}
			else echo self::CreatView($file, "../app/views/", "php");
		}

	}

	protected static function CreatView($file, $path, $ext = 'php')
	{
		if( ! file_exists($path."$file.php"))
		{
			$myfile = fopen($path."$file.php", "w");
			//
			$txt = self::set($ext , $file);
			//
			fwrite($myfile, $txt);
			fclose($myfile);
			//
			return "Le view a été creé";
		}
		else return "Le fichier deja existe";
	}

	protected static function set($ext , $file)
	{
		return ($ext == 'tpl') ? "{* View file  : $file *} \n" : (($ext == 'php') ? "<?php\n\n/**\n* View file  : $file\n*/\n\n" : "");
	}
}
