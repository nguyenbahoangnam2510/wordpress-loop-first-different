<?php
$args_my_query_2 = array(
    'post_type'    =>    'post',
    'orderby'    => 'rand',
    'posts_per_page' => 5
);
$my_query_2 = new WP_Query( $args_my_query_2 );
?>


<?php
if ($my_query_2->have_posts()) :
    $flag = 1;
    while ($my_query_2->have_posts()) : $my_query_2->the_post();
        if($flag == 1) { ?>

                <article <?php post_class() ?> >
                    <a href="<?php the_permalink(); ?>">
                        <div style="background:url('<?= $featured_img_url  ?>');min-height:300px">

                            <?php the_title(); ?><h2>Hello</h2>
                        
                    </div>
                    </a>    
                </article>  

                   <?php $flag = 0;
                    }

        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        ?>

        <div class="item" style="background-size:cover; background-image: url(<?php echo $image[0]; ?>); width: 100%; min-height: 300px;">
            <div class="carousel-caption">
                <h3><?php the_title(); ?></h3>
                <p><?php comments_number( 'Pas de commentaires', '1 commentaire', '% commentaires' ); ?></p>
            </div>
        </div>

        <?php
    endwhile;
endif;
?>