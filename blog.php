<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; iso-8859-1"/>
    <meta name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="description" content="Bass PRIS Blog, get notified the recent updates and amendments in the compliances"/>
    <meta name="keywords" content="payroll services, payroll consultants, pris, payroll and recruitment information system, payroll processing"/>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/flexslider.css"/>
    <link href="../assets/bxslider/jquery.bxslider.css" rel="stylesheet" />


      <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />

  </head>

  <body>
     <!--header start-->
   <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">Bass<span>Pris</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about-us.php">About</a></li>
                        <li><a href="../services.php">Services</a></li>
                        <li><a href="../tutorials.php">Tutorials</a></li>
                        <li><a href="../pricing.php">Pricing</a></li>
                        <li class="active"><a href="index.php">Blog</a></li>
                        <li><a href="../contact-us.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
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
                        <li><a href="../index.php">Home</a></li>
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
            <!--blog start-->
            <div class="col-lg-9 ">
                <?php
                  require 'blog-function.php';
                  $query = "Select * FROM article ORDER BY post_date DESC ";
                  $posts = get_posts($query);
                  foreach($posts as $post)
                  {
                ?>
                <div class="blog-item">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <div class="date-wrap">
                                <span class="date">
                                  <?php 
                                    $timestamp = $post['post_date'];
                                    echo $data = date('d',strtotime($timestamp)); 
                                  ?>
                                </span>
                                <span class="month">
                                  <?php
                                    $timestamp = $post['post_date'];
                                    echo $data = date('F',strtotime($timestamp)); 
                                  ?>
                                </span>
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
                                <img src="blog-images/img1.jpg" alt="blog-post-image"/>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 text-right">
                            <div class="author">
                                By <a href="#"><?php echo $post['author']; ?></a>
                            </div>

                            <div class="shate-view">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;">209 View</a></li>
                                    <li><a href="javascript:;">23 Share</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <h1><a href="blog-detail.php?post_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a></h1>
                            <p>
                              <?php 
                                  $content=$post['post_content'];
                                  // strip tags to avoid breaking any html
                                  $string = strip_tags($content);
                                  if (strlen($string) > 500) 
                                  {
                                    // truncate string
                                    $stringCut = substr($string, 0, 500);
                                    // make sure it ends in a word so assassinate doesn't become ass...
                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'....';
                                  }
                                  echo $string;
                              ?>
                            </p>
                            <a href="blog-detail.php?post_id=<?php echo $post['post_id']; ?>"  class="btn btn-danger">Continue Reading</a>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>

                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="blog-side-item">
                    <div class="search-row">
                        <input type="text" class="form-control" placeholder="Search here">
                    </div>
                    <div class="category">
                        <h3>Categories</h3>
                        <ul class="list-unstyled">
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Animals</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Landscape</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Portait</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Wild Life</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> Video</a></li>
                        </ul>
                    </div>

                    <div class="blog-post">
                        <h3>Latest Blog Post</h3>
                        <div class="media">
                            <a class="pull-left" href="javascript:;">
                                <img class=" " src="blog-images/blog-thumb-1.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="javascript:;">
                                <img class=" " src="blog-images/blog-thumb-2.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="javascript:;">
                                <img class=" " src="blog-images/blog-thumb-3.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="javascript:;">02 May 2013 </a></h5>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus amet int
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="tags">
                        <h3>Tags</h3>
                        <ul class="list-unstyled tag">
                            <li><a href="#">flat</a></li>
                            <li><a href="#"> clean</a></li>
                            <li><a href="#"> admin</a></li>
                            <li><a href="#"> UI</a></li>
                            <li><a href="#"> responsive</a></li>
                            <li><a href="#"> Web Design</a></li>
                            <li><a href="#"> UIX</a></li>
                            <li><a href="#"> Blog</a></li>
                            <li><a href="#">flat Admin</a></li>
                            <li><a href="#"> Dashboard</a></li>
                        </ul>
                    </div>


                    <div class="archive">
                        <h3>Archive</h3>
                        <ul class="list-unstyled">
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> May 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> April 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> March 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> February 2013</a></li>
                            <li><a href="javascript:;"><i class="  fa fa-angle-right"></i> January 2013</a></li>
                        </ul>
                    </div>


                </div>
            </div>

            <!--blog end-->
        </div>

    </div>
    <!--container end-->

     <!--footer start-->
       <?php
        include '../footer.php'
       ?>
     <!--footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/hover-dropdown.js"></script>
    <script defer src="../js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="../assets/bxslider/jquery.bxslider.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/link-hover.js"></script>

     <!--common script for all pages-->
    <script src="../js/common-scripts.js"></script>
  </body>
</html>
