<?php
if ( function_exists('has_nav_menu') && has_nav_menu('home-menu') ) { ?>
<?php
	wp_nav_menu( array( 'depth' => 2, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'scroll nav_classic', 'menu_id' => 'main-nav' , 'theme_location' => 'home-menu' ) );
?>
<?php } else {} ?>

