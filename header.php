<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package katodians
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="header-area header-area3">
		<div class="header-top bg-f3f">
			<div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="header-top-left">
                    	<?php	the_custom_logo(); ?>
                </div>
            </div>
            <div class="col-md-6 col-12">
            </div>
        </div>
    	</div>
		</div>
		<div class="header-middle-area">
			<div class="container">
        <div class="row">
					<div class="col-12 d-none d-lg-block">
							<div class="mainmenu">
								<nav id="site-navigation" class="main-navigation">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										) );
									?>
								</nav><!-- #site-navigation -->
							</div>
					</div>
					<div class="col-12 col-lg-6">
              <?php get_search_form() ?>
          </div>
					<div class="d-block d-lg-none clear col-md-1 col-sm-3 col-3">

          </div>
        </div>
			</div>
    </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
