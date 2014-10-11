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
              <!--

              Post start

              //-->

              <article class="envor-post" >
                <?php

                  require 'blog_function.php';

                  $post_id = $_GET['post_id'];

                  $query= "select * from article where post_id=$post_id ";

                  $posts = get_posts($query);
                     foreach($posts as $post)
                      {


                ?>

                <header>
                  <h3><strong><span> <?php echo $post['post_title']; ?></span></strong></h3>
                  <p> by <a href="">admin</a></p>
                  <!-- Go to your Addthis.com Dashboard to update any options -->
                  <div class="addthis_native_toolbox"></div>
                </header>
                <p><?php echo '<div align="justify">'.$post['post_content'].'</div>'; ?></p>
                <p>&nbsp;</p>

                <div class="date">
                  <span class="day"><?php  $timestamp = $post['post_date'];

                    echo $data = date('d',strtotime($timestamp));  ?></span>
                  <span class="month"><?php  $timestamp = $post['post_date'];
                    echo $data = date('M',strtotime($timestamp));
                    echo ",";
                    echo $data = date('y',strtotime($timestamp));  ?></span>
                </div>
                <?php
                }

              ?>
                <p class="tags">

                  <?php


                    include 'db_connect.php';
                    $post_id = $_GET['post_id'];
                    $related_tag_id = '0';
                    $query= mysqli_query($con,"select t.tag_id,t.tag_name from article_tag_map tm join article p on p.post_id = tm.post_id join article_tag t on t.tag_id = tm.tag_id where p.post_id = '$post_id'");
                    while($que = mysqli_fetch_row($query))
                    {
                  ?>
                  <i class="fa fa-tag"></i>
                    <a href="tag_view.php?tag_id=<?php echo $que['0']; ?>"><?php $related_tag_id = $que['0']; echo ucfirst($que['1']); ?></a>

                  <?php
                    }
                  ?>
                </p>


              <!--

              Post end

              //-->

  </article>

              <h3><strong>related</strong> posts</h3>
              <div class="envor-relative" id="related-posts">

             <?php
                  //echo $related_tag_id."<br>";
                  //echo $post_id;

                  $query= "select post_id from article_tag_map where tag_id=$related_tag_id ";

                  $posts = get_posts($query);
                  $result = $sql->query($query);
                  if($result->num_rows > 0)
                  {
                     foreach($posts as $post)
                      {
                        $id = $post['post_id'];
                        //echo $id;


                  $query = "select * from article where post_id =$id";
                  $posts = get_posts($query);
                  //echo $post_id;
                     foreach($posts as $post)
                      {

                        if($post['post_id']!=$post_id)
                        {
             ?>



                <!--

                News Item start

                //-->
                <article class="envor-post-preview envor-padding-left-30">
                  <div class="envor-post-preview-inner">
                    <header>
                      <div class="date">
                        <span class="day"><?php  $timestamp = $post['post_date'];

                    echo $data = date('d',strtotime($timestamp));  ?></span><span class="month"><?php  $timestamp = $post['post_date'];
                    echo $data = date('M',strtotime($timestamp));
                    echo ",";
                    echo $data = date('y',strtotime($timestamp));  ?></span>
                      </div>
                      <a href="blog_single_view.php?post_id=<?php echo $post['post_id']; ?>"><?php $content=$post['post_title'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                      if (strlen($string) > 35) {

                          // truncate string
                          $stringCut = substr($string, 0, 35);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                      }
                      echo $string;
                ?></a>
                    </header>
                    <p><?php $content=$post['post_content'];
                      // strip tags to avoid breaking any html
                        $string = strip_tags($content);

                      if (strlen($string) > 100) {

                          // truncate string
                          $stringCut = substr($string, 0, 100);

                          // make sure it ends in a word so assassinate doesn't become ass...
                          $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                      }
                      echo $string;
                ?></p>
                  </div>
                <!--

                News Item end

                //-->
                </article>
          <?php
                      }

                  }
            }
          }// Close if
          else
          {
            echo "No Related Post Found!";
          }

          ?>

                     <!--

                Navigation News Item start

                //-->
                <div class="">
                  <a href="" class=""><i class="fa fa-chevron-left"></i></a>
                  <a href="" class=""><i class="fa fa-chevron-right"></i></a>
                <!--

                Navigation News Item end

                //-->
                </div>
              </div>
              <!-- Script for comments. -->

                <div id=""></div>


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

                  </article>                </div>
              </div>
            </aside>
            <!--

            Twitter Widget

            //-->

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

  </body>
</html>
