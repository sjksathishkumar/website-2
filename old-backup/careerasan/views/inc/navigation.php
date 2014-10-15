<?php
	//authenticated
	if( Session::get( 'authenticated' ) ) : ?>
<!-- navegation -->	
					<nav id="navegation">
						<div class="quick_search">
						   <form action="search/" method="get" id="search_engine" accept-charset="UTF-8">
							  <input id="btnItems" name="q" class="mention" type="text" placeholder="Search..." maxlength="100">	
						          <button type="submit" id="buttonSearch">Search</button>
						      </form>
						</div><!-- quick_search -->	
						
						<!-- nav_user -->	
						<ul class="nav_user">
							<li>
								<!-- <span class="notify">1</span> -->
								<a href="<?php echo URL_BASE; ?>messages/" class="messages" title="Messages">messages</a>
							</li>
								<li>
									<a href="<?php echo URL_BASE; ?>discover/" class="hashtag" title="Discover">Discover</a>
								</li>
									<li>
										<a href="<?php echo URL_BASE; ?>connect/" class="connect" title="Connect">Connect</a>
									</li>
										<li class="listLast">
											<a href="" class="settings toogle">settings</a></i>
											<div id="boxLogin" class="boxLogin" style="width: 160px; right: -4px;">
									<i class="arrowUp"></i>
									<ul class="options_toogle">
										<li><a href="<?php echo URL_BASE.$this->infoSession->username; ?>" class="myprofile">My Profile</a></li>
										<li><a href="<?php echo URL_BASE; ?>profile/">Edit Profile</a></li>
										<li><a href="<?php echo URL_BASE; ?>settings/">Settings</a></li>
										<li class="bottomList"><a class="logout">Log out</a></li>
									</ul>
								</div><!-- boxLogin -->
										</li>
						</ul><!-- nav_user -->	
					</nav><!-- navegation -->
					
					<!-- Navegation 2 -->
					<nav id="navegation_2">
						<!-- nav_user -->	
						<ul class="nav_user">
										<li class="listLast">
											<a href="" class="settings_2 toogle">settings</a></i>
											<div id="boxLogin" class="boxLogin" style="width: 160px; right: -4px;">
									<i class="arrowUp"></i>
									<ul class="options_toogle">
										<li><a href="<?php echo URL_BASE.$this->infoSession->username; ?>" class="myprofile">My Profile</a></li>
										<li><a href="<?php echo URL_BASE; ?>messages/"  title="Messages">Messages</a>
							            </li>
								<li>
									<a href="<?php echo URL_BASE; ?>discover/" title="Discover">Discover</a>
								</li>
									<li>
										<a href="<?php echo URL_BASE; ?>connect/" title="Connect">Connect</a>
									</li>
										<li><a href="<?php echo URL_BASE; ?>profile/">Edit Profile</a></li>
										<li><a href="<?php echo URL_BASE; ?>settings/">Settings</a></li>
										<li class="bottomList"><a class="logout">Log out</a></li>
									</ul>
								</div><!-- boxLogin -->
										</li>
						</ul><!-- nav_user -->	
					</nav><!-- navegation -->
					
<?php
	   else :
		   
		   ?>
		   
		   <!-- navegation -->	
					<nav id="navegationSessionNull">
						<ul>
							<li>
								<span id="signInButton" class="toogle">Have an account? <strong>Sign in</strong>! <i class="arrow"></i></span>
								<div id="boxLogin" class="boxLogin">
									<i class="arrowUp"></i>
							<form style="display: none;" action="" method="post" name="form" id="recover_pass_form" class="form_login recoverForm">
		    					<input type="text" name="email_recover" id="email_recover" placeholder="Enter your email address" title="Enter your email address" />
		    					<a style="cursor: pointer;" class="recover_pass buttonInside forgot buttonBack">&laquo; Back</a>
		    					<span id="error_recover"></span>
		    					<span id="success_recover"></span>
		    					<button type="submit" id="buttonRecoverPass">Send</button>
		    				</form>
									<form action="" method="post" name="form" id="signin_form" class="form_login signInForm">
				    					<input type="text" name="user" id="user" placeholder="Username or email" title="Username or email" />
				    					<input type="password" name="password" id="password_signin" placeholder="Password" title="Password" />
				    					<a style="cursor: pointer;" class="recover_pass buttonInside forgot buttonForgot">Forgot password?</a>
				    					<span id="error"></span>
		    					        <span id="success_signin"></span>
				    					<button type="submit" id="buttonSignIn"><span>Sign in</span></button>
		    				       </form>
								</div><!-- boxLogin -->
							</li>
						</ul>
					</nav><!-- navegation -->
		   

<?php endif; ?>