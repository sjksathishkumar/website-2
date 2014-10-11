<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Bass Desio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/templatemo_style.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->


        <div class="site-main" id="sTop">
            <div class="main-bd">
                    <div class="container">
                        <div id="menu-wrapper">
                            <div class="row">

                       <?php
                            include'header.php';
                            ?>

                    </div> <!-- /.container -->
                </div> <!-- /.main-header -->
            </div> <!--/.site-main -->



         <div class="content-section" id="blog">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Blog</h2>
                        <p></p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                <div class="row">
                     <div class="blog-member col-md-3 col-sm-6">
                        <div class="member-thumb">
        </div> <!-- /.member-thumb -->
                    </div> <!-- /.blog-member -->
            </div> <!-- /.container -->
        </div> <!-- /#blog-->
     <!--
    Envor site content start

    //-->
    <div class="envor-content">
      <!--

      Page Title start

     </section>
      <!--

      Main Content start

      //-->
      <section class="envor-section">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-sm-9">
              <div id="resultsDiv"></div><br><br>
              <div id="envor-posts-masonry">
              <!--

              Post start

              //-->
              <?php
                require 'blog-function.php';

                $query = "Select * FROM article ORDER BY post_date DESC ";



                $posts = get_posts($query);


                foreach($posts as $post)
                {
                  //echo $post['post_id']."<br>";
                  //echo $post['title']."<br>";
                  //echo $post['comments']."<br>";

              ?>
              <article class="envor-post envor-post-masonry" >
                <div class="inner">
<!--                 <figure>
                  <a href="../img/img1.png" class="colorbox"><img src="../img/img1.png" alt=""></a>
                  <figcaption><a href="../img/img1.png" title="Morbi convallis malesuada ante" class="colorbox"><i class="fa fa-plus"></i></a></figcaption>
                </figure>
 -->                <header>
                   <h3><i class="fa fa-pencil"></i> <a href="blog-single-view.php?post_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a></h3>
                  <p>posted on <a href="">

                    <?php
                    $timestamp = $post['post_date'];

                    echo $data = date('d-m-Y',strtotime($timestamp)); ?></a> <br> by <a href=""><?php echo $post['author']; ?></a></p>
                </header>
                <p><?php $content=$post['post_content'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                      if (strlen($string) > 500) {

                          // truncate string
                          $stringCut = substr($string, 0, 500);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                      }
                      echo $string;
                ?></p>
                <p><a href="blog-single-view.php?post_id=<?php echo $post['post_id']; ?>"  class="envor-btn envor-btn-small envor-btn-secondary-border">read the rest <i class="fa fa-arrow-circle-right"></i></a></p>
                </div>
              <!--

              Post end

              //-->

              </article>

              <?php
            }
            ?>

              </div>
              <!--

              pagination start

              //-->

            </div>
            <!--

            Right Sidebar start

            //-->
            <div class="col-md-3 col-sm-3">
              <!--

              Search Widget

              //-->
              <aside class="envor-widget envor-search-widget">
                <h3><strong>Search</strong> Widget</h3>
                <div class="envor-widget-inner">
                  <form id="searchForm" method="post">
                    <input type="text" id="s" name="s" placeholder=" ">
                  </form>
                </div>
              </aside>
            <!--

            Categories Widget

            //-->
            <aside class="envor-widget envor-category-widget">
              <h3>browse <strong>Categories</strong></h3>
              <div class="envor-widget-inner">
                <ul>
                  <?php

                    $query= "select * from article_tag";

                    $posts = get_tags($query);


                     foreach($posts as $post)
                      {
                  ?>

                  <li>
                    <p><a href="tag-view.php?tag_id=<?php echo $post['tag_id']; ?>"><strong><i class="fa fa-folder-open"></i></strong> <?php echo $post['tag_name']; ?></a> <a href="tag_view.php?tag_id=<?php echo $post['tag_id']; ?>">
                      <i class="fa fa-rss"></i></a>



                    </p>

                  </li>
                <?php
                  }
                  ?>

                </ul>
              </div>
            </aside>
            <!--

            Tabs Widget

            //-->
            <aside class="envor-widget envor-search-widget">
              <h3>Blog <strong>Posts</strong></h3>
              <div class="envor-widget-inner">
                <div class="envor-tabs">
                  <header>
                    <span><i class="fa fa-calendar"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-comment"></i></span>
                  </header>
                  <article>
                    <!--

                    Sidebar Post Item

                    //-->
                    <div class="envor-sidebar-comment">
                      <?php
                        $query = "SELECT * from article ORDER BY post_date DESC;";
                        $result = $sql->query($query);
                        if($result && $result->num_rows > 0)
                        {
                            // An array to store the data in a more managable order.

                                $data = array();

                            // Add each entry to the $data array, sorted by Year and Month
                            while($row = $result->fetch_assoc())
                            {
                                $year = date('Y', strtotime($row['post_date']));
                                $month = date('M', strtotime($row['post_date']));
                                $data[$year][$month][] = $row;
                            }

                            // Go through each Year and Month and print a list of entries, sorted by month.
                            foreach($data as $_year => $_months)
                            {
                                echo '<div><ul class="treeview"><li>';
                                echo "<h4><strong>{$_year}</strong></h4>";
                                foreach($_months as $_month => $_entries)
                                {
                                    echo '<ul class="expand"><li>';
                                    echo "<h5><i class='fa fa-chevron-right'></i>&nbsp;&nbsp;<strong>{$_month}</strong></h5>";
                                    echo "<ul>";
                                    foreach($_entries as $_entry)
                                    {
                                        echo "<li>";
                                        echo "<i class='fa fa-angle-double-right'></i>&nbsp;&nbsp;<a href=\"blog_single_view.php?post_id={$_entry['post_id']}\">";
                                                    $content=$_entry['post_title'];
                                                  // strip tags to avoid breaking any html
                                                    $string = strip_tags($content);

                                                  if (strlen($string) > 100) {

                                                      // truncate string
                                                      $stringCut = substr($string, 0, 100);

                                                      // make sure it ends in a word so assassinate doesn't become ass...
                                                      $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                                                  }
                                                  echo $string."</a>";
                                        echo "</li>";
                                    }
                                    echo "</ul></li></ul>";
                                }
                                echo "</li></ul></div>";
                            }
                        }
                            $result->free();


                        /* and close up */
                        $sql->close();

                      ?>



                    </div>


                  </article>
                  <article>
                    <!--

                    Sidebar Comment Item

                    //-->

                      <?php
                      require '../db_connect.php';
                      $query= " select * from article ORDER BY post_date DESC limit 3;";
                      $result = $sql->query($query);
                      if($result->num_rows > 0)
                        {
                          while ( $row = $result->fetch_assoc() )
                          {
                      ?>
                      <div class="envor-sidebar-comment">
                      <p><a href="blog_single_view.php?post_id=<?php echo $row['post_id']; ?>"><?php $content=$row['post_title'];
                      // strip tags to avoid breaking any html
                       $string = strip_tags($content);

                        if (strlen($string) > 35) {

                          // truncate string
                          $stringCut = substr($string, 0, 35);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                        }
                        echo $string;
                      ?></a></p>
                      <p><?php $content=$row['post_content'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                        if (strlen($string) > 100) {

                          // truncate string
                          $stringCut = substr($string, 0, 100);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                        }
                        echo $string;
                      ?></p></div>

                  <?php
                        }
                      }
                      else
                      {
                            echo "No Data Found!";
                      }
                  ?>

                  </article>
                  <article>
                    <!--

                    Sidebar Comment Item

                    //-->

                      <?php
                      require 'db_connect.php';
                      $query= "  select * from questions where ans_rply = '1' ORDER BY qus_date DESC limit 3;";
                      $result = $sql->query($query);
                      if($result->num_rows > 0)
                        {
                          while ( $row = $result->fetch_assoc() )
                          {
                      ?>
                      <div class="envor-sidebar-comment">
                      <p><a href="../expert_single_view.php?qus_id=<?php echo $row['qus_id']; ?>"><?php $content=$row['question'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                      if (strlen($string) > 35) {

                          // truncate string
                          $stringCut = substr($string, 0, 35);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                      }
                      echo $string;
                      ?></a></p>
                      <p><?php $content=$row['answer'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                      if (strlen($string) > 100) {

                          // truncate string
                          $stringCut = substr($string, 0, 100);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                      }
                      echo $string;
                      ?></p></div>

                  <?php
                        }
                      }
                      else
                      {
                            echo "No Data Found!";
                      }
                  ?>

                  </article>
                </div>
              </div>
            </aside>

            <!--

            Right Sidebar end

            //-->
            </div>
          </div>
        </div>
      <!--

      Main Content start

      //-->
      </section>
    <!--

    Envor site content end

    //-->
    </div>
                              <a href="#" class="crunchify-top">^</a>

                   <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.js"></script>
        <script src="jquery.masonry.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>




        <script type="text/javascript">

    jQuery(document).ready(function() {
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.crunchify-top').fadeIn(duration);
            } else {

                jQuery('.crunchify-top').fadeOut(duration);
            }
        });

        jQuery('.crunchify-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

</script>


            </body>
            </html>