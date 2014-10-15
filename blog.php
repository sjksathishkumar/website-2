<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; iso-8859-1"/>
<meta name="ROBOTS" content="INDEX, FOLLOW"/>
<meta name="description" content=“Bass PRIS Blog, get notified the recent updates and amendments in the compliances"/>
<meta name="keywords" content=“payroll services, payroll consultants, pris, payroll and recruitment information system, payroll processing"/>
<meta name="author" content="Bass PRIS"/>
<meta name="publisher" content="Bass Desio"/>
<meta name="copyright" content="Bass PRIS"/>
<meta http-equiv="Reply-to" content=antony@basspris.com/>
<meta name="creation_Date" content="12/06/2011"/>
<meta name="expires" content="11 June 2222"/>
<meta name="language" content="EN"/>
<meta name="rating" content="general"/>
<meta name="revisit-after" content="7 days"/>

   <title>Bass PRIS Blog, get notified the recent updates and amendments in the compliances</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />


      <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
     <!--header start-->
    <?php
     include 'header.php';
     ?>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Blog</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="container">
        <div class="row">

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


            <!--blog start-->
                   <div class="col-lg-9 ">
                      <div class="blog-item">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                                   <div class="date-wrap">

                                <span class="date">  <?php $timestamp = $post['post_date'];

                    echo $data = date('d',strtotime($timestamp)); ?> </span>
                             <span class="month">       <?php
                    $timestamp = $post['post_date'];

                    echo $data = date('F',strtotime($timestamp)); ?> </span>
                            </div>
                            <div class="comnt-wrap">
                                <span class="comnt-ico">
                                    <i class="fa fa-comments"></i>
                                </span>
                                <span class="value">15</span>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <div class="blog-img">
                                <img src="img/blog/img1.jpg" alt=""/>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 text-right">
                            <div class="author">By  <a href="#">
                             <?php                        echo $post['author']; ?></a></p>
                                     </div>
                            <ul class="list-unstyled">
                                <li><a href="javascript:;"><em></em></a></li>
                                <li><a href="javascript:;"><em></em></a></li>
                                <li><a href="javascript:;"><em></em></a></li>
                                <li><a href="javascript:;"><em></em></a></li>
                            </ul>
                            <div class="shate-view">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;"></a></li>
                                    <li><a href="javascript:;"></a></li>

                                </ul>
                            </div>
                        </div>

                          <div class="col-lg-10 col-sm-10">
                          <header>
                     <h1>             <a href="blog-detail.php?post_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a>

                </header>  <p><?php $content=$post['post_content'];
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



                    <a href="blog-detail.php?post_id=<?php echo $post['post_id']; ?>"  class="btn btn-danger">Continue Reading</a>
                      </div>



                    </div>
                  </div>

                   </div>
              <?php

                }
                ?>



                  <div class="col-lg-3">
                <div class="blog-side-item">
                     <div class="row">
                    <div class="search-row">
                        <input type="text" class="form-control" placeholder="Search here">
                    </div>     <!--search-->
                    <div class="category">
                        <h3>Categories</h3> <br/>
                        <ul class="list-unstyled">
                                <?php

                    $query= "select * from article_tag";

                    $posts = get_tags($query);


                     foreach($posts as $post)
                      {
                  ?>

                  <li>
                    <p><a href="tag-view.php?tag_id=<?php echo $post['tag_id']; ?>"><?php echo $post['tag_name']; ?></a> <a href="tag_view.php?tag_id=<?php echo $post['tag_id']; ?>">
                     </i></a>



                    </p>

                  </li>
                <?php
                  }
                  ?>

                </ul>   </div>
                      </div>

                            </div>
                    </div>
                      </div> <!--row-->
                    </div>            <!--container-->



  <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>


     <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>
</html>