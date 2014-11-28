<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; iso-8859-1"/>
    <meta name="ROBOTS" content="INDEX, FOLLOW"/>
    <meta name="author" content="Bass PRIS"/>
    <meta name="publisher" content="Bass Desio"/>
    <meta name="copyright" content="Bass PRIS"/>
    <meta http-equiv="Reply-to" content="antony@basspris.com"/>
    <meta name="creation_Date" content="12/06/2011"/>
    <meta name="expires" content="11 June 2222"/>
    <meta name="language" content="EN"/>
    <meta name="rating" content="general"/>
    <meta name="revisit-after" content="7 days"/>
    <link rel="shortcut icon" href="img/favicon.png">

    <?php

        $url  = $_GET['url'].'.html';

        require 'blog-function.php';

        $query= "select * from article where url='$url'";

        $result = $sql->query($query);

        $row = $result->fetch_assoc();

        echo "<meta name='description' content='".$row['description']."'/>";

        echo "<meta name='keywords' content='".$row['keyword']."'/>";

        echo "<title>".$row['post_title']."</title>";

    ?> 

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
             <?php
                $url  = $_GET['url'].'.html';
                $query= "select * from article where url= '$url' ";
                $posts = get_posts($query);
                foreach($posts as $post)
                    {
                        $post_id = $post['post_id'];
            ?>
            <!--blog start-->
            <div class="col-lg-9">
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
                                    echo $data = date('F',strtotime($timestamp)); ?> 
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
                                <img src="<?php echo $post['img_url']; ?>" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 text-right">
                            <div class="author">
                                By <a href="#">Admin</a>
                            </div>
                            <ul class="list-unstyled">
                                <?php
                                    include '../db-connect.php';
                                    $related_tag_id = '0';
                                    $query= mysqli_query($con,"select t.tag_id,t.tag_name from article_tag_map tm join article p on p.post_id = tm.post_id join article_tag t on t.tag_id = tm.tag_id where p.post_id = '$post_id'");
                                    while($que = mysqli_fetch_row($query))
                                    {
                                ?>
                                <li>
                                <a href="<?php echo $que['1']; ?>"><em><?php $related_tag_id = $que['0']; echo ucfirst($que['1']); ?></em></a>
                                </li>
                                <?php
                                    }
                                ?>
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

                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'basspris'; // required: replace example with your forum shortname

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
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


  <script>


  </script>

  </body>
</html>