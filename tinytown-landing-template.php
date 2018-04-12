<?php
/*
Template Name: Tiny Town Landing Page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TinyTown</title>
  <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/tinytown-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <nav>
    <!-- nav menu goes here -->
  </nav>
  <header>
    <!-- logo goes here -->
  </header>

  <div class = "social-menu">
    <!-- social links go here -->
  </div>

  <div class = "container">
    <div class="title">
      <div class="title-texbox">
        <h1>Welcome to TinyTown</h1>
      </div>
    </div>

    <div class="instructions">
      <h4>Jump to an Exhibit</h4>
      <p>Tap an exhbit below to learn more about it.</p> 
      <!-- Will the word 'tap' sound weird on destop? -->
    </div>

    <div class="map-grid">
      <?php
      $posts = get_posts(array( 'post_type' => 'tinytown' ));

      foreach($posts as $post):
        setup_postdata($post);
      ?>
      <div class="box">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      </div>
      <?php
      endforeach;
      wp_reset_postdata();
      ?>
    </div>
</div>
  
</body>
</html>