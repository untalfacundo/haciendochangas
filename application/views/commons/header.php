<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>HaciendoChangas!</title>
	<meta name="description" content="El sitio para hacerte una changita">
	<meta name="author" content="hc">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
	
	<!-- Skins -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/skins.css">
	
	<!-- Responsive Style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png">
  
</head>
<body>

<div class="loader"><div class="loader_html"></div></div>

<div id="wrap">
	
	<div class="login-panel">
		<section class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-content">
						<h2>Iniciar sesión</h2>
						<div class="form-style form-style-3">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravdio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequa. Vivamus vulputate posuere nisl quis consequat.</p>
							<a class="button color small signup">Iniciar sesión</a>
						</div>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
				<div class="col-md-6">
					<div class="page-content Register">
						<h2>Registrarse</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravdio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequa. Vivamus vulputate posuere nisl quis consequat.</p>
						<a class="button color small signup">Crear cuenta</a>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
			</div>
		</section>
	</div><!-- End login-panel -->
	
	<div class="panel-pop" id="signup">
		<h2>Registrarse<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Usuario<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input type="email">
					</p>
					<p>
						<label class="required">Contraseña<span>*</span></label>
						<input type="password" value="">
					</p>
					<p>
						<label class="required">Confirmar contraseña<span>*</span></label>
						<input type="password" value="">
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" value="Signup" class="button color small submit">
				</p>
			</form>
		</div>
	</div><!-- End signup -->
	
	<div class="panel-pop" id="lost-password">
		<h2>Contraseña perdida<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<p>Perdiste tu contraseña? Por favor ingresa tu usuario y e-mail. Recibiras un link con tu nueva contraseña via email.</p>
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Usuario<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input type="email">
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" value="Reset" class="button color small submit">
				</p>
			</form>
			<div class="clearfix"></div>
		</div>
	</div><!-- End lost-password -->
	
	<div id="header-top">
		<section class="container clearfix">
			<nav class="header-top-nav">
				<ul>
					<li><a href="contact_us.html"><i class="icon-envelope"></i>Contacto</a></li>
					<!-- <li><a href="#"><i class="icon-headphones"></i>Support</a></li>  -->
					<li><a href="login.html" id="login-panel"><i class="icon-user"></i>Iniciar sesión</a></li>
				</ul>
			</nav>
			<div class="header-search">
				<form>
				    <input type="text" value="Buscar..." onfocus="if(this.value=='Search here ...')this.value='';" onblur="if(this.value=='')this.value='Search here ...';">
				    <button type="submit" class="search-submit"></button>
				</form>
			</div>
		</section><!-- End container -->
	</div><!-- End header-top -->
	<!-- Header -->
	<header id="header">
		<section class="container clearfix">
			<div class="logo"><a href="index.html"><img alt="" src="images/logo.png"></a></div>
			<nav class="navigation">
				<ul>
					<li class="current_page_item"><a href="/">Home</a></li>
					<li class="ask_question"><a href="<?php echo base_url().'inicio/nueva' ?>">Pedir changa</a></li>
					<li><a href="cat_question.html">Usuarios</a>
						<ul>
							<li><a href="<?php echo base_url().'inicio/perfil' ?>">Mi perfil</a></li>
							<li><a href="<?php echo base_url().'inicio/pedidos' ?>">Mis pedidos</a></li>
							<li><a href="<?php echo base_url().'inicio/postulaciones' ?>">Postuaciones</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url().'contacto' ?>">Contacto</a></li>
				</ul>
			</nav>
		</section>
	</header> 
	<!-- End header -->
	
