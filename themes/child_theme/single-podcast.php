<?php
/* Template for displaying all single posts */
get_header();
$custom_fields = get_post_custom();
?>
<div class="breadcrumb hidden-xs hidden-sm hidden-md">
  <div class="container">
    <div class="row">
      <div id="breadcrumbs">
          <?php the_breadcrumb(); ?>
      </div>
    </div>
  </div>
</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  $postID = get_the_ID();


$podcast_type = get_the_terms( $post->ID, 'podcast_type' );
if ( ! empty( $podcast_type ) && ! is_wp_error( $podcast_type ) ) {
    $type = wp_list_pluck( $podcast_type, 'name' );
    if($type[0] == "Dr. Tim's Spineless Wonders") {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/wonders.jpg";
      $podcastAuthor = "Dr. Tim Gibb, <a href='mailto:gibb@purdue.edu'>gibb@purdue.edu</a>";
      $podcastEditor = "Charles Wineland, <a href='mailto:cwinelan@purdue.edu'>cwinelan@purdue.edu</a>";
      $podcastArchive = "/stories/columns/dr-tims-spineless-wonders/";
      $podcastemail = "spineless";
    }
    else if ($type[0] == "Barn Chatter")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/chatter.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
      $podcastArchive = "/stories/columns/barn-chatter/";
    }
    else if ($type[0] == "Capital Comments")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/comments.jpg";
      $podcastAuthor = "Larry DeBoer, <a href='mailto:ldeboer@purdue.edu'>ldeboer@purdue.edu</a>";
      $podcastEditor = "Charles Wineland, <a href='mailto:cwinelan@purdue.edu'>cwinelan@purdue.edu</a>";
      $podcastArchive = "/stories/columns/capital-comments/";
      $podcastemail = "capital";
    }
    else if ($type[0] == "In The Grow")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/grow.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Charles Wineland, <a href='mailto:cwinelan@purdue.edu'>cwinelan@purdue.edu</a>";
      $podcastArchive = "/stories/columns/in-the-grow/";
      $podcastemail = "garden";
    }
    else if ($type[0] == "The 4th H")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/4h.jpg";
      $podcastAuthor = "Aaron Fisher, <a href='mailto:fisher86@purdue.edu'>fisher86@purdue.edu</a>";
      $podcastEditor = "Nancy Alexander, <a href='mailto:alexa183@purdue.edu'>alexa183@purdue.edu</a>";
      $podcastArchive = "/stories/columns/the-4th-h/";
    }
    else if ($type[0] == "Yard &amp; Garden Calendar")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/calendar.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Charles Wineland, <a href='mailto:cwinelan@purdue.edu'>cwinelan@purdue.edu</a>";
      $podcastArchive = "/stories/columns/yard-garden-calendar/";
      $podcastemail = "garden";
    }
    else if ($type[0] == "Yard &amp; Garden News")  {
      $podcastBanner = "/stories/wp-content/themes/child_theme/podcasts/news.jpg";
      $podcastAuthor = "B. Rosie Lerner, <a href='mailto:rosie@purdue.edu'>rosie@purdue.edu</a>";
      $podcastEditor = "Charles Wineland, <a href='mailto:cwinelan@purdue.edu'>cwinelan@purdue.edu</a>";
      $podcastArchive = "/stories/columns/yard-garden-news/";
      $podcastemail = "garden";
    }
}


?>

<div class="landing" style="background-image: url('<?php echo $podcastBanner; ?>')">
  <div class="container">
    <div class="col-lg-12">
      <div class="shader shaderfix">
        <article>
          <div class="fullwidthheader" style="text-align: center;"><?php echo $type[0]; ?></div>
        </article>
      </div>
    </div>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="maincontent blog-maincontent col-md-offset-1 col-md-10">
        <h1 class="blog-title"><?php the_title(); ?></h1>
        <div class="blog-date text-muted"><i class="fa fa-calendar"></i> <?php the_time('l, F jS, Y'); ?></div>

        <?php if(get_field("podcast_audio")) : ?>
          <div class="podcast-wrapper"><a class="btn btn-default" href="<?php the_field('podcast_audio') ?>"><i class="fa fa-microphone"></i> Listen to the Podcast</a></div>
        <?php endif; ?>

        <?php the_content(); ?>

        <?php if($podcastemail) : ?>
          <div class="row post-bg" style="border-left: 7px solid #6E99B4; margin-top: 2rem;">
            <div class="col-sm-12">
              <h3><i class="fa fa-envelope fa-fw"></i> Receive <?php echo $type[0]; ?> in your inbox!</h3>
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

        <?php if(has_category() || has_tag()) : ?>
          <div class="blog-meta">
              <i class="fa fa-user"></i> Author: <?php echo $podcastAuthor; ?> <br>
              <i class="fa fa-pencil"></i> Editor: <?php echo $podcastEditor; ?> <br>
            <?php if(has_category()) : ?>
              <i class="fa fa-folder" title="category"></i> Category: <?php the_category(', '); ?> <br>
            <?php endif; ?>
            <?php if(has_tag()) : ?>
              <i class="fa fa-tags"></i> Tag: <?php the_tags(''); ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <br>

        <a href="<?php echo $podcastArchive ?>" class="btn btn-default btn-block">More <?php echo $type[0] ?></a>

        <br>
        <nav id="nav-single">
          <h3 class="sr-only"><?php _e( 'Read more', 'purduetwentyfourteen' ); ?></h3>
          <div class="pull-left"><?php previous_post_link( '%link', __( '<i class="fa fa-arrow-circle-left"></i> %title', 'purduetwentyfourteen' ) ); ?></div>
          <div class="pull-right"><?php next_post_link( '%link', __( '%title <i class="fa fa-arrow-circle-right"></i>', 'purduetwentyfourteen' ) ); ?></div>
        </nav>
        <br><br>
    </div>
  </div>
</div>

<?php endwhile; else: ?>
  <p><?php _e('Sorry, this page does not exist.'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>