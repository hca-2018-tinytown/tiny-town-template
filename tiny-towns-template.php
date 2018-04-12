<?php
/*
Template Name: Tiny Towns
*/

get_header();
?>

		<div id="primary">
			<div class="homeSecond">
                <h1>Hello World</h1>
                <?php $loop = new WP_Query( array( 'post_type' => 'tinytown', 'posts_per_page' => 10 ) ); ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
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
<div class="firetruckhome"><span class="firetruckleft"></span></div>

<?php 
get_footer();
?>