<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <?php
    wp_head();
  ?>
</head>
<body <?php echo body_class(); ?>>
  <header id="header" class="header" role="banner">

    <!-- Основное меню -->
    <div class="relative bg-white shadow py-4">
      <div class="container mx-auto px-4 md:px-0">
        <div class="flex justify-between items-center">
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/dan-logo.svg" alt="Лого" width="32">
            </a>
          </div>
          <div class="header_toggle md:hidden">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="header_menu hidden md:block">
            <?php wp_nav_menu([
              'theme_location' => 'main_header',
              'menu_id' => 'main_header',
              'menu_class' => 'flex justify-between text-lg'
            ]); ?>
          </div>    
        </div>
      </div>
    </div>
    <!-- END Основное меню -->

  </header>
  <div class="mobile-menu">
    <?php wp_nav_menu([
      'theme_location' => 'main_header',
      'menu_id' => 'main_header',
      'menu_class' => 'flex justify-between text-lg px-4 py-8'
    ]); ?>
  </div>
  <section id="content" role="main">