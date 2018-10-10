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
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/wonders.jpg";
      $podcastAuthor = "Dr. Tim Gibb, <a href='mailto:gibb@purdue.edu'>gibb@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastArchive = "/stories/columns/dr-tims-spineless-wonders/";
      $podcastemail = "spineless";
    }
    else if ($podcast_type == "Barn Chatter")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/chatter.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
    }
    else if ($podcast_type == "Capital Comments")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/comments.jpg";
      $podcastAuthor = "Larry DeBoer, <a href='mailto:ldeboer@purdue.edu'>ldeboer@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastemail = "capital";
    }
    else if ($podcast_type == "In The Grow")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/grow.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastemail = "garden";
    }
    else if ($podcast_type == "The 4th H")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/4h.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
    }
    else if ($podcast_type == "Yard &amp; Garden Calendar")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/calendar.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastemail = "garden";
    }
    else if ($podcast_type == "Yard &amp; Garden News")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/news.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Kevin Leigh Smith, <a href='mailto:smith79@purdue.edu'>smith79@purdue.edu</a>";
      $podcastemail = "garden";
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
      <?php if($podcastemail) : ?>
        <div class="row post-bg" style="border-right: 7px solid #6E99B4;">
          <div class="col-sm-12">
            <h3><i class="fa fa-envelope fa-fw"></i> Receive <?php echo $podcast_type; ?> in your inbox!</h3>
            <p>It's fast and easy! Subscribe below by entering your email address. You'll receive our podcast monthly and you can unsubscribe any time &mdash; and rest assured &mdash; we won't ever sell or give your email address away.</p>
            <script language="javascript" type="text/javascript" src="https://editor.ne16.com/Subscribe/Subscribe.js"></script>
            <form class="form-inline" action="https://editor.ne16.com/Subscribe/Subscribe.ashx" method="POST">
              <div class="form-group mb-2 col-sm-6">
                <label for="staticEmail2" class="sr-only">Email</label>
                <input name="emailaddr_" required="" class="demographic fieldInput form-control" style="width: 100%;" type="textbox">
              </div>
              <button data-type="save" class="btn btn-primary mb-2" type="submit" name="save">Subscribe!</button>
              <input name="demographics" value="emailaddr_ Source_" type="hidden">
              <input class="hidden demographic" name="Source_" value="Subscribe Form" type="hidden">
              <input type="hidden" name="list" value="purdue-newscolumns" />
              <input type="hidden" id="DlvListID" value="122737" />
              <input type="hidden" id="DlvWebFormID" value="b06bad94-4781-4990-b26f-a61a10b3be31" />
              <?php if($podcastemail == "spineless") : ?>
                <input type="hidden" class="hidden" name="category" value="Spineless Wonders Subscribers">
              <?php elseif($podcastemail == "capital") : ?>
                <input type="hidden" class="hidden" name="category" value="Capital Comments Subscribers">
              <?php elseif($podcastemail == "garden") : ?>
                <input type="hidden" class="hidden" name="category" value="Garden Column Subscribers">
              <?php endif; ?>
            </form>
            </form>
          </div>
        </div>
      <?php endif; ?>


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
