<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>BassPris  | Blog Details</title>

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
                    <h1>Blog Details</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Blog Details</li>
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

                  $post_id = $_GET['post_id'];

                  $query= "select * from article where post_id=$post_id ";

                  $posts = get_posts($query);
                     foreach($posts as $post)
                      {


                ?>
            <!--blog start-->
            <div class="col-lg-9">
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
                            <div class="author">
                                By <a href="#">Admin</a>
                            </div>
                            <ul class="list-unstyled">
                                <li><a href="javascript:;"><em>travel</em></a></li>
                                <li><a href="javascript:;"><em>tour</em></a></li>
                                <li><a href="javascript:;"><em>recreation</em></a></li>
                                <li><a href="javascript:;"><em>tourism</em></a></li>
                            </ul>
                            <div class="shate-view">
                                <ul class="list-unstyled">
                                    <li><a href="javascript:;">209 View</a></li>
                                    <li><a href="javascript:;">23 Share</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <h1><strong><span> <?php echo $post['post_title']; ?></span></strong></h1>


            <p><?php echo '<div align="justify">'.$post['post_content'].'</div>'; ?></p>
                <p>&nbsp;</p>

                              <div class="media">
                                <h3>Comments</h3>
                                <hr>
                                <a class="pull-left" href="javascript:;">
                                    <img class="media-object" src="img/avatar1.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        Anjelina Joli <span>|</span>
                                        <span>12 July 2013, 10:20 </span>
                                    </h4>
                                    <p>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </p>
                                    <a href="javascript:;">Reply</a>
                                    <hr>
                                    <!-- Nested media object -->
                                    <div class="media">
                                        <a class="pull-left" href="javascript:;">
                                            <img class="media-object" src="img/avatar2.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                Tom Cruse <span>|</span>
                                                <span>12 July 2013, 10:30 </span>
                                            </h4>
                                            <p>
                                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                            </p>
                                            <a href="javascript:;">Reply</a>
                                        </div>
                                    </div>
                                    <!--end media-->
                                    <hr>
                                    <div class="media">
                                        <a class="pull-left" href="javascript:;">
                                            <img class="media-object" src="img/avatar1.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                Nicol Kidman <span>|</span>
                                                <span>12 July 2013, 10:40 </span>
                                            </h4>
                                            <p>
                                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                            </p>
                                            <a href="javascript:;">Reply</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--end media-->
                                </div>
                            </div>
                            <div class="media">
                                <a class="pull-left" href="javascript:;">
                                    <img class="media-object" src="img/avatar2.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        Tom Cruse <span>|</span>
                                        <span>12 July 2013, 11:10 </span>
                                    </h4>
                                    <p>
                                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                    </p>
                                    <a href="javascript:;">Reply</a>
                                </div>
                            </div>
                            <div class="post-comment">
                                <h3 class="skills">Post Comments</h3>
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <input type="text" placeholder="Name" class="col-lg-12 form-control">
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" placeholder="Email" class="col-lg-12 form-control">
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" placeholder="2*five=? *" class="col-lg-12 form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <textarea placeholder="Message" rows="8" class=" form-control"></textarea>
                                        </div>
                                    </div>
                                    <p>
                                        <button type="submit" class="btn btn-danger pull-right">Post Comment</button>
                                    </p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
                        <?php
                      }
                      ?>

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
                                <img class=" " src="img/blog/blog-thumb-1.jpg" alt="">
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
                                <img class=" " src="img/blog/blog-thumb-2.jpg" alt="">
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
                                <img class=" " src="img/blog/blog-thumb-3.jpg" alt="">
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


                  <?php


                    include 'db-connect.php';
                    $post_id = $_GET['post_id'];
                    $related_tag_id = '0';
                    $query= mysqli_query($con,"select t.tag_id,t.tag_name from article_tag_map tm join article p on p.post_id = tm.post_id join article_tag t on t.tag_id = tm.tag_id where p.post_id = '$post_id'");
                    while($que = mysqli_fetch_row($query))
                    {
                  ?>
                         <li>
                    <a href="tag-view.php?tag_id=<?php echo $que['0']; ?>"><?php $related_tag_id = $que['0']; echo ucfirst($que['1']); ?></a>

                  <?php
                    }
                  ?>

                            </li>
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
         include 'footer.php'
         ?>
     <!--footer end-->

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


  <script>


  </script>

  </body>
</html>