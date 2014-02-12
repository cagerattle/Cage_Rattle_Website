<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s','themnific'), max( $paged, $page ) ); ?></title>

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php themnific_head(); ?>

<?php wp_head(); ?>

</head>

     
<body <?php if (get_option('themnific_upper') == 'false' ){ body_class( );} else body_class('upper' ) ?>>

<div id="header" class="boxshadow gradient">

	<div class="container" style="overflow:visible;"> 
    
    	<a id="navtrigger" href="#"><i class="icon-reorder"></i></a>

		<?php if(is_page_template('homepage.php'))  { ?> 

			<nav id="navigation" class="bigmenu">
            
                    <h1 class="classic">
                    
                        <?php if(get_option('themnific_logo_small')) { ?>
                                        
                            <a class="logo" href="<?php echo home_url(); ?>/">
                            
                                <img id="logo_small" src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
                                    
                            </a>
                                
                        <?php } 
                                
                            else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                                
                        <?php } ?>	
                    
                    </h1>
				
                    <?php get_template_part('/includes/home-navigation');?>
                    
               </nav>     
					
           <?php } else {?>   
           
           		<nav id="navigation" class="bigmenu">
               
                     <h1 class="classic">
                    
                        <?php if(get_option('themnific_logo_small')) { ?>
                                        
                            <a class="logo" href="<?php echo home_url(); ?>/">
                            
                                <img id="logo_small" src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
                                    
                            </a>
                                
                        <?php } 
                                
                            else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                                
                        <?php } ?>	
                    
                    </h1>
                    
					<?php if(is_page_template('homepage_alt2.php'))  {
						
                    	get_template_part('/includes/home-navigation');
						
                	} else {
                    	
						get_template_part('/includes/uni-navigation');
						
                	}?>
			
				</nav>
					
            <?php }?>
                
         	<a id="logo_res" href="<?php echo home_url(); ?>/">
         	
         	    <img src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
         	        
         	</a>
            
	<div style="clear: both;"></div>
            
	</div>
            
</div>

<div style="clear: both;"></div>

<!--<div class="site-container">

<div id="header" class="boxshadow gradient">

	<div class="container" style="overflow:visible;"> 
	
		<div class="menu_container">
			<a id="menu-toggle" class="anchor-link" href="#mobile-nav"><i class="icon-reorder"></i></a>
		</div>
	
		<div class="nav-container">
			<nav id="#mobile-nav" class="nav2 clearfix" role="navigation">
				<?php if(is_page_template('homepage.php'))  {
					
					get_template_part('/includes/home-navigation');
					
				} else {
					
					get_template_part('/includes/uni-navigation');
					
				}?>
			</nav>
		</div>
    
        <a id="logo_res" href="<?php echo home_url(); ?>/">
        
            <img src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
                
        </a>
        
        <?php if(is_page_template('homepage.php'))  { ?> 
        
        			<nav id="navigation">
                    
                            <h1>
                            
                                <?php if(get_option('themnific_logo_small')) { ?>
                                                
                                    <a class="logo" href="<?php echo home_url(); ?>/">
                                    
                                        <img id="logo_small" src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
                                            
                                    </a>
                                        
                                <?php } 
                                        
                                    else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                                        
                                <?php } ?>	
                            
                            </h1>
        				
                            <?php get_template_part('/includes/home-navigation');?>
                            
                       </nav>     
        					
                   <?php } else {?>   
                   
                   		<nav id="navigation" class="bigmenu">
                       
                             <h1 class="classic">
                            
                                <?php if(get_option('themnific_logo_small')) { ?>
                                                
                                    <a class="logo" href="<?php echo home_url(); ?>/">
                                    
                                        <img id="logo_small" src="<?php echo esc_url(get_option('themnific_logo_small'));?>" alt="<?php bloginfo('name'); ?>"/>
                                            
                                    </a>
                                        
                                <?php } 
                                        
                                    else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                                        
                                <?php } ?>	
                            
                            </h1>
                            
        					<?php if(is_page_template('homepage_alt2.php'))  {
        						
                            	get_template_part('/includes/home-navigation');
        						
                        	} else {
                            	
        						get_template_part('/includes/uni-navigation');
        						
                        	}?>
        			
        				</nav>
        					
                    <?php }?>
    	
    	</div>
            
	<div style="clear: both;"></div>            
	</div>
            
</div>

<div style="clear: both;"></div>

<div class="main_content">-->