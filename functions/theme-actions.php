<?php 


// Register Styles
function register_styles(){
	
	wp_register_style('style', get_template_directory_uri() .	'/style.css');
		wp_enqueue_style( 'style');
	wp_register_style('prettyPhoto', get_template_directory_uri() .	'/styles/prettyPhoto.css');
		wp_enqueue_style( 'prettyPhoto');
}
add_action('themnific_head', 'register_styles');


/*-----------------------------------------------------------------------------------*/
/* Custom functions */
/*-----------------------------------------------------------------------------------*/


	global $themnific_options;
	$output = '';

// Add custom styling
add_action('wp_head','themnific_custom_styling');
function themnific_custom_styling() {
	
	// Get options
	$home = home_url();
	$home_theme  = get_template_directory_uri();
	
	$sec_body_color = get_option('themnific_custom_color');
	$thi_body_color = get_option('themnific_thi_body_color');
	$for_body_color = get_option('themnific_for_body_color');
	$body_color = get_option('themnific_body_color');
	$text_color = get_option('themnific_text_color');
	$text_color_alter = get_option('themnific_text_color_alter');
	$body_color_sec = get_option('themnific_body_color_sec');
	$sec_text_color = get_option('themnific_sec_text_color');
	$thi_text_color = get_option('themnific_thi_text_color');
	$link = get_option('themnific_link_color');
	$link_alter = get_option('themnific_link_color_alter');
	$hover = get_option('themnific_link_hover_color');
	$sec_link = get_option('themnific_sec_link_color');
	$sec_hover = get_option('themnific_sec_link_hover_color');
	$thi_hover = get_option('themnific_thi_link_hover_color');
	$body_bg = get_option('themnific_body_bg');
	$body_bg_sec = get_option('themnific_body_bg_sec');
	$shadows = get_option('themnific_shadows_color');
	$shadows_sec = get_option('themnific_shadows_color_sec');
	$shadows_thi = get_option('themnific_shadows_color_thi');
	$border = get_option('themnific_border_color');
	$border_sec = get_option('themnific_border_color_sec');
	    $custom_css = get_option('themnific_custom_css');
		
	// Add CSS to output
		if ($custom_css)
		$output .= $custom_css ;
		$output = '';
	
	if ($body_color)
		$output .= 'body,.section,.item_full,.item_carousel,.item_slider,.pricing ul{background-color:'.$body_color.'}' . "\n";
		$output .= '.scroll li a,.navi li a{border-color:'.$body_color.' !important}' . "\n";
	if ($sec_body_color)
		$output .= '
		.body2,#header,.scroll ul.sub-menu,.navi ul.sub-menu,.navi li ul.children
		{background-color:'.$sec_body_color.'}' . "\n";
		$output .= '.scroll li a,.navi li a{border-color:'.$sec_body_color.' !important}' . "\n";
	if ($thi_body_color)
		$output .= '
		.body3,.nav li ul,li.normal h2,ul.medpost li.format-quote
		{background-color:'.$thi_body_color.'}' . "\n";
	if ($for_body_color)
		$output .= '#serinfo-nav li.current,.wpcf7-submit,a#navtrigger,.stuff span.slidebg,.flex-direction-nav li a,span.ribbon,.block-wrap a.blogmore,#folio-wrap a.blogmore,.imgwrap,a.hoverstuff-link,a.hoverstuff-zoom,li.main h2,.page-numbers.current,a.mainbutton,#submit,#comments .navigation a,.contact-form .submit,.plan-bottom a,a.comment-reply-link,.imageformat{background-color:'.$for_body_color.'}' . "\n";
		$output .= '.section>.container>h3,#servicesbox li,.nav li ul{border-color:'.$for_body_color.' !important}' . "\n";
		$output .= '#navigation a:hover,.scroll>li.current>a,ul.sub-menu>li.current>a,ul.children>li.current>a,#servicesbox li:hover h3 i,#portfolio-filter li.current-cat a,.section>.container>h2:after{color:'.$for_body_color.' !important}' . "\n";
	if ($text_color)
		$output.= 'body,.body1 {color:'.$text_color.'}' . "\n";	
	if ($sec_text_color)
		$output .= '
		.XXX
		{color:'.$sec_text_color.'}' . "\n";
	if ($text_color_alter)
		$output .= '.body3XXX {color:'.$text_color_alter.' !important}' . "\n";
	if ($link)
		$output .= '.body1 a, a:link, a:visited,.nav>li>ul>li>a {color:'.$link.'}' . "\n";
	if ($link_alter)
		$output .= '.body3XXX a {color:'.$link_alter.'}' . "\n";
	if ($hover)
		$output .= '.entry a,a:hover,.body1 a:hover,#serinfo a:hover,#main-nav>li.current-cat a,#main-nav>li.current_page_item a,
		#portfolio-filter a.current,li.current-cat a,#portfolio-filter li.active a,
		.tagline a,a.slant {color:'.$hover.'}' . "\n";
		$output .= '#main-nav>li:hover,#main-nav>li.current-cat,#main-nav>li.current_page_item {border-color:'.$hover.' !important}' . "\n";
	if ($sec_link)
		$output .= '
		.body2 a,a.body2 {color:'.$sec_link.'}' . "\n";
	if ($sec_hover)
		$output .= '
		.body2 a:hover,
		p.body2 a:hover
		{color:'.$sec_hover.'!important}' . "\n";
	if ($thi_hover)
		$output .= '
		.body3XXX a:hover
		{color:'.$thi_hover.'}' . "\n";
		
		

		
	if ($border)
		$output .= '#clients li,#header,#portfolio-filter,.searchform input.s,.fullbox,.pagination,input, textarea,input checkbox,input radio,select, file{border-color:'.$border.' !important}' . "\n";	

	if ($border_sec)
		$output .= '.body2,#homecontent .body2 h2,.searchformhead {border-color:'.$border_sec.' !important}' . "\n";

	if ($shadows)
		$output .= '.xxx {text-shadow:0 1px 1px '.$shadows.'}' . "\n";
		
	if ($shadows_sec)
		$output .= '.xxx {text-shadow:0 1px 1px '.$shadows_sec.'}' . "\n";
		
	if ($shadows_thi)
		$output .= '.xxx {text-shadow:0 1px 1px '.$shadows_thi.'}' . "\n";




		// General Typography		
		$font_text = get_option('themnific_font_text');	
		$font_text_sec = get_option('themnific_font_text_sec');	
		
		$font_nav = get_option('themnific_font_nav');
		$font_h1 = get_option('themnific_font_h1');	
		$font_h2 = get_option('themnific_font_h2');	
		$font_h2_home = get_option('themnific_font_h2_home');
		$font_h3 = get_option('themnific_font_h3');	
		$font_h4 = get_option('themnific_font_h4');	
		$font_h5 = get_option('themnific_font_h5');	
		$font_h6 = get_option('themnific_font_h5');	
		
		
		$font_h2_tagline = get_option('themnific_font_h2_tagline');	
	
	
		if ( $font_text )
			$output .= 'body,input, textarea,input checkbox,input radio,select, file {font:'.$font_text["style"].' '.$font_text["size"].'px/1.8em '.stripslashes($font_text["face"]).';color:'.$font_text["color"].'}' . "\n";
			
		if ( $font_text_sec )
			$output .= '.body2 {font:'.$font_text_sec["style"].' '.$font_text_sec["size"].'px/2.2em '.stripslashes($font_text_sec["face"]).';color:'.$font_text_sec["color"].'}' . "\n";
			$output .= '.body2 h2,.body2 h3 {color:'.$font_text_sec["color"].'}' . "\n";

		if ( $font_h1 )
			$output .= 'h1 {font:'.$font_h1["style"].' '.$font_h1["size"].'px/1.1em '.stripslashes($font_h1["face"]).';color:'.$font_h1["color"].'}';
		if ( $font_h2 )
			$output .= 'h2 {font:'.$font_h2["style"].' '.$font_h2["size"].'px/1.2em '.stripslashes($font_h2["face"]).';color:'.$font_h2["color"].'}';
			$output .= 'p.special {font-family:'.stripslashes($font_h2["face"]).'}';
		if ( $font_h3 )
			$output .= 'h3,a.tmnf-sc-button.xl,.flexhead p {font:'.$font_h3["style"].' '.$font_h3["size"].'px/1.5em '.stripslashes($font_h3["face"]).';color:'.$font_h3["color"].'}';
		if ( $font_h4 )
			$output .= 'h4 {font:'.$font_h4["style"].' '.$font_h4["size"].'px/1.5em '.stripslashes($font_h4["face"]).';color:'.$font_h4["color"].'}';	
		if ( $font_h5 )
			$output .= 'h5 {font:'.$font_h5["style"].' '.$font_h5["size"].'px/1.5em '.stripslashes($font_h5["face"]).';color:'.$font_h5["color"].'}';	
		if ( $font_h6 )
			$output .= 'h6 {font:'.$font_h6["style"].' '.$font_h6["size"].'px/1.5em '.stripslashes($font_h6["face"]).';color:'.$font_h6["color"].'}' . "\n";
			
		if ( $font_nav )
			$output .= '.scroll li a,.navi li a {font:'.$font_nav["style"].' '.$font_nav["size"].'px/1em '.stripslashes($font_nav["face"]).';color:'.$font_nav["color"].'}';	

		if ( $font_h2_home )
			$output .= '.section h2,.section_template h2 {font:'.$font_h2_home["style"].' '.$font_h2_home["size"].'px/1.2em '.stripslashes($font_h2_home["face"]).';color:'.$font_h2_home["color"].'}';
		
		
	// custom stuff	
		if ( $font_text )
			$output .= '.tab-post small a,.taggs a,.ei-slider-thumbs li a {color:'.$font_text["color"].'}' . "\n";	
	
	// Output styles
		if ($output <> '') {
			$output = "<!-- Themnific Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
	}
		
} 


// Add custom styling
add_action('themnific_head','themnific_mobile_styling');
	function themnific_mobile_styling() {
		echo "<!-- Themnific Mobile & Special CSS -->\n";
		
		// google fonts link generator
		get_template_part('/functions/admin-fonts');
		wp_register_style('style-custom', get_template_directory_uri() .	'/style-custom.css');
			wp_enqueue_style( 'style-custom');	
				
		wp_register_style('social-media', get_template_directory_uri() .	'/styles/social-media.css');
			wp_enqueue_style( 'social-media');
		
		wp_register_style('font-awesome.min', get_template_directory_uri() .	'/styles/font-awesome.min.css');
			wp_enqueue_style( 'font-awesome.min');
		wp_register_style('font-awesome-ie7', get_template_directory_uri() .	'/styles/font-awesome-ie7.css');
			wp_enqueue_style( 'font-awesome-ie7');
		wp_register_style('font-mfizz', get_template_directory_uri() .	'/font/font-mfizz.css');
			wp_enqueue_style( 'font-mfizz');
		wp_register_style('pictonic', get_template_directory_uri() .	'/font/css/pictonic.css');
			wp_enqueue_style( 'pictonic');
		wp_register_style('mobile', get_template_directory_uri() .	'/styles/mobile.css');
			wp_enqueue_style( 'mobile');
		wp_register_style('brandsbox', get_template_directory_uri() .	'/styles/brandsbox.css');
			wp_enqueue_style( 'brandsbox');
		wp_register_style('metro', get_template_directory_uri() .	'/styles/metro.css');
			wp_enqueue_style( 'metro');
} 
?>