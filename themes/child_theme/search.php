<?php
/* Template for displaying all category posts */
get_header(); ?>

      <style>
      .breadcrumb{
       display: none;
      }
      </style>

<div class="container">
  <div class="row">
    <div class="rightnav col-lg-2 col-md-2 col-sm-2 right">
    </div>

    <div class="maincontent col-lg-7 col-md-7 col-sm-7 right" style="margin-top: -13px;">
   <?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
        _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
        echo "<ul>";
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                 <?php
        }
        echo "</ul>";
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
    </div>

    <?php get_sidebar('sidenav'); ?>
    <?php get_sidebar('sidecontent'); ?>
  </div>
</div>
<?php get_footer(); ?>

