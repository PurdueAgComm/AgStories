<?php /* Template name: Tag page */ ?>
<?php get_header(); ?>
<?php
  // remove the [...] from the_excerpt output and just adds an elipses
  function new_excerpt_more( $more ) {
      return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');
?>

<div class="breadcrumb">
  <div class="container">
    <div class="row">
      <div id="breadcrumbs">
          <?php the_breadcrumb(); ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="maincontent col-md-9 right">
    <h1><?php single_tag_title(); ?></h1>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row post-bg" style="border-right: 7px solid gold;">
        <div class="col-sm-5">
          <?php the_post_thumbnail('small'); ?>
        </div>
        <div class="col-sm-7">
          <h2 style="padding-top: 0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="text-muted"><em><?php the_time('l, F jS, Y'); ?></em></p>
          <?php the_excerpt(); ?>
          <?php echo "<a class='btn btn-default btn-block' href='" . get_the_permalink() . "'>Read More</a>"; ?>
        </div>
      </div>
      <br>


      <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    </div>

    <?php get_sidebar('sidenav'); ?>
    <?php get_sidebar('sidecontent'); ?>

  </div>
</div>

<?php get_footer(); ?>