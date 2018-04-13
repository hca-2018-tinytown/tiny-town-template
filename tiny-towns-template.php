<?php
/*
Template Name: Tiny Town
*/

get_header();
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TinyTown</title>
        <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/tinytown-style.css">
    </head>
    
    <div id="primary">

        <div class="container">

            <div class="title">
                <div class="title-textbox">
                    <h1><?php echo the_title(); ?></h1>
                </div>
            </div>

            <div class="instructions">
                <?php if(get_field('tiny_town_headline')): ?>
                    <h4><?php echo the_field('tiny_town_headline'); ?></h4>
                <?php endif; ?>

                <?php if(get_field('tiny_town_content')): ?>
                    <p><?php echo the_field('tiny_town_content'); ?></p>
                <?php endif; ?>
            </div>

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
            <div>
				<footer class="email-footer">
					<h4>Take home tinytown! Sign up for email updates!</h4>
					<!-- modal starts here -->
					<div id="emailModal" class="modal">
						<div class = "modal-content">
							<span id="close-btn">&times;</span>
							<h5 class = "modal-text">Take Tiny Town Home With You</h5>
							<p>Sign up to recieve updates from the discovery center</p>
							<?php echo do_shortcode('[emma_form]'); ?>
							<p id="no-thanks">No,thank you, take me to Tiny Town</p>
						</div>
					</div>
					<!-- modal ends here -->
				</footer>
            </div>
        </div>
    </div><!-- #primary -->
    
	<script type="text/javascript">
	$(document).ready(function () {
		$('.lcp_catlist').cycle({
        	fx:      'fade',
        	timeout:  4000,
			pager: '.bannerNav',
			pause: true
		});
		
		$('input[type=text]').each(function() {
  		var $this = $(this);
  		if($this.val() === '') {
    		$this.val($this.attr('title'));
  		}
  		$this.focus(function() {
    		if($this.val() === $this.attr('title')) {
      			$this.val('');
    		}
  		});
  			$this.blur(function() {
    		if($this.val() === '') {
      			$this.val($this.attr('title'));
    		}
  		});
	});
    });
	</script>
<?php 
get_footer();
?>