<?php 

namespace Vinala\Panel;

use Vinala\Kernel\Process\Controller;
use Vinala\Kernel\Process\Migrations;
use Vinala\Kernel\Process\Seeds;
use Vinala\Kernel\Process\Translator;
use Vinala\Kernel\Process\Links;
use Vinala\Kernel\Process\Model;
use Vinala\Kernel\Process\View;

class Response
{
	/**
	 * create controller
	 */
	public static function createController()
	{
		$file = $_POST['new_controller_file_name'];
		$class = $_POST['new_controller_class_name'];
		$route = isset($_POST['new_controller_add_route']);
		//
		if(controller::create($file, $class, $route,"../"))
			echo "Controller created";
		else echo "There was a problem";
	}

	/**
	 * create controller
	 */
	public static function createSchema()
	{
		$name = $_POST['migname'];
		//
		if(Migrations::add($name, "../"))
			echo "Schema created";
		else echo "There was a problem";
	}

	/**
	 * create seeder
	 */
	public static function createSeeder()
	{
		$name = $_POST['seed_name'];
		$table = $_POST['seed_table'];
		$count = $_POST['seed_count'];
		//
		if(Seeds::add($name,$table,$count,"../"))
			echo "Seeder created";
		else echo "There was a problem";
	}

	/**
	 * create Lang Directory
	 */
	public static function createLangDir()
	{
		$name=$_POST['lang_dir_name'];
		//
		if(Translator::createDir($name,"../"))
			echo "Directory created";
		else echo "There was a problem";
	}

	/**
	 * create Lang File
	 */
	public static function createLangFile()
	{
		$dir=$_POST['lang_dir_name_2'];
		$file=$_POST['lang_file_name'];
		//
		if(Translator::createFile($dir , $file, "../"))
			echo "File created";
		else echo "There was a problem";
	}

	/**
	 * create Link File
	 */
	public static function createLink()
	{
		$name=$_POST['link_name'];
		//
		if(Links::create($name, "../"))
			echo "Link file created";
		else echo "There was a problem";
	}

	/**
	 * create Model
	 */
	public static function createModel()
	{
		$class=$_POST['new_models_class_name'];
		$file=$_POST['new_models_file_name'];
		$table=$_POST['new_models_table_name'];
		//
		if(Model::create($file , $class , $table, "../"))
			echo "Model created";
		else echo "There was a problem";
	}

	/**
	 * create View
	 */
	public static function createView()
	{
		$name=$_POST['new_view_file_name'];
		$isSmarty=isset($_POST['new_controller_add_route']);
		//
		if(View::create($name , $isSmarty, "../"))
			echo "View created";
		else echo "There was a problem";
	}

	/**
	 * exec Seeder
	 */
	public static function execSeed()
	{
		if(Seeds::exec())
			echo "Seeder executed";
		else echo "There was a problem";
	}

	/**
	 * exec Schema
	 */
	public static function execSchema()
	{
		if(Migrations::exec("../"))
			echo "Schema executed";
		else echo "There was a problem";
	}

	/**
	 * rollback Schema
	 */
	public static function rollbackSchema()
	{
		if(Migrations::rollback("../"))
			echo "Schema rollbacked";
		else echo "There was a problem";
	}
}