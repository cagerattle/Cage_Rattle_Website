<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>        

<div style="clear: both;"></div>

   	<div id="home" class="mainflex_holder">

			<div class="mainflex_wrap">
            <div id="services-slider">
            <?php layerslider(1); ?>
            </div><div id="services-slider-mobile">
            <img src="/wp-content/uploads/cage-mobil-dark.png" alt="cage-mobil-dark" width="525" height="525" class="aligncenter size-full wp-image-4724" />
</div>
            <?php if(get_option('themnific_logo')) { ?>
            
                <div id="header_bottom" class="boxshadow">
                    
                    <div class="logo_bottom"> 
                                        
                        <a class="logo" href="<?php echo home_url(); ?>/">
                        
                            <img id="logo" src="<?php echo esc_url(get_option('themnific_logo'));?>" alt="<?php bloginfo('name'); ?>"/>
                                
                        </a>
                    
                    </div>	
                
                </div>
                
              <?php }; ?>
				<!--<?php $type_slider = get_option('themnific_type_slider'); ?>
                <?php if($type_slider == 'slider'){
                    get_template_part('/includes/home-slider' );
                    }elseif($type_slider == 'slider2'){
                    get_template_part('/includes/home-slider2' );
                    } else {
                    get_template_part('/includes/home-slider' );
                }?>-->

	</div>

	<div id="main">
  
            
        
    	<?php $loop = new WP_Query( array( 'post_type' => 'mylayouttype','posts_per_page' => 50) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php 
		$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
		$large_image = $large_image[0]; 
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),false, '' );
		$bg_color = get_post_meta($post->ID, 'colorSelector', true);
		$heading_color = get_post_meta($post->ID, 'colorSelector2', true);
		$hash = get_post_meta($post->ID, 'themnific_navigation_anchor', true);
		$video_input = get_post_meta($post->ID, 'themnific_video_url', true);
		$map_input = get_post_meta($post->ID, 'themnific_map', true);
		$intro = get_post_meta($post->ID, 'themnific_section_text', true);
		$respo = get_post_meta($post->ID, 'themnific_responsive_section', true);
		?> 
      
           <div id="<?php if($hash) {echo $hash;} else {?>layoutpost-<?php the_ID();} ?>" class="section resmode-<?php echo $respo; ?>"
           style="  <?php if($large_image) { ?>background-image:url(<?php echo $src[0] ?>);<?php } else {}?> <?php if($bg_color) { ?>background-color:<?php echo $bg_color ?>;<?php } else {}?> ">
           
           
           		
				<?php if($map_input) {?>
                        <?php echo ($map_input); ?>
                <?php } else {?>
           
            	<div class="container">
                
               		<?php if($intro) : ?> 
                        
                        <h2 class="head" style="color:<?php echo $heading_color ?>;"><?php echo short_title('...', 9); ?></h2>
                        <p class="section_text" style="color:<?php echo $heading_color ?>;"><?php echo $intro ?></p>
                        <div class="hrlineB"></div>  
                            
                   	<?php endif; ?>     
                                      
					<?php the_content() ?>
                        
                        
                    <div style="clear: both;"></div>
                    
                    </div>
                        
           		<?php }?>
           
           </div>
        <?php endwhile; ?>
    
        <?php wp_reset_query(); ?>
            
	</div><!-- [END] #main -->
        
<?php get_footer(); ?>