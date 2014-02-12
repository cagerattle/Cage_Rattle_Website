<?php
/*
Template Name: Portfolio Metro
*/
?>
<?php get_header(); ?>

<div class="container container_block metrocontainer"> 

<h2 class="itemtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    
    	<div class="hrlineB"><span></span></div>

	<div id="folio-wrap">
    
    <div class="wrap">
                <div class = "dragger">
                <div class="grid">
                    <?php      
                    $args = array(
                        'post_type' =>  'myportfoliotype',
                        'posts_per_page' => 99999,
						'paged' => $paged
                    );

                    $the_query = new WP_Query($args);
                    $count = 1;
                    $box_counter = 1;

                    while ($the_query->have_posts()) : $the_query->the_post();

                        global $data;
                        $id = get_the_ID();
                        $post_desc = get_post_meta($id, 'post_description_display', true);
                        $not_disp = get_post_meta($id, 'display_post_in_slider', true);

                        if(!$not_disp){
                            $list = '';
                            $terms = get_the_terms( get_the_ID(), 'project_type' );

                            if (has_post_thumbnail()) {
                                $thumb = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_url($thumb, 'folio_metro_half');
                            } else {
                                $img_url = get_template_directory_uri() . '/assets/img/no-image-large.png';

                            }

                            if ($post_desc == 'opened'){
                                $item_class_desc = 'hided';
                            }   else {
                                $item_class_desc = 'disp';
                            }

                            $triple_wrapper = '';
                            if( $count%3 == 1 ){
                                if($count == 1) {
                                    $box_counter = 1;
                                    $triple_wrapper = '<div class = "gr-box">';
                                }
                                else {
                                    $box_counter++;
                                    $triple_wrapper =  '</div><div class = "gr-box">';
                                }
                            }

                            $folio_size = '';
                            if ( ($box_counter%2 == 1) && ($count %3 == 1) ) {
                                $folio_size = 'large';
                            }
                            if ( ($box_counter%2 == 0) && ($count %3 == 0) ) {
                                $folio_size = 'large';
                            }

                            if ($folio_size == 'large'){
                                $item_class_width = 'large '.$count.' '.$box_counter;
                                $article_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'folio_metro_large', false, '' );
								$article_image = $article_image[0]; 
                                $numb = '80';
								$excerpt_length = 450;

                            }else {
                                $item_class_width = 'half';
                                $article_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'folio_metro_half', false, '' );
								$article_image = $article_image[0]; 
                                $numb = '40';
								$excerpt_length = 225;
                            }

                            if (($count %2) == 1) {
                                $item_class_count = 'odd';
                            }else {
                                $item_class_count = 'even';
                            }

                            echo $triple_wrapper;
                            ?>
                            
                            <div class="item <?php echo $item_class_width . ' ' .$item_class_count;  ?>">
                                <img src="<?php echo $article_image ?>" style="margin:0 0;" alt="<?php the_title();?>" title="<?php the_title();?>" >
                                <div class="description <?php echo $item_class_desc ?>">
                                    <h1><?php the_title(); ?></h1>

                                    <p><?php
									 $project_description = get_post_meta($post->ID, 'themnific_project_description', true); 
									 echo themnific_excerpt( $project_description, $excerpt_length); 
									 ?></p>
                                    
									<ul class="techcats"><?php
									$terms_of_post = get_the_terms( $post->ID, 'categories' );
						
									if ( $terms_of_post && ! is_wp_error( $terms_of_post ) ) : 
									
										foreach ( $terms_of_post as $term_of_post ) {
											$techcatname = $term_of_post->slug;
											echo '<li class="'.$techcatname.'"></li>';
										}
										
									endif;
									
									 ?></ul>
                                </div>
                                
                                <a href="<?php the_permalink();?>"></a>
                                
                            </div>

                            <?php  $count++; // Increase the count by 1 ?>
                        <?php } ?>
                        <?php endwhile; // END the Wordpress Loop ?>
                    <?php echo '</div>'; ?>
                    
                    <div class="clear"></div>
    
          <div class="pagination"><?php next_posts_link( 'See More Of Our Work' ); ?></div>
        
	<?php wp_reset_query(); ?>
                    
                </div>
                </div>
            </div>
	
</div>



        
</div>
        
<?php get_footer(); ?>