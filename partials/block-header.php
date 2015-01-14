	<?php
	$header_menu 			  = ot_get_option( 'pgb_headermenu' );
	$show_left_menu 		  = ot_get_option( 'pgb_menu_display_left' );
	$show_topleft_menu 		  = ot_get_option('pgb_menu_display_topleft');
	$left_menu_togglestyle 	  = ot_get_option('pgb_menu_toggle_style_left');
	$topleft_menu_tooglestyle = ot_get_option('pgb_menu_toggle_style_topleft');
	?>

	<header id="masthead" class="site-header" role="banner">
		<?php tha_header_top(); ?>
			<div class="container">
				<div class="row">
					<div class="site-header-inner col-sm-12">

						<?php $header_image = get_header_image();
						if ( ! empty( $header_image ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
							</a>
						<?php } // end if ( ! empty( $header_image ) ) ?>


						<div class="site-branding">
							<?php 	if ( !empty( $header_menu ) ) {
										if ( 'left' == $header_menu ) {  
											if ( !empty( $show_left_menu ) && 'toggle' == $show_left_menu ) { 
												if ( !empty( $left_menu_togglestyle ) ) {
							?>
							<a href="#menu-toggle" title="menu" class="btn btn-default" id="menu-toggle" data-toggle="<?php echo esc_attr( $left_menu_togglestyle ); ?>"><i class="fa fa-bars"></i></a>
							<?php 				} 		
											} 
										} 

										if ( 'topleft' == $header_menu ) {  
											if ( !empty( $show_topleft_menu ) && 'toggle' == $show_topleft_menu ) { 
												if ( !empty( $topleft_menu_tooglestyle ) ) {
							?>
							<a href="#menu-toggle" title="menu" class="btn btn-default" id="menu-toggle" data-toggle="<?php echo esc_attr( $topleft_menu_tooglestyle ); ?>"><i class="fa fa-bars"></i></a>
							<?php 				} 		
											} 
										} 
									} ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php printf( __( '%s', 'pgb' ), get_bloginfo( 'name' ) ); ?></a></h1>
							<h4 class="site-description"><?php $desc = get_bloginfo( 'description' ); printf( __( '%s', 'pgb' ), $desc ); ?></h4>
						</div>

					</div>
				</div>
			</div><!-- .container -->
		<?php tha_header_bottom(); ?>
	</header><!-- #masthead -->