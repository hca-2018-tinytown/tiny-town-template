<?php
function tinytown_enqueue_styles() {
    wp_enqueue_style('tinytown-style', get_template_directory_uri() . '/tinytown-style.css');
}
add_action("wp_enqueue_scripts", "tinytown_enqueue_styles");

get_header();
?>
    <div id="primary">
        <div id="content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <h1><?php the_title(); ?></h1>
                
                <p>
                <a href="/tinytown">&lsaquo; Back to Tiny Town</a>
                </p>

                <?php if(get_field("tinytown_content_image")):
                    echo wp_get_attachment_image(get_field("tinytown_content_image"), "medium", false, array( "class" => "alignright tinytown-content-image" ));
                endif; ?>

                <?php the_content(); ?>

            <?php endwhile; // end of the loop. ?>
            
            <div class="map-line">
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

            <div>
                <footer class="email-footer">
                    <div class = "flex-container" id="email-link">
                        <img class="email-icon" src="<?php bloginfo("template_url"); ?>/tinytown-email-icon.png" alt="Email Icon">
                        <h4>Take home tinytown! Sign up for email updates!</h4>
                    </div>
                    <!-- modal starts here -->
                    <div id="emailModal" class="modal" style="display: none;">
                        <div class = "modal-content">
                            <span id="close-btn" class="close">&times;</span>
                            <h5 class = "modal-text">Take Tiny Town Home With You</h5>
                            <p>Sign up to recieve updates from the discovery center</p>
                            <?php echo do_shortcode('[emma_form]'); ?>
                            <p id="no-thanks">No,thank you, take me to Tiny Town!</p>
                        </div>
                    </div>
                    <!-- modal ends here -->
                </footer>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->

    <script src="<?php bloginfo("template_url"); ?>/tinytown-modal.js"></script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
