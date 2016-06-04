<html>
	<head>
		<?php Html::charset(); ?>
		<title>Lighty | Panel</title>
		<?php
			Html::favicon(Path::$public."/favicon.ico");
			Libs::js($path."assets/library/jquery-2.2.4.min.js",false);
			Libs::js($path."assets/js/me.js",false);
			Libs::js($path."assets/js/main.js",false);
			Libs::css($path."assets/library/bootstrap/css/bootstrap.min.css",false);
			Libs::css($path."assets/library/bootstrap/css/bootstrap-theme.min.css",false);
			Libs::css($path."assets/css/style.css",false);
		?>
	</head>

	<body class="body_loggin">
		<img src="<?php echo "app/resources/images/lighty_logo.png" ?>" class="lg_img">
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