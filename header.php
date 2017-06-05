<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>


	</head>
	<body <?php body_class(); ?>>


		<header class="header" id="header">
			<a href="<?php echo home_url(); ?>"  id="branding"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Jazz Contraband"> <span>Jazz Contraband</span></a>
			<nav id="navigation_menu" role="navigation">
				<ul>
					<?php chilly_nav('header-menu'); ?>
					<?php if(is_user_logged_in()) : ?>
						<?php chilly_nav('loggedin-menu'); ?>
						<li><a href="<?php echo wp_logout_url( site_url('/')  ); ?>">Déconnexion</a></li>
					<?php else: ?>
						<li><a class="login" href="<?php echo  site_url('/login'); ?>">Connexion</a></li>
					<?php endif; ?>
				</ul>

			</nav>
			<p id="jazz_name"></p>
			<div class="yellow_stripes border_image border_top"></div>

			<!-- <div class="container">
				<div class="row">
					<div class="col-sm-3 col-sm-push-0 col-xs-10 col-xs-push-1">
						<a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
					</div>
					<div class="col-sm-9">
						<nav id="navigation_menu" role="navigation">
							<ul>
								<?php chilly_nav('header-menu'); ?>
								<?php if(is_user_logged_in()) : ?>
									<?php chilly_nav('loggedin-menu'); ?>
									<li><a href="<?php echo wp_logout_url( site_url('/')  ); ?>">Logout</a></li>
								<?php else: ?>
									<li><a href="<?php echo  site_url('/login'); ?>">Login</a></li>
								<?php endif; ?>
							</ul>

						</nav>
					</div>

				</div>
				<a href="#" id="menu_button" >Menu</a>
			</div> -->



		</header>
			<?php if(!is_user_logged_in()) : ?>
				<div class="loginformcontainer">
					<div>
						<div class="loginform black insideform">
							<h3>Connexion</h3>
							<?php wp_login_form(); ?>
							<p class="forgottenpassword">- Mot de passe oublié -</p>
						</div>
					</div>
				
					<div class="lostpasswd black insideform">
						<h3>Mot de passe oublié</h3>
						<p>Entrez votre adresse email pour recevoir votre nouveau mot de passe</p>
						<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
							<div class="username">
								<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
								<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
							</div>
							<div class="login_fields">
								<?php do_action('login_form', 'resetpass'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
								<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
								<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?reset=true" />
								<input type="hidden" name="user-cookie" value="1" />
							</div>
						</form>
						<p class="notforgotten">- Pas oublié? Connexion -</p>
					</div>
				</div>
			<?php endif; ?>
