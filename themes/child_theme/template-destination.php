<?php
/**
 *
 * Template Name: Home Page
 *
**/

get_header(); ?>

<!--   <div class="container">
    <div class="row">
      <div class="col-xs-12">
        'Ello Poppet
      </div>
    </div>
  </div> -->


<!-- Start Current Destination Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h1 style="margin-bottom: 10px; margin-top: 40px;">Destination Purdue</h1>
      <p>Destination Purdue is a magazine by and about our students. We feature stories about Purdue Agriculture undergraduates that were written by Purdue undergraduates. </p>

 <?php
        $args2 = array(
          'tag' => 'fall-2017',  //UPDATE THIS!!!! USE CURRENT TAG
          'category_name' => 'destination',       //(string) - use category slug (NOT name).
          );
        $the_query = new WP_Query($args2);
        $output = "";
        while ($the_query -> have_posts()) : $the_query -> the_post();
          $postID = get_the_ID();
          $link = get_the_permalink();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url($postID, "full");
          $output = '<div class="col-sm-4"><a href="' . $link . '"><div class="recent-story">';
          $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-responsive">';
          $output .= '<h4 class="exposure-heading">' . $title . '</h4>';
          $output .= "</a></div></div>";
          // hack toDO fix.
          if($n == 1) {
             $output .= "<br style='clear: both;'>";
          }
          echo $output;
          $n++;
        endwhile;
        wp_reset_postdata();
      ?>


    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End Feature Section -->

<!-- Start Destination Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h2 style="margin-bottom: 20px;">Previous Stories</h2>

 <?php
        $args3 = array(
          'tag__not_in' => array(28),   //UPDATE THIS!!!! USE CURRENT TAG
          'category_name' => 'destination',       //(string) - use category slug (NOT name).
          );
        $the_query = new WP_Query($args3);
        $output = "";
        while ($the_query -> have_posts()) : $the_query -> the_post();
          $postID = get_the_ID();
          $link = get_the_permalink();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url($postID, "full");
          $output = '<div class="col-sm-3"><a href="' . $link . '"><div class="recent-story">';
          $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-responsive">';
          $output .= '<h4 class="exposure-heading">' . $title . '</h4>';
          $output .= "</a></div></div>";
          // hack toDO fix.
          if($n == 1) {
             $output .= "<br style='clear: both;'>";
          }
          echo $output;
          $n++;
        endwhile;
        wp_reset_postdata();
      ?>


    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End Feature Section -->


<br><br>
<?php while ( have_posts() ) : the_post(); ?>
<?php endwhile; // end of the loop. ?>



<?php
//get_sidebar();
get_footer();


