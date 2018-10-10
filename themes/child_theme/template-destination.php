<?php
/**
 *
 * Template Name: Destination Purdue
 *
**/

get_header(); ?>

<!-- Start Current Destination Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h1 style="margin-bottom: 10px; margin-top: 40px;">Destination Purdue</h1>
      <p>Destination Purdue is a magazine by and about our students. We feature stories about Purdue Agriculture undergraduates that were written by Purdue undergraduates. </p>
      <h2 style="margin-bottom: 20px;">Current Issue</h2>

 <?php
        $args2 = array(
          'tag' => 'fall-2018',  //UPDATE THIS!!!! USE CURRENT TAG
          'category_name' => 'Destination Purdue',       //(string) - use category slug (NOT name).
          'orderby' => 'modified',
          'order'   => 'ASC',
          'posts_per_page' => -1,
          );
        $the_query = new WP_Query($args2);
        $output = "";
        $i = 1;
        while ($the_query -> have_posts()) : $the_query -> the_post();
          $postID = get_the_ID();
          $link = get_the_permalink();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url($postID, "full");
          if($i%3 == 0) :
            $output .= '<div class="row">';
          endif;
          $output .= '<div class="col-sm-4" style=""><a href="' . $link . '"><div class="recent-story">';
          $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-responsive">';
          $output .= '<h4 class="exposure-heading">' . $title . '</h4>';
          $output .= "</a></div></div>";
          if($i%3 == 0) :
            $output .= '</div>';
          endif;
          $i++;
        endwhile;
        echo $output;
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
    <h2 style="margin-bottom: 20px;">Previous Stories <small> <a href="https://ag.purdue.edu/destination/Pages/archive.aspx">View Archive Page</a></small></h2>

 <?php
        $args3 = array(
          'tag__not_in' => array(106),   //UPDATE THIS!!!! USE CURRENT TAG
          'category_name' => 'Destination Purdue',       //(string) - use category slug (NOT name).
          );
        $the_query = new WP_Query($args3);
        $output = "";
        $i = 1;
        while ($the_query -> have_posts()) : $the_query -> the_post();
          $postID = get_the_ID();
          $link = get_the_permalink();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url($postID, "full");
          if($i%4 == 0) :
            $output .= '<div class="row">';
          endif;
          $output .= '<div class="col-sm-3" style="margin-bottom:20px;"><a href="' . $link . '"><div class="recent-story">';
          $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-responsive">';
          $output .= '<h4 class="exposure-heading">' . $title . '</h4>';
          $output .= "</a></div></div>";
          if($i%4 == 0) :
            $output .= '</div>';
          endif;
          $i++;
        endwhile;
        echo $output;
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


