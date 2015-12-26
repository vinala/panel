<?php 

use Fiesta\Core\Glob\App;
use Fiesta\Core\Database\Seeder;

$Root="../../";
include_once $Root.'../core/Ini.php';
App::run(null,$Root,false,true,false);

Seeder::ini();
echo "Le Seed a été executé";
