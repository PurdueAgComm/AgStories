<?php
/**
 *
 * Template Name: Podcast Landing
 *
**/

get_header(); ?>

<style>
.shader1{background-color:rgba(0,0,0,.6);margin-top:32%;padding:2em;}
.shaderfix1{margin-top:37%;}

@media (max-width:768px){.full-width-banner{height:250px;}
.shader1{margin-top:7%;}
.fullwidthheader{font-size:1.5em;}
.fullwidthparagraph{font-size:1em;}
}

@media (max-width:400px){.shader{margin-top:5%;}}

.entry-content h1 {
  /* phenotyping section is on blue background for contrast */
  color: white !important;
}

.temproary-bigidea {
  background: url(https://ag.purdue.edu/envision/wp-content/uploads/2017/05/Big-Idea-Bottom-Parallax-Background2.jpg);
  height: 100%;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: -20px;
  color: white !important;
}
  </style>

<div class="full-width-banner" style="background-image: url('/plantsciences/wp-content/uploads/2017/10/drone-bg.jpg');">
  <div class="container">
    <div class="col-lg-12">
      <div class="shader">
      <article>
        <div class="fullwidthheader">Purdue Agriculture Columns</div>
        <p class="fullwidthparagraph">Subscribe to them on your phone or computer</p>
      </article>
      </div>
    </div>
  </div>
</div>


<style>
.btn-success {
  background: transparent;
  border: 2px solid #fff !important;
  color: #fff;
}

.btn-success:hover, .btn-success:active, .btn-success:focus {
    color: #000 !important;
    background: #ffd100 !important;
    border: 2px solid #b39200 !important;
}

.btn {
  border: none;
font-family: inherit;
font-size: inherit;
color: inherit;
background: none;
cursor: pointer;
padding: 10px 60px;
display: inline-block;
text-transform: uppercase;
letter-spacing: 1px;
font-weight: 700;
outline: none;
position: relative;
-webkit-transition: all 0.3s;
-moz-transition: all 0.3s;
transition: all 0.3s;
border-radius: 0;
width: 98%;
}

.podcast-container {
  text-align: center;
  margin: 25px 0;
}

  .podcast-container h3 {
    padding-top: 0;
  }
</style>

<br><br>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-InTheGrow-1400x1400.jpg" alt="barn Chatter" class="img-responsive" />
            <h3>Barn Chatter</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/Ag-cols-capcomments-1400x1400.png" alt="Capital Comments" class="img-responsive" />
            <h3>Capital Comments</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-InTheGrow-1400x1400.jpg" alt="Dr. Tim's Spineless Wonders" class="img-responsive" />
            <h3>Dr. Tim's Spineless Wonders</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-InTheGrow-1400x1400.jpg" alt="The 4th H" class="img-responsive" />
            <h3>The 4th H</h3>
          </div>
        </a>
      </div>
    </div>
    <div class="row">

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-InTheGrow-1400x1400.jpg" alt="In The Grow" class="img-responsive" />
            <h3>In The Grow</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-YnGCal-1400x1400.jpg" alt="Yard & Garden Calendar" class="img-responsive" />
            <h3>Yard & Garden Calendar</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-3">
        <a href="">
          <div class="podcast-container">
            <img src="https://ag.purdue.edu/stories/wp-content/uploads/2018/02/AgComm-NewsCol-YnGNews-1400x1400.jpg" alt="Yard & Garden News" class="img-responsive" />
            <h3>Yard & Garden News</h3>
          </div>
        </a>
      </div>

    </div>


  </div>
</div>



<?php
//get_sidebar();
get_footer();

