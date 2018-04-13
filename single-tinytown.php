<?php
get_header();
?>
    <head>
        <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/tinytown-style.css">
    </head>
    <div id="primary">
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                
                <p>
                <a href="/tinytown">&LSAQUO; Back to Tiny Town</a>
                </p>

                <?php the_content(); ?>

            <?php endwhile; // end of the loop. ?>

            <div class="map-grid">
                <?php $loop = new WP_Query( array( 'post_type' => 'tinytown', 'posts_per_page' => 10 ) ); ?>

                <?php 
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(); 
                ?>

                    <div class="box">
                        <a href=<?php echo '"' . get_permalink() . '"'?>>
                            <img src=<?php echo '"' . $featured_img_url . '"'; ?> alt="<?php the_title(); ?>">
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
