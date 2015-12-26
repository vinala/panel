<?php 

use Fiesta\Core\Database\Migration;

$rot="app/pages/panel";
$root="./app/pages/panel";
$rooot=$root;


$path="public/".Config::get('panel.folder')."/";
$appPath="../app/";


// Login

if(isset($_POST['password_1']) && isset($_POST['password_2']) && !empty($_POST['password_1']) && !empty($_POST['password_1']))
{
	if($_POST['password_1']==Config::get('panel.password1') && $_POST['password_2']==Config::get('panel.password2')) 
		$_SESSION['fiesta_pnl_fst_pass']=$_POST['password_1'];
}

if(isset($_GET['logout']) && $_GET['logout']="1") {
	$_SESSION['fiesta_pnl_fst_pass']="";unset($_SESSION['fiesta_pnl_fst_pass']);}


if(!isset($_SESSION['fiesta_pnl_fst_pass']) || empty($_SESSION['fiesta_pnl_fst_pass']))
{
?>
<html>
<head>
	<?php Html::charset(); ?>
	<title>Fiesta | Panel</title>

	<link rel="stylesheet" href="<?php echo $path ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $path ?>bootstrap/css/bootstrap-theme.min.css">
	<script src="app/library/jquery-1.11.3.min.js"></script>

	<?php
		Html::favicon(Path::$public."/favicon.ico");
		Libs::js($path."js/me.js",false);
		Libs::css($path."css/me.css",false);
		Libs::css($path."css/main.css",false);
	?>
	<style type="text/css">
		body
		{
			padding:0px;
			margin:0px;
			background:#5b1d79;
			font-family: segoe;
		}
	</style>

</head>

<body style="">
	<img src="<?php echo "app/resources/images/fiesta_logo.png" ?>" class="lg_img">
	<div id="login_form">
		<form accept-charset="UTF-8" role="form" class="form-signin" method="post" action="?login">
            <fieldset>
                <label class="panel-login">
                    <div class="login_result"></div>
                </label>
                <input class="form-control lg_input" placeholder="Mot de passe 1" name="password_1" id="password_1" type="password">
                <input class="form-control lg_input" placeholder="Mot de passe 2" name="password_2" id="password_2" type="password">
                <input class="btn lg_submit" type="submit" id="login" value="Connexion">
            </fieldset>
        </form>
	</div>
</body>

</html>
<?php
}
else if($_SESSION['fiesta_pnl_fst_pass']==Config::get('panel.password1'))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fiesta | Panel</title>
	<link rel="stylesheet" href="<?php echo $path ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $path ?>bootstrap/css/bootstrap-theme.min.css">
	<script src="app/library/jquery-1.11.3.min.js"></script>
	<?php 
		Html::charset();
		Html::favicon(Path::$public."/favicon.ico");
		$path="public/".Config::get('panel.folder')."/";
		Libs::css($path."css/main.css",false); 
		Libs::js($path."js/main.js",false);
		Libs::js($path."js/me.js",false);
	?>
</head>
<body>
	<div class="alert_bg" id="alert_unit">
		<div class="alert_main" id="alert_main">
		<div class="alert_close" id="alert_close"><span class="glyphicon glyphicon-remove"></span></div>
		<span id="alert_msg"></span></div>

	</div>
	<div class="top_header">
		<div class="menu_icon" id="menu_icon">
			<span class="glyphicon glyphicon-align-justify"></span>
		</div>
		<a href="?logout=1">
		<div class="menu_icon" id="menu_icon" style="float: right;">
			<span class="glyphicon glyphicon-off"></span>
		</div>
		</a>
		<div class="logo"></div>

	</div>
	<div class="side_bar" id="side_bar">
		<div class="content">
			
			<div class="link active" id="left_tab_schema" data-tab="schema" title="Schema & migrations">
				<div class="side_bar_unit"> 
					<div class="glyphicon glyphicon-transfer"></div>
					<div class="lib">Schema & migrations</div>
				</div>
			</div>

		
			<div class="link" id="left_tab_links" data-tab="links" title="Liens">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-link"></span>
					<div class="lib">Liens</div>
				</div>
			</div>
			

			<div class="link" id="left_tab_langs" data-tab="langs" title="Langues">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-flag"></span>
					<div class="lib">Langues</div>
				</div>
			</div>

			<div class="link" id="left_tab_mvc_m" data-tab="mvc_m" title="Model (MVC)">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-cloud"></span>
					<div class="lib">Model (MVC)</div>
				</div>
			</div>

			<div class="link" id="left_tab_mvc_v" data-tab="mvc_v" title="View (MVC)">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-file"></span>
					<div class="lib">View (MVC)</div>
				</div>
			</div>

			<div class="link" id="left_tab_mvc_c" data-tab="mvc_c" title="Control (MVC)">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-cog"></span>
					<div class="lib">Controller (MVC)</div>
				</div>
			</div>

			<div class="link" id="left_tab_seeds" data-tab="seeds" title="Graines">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-leaf"></span>
					<div class="lib">Graines</div>
				</div>
			</div>



			<!-- <div class="link">
				<span class="glyphicon glyphicon-bookmark"></span>
			</div>

			<div class="link">
				<span class="glyphicon glyphicon-eye-close"></span>
			</div>

			<div class="link" alt="kkkk">
				<span class="glyphicon glyphicon-cog"></span>
			</div> -->

			<div class="link" id="left_tab_info" data-tab="info" title="A Propos">
				<div class="side_bar_unit"> 
					<span class="glyphicon glyphicon-info-sign"></span>
					<div class="lib">A Propos</div>
				</div>
			</div>





		</div>
	</div>

	<div id="tab_schema" class="main_panel schema">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">Schemas</h1>
			</div>
			
            <div class="col-md-6" >
	            <div class="MD_unit MD_unit_orange">
	            	<div class="MD_unit_title unit_title_orange">Nouvelle schema</div>
	            	
		            <form id="new_migrate" method="post" name="new_migrate">

						<div class="control_row">
							<div class="col-md-3 form_control_label">
								<label for="">Nom de schema</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="migname" name="migname" placeholder="Nom de schema">
							</div>
						</div>

						<!-- <div class="control_row">
							<div class="col-md-3 form_control_label">
								<label for="">Type de schema</label>
							</div>
							<div class="col-md-9">
								<select class="form-control" id="sel1" name="object">
								    <option value="table" selected>Table</option>
									<option value="vue">Vue</option>
						        </select>
							</div>
						</div> -->

						<div  class="MD_submit_row">
							<input type="submit" value="Créé" class="btn unit_btn unit_btn_orange MD_submit_btn" >
						</div>
					</form>
				</div>
				<div class="MD_unit MD_unit_purple" style="  height: 93px;">
					<div class="MD_unit_title unit_title_purple">Exécution de dernier schema</div>
					
					<form id="exec_last_migrate" method="post" name="exec_last_migrate" class="col-md-6" style="padding: 0px;text-align: right;">
						<input type="submit" value="Exécuter schéma" class="btn unit_btn unit_btn_purple MD_submit_btn">
					</form>
					<form id="rollback_last_migrate" method="post" name="rollback_last_migrate" class="col-md-6" style="padding: 0px;">
						<input type="submit" value="Annuler schéma" class="btn unit_btn unit_btn_purple MD_submit_btn">
					</form>
				</div>
				<div class="MD_unit MD_unit_cyan" style="height: 145px;">
					<div class="MD_unit_title unit_title_cyan">Personnaliser l'exécution</div>
				
					<form id="exec_cos_migrate" method="post" name="exec_cos_migrate">
					<div class="control_row">
					<?php Migration::getAll('exec_cos_migrate_select'); ?>
						<input type="submit" value="Exécuter" class="btn unit_btn unit_btn_cyan no_margins MD_submit_btn">
					</form>
					</div>
					<div class="control_row">
					<form id="rollback_cos_migrate" method="post" name="rolback_cos_migrate">
					<?php Migration::getAll('ggg'); ?>
						<input type="submit" value="Annuler" class="btn unit_btn unit_btn_cyan no_margins MD_submit_btn">
					</form>
					</div>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="MD_unit">
					<table class="table table-hover">
						<tr class="info">
						  <th class="tr_table_files">Nom de object</th>
						  <th class="tr_table_files">Date de creation</th>
						</tr>

						  <?php
						  foreach (glob($appPath."schemas/*.php") as $value) {
						  	$r=explode('schemas/',$value);
						  	echo "<tr><td>".$r[1]."</td><td>".date("Y/m/d H:i:s",filemtime($value))."</td></tr>";
						  }

						  ?>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div id="tab_links" class="main_panel links hidden">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">Liens</h1>
			</div>
            <div class="col-md-6" >
            	<div class="MD_unit MD_unit_green">
	            	<div class="MD_unit_title unit_title_green">Nouveau Fichier link</div>
		            <form id="new_link" method="post" name="new_link">
		            	<div class="control_row">
		            		<div class="col-md-3 form_control_label">
								<label for="">Nom de fichier liens</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="" name="link_name" placeholder="Nom de fichier liens">
							</div>
						</div>
						<div class="control_row" style="  text-align: center;">
							<small>* Si vous laissez ce champ vide le nom de nouveau ficher sera le timestamp</small>
						</div>
						    
						<div  class="MD_submit_row">
							<input type="submit" value="Créé" class="btn unit_btn unit_btn_green MD_submit_btn">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="MD_unit">
					<table class="table table-hover">
					<tr class="info">
					  <th class="tr_table_files">Nom de fichiers</th>
					  <th class="tr_table_files">Date de creation</th>
					</tr>
					  <?php foreach (glob($appPath."links/*.php") as $value) {
					  	$r=explode('links/',$value);
					  	echo "<tr><td>".$r[1]."</td><td>".date("Y/m/d H:i:s",filemtime($value))."</td></tr>";
					  } ?>

					</table>
				</div>
			</div>
		</div>
	</div>

	<div id="tab_langs" class="main_panel langs hidden">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">Langues</h1>
			</div>
            <div class="col-md-6" >
            	<div class="MD_unit MD_unit_brown">
	            	<div class="MD_unit_title unit_title_brown">Nouveau dossier de langue</div>

		            <form id="new_lang_dir" method="post" name="new_lang_dir">
		            	<div class="control_row">
		            		<div class="col-md-3 form_control_label">
								<label for="">Nom de dossier</label>
							</div>
						    <div class="col-md-9">
						    	<input type="text" class="form-control" id="" name="lang_dir_name" placeholder="Nom de dossier lang">
						    </div>
						</div>

						<div  class="MD_submit_row">
							<input type="submit" value="Créé" class="btn unit_btn unit_btn_brown MD_submit_btn">
						</div>
					</form>
				</div>
			</div>

			<div class="col-md-6" >
				<div class="MD_unit MD_unit_red">
		            <div class="MD_unit_title unit_title_red">Nouveau fichier de langue</div>
		            <form id="new_lang_file" method="post" name="new_lang_file">
		            	<div class="control_row">
		            		<div class="col-md-3 form_control_label">
						    	<label for="">Nom de dossier</label>
						    </div>
						    <!--<input type="text" class="form-lang_dir_name_2" id="" name="lang_dir_name_2" placeholder="Nom de dossier lang">-->
						    <div class="col-md-9">
							    <select class="form-control" id="sel1" name="lang_dir_name_2">
							    <?php
							    //
							    $r=glob($appPath."lang/*");
							    foreach ($r as $dir) {
							    	$r2=explode('lang/', $dir);
							    	echo "<option value='".$r2[1]."'>".$r2[1]."</option>";
							    } ?>
					        	</select>
					        </div>
						</div>
		            	<div class="control_row">
			            	<div class="col-md-3 form_control_label">
							    <label for="">Nom de fichier</label>
							</div>
							<div class="col-md-9">
						    	<input type="text" class="form-control" id="lang_file_name" name="lang_file_name" placeholder="Nom de fichier">
						    </div>
						</div>
						<div  class="MD_submit_row">
							<input type="submit" value="Créé" class="btn unit_btn unit_btn_red MD_submit_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="tab_mvc_m" class="main_panel mvc hidden">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">Model - MVC</h1>
			</div>

			
            
			  
			    <div class="col-md-4">
			    	<div class="MD_unit MD_unit_orange">
		            	<div class="MD_unit_title unit_title_orange">Nouveau model</div>
			    	
				    	<form id="new_models" method="post" name="new_models">
			            	<div class="control_row">
				            	<div class="col-md-4 form_control_label">
								    <label for="">Nom de fichier</label>
								</div>
								<div class="col-md-8">
							    	<input type="text" class="form-control" id="new_models_file_name" name="new_models_file_name" placeholder="Nom de fichier">
							    </div>
							</div>
							<div class="control_row">
								<div class="col-md-4 form_control_label">
								    <label for="">Nom de class</label>
								</div>
							   	<div class="col-md-8">
							    	<input type="text" class="form-control" id="new_models_class_name" name="new_models_class_name" placeholder="Nom de class">
							    </div>
							</div>
							<div class="control_row">
								<div class="col-md-4 form_control_label">
							    	<label for="">Nom de table dans BD</label>
							    </div>
							    <div class="col-md-8">
							    	<input type="text" class="form-control" id="new_models_table_name" name="new_models_table_name" placeholder="Nom de table dans BD">
							    </div>
							</div>
							<div  class="MD_submit_row">
								<input type="submit" value="Créé" class="btn unit_btn unit_btn_orange MD_submit_btn">
							</div>
							
						</form>
				    </div>
			    </div>
			
			    <div class="col-md-8">
			    	<div class="MD_unit">
				    	<table class="table table-hover">
						<tr class="info">
						  <th class="tr_table_files">Nom de fichiers</th>
						  <th class="tr_table_files">Nom de class</th>
						  <th class="tr_table_files">nom de table</th>
						  <th class="tr_table_files">Date de creation</th>
						</tr>
						  <?php foreach (glob($appPath."models/*.php") as $value) {
						  	$r=explode('models/',$value);
						  	echo "<tr><td>".$r[1]."</td><td></td><td></td><td>".date("Y/m/d H:i:s",filemtime($value))."</td></tr>";
						  } ?>

						</table>
				    </div>
			    </div>
			  
			
			</div>
			</div>

			<div id="tab_mvc_v" class="main_panel mvc hidden">
				<div class="content">
					<div class="title"> 
						<h1 style="margin:0px">View - MVC</h1>
					</div>

			
			  	<div class="col-md-4">
				    <div class="MD_unit MD_unit_deeppink">
		            	<div class="MD_unit_title unit_title_deeppink">Nouvelle vue</div>
					    
					    <form id="new_view" method="post" name="new_view">
			            	<div class="control_row">
			            		<div class="col-md-4 form_control_label">
							    	<label for="">Nom de vue</label>
							    </div>
							    <div class="col-md-8">
							    	<input type="text" class="form-control" id="new_view_file_name" name="new_view_file_name" placeholder="Nom de fichier">
							    	<label>* vous pouvez créer des vues dans des dossiers, même s'ils ne sont pas existés, en utilisant '.', par exemple: "user.show"</label>
							    </div>
							</div>
							<div class="control_row">
			            		<div class="col-md-4 form_control_label">
							    	<label for="">Vue de Smarty</label>
							    </div>
							    <div class="col-md-8">
							    	<div class="switch">
									    <input type="checkbox" name="new_controller_add_route" class="switch-checkbox" id="myswitch-deeppink" checked>
									    <label class="switch-label switch-label-deeppink" for="myswitch-deeppink"></label>
									</div>
							    </div>
							</div>
							<div  class="MD_submit_row">
								<input type="submit" value="Créé" class="btn unit_btn unit_btn_deeppink MD_submit_btn">
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-8">
					<div class="MD_unit">
						<table class="table table-hover">
						<tr class="info">
						  <th class="tr_table_files">Nom de fichiers et dossiers</th>
						  <th class="tr_table_files">Date de creation</th>
						</tr>
						  <?php 

							/* - by Amine Abri(https://github.com/amineabri) - */
							
							function listFolderFiles($dir){
								$ffs = scandir($dir);
										foreach($ffs as $ff){
											if($ff != '.' && $ff != '..' && $ff != 'ajax'){
												echo '<tr>';
													echo '<td>';
															echo '<strong>'.$ff.'/';
																if(is_dir($dir.'/'.$ff)) 
																	echo '<ol class="list_without_number">';
																	foreach (glob($dir.'/'.$ff."/*.php") as $value) {
																		$r	=	explode('views/'.$ff.'/' ,$value);
																		echo "<li>".$r[1]."</li>";
																	} 
																	echo '</ol>';
															echo '</strong>';
													echo '</td>';
													echo '<td>';
															echo '<strong>&nbsp;';
																if(is_dir($dir.'/'.$ff)) 
																	echo '<ol class="list_without_number">';
																	foreach (glob($dir.'/'.$ff."/*.php") as $value) {
																		echo "<li>".date("Y/m/d H:i:s",filemtime($value))."</li>";
																	} 
																	echo '</ol>';
															echo '</strong>';
													echo '</td>';
												echo '</tr>';
											}
										}
							}
							listFolderFiles($appPath.'views');

							/* -- */
							?>

						</table>
					</div>
				</div>
			  </div>
			</div>

			<div id="tab_mvc_c" class="main_panel mvc hidden">
				<div class="content">
					<div class="title"> 
						<h1 style="margin:0px">Controles - MVC</h1>
					</div>

			
			  
			    <div class="col-md-4">
				    <div class="MD_unit MD_unit_cyan">
					    <div class="MD_unit_title unit_title_cyan">Nouveau controller</div>
					    <form id="new_controller" method="post" name="new_controller">
					    	<div class="control_row">
			            		<div class="col-md-4 form_control_label">
							    	<label for="">Nom de fichier</label>
							    </div>
							    <div class="col-md-8">
							    	<input type="text" class="form-control" id="new_controller_file_name" name="new_controller_file_name" placeholder="Nom de fichier">
							    </div>
							</div>
							<div class="control_row">
			            		<div class="col-md-4 form_control_label">
							    	<label for="">Nom de class</label>
							    </div>
							    <div class="col-md-8">
							    	<input type="text" class="form-control" id="new_controller_class_name" name="new_controller_class_name" placeholder="Nom de class">
							    </div>
							</div>
							<div class="control_row">
			            		<div class="col-md-4 form_control_label">
							    	<label for="">Ajouter un Route</label>
							    </div>
							    <div class="col-md-8">
							    	<div class="switch">
									    <input type="checkbox" name="new_controller_add_route" class="switch-checkbox" id="myswitch-blue" checked>
									    <label class="switch-label switch-label-blue" for="myswitch-blue"></label>
									</div>
							    </div>
							</div>

							<div  class="MD_submit_row">
								<input type="submit" value="Créé" class="btn unit_btn unit_btn_cyan MD_submit_btn">
							</div>

						</form>
				    </div>
				</div>
				<div class="col-md-8">
					<div class="MD_unit">
						<table class="table table-hover">
							<tr class="info">
							  <th class="tr_table_files">Nom de fichiers</th>
							  <th class="tr_table_files">Nom de class</th>
							  <th class="tr_table_files">Date de creation</th>
							</tr>
							  <?php foreach (glob($appPath."controllers/*.php") as $value) {
							  	$r=explode('controllers/',$value);
							  	echo "<tr><td>".$r[1]."</td><td></td><td>".date("Y/m/d H:i:s",filemtime($value))."</td></tr>";
							  } ?>

						</table>
					</div>
				</div>
			  </div>
			</div> 
		</div>
	</div>

	<div id="tab_seeds" class="main_panel seeds hidden">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">Graines</h1>
			</div>
            <div class="col-md-6" >
            	<div class="MD_unit MD_unit_blue">
            		<div class="MD_unit_title unit_title_blue">Nouveau graine (seed)</div>
	            		<form id="new_seed" method="post" name="new_seed">
						<div class="control_row">
							<div class="col-md-3 form_control_label">
								<label for="">Nom de seed</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control" id="" name="seedname_name" placeholder="Nom de seed">
							</div>
						</div>
						<div  class="MD_submit_row">
							<input type="submit" value="Créé" class="btn unit_btn unit_btn_blue MD_submit_btn" >
						</div>
						
					</form>
            	</div>

            	<div class="MD_unit MD_unit_slategray">
            		<div class="MD_unit_title unit_title_slategray">Lancer Seeders</div>
            		<div class="col-md-9" style="margin-top: 15px;">
            			<p>Lancer tous les seeders dans la class SeedsCaller</p>
            		</div>
            		
	            		<form id="run_seed" method="post" name="run_seed">
							<input type="submit" value="Lancer" class="btn unit_btn unit_btn_slategray MD_submit_btn" >
						</form>
					
            	</div>
			</div> 
			<div class="col-md-6" >
				<div class="MD_unit">
					<table class="table table-hover">
					<tr class="info " >
					  <th class="tr_table_files">Nom de fichiers</th>
					  <th class="tr_table_files">Date de creation</th>
					</tr>
					  <?php foreach (glob($appPath."seeds/*.php") as $value) {
					  	$r=explode('seeds/',$value);
					  	echo "<tr><td>".$r[1]."</td><td>".date("Y/m/d H:i:s",filemtime($value))."</td></tr>";
					  } ?>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div id="tab_info" class="main_panel seeds hidden">
		<div class="content">
			<div class="title"> 
				<h1 style="margin:0px">A Propos</h1>
			</div>
			<div class="col-md-6" >
            	<div class="MD_unit MD_unit_blue">
            		<div class="MD_unit_title unit_title_blue">Créateur</div>
            		<div class="MD_unit_text">Fiesta v2.6 (2.6.0.264) PHP Framework</div>
            		<div class="MD_unit_text">Crée par <b>Youssef Had</b> (youssefhad2@gmail.com - <a href="http://www.facebook.com/yussef.had" style="color:white">www.facebook.com/yussef.had</a> )<br></div>
            		<div class="MD_unit_text">
            			<!-- Place this tag where you want the button to render. -->
						<a class="github-button" href="https://github.com/fiesta-framework/Fiesta" data-icon="octicon-star" data-style="mega" data-count-href="/fiesta-framework/Fiesta/stargazers" data-count-api="/repos/fiesta-framework/Fiesta#stargazers_count" data-count-aria-label="# stargazers on GitHub" aria-label="Star fiesta-framework/Fiesta on GitHub">Star</a>
					</div>

					<div class="MD_unit_text">
						<!-- Place this tag where you want the button to render. -->
						<a class="github-button" href="https://github.com/youssefhad" data-style="mega" data-count-href="/youssefhad/followers" data-count-api="/users/youssefhad#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @youssefhad on GitHub">Follow @youssefhad</a>
					</div>

					<div class="MD_unit_text">
						<!-- Place this tag where you want the button to render. -->
						<a class="github-button" href="https://github.com/fiesta-framework/Fiesta/fork" data-icon="octicon-git-branch" data-style="mega" data-count-href="/fiesta-framework/Fiesta/network" data-count-api="/repos/fiesta-framework/Fiesta#forks_count" data-count-aria-label="# forks on GitHub" aria-label="Fork fiesta-framework/Fiesta on GitHub">Fork</a>

						<!-- Place this tag right after the last button or just before your close body tag. -->
						<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
            		</div>
            	</div>
			</div>
			<div class="col-md-6" >
				<div class="MD_unit MD_unit_red">
	        		<div class="MD_unit_title unit_title_red">Versions</div>
	        		<div class="MD_unit_text">

	        			<div> Fiesta v2.6 (beta) ....  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/2.5.1.244">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/2.5.1.244.zip">Download</a></div>

	        			<div> Fiesta v2.5 ................  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/2.5.0.236">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/2.5.0.236.zip">Download</a></div>

	        			<div> Fiesta v2.0 ................  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/2.0.0.1">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/2.0.0.1.zip">Download</a></div>

	        			<div> Fiesta v1.5 ................  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.5.0">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.5.0.zip">Download</a></div>

	        			<div> Fiesta v1.4.4 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.4.4">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.4.4.zip">Download</a></div>

	        			<div> Fiesta v1.4.3 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.4.3">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.4.3.zip">Download</a></div>

	        			<div> Fiesta v1.4.2 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.4.2">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.4.2.zip">Download</a></div>

	        			<div> Fiesta v1.4.1 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.4.1">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.4.1.zip">Download</a></div>

	        			<div> Fiesta v1.4 ................  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.4">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.4.zip">Download</a></div>

	        			<div> Fiesta v1.3.2 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.3.2">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.3.2.zip">Download</a></div>

	        			<div> Fiesta v1.3.1 .............  <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/releases/tag/1.3.1">Github</a> - <a class="version_link" href="https://github.com/fiesta-framework/Fiesta/archive/1.3.1.zip">Download</a></div>

	        		</div>
	            </div>
			</div>
		</div>
	</div>


</body>
<script type="text/javascript">
	<?php echo "var panelFolder='".Config::get('panel.folder')."';"; ?>
</script>
</html>
<?php } ?>
