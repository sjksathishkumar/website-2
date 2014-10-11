<?php
include_once 'include_login/db_connect.php';
include_once 'include_login/functions.php';

sec_session_start();
if (login_check($mysqli) == true) : ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Tutorial - Admin | Bass Biz</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/data-tables/TableTools.css" rel="stylesheet"/>
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
  <link href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Script for magic fill CSS -->
    <link href="css/magicsuggest.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php require 'include/header.php'; ?>
      <!--header end-->
      <!--sidebar start-->
      <?php require 'include/side_menu.php'; ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      <div align="center"><strong>Tutorial</strong></div>
                  </header>
                  <div class="panel-body">
                        <a href="#new_post" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-lg">New Post</button></a>
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="blog_table">
                                <thead>
                                <tr>
                                    <th>Post ID</th>
                                    <th>Title</th>
                                    <th class="hidden-phone">Author</th>
                                    <th class="hidden-phone">Posted In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                  </div>
              </section>

              <!-- New Post -->

                 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="new_post" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">New Post</h4>
                     </div>
                     <div class="modal-body">
                      <section class="panel">
                          <form role="form" id="new_post_detail" method="post" action="script/new_tutorial.php">
                                  <div>
                                    <label for="post_title"><b>Title</b></label>
                                    <input type="text" class="form-control" id="post_title" name="post_title" required>
                                  </div>
                                  <div>
                                    <br>
                                    <label for="post_content"><b>Contents</b></label>
                                    <textarea class="ckeditor" cols="120" id="post_content" name="post_content" rows="15">
                                    </textarea>
                                  </div>
                  <div>
                    <br>
                                    <label for="post_title"><b>Keywords</b></label>
                                    <input type="text" class="form-control" id="post_keywords" name="post_keywords" required>
                                  </div>
                  <div>
                   <br>
                                    <label for="post_title"><b>Description</b></label>
                                    <input type="text" class="form-control" id="post_description" name="post_description" required>
                                  </div>
                                  <div>
                                    <br>
                                    <label for="post_tag"><b>Tags</b></label>
                                    <input type="text" class="form-control" id="tag" name="post_tag[]" required>
                                  </div>
                                  <div align="center"><br><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                          </form>
                        </section>
                     </div>
                   </div>
                 </div>
               </div>

              <!-- Edit Form -->

              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" id="edit_blog" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Edit Blog</h4>
                     </div>
                     <div class="modal-body">
                      <section class="panel">
                          <form role="form" id="blog_detail" method="post" action="script/blog_update.php">
                                  <div>
                                    <input id="post_id" name="post_id" type="hidden">
                                    <label for="post_title"><b>Title</b></label>
                                    <input type="text" class="form-control" id="post_title" name="post_title" required>
                                  </div>
                                  <div>
                                    <br>
                                    <label for="post_content"><b>Contents</b></label>
                                    <textarea id="post_contents" name="post_contents" class="ckeditor"></textarea>
                                  </div>
                <div>
                    <br>
                                    <label for="post_title"><b>Keywords</b></label>
                                    <input type="text" class="form-control" id="post_keywords" name="post_keywords" required>
                                  </div>
                  <div>
                   <br>
                                    <label for="post_title"><b>Description</b></label>
                                    <input type="text" class="form-control" id="post_description" name="post_description" required>
                                  </div>
                                  <div>
                                    <br>
                                    <label for="tags"><b>Tags</b></label>
                                    <!-- <input type="text" class="form-control" id="tags" name="tags[]" required> -->
                                    <input type="text" class="form-control" id="tags" name="tags[]" required>
                                  </div>
                                  <div align="center"><br><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                          </form>
                        </section>
                     </div>
                   </div>
                 </div>
               </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
     <?php require 'include/footer.php'; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <!--<script src="js/jquery.js"></script>-->
    <!-- js placed at the end of the document so the pages load faster -->
    <!--<script src="js/jquery.js"></script>-->
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--script for this page only-->

    <script src="js/blog_view.js" > </script>
    <script src="assets/data-tables/TableTools.js"></script>
    <script src="assets/data-tables/ZeroClipboard.js"></script>
    <script src="js/jquery.loadJSON.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Script for ckeditor -->
    <script src="assets/ckeditor/ckeditor.js"></script>

    <!-- Script for magic fill -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>  -->
    <script src="js/magicsuggest.js"></script>
    <script src="js/magic_script.js"></script>


    <script type="text/javascript">
      /* Formating function for row details */

      $(document).ready(function() {
                 EditableTable.init();
          /*
           * Insert a 'details' column to the table
           */

      } );



</script>


  </body>
</html>
<?php else :
        header('Location: index.php');
endif; ?>
