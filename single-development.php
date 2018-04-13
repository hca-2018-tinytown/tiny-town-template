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

                <?php if(get_field("development_content_image")):
                    echo wp_get_attachment_image(get_field("development_content_image"), "medium", false, array( "class" => "alignright tinytown-content-image" ));
                endif; ?>

                <?php the_content(); ?>

            <?php endwhile; // end of the loop. ?>

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
