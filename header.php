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
					<div class="col-md-8 col-sm-12 d-none d-lg-block">
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
					<div class="d-block d-lg-none clear col-md-1 col-sm-3 col-3">
              <div class="responsive-menu-wrap floatright">
								<div class="slicknav_menu">
									<a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;">
										<span class="slicknav_menutxt">MENU</span>
										<span class="slicknav_icon">
											<span class="slicknav_icon-bar"></span>
											<span class="slicknav_icon-bar"></span>
											<span class="slicknav_icon-bar"></span>
										</span>
									</a>
									<ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
										<?php
											wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
											) );
										?>
									</ul>
                </div>
						</div>
          </div>
          <div class="col-md-4 col-sm-9 col-9">
              <?php get_search_form() ?>
          </div>
        </div>
			</div>
    </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
