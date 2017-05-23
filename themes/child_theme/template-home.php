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


<!-- Start Feature Stories Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h1 style="margin: 20px 0;">News & Featured Stories</h1>
      <div id="firstfeature" class="col-lg-6 primarystory">
        <div id="primaryfeature"></div>
      </div>
      <div id="secondaryfeatures"></div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End Feature Section -->

<!-- Start Recent Stories Section-->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h2>Browse Categories</h2>
        <div class="sidenav">
          <ul>
          <?php
          $output = "";
          $categories = get_categories();
          //echo print_r($categories);
          foreach ($categories as $cat) {
            $output = '<li><a href="/stories/category/' . $cat->slug . '">';
            $output .= $cat->name;
            $output .= '</a></li>';
            echo $output;
          }
          ?>
          </ul>
        </div> <!-- /.sidenav -->
      </div>
      <div class="col-sm-8">
      <h2 style="margin-bottom: 10px;">Recent Stories</h2>
      <?php
        $the_query = new WP_Query( 'posts_per_page=4' );
        $output = "";
        while ($the_query -> have_posts()) : $the_query -> the_post();
          $postID = get_the_ID();
          $link = get_the_permalink();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url($postID, "full");
          $output = '<div class="col-sm-6"><a href="' . $link . '"><div class="recent-story">';
          $output .= '<img src="' . $image . '" alt="' . $title . '" class="img-responsive">';
          $output .= '<h3>' . $title . '</h3>';
          $output .= "</a></div></div>";
          echo $output;
        endwhile;
        wp_reset_postdata();
      ?>
      </div> <!-- /.col-sm-8-->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End Recent Stories  Section -->


<!-- Start UNS Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h2 style="margin-bottom: 10px;">Agriculture News Releases <small><a href="http://www.purdue.edu/newsroom/">View All News</a></small></h2>
      <?php
        $rss = new DOMDocument();
        $rss->load('http://www.purdue.edu/newsroom/rss/AgNews.xml');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
          $item = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
          array_push($feed, $item);
        }
        $limit = 6;
        for($x=0;$x<$limit;$x++) {
          $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
          $link = $feed[$x]['link'];
          $description = $feed[$x]['desc'];
          $date = date('F d, Y', strtotime($feed[$x]['date']));

          // $xpath = new DOMXPath(@DOMDocument::loadHTML($description));
          // $src = $xpath->evaluate("string(//img/@src)");

          echo '<div class="col-sm-2" style="padding:0;"><a style="text-decoration:none;" href="'.$link.'" title="'.$title.'"><div class="news-release"><small class="text-muted date-meta">' . $date . '</small>';
          echo '<h4>' . $title . '</h4></div></a></div>';
        }
      ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End UNS Section -->



<!-- Start Exposure Section -->
<div class="section">
  <div class="container">
    <div class="row">
      <h2 style="margin-bottom: 20px;">Latest Photo Galleries <small><a href="https://purdueag.exposure.co/">View All Galleries</a></small></h2>
      <?php
        $rss = new DOMDocument();
        $rss->load('https://purdueag.exposure.co/feed.rss');
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
          $item = array (
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );
          array_push($feed, $item);
        }
        $limit = 3;
        for($x=0;$x<$limit;$x++) {
          $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
          $link = $feed[$x]['link'];
          $description = $feed[$x]['desc'];
          $date = date('F d, Y', strtotime($feed[$x]['date']));

          $xpath = new DOMXPath(@DOMDocument::loadHTML($description));
          $src = $xpath->evaluate("string(//img/@src)");

          echo '<a href="'.$link.'" title="'.$title.'"><div class="col-sm-4"><img src="' . $src . '" class="img-responsive" alt="'.$title.'">';
          echo '<h4 class="exposure-heading">' . $title . ' <small>' . $date . '</small></h4></div></a>';
        }
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



<script type="text/javascript" src="https://ag.purdue.edu/siteassets/jquery.SPServices-0.7.1a.min.js"></script>
<script type="text/javascript">

            $jQ=jQuery.noConflict();

             $jQ(document).ready(function(){
                      getPrimaryFeature();
                   });


                        $jQ(document).ready(function(){
                            getSecondaryFeatures();
                        });

                        function getPrimaryFeature()
                        {
                            //web service method var
                            var method = "GetListItems";
                            //Display name of list to retrieve data from
                            var list = "{B2EF3CF6-F8C8-4BAA-8496-8A87C59CD3D2}";
                            //Web Location of the list for use outside of the site collection
                            var strWebURL = "https://ag.purdue.edu/";
                            //Fields to return
                            var fieldsToRead =     "<ViewFields>"+
                                                    "<FieldRef Name='Title' />"+
                                                    "<FieldRef Name='Content' />"+
                                                    "<FieldRef Name='Link' />"+
                                                    "<FieldRef Name='Backgroundimage' />"+
                                                    "<FieldRef Name='Hidden' />"+
                                                    "<FieldRef Name='Publish' />"+
                                                    "<FieldRef Name='ID' />"+
                                                "</ViewFields>";
                            //CAML query for request
                            var query =     "<Query>"+
                                      "<Where>"+
                          "<Eq>"+
                            "<FieldRef Name='Hidden' />"+
                            "<Value Type='Text'>1</Value>"+
                          "</Eq>"+
                        "</Where>"+
                        "<OrderBy>" +
                            "<FieldRef Name='ID' Ascending='False' />"+
                        "</OrderBy>"+
                                            "</Query>";



              /* this is for the Super Feature Section */
                            $jQ().SPServices({
                                    operation: method,
                                    async: false,
                                    webURL: strWebURL,
                                    listName: list,
                                    CAMLViewFields: fieldsToRead,
                                    CAMLQuery: query,
                                    //set limit for rows returned
                                    CAMLRowLimit: 1,
                                    completefunc: function(xData,Status){
                                        $jQ(xData.responseXML).SPFilterNode("z:row").each(function(){
                                            //get fields and pass them to render function
                                              var title = ($jQ(this).attr("ows_Title"));
                                              var content = ($jQ(this).attr("ows_Content"));
                                              var link = ($jQ(this).attr("ows_Link"));
                                              var backgroundimage = ($jQ(this).attr("ows_Backgroundimage"));

                                              outputPrimaryFeatureData(title, content, link, backgroundimage);
                                        });
                                    }

                            });


                        }

            function outputPrimaryFeatureData(title, content, link, backgroundimage)
                        {

                          if(backgroundimage == null) {
                            backgroundimage = "http://placehold.it/550x350";
                          }
                          $jQ("#primaryfeature").append(" <a href='" + link + "' style='text-decoration:none;'> <div class='grids primarygrid'><figure class='effect-ruby'><img class='img-responsive img-home-portfolio primarystorypic' alt='" + title + "' src='" + backgroundimage + "' /><figcaption class='hidden-xs hidden-sm hidden-md' style='padding-top: 115px;'><p>Read More</p></figcaption></figure></div> <div class='primarytitle'> <div class='primarybutton'><h2 style='padding-top: 0;'>Top Story</h2></div><div id='fitinprimary'><div class='secondarystorytitle'>"+ title +"</div></div></div></a>");
                    }






                        function getSecondaryFeatures()
                        {
                            //web service method var
                            var method = "GetListItems";
                            //Display name of list to retrieve data from
                            var list = "{B4916F78-8DA7-427F-B0DB-069464DA789F}";
                            //Web Location of the list for use outside of the site collection
                            var strWebURL = "https://ag.purdue.edu/";
                            //Fields to return
                            var fieldsToRead =     "<ViewFields>"+
                                                    "<FieldRef Name='Title' />"+
                                                    "<FieldRef Name='Image' />"+
                                                    "<FieldRef Name='Link' />"+
                                                    "<FieldRef Name='Publish' />"+
                                                    "<FieldRef Name='Content' />"+
                                                    "<FieldRef Name='Hidden' />"+
                                                "</ViewFields>";
                            //CAML query for request
                            var query =    "<Query>"+
                                      "<Where>"+
                          "<Eq>"+
                            "<FieldRef Name='Hidden' />"+
                            "<Value Type='Text'>0</Value>"+
                          "</Eq>"+
                        "</Where>"+
                        "<OrderBy>"+
                                                    "<FieldRef Name='Publish' Ascending='False' />"+
                                                "</OrderBy>"+
                                            "</Query>";


                            var i = 0;
              /* this is for the Features Section */
                            $jQ().SPServices({
                                    operation: method,
                                    async: false,
                                    webURL: strWebURL,
                                    listName: list,
                                    CAMLViewFields: fieldsToRead,
                                    CAMLQuery: query,
                                    //set limit for rows returned
                                    CAMLRowLimit: 3,
                                    completefunc: function(xData,Status){
                                        $jQ(xData.responseXML).SPFilterNode("z:row").each(function(){
                                            //get fields and pass them to render function
                                              var colors = ['pappysborder', 'fountainborder', 'mackeyborder'];
                                              var fitin = ['fitin', 'fitin2', 'fitin3'];
                                              var title = ($jQ(this).attr("ows_Title"));
                                              var content = ($jQ(this).attr("ows_Content"));
                                              var image = ($jQ(this).attr("ows_Image"));
                                              var link = ($jQ(this).attr("ows_Link"));
                                              outputSecondaryFeaturesData(title, content, image, link, colors[i],fitin[i]);
                                              i++;
                                        });
                                    }

                            });

                        }


                        function outputSecondaryFeaturesData(title, content, image, link, color, fitin)
                        {

                        if(image == null) {
                            image = "http://placehold.it/310x200";
                          }


                         $jQ("#secondaryfeatures").append(" <div id='firstfeature'  class='col-lg-6  secondary " + color + "'> <a href='" + link +"' style='text-decoration:none;'><div class='col-sm-6 picpadding' > <div class='grids'> <figure class='effect-ruby'> <img class='img-responsive centersmall secondaryimage' style='max-height:200px;' src=' "+ image +"' /> <figcaption class='hidden-xs hidden-sm hidden-md'> <p>Read More</p> </figcaption></figure> </div> </div> <div class='col-sm-6' ><div id='"+fitin+"'>  <div class='secondarystorytitle centertext'>"+ title +"</div></div> </div> </a> </div>");

                        }


                        </script>


<?php
//get_sidebar();
get_footer();


