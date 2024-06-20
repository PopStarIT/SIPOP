<head>
	<meta charset="utf-8" />
	<title>
	<?php 
		echo isset($base_config['webname']) ? html_entity_decode($base_config['webname']) : "webname"; 
		echo isset($page_title) ? " | ". $page_title : ""; 
	?>
	</title>
	<meta content="<?php echo isset($base_config['keywords']) ? html_entity_decode($base_config['keywords']) : "keywords"; ?>" name="keywords">
	<meta content="<?php echo isset($base_config['description']) ? html_entity_decode($base_config['description']) : "description"; ?>" name="description">
	<meta name="robots" content="noindex, nofollow">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="<?php echo isset($base_config['webname']) ? html_entity_decode($base_config['webname']) : "webname"; ?>">
	<meta property="og:site_name" content="<?php echo isset($base_config['webname']) ? html_entity_decode($base_config['webname']) : "webname"; ?>">
	<meta property="og:description" content="<?php echo isset($base_config['description']) ? html_entity_decode($base_config['description']) : "description"; ?>">
	<meta property="og:type" content="website">
	<!-- mobile settings -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="<?php echo BASEDIR . "assets/" . $path_template ."/" ?>favicon/favicon.ico">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo BASEDIR . "assets/" . $path_template ."/" ?>favicon/apple-icon-precomposed.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASEDIR . "assets/" . $path_template ."/" ?>favicon/apple-icon-180x180.png">
	<!-- END Icons -->
	
	<?php $this->load->view($path_template.'/include/website/css'); ?>
	
</head>