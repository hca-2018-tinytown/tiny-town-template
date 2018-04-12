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
  <link rel="stylesheet" href="style.css">
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
      $pages = get_posts(array( 'post_type' => 'tinytown' ));

      foreach($pages as $page):
      ?>
      <div class="box">
        <img src="<?php the_post_thumbnail(); ?>" alt="<?php the_post_title(); ?>">
      </div>
      <?php
      endforeach;
      ?>
    </div>

    <footer class="email-footer">
      <h4>Take home tinytown! Sign up for email updates!</h4>
    </footer>
</div>
  
</body>
</html>