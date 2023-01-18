<?php
  /**
   * The header for our theme
   *
   * This is the template that displays all of the <head> section and everything up until <div id="content">
   *
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   *
   * @package arcadiamemorial
   */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">

  <div class="container-fluid">
    <div class="row align-items-center justify-content-center">

      <!-- <div class="col-8 col-md-3"> -->
      <div class="col-8 col-md-3 col-lg-1 col-xl-2 pr-0 mr-0 zi-i">
        <a class="header-logo" href="<?php echo site_url(); ?>">
          <svg class="dark-logo">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/static/img/icons/sprite.svg#dark-logo"></use>
          </svg>
        </a>
      </div>

      <!-- <div class="col-4 col-md-9"> -->
      <div class="col-4 col-md-9 col-lg-11 col-xl-10 pl-0 ml-0">

        <div class="open-nav d-xl-none text-right">
          <svg class="open-nav-icon" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 16.6665H0V19.9999H30V16.6665Z"/>
            <path d="M30 8.3335H0V11.6669H30V8.3335Z"/>
            <path d="M30 0H0V3.33335H30V0Z"/>
          </svg>
        </div>

        <nav class="text-xl-right header-nav">

          <div class="close-nav d-xl-none">
            <span class="icon icon-close"></span>
          </div>
          
        <?php if ( !is_user_logged_in() ) { ?>
          <?php wp_nav_menu([
            'theme_location' => 'menu-1',
            'container' => false,
          ]); ?>

            <?php wp_nav_menu([
                'theme_location' => 'menu-4',
                'container' => false,
            ]); ?>
        <?php } ?>

        <?php if ( is_user_logged_in() ) { ?>
          <?php wp_nav_menu([ 
            'theme_location' => 'menu-3',
            'container' => false, 
          ]); ?>
          <ul class="menu menu-area">
            <li class="favorites"><a href="<?php echo site_url();?>/dashboard/favorites/" aria-current="page">star</a></li>
            <li class="message-history"><a href="<?php echo site_url();?>/dashboard/message-history/">message<span class="message-count hide">0</span></a></li>
            <li class="personal-data"><a href="<?php echo site_url();?>/dashboard/personal-data/">personal</a></li>
            <li class="nav-search"><a href="#"><span class="icon icon-search"></span></a></li>
          </ul>
        <?php } ?>
          <?php get_search_form(); ?>

        </nav>
      </div>

    </div>
  </div>

</header><!-- #masthead -->
