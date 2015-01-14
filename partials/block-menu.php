<?php
$topmenustyle 					= ''; $menuleftright = ''; $navid = '';
$header_menu 					= ot_get_option( 'pgb_headermenu' );
$top_search_field 				= ot_get_option('pgb_search_top');
$top_searchfield_type 			= ot_get_option( 'pgb_search_field_type_top' );
$topmenu_secondaryarea_mobile 	= ot_get_option( 'pgb_secondary_menu_area_mobile', 'off' );
$left_menu_logo_position 		= ot_get_option('pgb_logo_positon_left');
$left_menu_sitetagline 			= ot_get_option( 'pgb_sitetagline_left' );
$left_menu_sitetagline_position = ot_get_option( 'pgb_sitetagline_position_left' );
$left_menu_searchfield 			= ot_get_option('pgb_search_left');
$left_menu_searchfield_position = ot_get_option('pgb_searchfield_position_left');

if ( !empty($header_menu) ) {

	// TOP
	if( "top" == $header_menu ) {

		$top_menu_position = ot_get_option('pgb_menu_position_top');
		if ( !empty( $top_menu_position ) ) {

			if ( 'fixed' == $top_menu_position ) {
				$topmenustyle = 'navbar-fixed-top top-nav-menu';
			} elseif ( 'static' == $top_menu_position ) {
				$topmenustyle = 'navbar-static-top';
			} 

		}

		if( 'on' == $top_search_field && 'icon' == $top_searchfield_type ) {
			$searchform = 'search-form-icon';
		}

		$top_menu_align = ot_get_option('pgb_menu_align_top');
		if( !empty( $top_menu_align )) {
			if ( 'right' == $top_menu_align ) {
				$menuleftright = 'navbar-nav-right';
			}
		}

	} // end Top

	// LEFT
	if( "left" == $header_menu ) {
		$leftmenustyle = 'navbar-fixed-top navbar-fixed-left';
		$leftmain = 'site-navigation-left top-nav-menu sidebar-slide';
	}

} // end if ( !empty($header_menu) ) {
?>

	<?php
		$topmenu_secondaryarea = ot_get_option( 'pgb_secondary_menu_area_top' );
		if ( !empty( $header_menu ) && "top" == $header_menu ) {
			if( !empty( $topmenu_secondaryarea ) ) {
				if ( 'on' == $topmenu_secondaryarea ) {
					if ( !empty( $topmenu_secondaryarea_mobile ) ) {
						if ( 'on' != $topmenu_secondaryarea_mobile[0] ) {
							$displaysecondaryarea = "topmenu-secondary-area";
						}
					}
	?>
		<nav>
			<div class="container-fluid">
				<div class="container menu-container-width fixed-state-mrg <?php echo $displaysecondaryarea; ?>">
					<div class="row">
						<?php get_template_part('partials/block', 'secondaryarea'); ?>
					</div>
				</div>
			</div>
		</nav>
	<?php
				}
			}
		}
	?>
	<nav id="sidebar-wrapper" class="navbar navbar-default site-navigation <?php echo $leftmain; ?> <?php echo $topmenustyle; ?>" >
		<div class="navbar-default container-fluid <?php echo $leftmenustyle; ?>" role="navigation">
			<div  class="container nav-contain menu-container-width <?php echo $searchform; ?>" >

				<div class="navbar-header">
					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>


					<!-- Your site title as branding in the menu -->
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						if ( !empty( $header_menu )) {

							// LEFT
							if( "left" == $header_menu ) {

								if( !empty( $left_menu_logo_position )) {

									if( 'topleft' == $left_menu_logo_position ) {
										echo pgb_get_logo( 'logoleft' );

										if( !empty( $left_menu_sitetagline ) && 'on' == $left_menu_sitetagline ) {
											pgb_get_sitetagline_leftmenu( $left_menu_sitetagline_position );
										}
									}
									elseif ( 'topcenter' == $left_menu_logo_position ) {
										echo pgb_get_logo( 'logocenter' );
										if( !empty( $left_menu_sitetagline ) && 'on' == $left_menu_sitetagline ) {
											pgb_get_sitetagline_leftmenu( $left_menu_sitetagline_position );
										}
									}
								}

							}

							// TOP
							if( 'top' == $header_menu ) {
								echo pgb_get_logo( 'logoleft' );
							}

						} // END if ( !empty( $header_menu ))
					?>
					</a>
				</div>
				<?php

				if ( !empty( $header_menu ) ) {

					if ( 'left' == $header_menu ) {
						if ( !empty( $left_menu_searchfield ) && 'on' == $left_menu_searchfield ) {
							if ( !empty( $left_menu_searchfield_position ) && 'top' == $left_menu_searchfield_position ) {
								get_template_part('partials/block', 'search' );
							}
						}
					}

					// Top
					if ( 'top' == $header_menu ) {
						if( ( !empty( $top_search_field ) && 'on' == $top_search_field ) ) {
							if ( !empty( $top_searchfield_type ) &&  'full' == $top_searchfield_type ) {
								get_template_part('partials/block', 'search' );
							}
						}
					}

					} // END if ( !empty( $header_menu ) )
				?>

				<?php if ( 'left' == $header_menu ) { ?>
				<div class="collapse navbar-collapse navbar-responsive-collapse">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class' => 'nav navbar-nav navbar-default liwidth',
							'fallback_cb' => '',
							'menu_id' => 'main-menu',
							'walker' => new wp_bootstrap_navwalker_collapse()
						)
					);
				?>
				<?php } else { ?>

				<div class="collapse navbar-collapse navbar-responsive-collapse">
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container_class' => 'top-view-primary-menu',
							'menu_class' => 'nav navbar-nav '.$menuleftright,
							'fallback_cb' => '',
							'menu_id' => 'main-menu',
							'walker' => new wp_bootstrap_navwalker()
						)
					);  } ?>
					<?php
						if ( !empty( $header_menu ) ) {

							// Top
							if ( 'top' == $header_menu ) {
								if( ( !empty( $top_search_field ) && 'on' == $top_search_field ) ) {
									if ( !empty( $top_searchfield_type ) && 'icon' == $top_searchfield_type ) {
										get_template_part('partials/block', 'search' );
									}
								}
							}

							// Left
							if ( 'left' == $header_menu ) {
								if ( !empty( $left_menu_searchfield ) && 'on' ==$left_menu_searchfield ) {
									if ( !empty( $left_menu_searchfield_position ) && 'bottom' == $left_menu_searchfield_position ) {
										get_template_part('partials/block', 'search' );
									}
								}
							}

						} // end if ( !empty( $header_menu ) )

					?>

					<?php
						if ( !empty( $header_menu )) {
							if( "left" == $header_menu ) {

								if( !empty( $left_menu_logo_position )) {

									if( 'bottomleft' == $left_menu_logo_position) {
										echo pgb_get_logo( 'logoleft' );
										if( !empty( $left_menu_sitetagline ) && 'on' == $left_menu_sitetagline ) {
											pgb_get_sitetagline_leftmenu( $left_menu_sitetagline_position );
										}
									}
									elseif ( 'bottomcenter' == $left_menu_logo_position ) {
										echo pgb_get_logo( 'logocenter' );
										if( !empty( $left_menu_sitetagline ) && 'on' == $left_menu_sitetagline ) {
											pgb_get_sitetagline_leftmenu( $left_menu_sitetagline_position );
										}
									}
								}
							}
						}
					?>
				</div>
			</div>
		</div><!-- .navbar -->
	</nav> <!-- .site-navigation -->