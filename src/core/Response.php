<?php 

namespace Lighty\Panel;

use Lighty\Kernel\Process\Controller;
use Lighty\Kernel\Process\Migrations;
use Lighty\Kernel\Process\Seeds;
use Lighty\Kernel\Process\Translator;

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
		$nom=$_POST['seedname_name'];
		$table = "";
		$count = "";
		//
		if(Seeds::add($nom,$table,$count,"../"))
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
}