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
    <meta http-equiv="Reply-to" content="antony@basspris.com"/>
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
                  require ('../db-connect.php');
                  $tag_name = $_GET['tag_name'];
                
                  $tag_name = $_GET['tag_name'];
                  $query= "select * from article_tag where tag_name= '$tag_name' ";
                  $result = $sql->query($query);
                  if ( $result->num_rows > 0 ) 
                  {
                     while ( $row = $result->fetch_object() ) 
                     {
                        $tag_id = $row->tag_id;
                     }
                  } 
                  else 
                  {
                     echo 'There are no results to display.';
                  } 

                  $num_rec_per_page=5;
                  if (isset($_GET["page"])) 
                    { 
                        $page  = $_GET["page"]; 
                    } 
                    else 
                    { 
                        $page=1; 
                    } 
                  $start_from = ($page-1) * $num_rec_per_page; 

                  echo "<h4>Posts under <strong>"."'".$tag_name."'"."</strong> category</h4><br>";

                  $query= "select post_id from article_tag_map where tag_id=$tag_id ";

                  $posts = get_posts($query); 
                     foreach($posts as $post)
                      {
                        $id = $post['post_id'];

                        $query = "Select * FROM article where post_id = $id ORDER BY post_date DESC LIMIT $start_from, $num_rec_per_page";
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
                                <img src="<?php echo $post['img_url']; ?>" alt="blog-post-image"/>
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
                            <h1><a href="<?php echo $post['url']; ?>"><?php echo $post['post_title']; ?></a></h1>
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
                            <a href="<?php echo $post['url']; ?>"  class="btn btn-danger">Continue Reading</a>
                        </div>
                    </div>
                </div>
                
                <?php
                    }
                  }
                ?>
                
                <div class="text-center">
                    <ul class="pagination">
                    <?php 
                        require('../db-connect.php');
                        $query = "Select * FROM article where post_id = $id"; 
                        $result = $sql->query($query); //run the query
                        $total_records = $result->num_rows;  //count number of records
                        $total_pages = ceil($total_records / $num_rec_per_page); 

                        echo "<li><a href='tag-result-1'>".'«'."</a></li>"; // Goto 1st page  

                        for ($i=1; $i<=$total_pages; $i++) { 
                                    echo "<li><a href='tag-result-".$i."'>".$i."</a></li>"; 
                        }
                        echo "<li><a href='tag-result-$total_pages'>".'»'."</a></li>"; // Goto last page
                    ?>   
                    </ul>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="blog-side-item">
                    <div class="category">
                        <h3>Categories</h3>
                        <ul class="list-unstyled">
                        <?php
                            $query= "select * from article_tag";
                            $result = $sql->query($query);
                            if ( $result->num_rows > 0 ) 
                            {
                                while ( $row = $result->fetch_object() ) 
                                {
                                    echo "<li><a href='{$row->tag_name}'> <i class='fa fa-angle-right'></i> {$row->tag_name} </a></li>";
                                }
                            } 
                            else 
                            {
                                echo 'There are no results to display.';
                            }
                            $sql->close();
                        ?>
                        </ul>
                    </div>

                    <div class="blog-post">
                        <h3>Latest Blog Post</h3>
                        <?php
                            require('../db-connect.php');
                            $query = "Select * FROM article ORDER BY post_date DESC LIMIT 5";
                            $result = $sql->query($query);
                            if ( $result->num_rows > 0 ) 
                            {
                                while ( $row = $result->fetch_object() ) 
                                {
                        ?>

                        <div class="media">
                            <div class="media-body">
                                <h5 class="media-heading"><a href='<?php echo "{$row->url}"; ?>'><?php echo "{$row->post_title}"; ?></a></h5>
                                <p>
                                </p>
                            </div>
                        </div>
                        <?php
                                }
                            } 
                            else 
                            {
                                echo 'There are no results to display.';
                            }
                            $sql->close();
                        ?>                    

                    </div>
                    
                    <div class="tags">
                        <h3>Tags</h3>
                        <ul class="list-unstyled tag">
                        <?php
                            include '../db-connect.php';
                            $query= mysqli_query($con,"select * from article_tag");
                            while($que = mysqli_fetch_row($query))
                            {
                        ?>
                        <li><a href="<?php echo $que['1']; ?>"><?php echo ucfirst($que['1']); ?></a></li>
                        <?php
                            }
                        ?>
                        </ul>
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
