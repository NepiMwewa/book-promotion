<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
  <div class="blur-background"></div>
  <header id="header-id" class="header-content sticky">
    <nav role="navigation" aria-label="Main menu" id="hamburger-menu">
      <button aria-expanded="false" aria-label="Main menu toggle button" aria-controls="main-menu" href="#menu" id="menu-toggle" class="menu-toggle" onclick="toggleMenu()">
          <svg aria-hidden="true" focusable="false" fill="none" stroke="currentColor" 
              viewBox="0 0 24 24" 
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="3" stroke="#D9D2BF"
              d="M4 6h16M4 12h16M4 18h16">
              </path>
              <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4 6h16M4 12h16M4 18h16">
              </path>
          </svg>
      </button>
    </nav>
    <?php
      wp_nav_menu( array(
        'theme_location' 	=> 'primary',
        'menu_id' 		 	  => 'main-menu',
        'menu_class' 		  => '',
        'container' 	 	  => 'nav',
        'container_id'    => 'menu-nav',
        'container_class'	=> 'header-menu-container',
        'depth'				    => 2,
        'fallback_cb' 		=> false
      ) );
    ?>
  </header>
