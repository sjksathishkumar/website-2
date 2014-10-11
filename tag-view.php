
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
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
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

      //-->

      <!--

      Page Title end

      //-->
      </section>

      <!--

      Main Content start

      //-->
      <section class="envor-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9">
              <div id="resultsDiv"></div><br><br>
             <?php

                  require 'blog_function.php';
                  $tag_id = $_GET['tag_id'];
                  $query= "select tag_name from article_tag where tag_id=$tag_id ";

                  $tags = get_tags($query);
                     foreach($tags as $tag)
                      {

              ?>

              <p class="blog-cat">Posts under <strong>"<?php echo $tag['tag_name'];?>"</strong> category</p>

              <?php
                }
              ?>

              <div id="envor-posts-masonry">
              <!--

              Post start

              //-->
               <?php


                  $tag_id = $_GET['tag_id'];




                  $query= "select post_id from article_tag_map where tag_id=$tag_id ";

                  $posts = get_posts($query);
                     foreach($posts as $post)
                      {
                        $id = $post['post_id'];



                $query = "Select * FROM article where post_id = $id ORDER BY post_date DESC ";



                $posts = get_posts($query);


                foreach($posts as $post)
                {

              ?>
              <article class="envor-post envor-post-masonry">
                <div class="inner">
               <header>
                  <h3><i class="fa fa-pencil"></i> <a href="blog_single_view.php?post_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a></h3>
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
                <p><a href="blog_single_view.php?post_id=<?php echo $post['post_id']; ?>" class="envor-btn envor-btn-small envor-btn-secondary-border">read the rest <i class="fa fa-arrow-circle-right"></i></a></p>
                </div>
              <!--

              Post end

              //-->

              </article>

              <?php
            }
          }

            ?>

              </div>

            </div>
            <!--

            Right Sidebar start

            //-->
            <div class="col-lg-3 col-md-3">
              <!--

              Search Widget

              //-->
              <aside class="envor-widget envor-search-widget">
                <h3><strong>Search</strong> Widget</h3>
                <div class="envor-widget-inner">
                  <form id="searchForm" method="post">
                    <input type="text" id="s" name="s" placeholder="type to search...">
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
                    <p><a href="tag_view.php?tag_id=<?php echo $post['tag_id']; ?>"><i class="fa fa-folder-open"></i> <?php echo $post['tag_name']; ?></a> <a href="tag_view.php?tag_id=<?php echo $post['tag_id']; ?>">
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
                      require '../db_connect.php';
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


    <script src="../js/jquery.rivathemes.js"></script>
    <script type="text/javascript">
      $('document').ready(function() {
          var $container = $('#envor-posts-masonry');
          // initialize Masonry after all images have loaded
              $container.masonry({
                'itemSelector': '.envor-post-masonry'
              });
          $(window).resize(function() {
            $container.masonry('bindResize');
          });
          /*

          Footer News Slider

          */

      });
    </script>

   <!-- Script for Tree View Blog -->


    <script>
        $(document).ready(function (e) {

          $(".treeview li ul").addClass("collapse");

            $(".treeview li").click(function (e) {
                currentselect = $(this).closest(".treeview").attr("id");
                $(this).closest(".treeview").find("li").removeClass("selected");

                var selectnode = $(this);
                expan(selectnode, e);
            });
        });
        function expan(node, e) {
            if (node.children("ul").is(":hidden")) {
                if (e.type == "click")
                    node.children("ul").slideDown("slow")//removeClass("collapse");
            }
            else {
                if (e.type == "click")
                    node.children("ul").slideUp("slow");
            }
            e.stopPropagation();
        }
    </script>

    <!-- End of Script for Tree View Blog -->

    <script src="../js/envor.js"></script>
    <script type="text/javascript">
      $('document').ready(function() {
          /*

          Preload Images

          */
          var imgs = new Array(), $imgs = $('img');
          for (var i = 0; i < $imgs.length; i++) {
            imgs[i] = new Image();
            imgs[i].src = $imgs.eq(i).attr('src');
          }
          Core.preloader.queue(imgs).preload(function() {
            var images = $('a').map(function() {
                    return $(this).attr('href');
            }).get();
            Core.preloader.queue(images).preload(function() {
                  $.preloadCssImages();
            })
          })
          $('#envor-preload').hide();
      });
      /*

      Google Analytics Code

      */
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src='//www.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
      /*

      Windows Phone 8 и Internet Explorer 10

      */
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style")
        msViewportStyle.appendChild(
          document.createTextNode(
            "@-ms-viewport{width:auto!important}"
          )
        )
        document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
      }
    </script>
  </body>
</html>
