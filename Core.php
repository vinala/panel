<?php

namespace Lighty;
//
use Lighty\Kernel\Foundation\Application;
use Lighty\Kernel\Database\Seeder;
use Lighty\Kernel\Database\Migration;
use Lighty\Kernel\Config\Config;
use Lighty\Kernel\Database\Database;
use Lighty\Kernel\Objects\DateTime as Time;
use Lighty\Kernel\Router\Route;
use Lighty\Kernel\Objects\Strings;
use Lighty\Kernel\Filesystem\Filesystem;
use Lighty\Kernel\Process\Migrations as Schema;
use Lighty\Panel\Response;


/**
* File for Panel features
*/
class Panel
{

	/**
	 * Path of panel in the project
	 */
	protected static $path = "vendor/vinala/panel/index.php";

	/**
	 * Path of root panel
	 */
	protected static $root = "vendor/vinala/panel/";

	/**
	 * Version of the panel
	 */
	public static function version()
	{
		return "Lighty Panel v".(new Filesystem)->get(Application::$root.self::$root."version.md");
	}

	public static function run()
	{
		include Application::$root.'vendor/vinala/panel/src/core/Response.php';
		//
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
					case $prefixe.'exec_seed' : Response::execSeed(); break;
					case $prefixe.'new_seed' : Response::createSeeder(); break;
					case $prefixe.'exec_migration' : Response::execSchema(); break;
					case $prefixe.'rollback_migration' : Response::rollbackSchema(); break;
					case $prefixe.'new_migration' : Response::createSchema(); break;
					case $prefixe.'new_controller' : Response::createController(); break;
					case $prefixe.'new_dir_lang' : Response::createLangDir(); break;
					case $prefixe.'new_lang_file' : Response::createLangFile(); break;
					case $prefixe.'new_link' : Response::createLink(); break;
					case $prefixe.'new_model' : Response::createModel(); break;
					case $prefixe.'new_view' : Response::createView(); break;
					// case $prefixe.'exec_cos_migration' : $proc = Migrations::exec_cos(); break;
					// case $prefixe.'rollback_cos_migration' : $proc = Migrations::rollback_cos(); break;
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
