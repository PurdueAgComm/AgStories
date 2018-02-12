<?php /* Template name: Category page */ ?>
<?php get_header(); ?>
<?php
  // remove the [...] from the_excerpt output and just adds an elipses
  function new_excerpt_more( $more ) {
      return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');

/* get the taxonomy slug from the URL and then pass it to get_term_by so that we can get the name instead of just the slug so our if statements will work and I don't have to rewrite them */
$term_slug = get_query_var( 'term' );
$taxonomyName = get_query_var( 'taxonomy' );
$term = get_term_by('slug', $term_slug, $taxonomyName);
$podcast_type = $term->name;

if ( ! empty( $podcast_type ) && ! is_wp_error( $podcast_type ) ) {
    if($podcast_type == "Dr. Tim's Spineless Wonders") {
      $podcastBanner = "/stories/themes/child_theme/podcasts/wonders.jpg";
      $podcastAuthor = "Dr. Tim Gibb, <a href='mailto:gibb@purdue.edu'>gibb@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastArchive = "/stories/columns/dr-tims-spineless-wonders/";
    }
    else if ($podcast_type == "Barn Chatter")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/chatter.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
    }
    else if ($podcast_type == "Capital Comments")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/comments.jpg";
      $podcastAuthor = "Larry DeBoer, <a href='mailto:ldeboer@purdue.edu'>ldeboer@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
    }
    else if ($podcast_type == "In The Grow")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/grow.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
    }
    else if ($podcast_type == "The 4th H")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/4h.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
    }
    else if ($podcast_type == "Yard & Garden Calendar")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/calendar.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
    }
    else if ($podcast_type == "Yard & Garden News")  {
      $podcastBanner = "/stories/themes/child_theme/podcasts/news.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
    }
}
?>


<div class="landing" style="background-image: url('<?php echo $podcastBanner; ?>')">
  <div class="container">
    <div class="col-lg-12">
      <div class="shader shaderfix">
        <article>
          <div class="fullwidthheader" style="text-align: center;"><?php echo $podcast_type; ?></div>
        </article>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="maincontent col-md-9 right">
    <h1><?php single_cat_title(); ?></h1>
    <br>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row post-bg" style="border-right: 7px solid gold;">
        <?php if(has_post_thumbnail()) : ?>
        <div class="col-sm-5">
          <?php the_post_thumbnail('small'); ?>
        </div>
        <div class="col-sm-7">
        <?php else : ?>
        <div class="col-sm-12">
        <?php endif;?>
          <h2 style="padding-top: 0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="text-muted"><em><?php the_time('l, F jS, Y'); ?></em>

          <?php if (in_category( 50 )) : // id 31 dev ?>
          &bull; <i class="fa fa-newspaper-o"></i> University News Story
          <?php endif; ?>

          </p>
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

  </div>
</div>

<?php get_footer(); ?>
