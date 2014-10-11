<header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="home.php" class="logo" ><img alt="" src="img/site-logo.png"></a>
          <!--logo end-->
         
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="img/avatar-mini4.jpg">
                          <span class="username"><?php echo htmlentities($_SESSION['username']); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                          <li><a href="include_login/logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>