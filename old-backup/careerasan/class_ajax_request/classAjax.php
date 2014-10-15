<?php
require_once '../../application/Config.php';
require_once '../../application/Db.php';
require_once '../../application/SPDO.php';

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : classAjax.php
 *  Class AjaxRequest
 *  This class has the function, insert, edit 
 *  and get data using ajax
 * 
 **************************************/
 
class AjaxRequest
{
	/*
	 * --------------------
	 * @db DateBase
	 * @_dateNow Date now
	 * --------------------
	 */
	protected $db;
	private $_dateNow;
		
	public function __construct()
	{
		/*
		 * --------------------
		 * Database Connection
		 * --------------------
		 */
		 
		$this->db = SPDO::singleton();
		$this->_dateNow = date( 'Y-m-d G:i:s', time() );
	}
	
	public function getSettings() {
    	/*
		 * -----------------------
		 * get Settings from Admin
		 * -----------------------
		 */
        $post = $this->db->query("
        SELECT
        title,
        description,
        keywords,
        message_length,
        post_length,
        ad
        FROM admin_settings ");
        return $post->fetch( PDO::FETCH_OBJ );
    }
	
	public function getPhotoPost() {
		/*
		 * --------------------------------------
		 * get photo of post, when delete an post
		 * --------------------------------------
		 */
		
		$query = $this->db->prepare("
		SELECT photo FROM posts WHERE id = :id_post && user = :user");
		$query->execute( array( ':id_post' => $_POST['id'], ':user' => $_SESSION['authenticated'] ) );
		return $query->fetch( PDO::FETCH_OBJ  );
		$this->db = null;
	}
	
	public function infoUserLive( $usr ) {
   	   /*
		 * --------------------------------------------
		 * get info user in live, name, username, etc..
		 * -------------------------------------------
		 */
   	   if ( isset( $usr ) )
		{
			$sql = "
			SELECT 
			U.username,
			U.name,
			U.avatar,
			U.email,
			U.type_account,
			U.password,
			U.mode,
			P.bg,
			P.bg_position,
			P.bg_attachment,
			P.color_link,
			P.bg_color,
			P.cover_image
			FROM users U
			LEFT JOIN profile_design P ON U.id = P.user 
			WHERE U.id = ?
			";
			
			$data = $this->db->prepare( $sql );
			
			if ( $data->execute( array( $usr ) ) )
			{
				
				return $data->fetch( PDO::FETCH_OBJ );
				$this->db = null;
			}
			
		}// END ISSET
    }//<--- * END FUNCTION *-->
    
    public function checkUser( $id ) {
		 /*
		 * --------------------------------------------
		 * check if the user is valid
		 * @$id ID of user
		 * -------------------------------------------
		 */
		 
		$id = (int)$id;
		$sql = $this->db->prepare( "SELECT id FROM users WHERE id = :id && status = 'active'" );
		$sql->execute( array(  ':id' => $id ) );
		$response = $sql->fetch();
		
		if( !empty( $response ) )
		{
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkEmail( $mail ) {
		/*
		 * --------------------------------------------
		 * check if the Email is valid
		 * @$mail Email of user
		 * -------------------------------------------
		 */
		$sql = $this->db->prepare( "SELECT id FROM users WHERE email = :mail && status = 'active'" );
		$sql->execute( array(  ':mail' => $mail ) );
		$response = $sql->fetch();
		
		if( !empty( $response ) )
		{
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkFollow( $follower, $following ) {
		/*
		 * ----------------------------------------------
		 * Namely follow up status
		 * ----------------------------------------------
		 */
		$follower  = (int)$follower;
		$following = (int)$following;
		
		$query = $this->db->prepare("
		SELECT status FROM followers WHERE follower = ? && following = ?");
		$query->execute( array( $follower, $following ) );
		return $query->fetchall();
		$this->db = null;
	}
	
	public function checkReportPost( $user, $reported ) {
		/*
		 * ----------------------------------------------
		 * know whether a publication has been reported 
		 * by the user
		 * ----------------------------------------------
		 */
		$user     = (int)$user;
		$reported = (int)$reported;
		
		$query = $this->db->prepare("
		SELECT id FROM post_reported WHERE user = ? && post_reported = ?");
		$query->execute( array( $user, $reported ) );
		return $query->fetchall();
		$this->db = null;
	}
	
	public function checkReportUser( $user, $reported ) {
		/*
		 * ----------------------------------------------
		 * Know whether a user has been reported
		 * ----------------------------------------------
		 */
		$user     = (int)$user;
		$reported = (int)$reported;
		
		$query = $this->db->prepare("
		SELECT id FROM users_reported WHERE user = ? && id_reported = ?");
		$query->execute( array( $user, $reported ) );
		return $query->fetchall();
		$this->db = null;
	}
	
		public function checkUserBlock( $user, $blocked ) {
		/*
		 * ----------------------------------------------
		 * Know whether a user has been blocked
		 * ----------------------------------------------
		 */
		$user    = (int)$user;
		$blocked = (int)$blocked;
		
		$query = $this->db->prepare("
		SELECT status FROM block_user WHERE user = ? && user_blocked = ?");
		$query->execute( array( $user, $blocked ) );
		return $query->fetchall();
		$this->db = null;
	}
	
    public function checkPost( $id, $token ) {
		/*
		 * ----------------------------------------------
		 * know if publication exists in the database
		 * ----------------------------------------------
		 */
		$id    = (int)$id;
		
		$sql = $this->db->prepare( "SELECT id FROM posts WHERE id = ? && token_id = ? && status = '1'" );
		$sql->execute( array( $id, $token ) );
		$response = $sql->fetch();
		
		if( !empty( $response ) )
		{
			return true;
		}
		else {
			return false;
		}
	}
    
	public function getMaxId( $id, $table ) {
		/*
		 * @ $id : NAME ROW ID
		 * @ $table : NAME TABLE
		 * */
		$sql = $this->db->prepare( " SELECT MAX(".$id.") FROM ". $table ." " );
		
		if( $sql->execute( array( $id, $table ) ) )
		{
			while( $res = $sql->fetch() )
			{
				$maxId = $res[0];
			}
			return $maxId;
			$this->db = null;
		}
	}//<----------- end Method
	
	
	public function checkUsername( $username ) {
		/*
		 * -----------------------
		 * VERIFIED USERNAME
		 * -----------------------
		 */
		$post = $this->db->prepare("SELECT username FROM users WHERE username = :user");
		$post->execute( array( ':user' => $username ));
		return $post->fetchall();
		$this->db = null;
	}
	
	public function signUp() {
   	    /*
		 * ----------------------------------------------
		 * sign up
		 * 1) Verified username, if is available
		 * insert into database
		 * ----------------------------------------------
		 */
   		$verifiedUsername = self :: checkUsername( $_POST['username'] ) ? 1 : 0;
   		
		if( $verifiedUsername == 1 )
		{
			return( 2 );
		}
		
		/*
		 * -----------------------
		 * Insert User
		 * -----------------------
		 */
	    $sql = "
	    INSERT INTO users 
	    VALUES(
	    null,
	    ?,
	    ?,
	    '',
	    'xx',
	    ?,
	    ?,
	    '".$this->_dateNow."',
	    '',
	    '',
	    'avatar.png',
	    ?,
	    '0',
	    '1',
	    'pending'
		);";
		
		$password = sha1( $_POST['password'] );
		
		$stmt  = $this->db->prepare( $sql );
		
		$stmt->bindValue( 1, $_POST['username'], PDO::PARAM_STR);
		$stmt->bindValue( 2, $_POST['full_name'], PDO::PARAM_STR );
		$stmt->bindValue( 3, $password, PDO::PARAM_STR );
		$stmt->bindValue( 4, $_POST['email'], PDO::PARAM_STR );
		$stmt->bindValue( 5, $_POST['code'], PDO::PARAM_STR );
		

		$stmt = $stmt->execute();
		
		/*
		 * -----------------------
		 * User ID inserted
		 * -----------------------
		 */
		$idUsr = $this->db->lastInsertId( $stmt );

		if ( $stmt == true )
		{
			
			//============================================================//
			//=                * INSERT PROFILE DESIGN *                 =//
			//============================================================//
			$profileDesign = $this->db->prepare("
			INSERT INTO profile_design
			VALUES
			(
			null,
			?,
			'0.jpg',
			'left',
			'fixed',
			'#0088E2',
			'#000000',
			''
			)");
			$profileDesign->execute( array( $idUsr ) );
			
			return ( 1 );
			
		}
		$this->db = null;
   }//<-- end Method
   
   public function signIn() {
   	 /*
	 * -----------------------
	 * Sign in
	 * -----------------------
	 */
   	 $pass = sha1( $_POST['password'] );
	 $user = $_POST['user'];
	 
   	 $sql = "
   	 SELECT 
   	 id, 
   	 username
   	 FROM users
   	 WHERE username = :user && password = :pass && status = 'active' ||
   	 email = :user && password = :pass && status = 'active'";
	 
	 $query = $this->db->prepare( $sql );
	  if( $query->execute( 
	  						  array( 
	  						  ':user' => $user, 
	  						  ':pass' => $pass
	  						  ) 
							 ) 
			               )
		{
			return $query->fetch( PDO::FETCH_ASSOC );
		}
	  $this->db = null;
	 
   }//<-- end Method
   
   public function loginAdmin() {
   	 /*
	 * -----------------------
	 * Log in Admin
	 * -----------------------
	 */

   	 $pass = sha1( $_POST['pass'] );
	 $user = $_POST['usr'];
	 
   	 $sql = "
   	 SELECT 
   	 id, 
   	 user,
   	 name
   	 FROM admin
   	 WHERE user = :user && pass = :pass && status = 'active'";
	 
	 $query = $this->db->prepare( $sql );
	  if( $query->execute( 
	  						  array( 
	  						  ':user' => $user, 
	  						  ':pass' => $pass
	  						  ) 
							 ) 
			               )
		{
			return $query->fetch( PDO::FETCH_ASSOC );
		}
	  $this->db = null;
	 
   }//<-- end Method
   
   public function insertPost() {
   	/*
	 * -----------------------
	 * Insert Post
	 * -----------------------
	 */
   	 $sql = "
   	 INSERT INTO posts 
   	 VALUES(
   	 null,
   	 ?,
   	 ?,
   	 ?,
   	 ?,
   	 ?,
   	 ?,
   	 ?,
   	 ?,
   	 '1',
   	 ?,
   	 '".$this->_dateNow."'
   	 );
   	 ";
	 
	    $stmt  = $this->db->prepare( $sql );
		$stmt->bindValue( 1, $_POST['token_id'], PDO::PARAM_STR);
		$stmt->bindValue( 2, $_POST['add_post'], PDO::PARAM_STR );
		$stmt->bindValue( 3, $_POST['photoId'], PDO::PARAM_STR );
		$stmt->bindValue( 4, $_POST['video_code'], PDO::PARAM_STR );
		$stmt->bindValue( 5, $_POST['video_title'], PDO::PARAM_STR );
		$stmt->bindValue( 6, $_POST['video_site'], PDO::PARAM_STR );
		$stmt->bindValue( 7, $_POST['video_url'], PDO::PARAM_STR );
		$stmt->bindValue( 8, $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->bindValue( 9, $_POST['video_thumbnail'], PDO::PARAM_STR );
		
		$stmt = $stmt->execute();
		
		/*
		 * -----------------------
		 * Get ID Post
		 * -----------------------
		 */
		$idPost = $this->db->lastInsertId( $stmt );
		
		if ( $stmt == true )
		{
			/*
			 * -----------------------------
			 * Insert Hashtag in Database
			 * ----------------------------
			 */
			preg_match_all('~([#])([^\s#]+)~', $_POST['add_post'], $matches );
			foreach ( $matches as $key ){
			}
			$numHashTag = count( $matches[1] );
			
			for ( $i = 0; $i < $numHashTag; $i++ )
			{
				$query = $this->db->prepare("
						INSERT INTO trends_topic
						VALUES
						(
						?,
						?,
						'". $this->_dateNow."'
						)");
						$query->execute( array( $_SESSION['authenticated'], $key[$i] ) );
			}
			
			/*--------------------
			 * Return ID of post
			 * ------------------
			 */
			return $idPost;
		}
		$this->db = null;
   }//<-- end Method
   
   public function deletePost() {
   	/*
	 * -----------------------------
	 * Delete Post
	 * ----------------------------
	 */
   	 $sql = $this->db->prepare( "UPDATE posts SET status = '0' WHERE id = :_id && token_id = :_token && user = :_user");
   	 $sql->execute( array( ':_id' => $_POST['id'], ':_token' => $_POST['token'], ':_user' => $_POST['user'] ) );
	 
	 if ( $sql->rowCount() != 0 )
		{
			return( 1 );
		}
		$this->db = null;
   }//<-- end Method
   
   public function favsUser( $where, $_session, $_id ) {
   		/*
		 * -----------------------------
		 * $_session : Current session
		 * $_id      : $id Post
		 * Favorites User
		 * ----------------------------
		 */
		$query = $this->db->prepare("
		SELECT 
		status
		FROM favorites
		WHERE id_usr = ? && 
		id_favorite = ?
		".$where."
		");
		$query->execute( array( $_session, $_id ) );
		return $query->fetchall();
		$this->db = null;
	}
	
   
   public function favorites() {
   	/*
	 * ----------------------------------------------------------------------------
	 *  Add, Remove Favorites
	 * @$active  :"Check to see if the user has already added prior to Favourites"
	 * @verified : "Check if the publication exists"
	 * ----------------------------------------------------------------------------
	 */
	 
   	$active   = self :: favsUser( null, $_SESSION['authenticated'], $_GET['id'] );
   	$verified = self :: checkPost( $_GET['id'], $_GET['token'] ) ? 1 : 0;
	
	if( $verified == 1 && empty( $active ) )
	{
		/** If not exists, insert new record  **/
		$sql = $this->db->prepare("INSERT INTO favorites VALUES( null, ?, ?, '1', '".$this->_dateNow."' );");
	    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$sql->bindValue( 2, $_GET['id'], PDO::PARAM_INT );
		$sql->execute();
		if( $sql->rowCount() !=  0 )
		{
			return( 1 );
		}
		
	}
	
	if( $verified == 1 && !empty( $active ) && $active[0]['status'] == '1' )
	{
		/** If exists, update status to Delete/Trash  **/
		$sql = $this->db->prepare("UPDATE favorites SET status = '0' WHERE id_usr = ? && id_favorite = ? ");
	    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$sql->bindValue( 2, $_GET['id'], PDO::PARAM_INT );
		$sql->execute();
		if( $sql->rowCount() !=  0 )
		{
			return( 2 );
		}
	}
	else if ( $verified == 1 && !empty( $active ) && $active[0]['status'] == '0' )
		{
			/** If exists and status == Delete/Trash, update status to Active  **/
			$sql = $this->db->prepare("UPDATE favorites SET status = '1' WHERE id_usr = ? && id_favorite = ? ");
		    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
			$sql->bindValue( 2, $_GET['id'], PDO::PARAM_INT );
			$sql->execute();
		if( $sql->rowCount() !=  0 )
		{
			return( 3 );
		}
	}
		return false;
	   	$this->db = null;
		
   }//<-- end
   
   public function follow() {
   	/*
	 * ----------------------------------------------------------------------------
	 * Follow, Unfollow users
	 * @$active  :"Check to see if the user has already follower"
	 * @verified : "Check if the user exists"
	 * ----------------------------------------------------------------------------
	 */
	 
   	$active   = self :: checkFollow( $_SESSION['authenticated'], $_POST['id'] );
   	$verified = self :: checkUser( $_POST['id'] ) ? 1 : 0;
	
	if( $verified == 1 && empty( $active ) )
	{
		/** If not exists, insert new record  **/
		$sql = $this->db->prepare("INSERT INTO followers VALUES( null, ?, ?, '1', '".$this->_dateNow."' );");
	    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$sql->bindValue( 2, $_POST['id'], PDO::PARAM_INT );
		$sql->execute();
		
		if( $sql->rowCount() !=  0 )
		{
			return( 1 );
		}
		
	}
	
	if( $verified == 1 && !empty( $active ) && $active[0]['status'] == '1' )
	{
		/** If exists, update status to Delete/Trash  **/
		$sql = $this->db->prepare("UPDATE followers SET status = '0' WHERE follower = ? && following = ? ");
	    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$sql->bindValue( 2, $_POST['id'], PDO::PARAM_INT );
		$sql->execute();
		
		if( $sql->rowCount() !=  0 )
		{
			return( 2 );
		}
	}
	else if ( $verified == 1 && !empty( $active ) && $active[0]['status'] == '0' )
		{
			/** If exists and status == Delete/Trash, update status to Active  **/
			$sql = $this->db->prepare("UPDATE followers SET status = '1' WHERE follower = ? && following = ? ");
		    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
			$sql->bindValue( 2, $_POST['id'], PDO::PARAM_INT );
			$sql->execute();
			
		if( $sql->rowCount() !=  0 )
		{
			return( 3 );
		}
	}
	return false;
   	$this->db = null;
   }//<-- end
   
    public function getAllPosts( $_where, $_limit, $session ) {
		    /*
			 * -----------------------------
			 * Get all Post in "Index page"
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * -----------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FA.id ) favoriteUser,
			P.id,
			P.token_id,
			P.post_details,
			P.photo,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			P.user,
			P.date,
			U.id user_id,
			U.name,
			U.username,
			U.avatar,
			U.type_account,
			U.mode
			FROM posts P
			LEFT JOIN users U ON P.user = U.id
			LEFT JOIN followers F ON P.user = F.following
			LEFT JOIN favorites  FA ON P.id = FA.id_favorite && FA.id_usr = :id && FA.status = '1'
			". $_where ." && U.status = 'active' && P.status = '1'
			GROUP BY P.id
			ORDER BY P.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	 public function discover( $_where, $_limit, $session ) {
		    /*
			 * --------------------------------
			 * Get all Post in "Discover Page"
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * --------------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FA.id ) favoriteUser,
			COUNT(DISTINCT F.id ) followActive,
			COUNT(DISTINCT B.id) blockUser,
			P.id,
			P.token_id,
			P.post_details,
			P.photo,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			P.user,
			P.date,
			U.id user_id,
			U.name,
			U.username,
			U.avatar,
			U.type_account,
			U.mode
			FROM posts P
			LEFT JOIN users U ON P.user = U.id
			LEFT JOIN followers F ON P.user = F.following && F.follower = :id
			LEFT JOIN favorites  FA ON P.id = FA.id_favorite && FA.id_usr = :id && FA.status = '1'
			LEFT JOIN block_user B ON U.id = B.user && B.user_blocked = :id && B.status = '1'
			". $_where ."
			GROUP BY P.id
			ORDER BY P.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	public function connect( $_where, $_limit, $session ) {
		    /*
			 * ------------------------------------
			 * Get all Mentions in "Connect page"
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * ------------------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FA.id ) favoriteUser,
			P.id,
			P.token_id,
			P.post_details,
			P.photo,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			P.user,
			P.date,
			U.id user_id,
			U.name,
			U.username,
			U.avatar,
			U.type_account,
			U.mode
			FROM posts P
			LEFT JOIN users U ON P.user = U.id
			LEFT JOIN favorites  FA ON P.id = FA.id_favorite && FA.id_usr = :id && FA.status = '1'
			". $_where ."
			GROUP BY P.id
			ORDER BY P.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	public function getPostsFavs( $_where, $_limit, $session ) {
		    /*
			 * -----------------------------
			 * Get Post Favorites
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * -----------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FA.id ) favoriteUser,
			P.id,
			P.token_id,
			P.photo,
			P.post_details,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			P.user,
			P.date,
			U.name,
			U.username,
			U.avatar,
			U.type_account
			FROM posts P
			LEFT JOIN users U ON P.user = U.id
			LEFT JOIN favorites F ON P.id = F.id_favorite && F.status = '1'
			LEFT JOIN favorites  FA ON P.id = FA.id_favorite && FA.id_usr = :id && FA.status = '1'
			". $_where ." && U.status = 'active' && P.status = '1' && F.status = '1'
			GROUP BY P.id
			ORDER BY F.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	public function getFollowers( $_where, $_limit, $session ) {
			/*
			 * -----------------------------
			 * Get Followers
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * -----------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FO.id ) followActive,
			U.id,
			U.username,
			U.name,
			U.avatar,
			U.type_account,
			U.bio
			FROM users U
			LEFT JOIN followers F ON U.id = F.follower
			LEFT JOIN followers  FO ON U.id = FO.following && FO.follower = :id && FO.status = '1'
			". $_where ." && U.status = 'active' && F.status = '1'
			GROUP BY U.id
			ORDER BY F.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	public function getFollowing( $_where, $_limit, $session ) {
		    /*
			 * -----------------------------
			 * Get Following
			 * $_where : Condition
			 * $_limit : Limit of post
			 * $_session: Current Session
			 * -----------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			COUNT(DISTINCT FO.id ) followActive,
			U.id,
			U.username,
			U.name,
			U.avatar,
			U.type_account,
			U.bio
			FROM users U
			LEFT JOIN followers F ON U.id = F.following
			LEFT JOIN followers  FO ON U.id = FO.following && FO.follower = :id && FO.status = '1'
			". $_where ." && U.status = 'active' && F.status = '1'
			GROUP BY U.id
			ORDER BY F.id DESC
			". $_limit ."
			" );
			
			if( $sql->execute(  array( ':id' => $session )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
			
	}//<--- * END FUNCTION *-->
	
	public function getMedia( $_id, $_token ) {
			/*
			 * -------------------------------------------
			 * Get photos / videos of the publications
			 * $_id : ID Publication/Post
			 * $_token : Token unique of Publication/Post
			 * -------------------------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			P.id,
			P.token_id,
			P.photo,
			P.post_details,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			P.user,
			P.date,
			U.username
			FROM posts P
			LEFT JOIN users U ON P.user = U.id
			WHERE P.id = :id && P.token_id = :token && P.status = '1'
			" );
			
			if( $sql->execute(  array( ':id' => $_id, ':token' => $_token  )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<--- * END FUNCTION *-->
	
	public function getFavorites( $_id ) {
			/*
			 * ------------------------
			 * Get Favorites
			 * $_id : ID Publication/Post
			 * ----------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			U.username,
			U.name,
			U.avatar
			FROM users U
			LEFT JOIN favorites F ON U.id = F.id_usr && F.status = '1'
			LEFT JOIN posts P ON F.id_favorite = P.id
			WHERE P.id = :id
			ORDER BY F.date ASC
			LIMIT 10
			" );
			
			if( $sql->execute(  array( ':id' => $_id  )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<--- * END FUNCTION *-->
	
	public function getReply( $_id ) {
			/*
			 * ------------------------
			 * Get Replys
			 * $_id : ID Publication/Post
			 * ----------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			U.id,
			U.username,
			U.name,
			U.avatar,
			U.type_account,
			R.id idReply,
			R.reply,
			R.date
			FROM users U
			LEFT JOIN reply R ON U.id = R.user && R.status = '1'
			LEFT JOIN posts P ON R.post = P.id
			WHERE P.id = :id && R.status = '1'
			ORDER BY R.date DESC
			LIMIT 5
			" );
			
			if( $sql->execute(  array( ':id' => $_id  )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<--- * END FUNCTION *-->
	
	public function sendReply() {
		/*
		 * -------------------------------
		 * Send Reply
		 * @checkPost : 
		 * Check if the publication exists
		 * -------------------------------
		 */	
		$checkPost = self :: checkPost( $_POST['id_reply'],  $_POST['token_reply'] ) ? 1 : 0;
		
		if( $checkPost == 1 )
		{
			$sql = "
			INSERT INTO reply
			VALUES
			(
			null,
			?,
			?,
			?,
			'".$this->_dateNow."',
			'1'
			)";
			
			$stmt = $this->db->prepare( $sql );
			$stmt->bindValue( 1, $_POST['id_reply'], PDO::PARAM_INT );
			$stmt->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT );
			$stmt->bindValue( 3, $_POST['reply_post'], PDO::PARAM_INT );
			$stmt = $stmt->execute();
			
			/* Retrieve ID inserted */
			$id_reply = $this->db->lastInsertId( $stmt );
			
			if( $stmt == true )
			{
				return $id_reply;
			}
		}
	}//<--- * END FUNCTION *-->	
	
	public function deleteReply() {
   	/*
		 * ------------------------
		 * Delete Reply
		 * ----------------------
		 */	
		 
   	 $sql = $this->db->prepare( "UPDATE reply SET status = '0' WHERE id = :_id && user = :_user && status = '1' ");
   	 $sql->execute( array( ':_id' => $_GET['id'], ':_user' => $_SESSION['authenticated'] ) );
	 
	 if ( $sql->rowCount() != 0 )
		{
			return( 1 );
		}
	 else {
		 return false;
	 }
		$this->db = null;
   }//<-- end Method
   
   public function reportPost() {
   	/*
	 * ------------------------
	 * Report Post
	 * @$reported : verify if you have not reported
	 * @$verified: Check if the publication exists
	 * ----------------------
	 */	
		 
   	 $reported = self :: checkReportPost( $_SESSION['authenticated'], $_POST['_postId'] ) ? 1 : 0;
   	 $verified = self :: checkPost( $_POST['_postId'], $_POST['_token'] ) ? 1 : 0;
   	 
   	 if( $verified == 1 )
	 {
	 	if( $reported == 0 )
		{
			$sql = $this->db->prepare( "INSERT INTO post_reported VALUES( null, :_user, :_post, '".$this->_dateNow."' );");
   	        $sql->execute( array( ':_user' => $_SESSION['authenticated'], ':_post' => $_POST['_postId'] ) );
	 
			 if ( $sql->rowCount() != 0 )
				{
					return( 1 );
				}
			 else {
				 return false;
			 }
			 $this->db = null;
		}
		/* If the user already reported the publication */
		else {
			return( 3 );
		}
	 	
	 }
	 /* If no exists post */
	 else {
		 	return( 2 );
	 }
   }//<<<-- End Function -->>>
   
   public function reportUser() {
   	 /*
	 * ------------------------
	 * Report User
	 * @$reported : verify if you have not reported
	 * @$verified: Check if the User exists
	 * ----------------------
	 */	
   	 $reported = self::checkReportUser( $_SESSION['authenticated'], $_POST['_userId'] ) ? 1 : 0;
   	 $verified = self::checkUser( $_POST['_userId'] ) ? 1 : 0;
   	 
   	 if( $verified == 1 )
	 {
	 	if( $reported == 0 )
		{
			$sql = $this->db->prepare( "INSERT INTO users_reported VALUES( null, :_user, :_userId, '".$this->_dateNow."' );");
   	        $sql->execute( array( ':_user' => $_SESSION['authenticated'], ':_userId' => $_POST['_userId'] ) );
	 
			 if ( $sql->rowCount() != 0 )
				{
					return( 1 );
				}
			 else {
				 return false;
			 }
			 $this->db = null;
		}
		/* If the user already reported User */
		else {
			return( 3 );
		}
	 	
	 }
	 /* If no exists user */
	 else {
		 	return( 2 );
	 }
   }//<<<-- End Function -->>>
   
   public function blockUser() {
    /*
	 * ------------------------
	 * Block User
	 * @$reported : verify if you have not Blocked
	 * @$verified: Check if the user exists
	 * ----------------------
	 */	
	 
	$reported = self::checkUserBlock( $_SESSION['authenticated'], $_POST['_userId'] );
   	$verified = self::checkUser( $_POST['_userId'] ) ? 1 : 0;

	
	if( $verified == 1 && empty( $reported ) )
	{
		$sql = $this->db->prepare( "INSERT INTO block_user VALUES( null, :_user, :_userId, '".$this->_dateNow."', '1' );");
   	        $sql->execute( array( ':_user' => $_SESSION['authenticated'], ':_userId' => $_POST['_userId'] ) );
	 
			 if ( $sql->rowCount() != 0 )
				{
					//================== UPDATE FOLLOWERS TO STATUS TRASH ============//
					$update = "UPDATE followers SET status = '0' 
					WHERE follower = ? && following = ?";
					$exec   = $this->db->prepare( $update );
					$exec->bindValue( 1, $_POST['_userId'], PDO::PARAM_INT ); 
					$exec->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT  );
					$exec->execute();
					
					//================= UPDATE FOLLOWING TO STATUS TRASH ==============//
					$update2 = "UPDATE followers SET status = '0' 
					WHERE follower = ? && following = ?";
					$exe   = $this->db->prepare( $update2 );
					$exe->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
					$exe->bindValue( 2, $_POST['_userId'], PDO::PARAM_INT  );
					$exe->execute();
					
					return( 1 );
				}
	}
	
	if( $verified == 1 && !empty( $reported ) && $reported[0]['status'] == '1' )
	{
		$sql = $this->db->prepare("UPDATE block_user SET status = '0' WHERE user = ? && user_blocked = ?");
	    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$sql->bindValue( 2, $_POST['_userId'], PDO::PARAM_INT );
		$sql->execute();
		if( $sql->rowCount() !=  0 )
		{
			//================== UPDATE FOLLOWERS TO STATUS ACTIVE "IF EXISTS" ============//
					$update = "UPDATE followers SET status = '1' 
					WHERE follower = ? && following = ?";
					$exec   = $this->db->prepare( $update );
					$exec->bindValue( 1, $_POST['_userId'], PDO::PARAM_INT ); 
					$exec->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT  );
					$exec->execute();
					
					//================= UPDATE FOLLOWING  TO STATUS ACTIVE "IF EXISTS" ==============//
					$update2 = "UPDATE followers SET status = '1' 
					WHERE follower = ? && following = ?";
					$exe   = $this->db->prepare( $update2 );
					$exe->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
					$exe->bindValue( 2, $_POST['_userId'], PDO::PARAM_INT  );
					$exe->execute();
					
					return( 2 );
		}
	}
	else if ( $verified == 1 && !empty( $reported ) && $reported[0]['status'] == '0' )
		{
			$sql = $this->db->prepare("UPDATE block_user SET status = '1' WHERE user = ? && user_blocked = ? ");
		    $sql->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
			$sql->bindValue( 2, $_POST['_userId'], PDO::PARAM_INT );
			$sql->execute();
		if( $sql->rowCount() !=  0 )
		{
			   //================== UPDATE FOLLOWERS TO STATUS TRASH ============//
					$update = "UPDATE followers SET status = '0' 
					WHERE follower = ? && following = ?";
					$exec   = $this->db->prepare( $update );
					$exec->bindValue( 1, $_POST['_userId'], PDO::PARAM_INT ); 
					$exec->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT  );
					$exec->execute();
					
					//================= UPDATE FOLLOWING  TO STATUS TRASH ==============//
					$update2 = "UPDATE followers SET status = '0' 
					WHERE follower = ? && following = ?";
					$exe   = $this->db->prepare( $update2 );
					$exe->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
					$exe->bindValue( 2, $_POST['_userId'], PDO::PARAM_INT  );
					$exe->execute();
			return( 3 );
		}
	}
	return false;
   	$this->db = null;
   }//<<<-- End Function -->>>
	
	
	public function updateProfile() {
		/*
		 * ------------------------
		 * Update Name, Location, 
		 * website, Bio in Profile
		 * ----------------------
		 */
		$sql = "UPDATE users SET name = :name, location= :location, website = :web, bio = :bio WHERE id = :user";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':name', $_POST['name'], PDO::PARAM_STR );
		$stmt->bindValue( ':location', $_POST['location'], PDO::PARAM_STR );
		$stmt->bindValue( ':web', $_POST['website'], PDO::PARAM_STR );
		$stmt->bindValue( ':bio', $_POST['bio'], PDO::PARAM_STR );
		$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		
		if ( $stmt->rowCount() != 0 )
		{
			return( 1 );
		}
		 else {
			 return false;
		 }
		$this->db = null;
	}
	
	public function updateSettings() {
		/*
		 * ------------------------
		 * Update username, mode, 
		 * country, Bio in Settings
		 * @$verified : Check username availability
		 * ----------------------
		 */
		$verified = self::checkUsername( $_POST['username'] ) ? 1 : 0;
		
		/* If the username is not available */
		if( $verified == 1 )
		{
			return( 2 );
		}
		
		/* Update if the username is true */
		if( $_POST['username'] != '' )
		{
			$sql = "UPDATE users SET username = :username, mode = :mode, country = :country WHERE id = :user";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindValue( ':username', $_POST['username'], PDO::PARAM_STR );
			$stmt->bindValue( ':mode', $_POST['mode'], PDO::PARAM_INT );
			$stmt->bindValue( ':country', $_POST['country'], PDO::PARAM_STR );
			$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
			$stmt->execute();
			
			if ( $stmt->rowCount() != 0 )
			{
				return( 1 );
			}
			 else {
				 return ( 3 );
			 }
		}
		
		/* Update if the e-mail is true */
		if( $_POST['email'] != '' ){
		$sql = "UPDATE users SET email= :email, mode = :mode, country = :country WHERE id = :user";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindValue( ':email', $_POST['email'], PDO::PARAM_STR );
			$stmt->bindValue( ':mode', $_POST['mode'], PDO::PARAM_INT );
			$stmt->bindValue( ':country', $_POST['country'], PDO::PARAM_STR );
			$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
			$stmt->execute();
			if ( $stmt->rowCount() != 0 )
			{
				return( 1 );
			}
			 else {
				return ( 3 );
			 }
		}
			/* Update if the username and e-mail is true */
			if( $_POST['email'] != '' && $_POST['username'] != '' )
			{
				$sql = "UPDATE users SET username = :username, email= :email, mode = :mode, country = :country WHERE id = :user";
				$stmt = $this->db->prepare( $sql );
				$stmt->bindValue( ':username', $_POST['username'], PDO::PARAM_STR );
				$stmt->bindValue( ':email', $_POST['email'], PDO::PARAM_STR );
				$stmt->bindValue( ':mode', $_POST['mode'], PDO::PARAM_INT );
				$stmt->bindValue( ':country', $_POST['country'], PDO::PARAM_STR );
				$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
				$stmt->execute();
				if ( $stmt->rowCount() != 0 )
				{
					return( 1 );
				}
				 else {
					  return ( 3 );
				 }
			}
			
			/* Update if the user name, e-mail are not defined */
			if( $_POST['email'] == '' && $_POST['username'] == '' )
			{
				$sql = "UPDATE users SET mode = :mode, country = :country WHERE id = :user";
				$stmt = $this->db->prepare( $sql );
				$stmt->bindValue( ':mode', $_POST['mode'], PDO::PARAM_INT );
				$stmt->bindValue( ':country', $_POST['country'], PDO::PARAM_STR );
				$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
				$stmt->execute();
				if ( $stmt->rowCount() != 0 )
				{
					return( 1 );
				}
				 else {
					 return ( 3 );
				 }
			}
			
			
		$this->db = null;
	}
	
	public function uploadAvatar( $img ) {
   	    /*
		 * ------------------------
		 * Upload Avatar
		 * $img : New image user
		 * -----------------------
		 */
		$sql  = "UPDATE users SET avatar = ? WHERE id = ?";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( 1, $img, PDO::PARAM_STR );
		$stmt->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		$this->db = null;
   }
   
   public function uploadCover( $img ) {
   		/*
		 * ------------------------
		 * Upload Cover
		 * $img : New image user
		 * ----------------------
		 */
		$sql  = "UPDATE profile_design SET cover_image = ? WHERE user = ?";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( 1, $img, PDO::PARAM_STR );
		$stmt->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		$this->db = null;
   }
   
   public function updateTheme( $img ) {
   		/*
		 * ----------------------------
		 * Upload Theme or Background
		 * $img : New image user
		 * ----------------------------
		 */	
		$sql  = "UPDATE profile_design SET bg = ? WHERE user = ?";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( 1, $img, PDO::PARAM_STR );
		$stmt->bindValue( 2, $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		$this->db = null;
   }
   
   public function bottomLess() {
   		/*
		 * ------------------------
		 * Delete Background
		 * ----------------------
		 */
		$sql  = "UPDATE profile_design SET bg = '' WHERE user = ?";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		$this->db = null;
   }
   
   public function updateDesignUser() {
   		/*
		 * -----------------------------
		 * Setting: Background Position,
		 * attachment, Color Link,
		 * Color Background
		 * ---------------------------
		 */
		$sql  = "UPDATE 
		profile_design 
		SET 
		bg_position = :pos, 
		bg_attachment = :attachment, 
		color_link = :link,
		bg_color = :color
		WHERE user = :user";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':pos', $_POST['pos'], PDO::PARAM_STR );
		$stmt->bindValue( ':attachment', $_POST['mosaic'], PDO::PARAM_STR );
		$stmt->bindValue( ':link', $_POST['link'], PDO::PARAM_STR );
		$stmt->bindValue( ':color', $_POST['bg_color'], PDO::PARAM_STR );
		$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		$this->db = null;
   }
   
   public function getAllMedia( $_id, $where, $limit ) {
			/*
			 * -----------------------------
			 * Get All media
			 * $_id : ID User
			 * $where : Condition
			 * $limit : Limit media
			 * ---------------------------
			 */
			$sql = $this->db->prepare( "
			SELECT 
			P.id,
			P.photo,
			P.post_details,
			P.date,
			P.video_code,
			P.video_url,
			P.video_site,
			P.video_thumbnail,
			P.video_title
			FROM posts P
			WHERE P.user = :id && P.status = '1' && P.photo != '' ".$where." 
			|| P.user = :id && P.status = '1' && P.video_code != '' ".$where."
			ORDER BY P.id DESC
			".$limit."
			" );
			
			if( $sql->execute(  array( ':id' => $_id  )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<--- * END FUNCTION *-->
	
	public function sendMessage() {
		/*
		 * ------------------------------------
		 * Send Message Private
		 * @$checkUser : Check if the user exists
		 * ------------------------------------
		 */
		 	
		$checkUser = self :: checkUser( $_POST['id_user'] ) ? 1 : 0;
		
		if( $checkUser == 1 )
		{
			/*-----------------------------------------------
			 * Verify that the recipient not is the sender
			 * ----------------------------------------------
			 */
			if( $_POST['id_user'] != $_SESSION['authenticated'] )
			{
				$sql = "
				INSERT INTO messages
				VALUES
				(
				null,
				?,
				?,
				?,
				'".$this->_dateNow."',
				'new',
				'1'
				)";
				
				$stmt = $this->db->prepare( $sql );
				$stmt->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
				$stmt->bindValue( 2, $_POST['id_user'], PDO::PARAM_INT );
				$stmt->bindValue( 3, $_POST['message'], PDO::PARAM_INT );
			    $stmt->execute();
				
				if( $stmt->rowCount() != 0 )
				{
					return true;
				}
				$this->db = null;
		  }//<<<--- * User != From * --->>>
		}//<<<--- * Check * --->>>
		
	}//<<<--- * END FUNCTION *-->>>	
	
	public function sendMessageId() {
		/*
		 * -----------------------------
		 * Send Message Private ID
		 * @$checkUser : Check if the user exists
		 * ---------------------------
		 */
		$checkUser = self :: checkUser( $_POST['id_reply'] ) ? 1 : 0;
		
		if( $checkUser == 1 )
		{
			/*-----------------------------------------------
			 * Verify that the recipient not is the sender
			 * ----------------------------------------------
			 */
			if( $_POST['id_reply'] != $_SESSION['authenticated'] )
			{
				$sql = "
				INSERT INTO messages
				VALUES
				(
				null,
				?,
				?,
				?,
				'".$this->_dateNow."',
				'new',
				'1'
				)";
				
				$stmt = $this->db->prepare( $sql );
				$stmt->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT );
				$stmt->bindValue( 2, $_POST['id_reply'], PDO::PARAM_INT );
				$stmt->bindValue( 3, $_POST['reply_msg'], PDO::PARAM_INT );
			    $stmt = $stmt->execute();
				
				//============ * ID MSG  * ========//
		       $_idMsg = $this->db->lastInsertId( $stmt );
			   
				if( $stmt == true )
				{
					return $_idMsg;
				}
				$this->db = null;
		  }//<<<--- * User != From * --->>>
		}//<<<--- * Check * --->>>
		
	}//<<<--- * END FUNCTION *-->>>	
	
	public function deleteAccount() {
		/*
		 * -----------------------------
		 * Delete Account
		 * ---------------------------
		 */
		 
		$sql = "UPDATE users SET status = 'delete' WHERE id = :id && status = 'active'";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':id', $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		
		if( $stmt->rowCount() != 0 )
			{
			    //================== UPDATE FOLLOWERS STATUS -> DELETE ============//
				$update = "UPDATE followers SET status = '0' WHERE follower = ?";
				$exec   = $this->db->prepare( $update );
				$exec->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT  );
				$exec->execute();
				
				//================= UPDATE FOLLOWING  STATUS -> DELETE ==============//
				$update2 = "UPDATE followers SET status = '0' WHERE following = ?";
				$exe   = $this->db->prepare( $update2 );
				$exe->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
				$exe->execute();
				
				//================= UPDATE FAVORITES  STATUS -> DELETE ==============//
				$update3 = "UPDATE favorites SET status = '0' WHERE id_usr = ?";
				$_exe   = $this->db->prepare( $update3 );
				$_exe->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
				$_exe->execute();
				
				//================= UPDATE REPLY  STATUS -> DELETE ==============//
				$update4 = "UPDATE reply SET status = '0' WHERE user = ?";
				$_exec   = $this->db->prepare( $update4 );
				$_exec->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
				$_exec->execute();
				
				//================= UPDATE POST  STATUS -> DELETE ==============//
				$update5 = "UPDATE posts SET status = '0' WHERE user = ?";
				$_exec_   = $this->db->prepare( $update5 );
				$_exec_->bindValue( 1, $_SESSION['authenticated'], PDO::PARAM_INT ); 
				if( $_exec_->execute() )
			    {
			    	/* Get all photos of Publications/Posts */
				    $querySql = $this->db->prepare("SELECT photo FROM posts WHERE user = ? && photo != '' ");
					
					if( $querySql->execute( array( $_SESSION['authenticated'] ) ) )
					{
						
						while( $row = $querySql->fetch( PDO::FETCH_ASSOC ) )
						{
							/*
							 * ------------------------------------------
							 * Delete all photos, publications you made.
							 * ------------------------------------------
							 */
							$total = count( $row );
							$root = '../../upload/'.$row['photo'];
							
							if( $total != 0 )
							{
								if( file_exists( $root ) )
								{
									unlink( $root );
								}
							}
							
						}
					}//<--- * End Delete Photos Posts * --->
			    	
			    }
				
				/*
				 * ----------------------------------------
				 * Delete Cover and Background
				 * ---------------------------------------
				 */
			    $_querySql = $this->db->prepare("SELECT bg, cover_image 
			    FROM profile_design WHERE user = ?");
					
					if( $_querySql->execute( array( $_POST['id'] ) ) )
					{
						$defaults  = array( '0.jpg', '1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg','11.jpg' );
		
						while( $row = $_querySql->fetch( PDO::FETCH_ASSOC ) )
						{
							$rootCover = '../cover/'.$row['cover_image'];
							$rootBg    = '../backgrounds/'.$row['bg'];
								
								//<<-- Cover
								if( file_exists( $rootCover ) && $row['cover_image'] != '' )
								{
									unlink( $rootCover );
								}
								//<<-- Background
								if( file_exists( $rootBg ) && !in_array( $row['bg'], $defaults ) && $row['bg'] != '' )
								{
									unlink( $rootBg );
								}
						}
					}//<--- * End Delete Bg - Cover * --->
					
			    return true;
			}
		$this->db = null;
	}
	
	public function updatePassword() {
		/*
		 * ----------------------------------------
		 *  Update Password 
		 *  from Page http://sitename.com/password/
		 * ----------------------------------------
		 */
		$pass        = sha1( $_POST['confirm'] );
		$currentPass = sha1( $_POST['current'] );
		$sql = "UPDATE users SET password = :pass WHERE id = :user && password = :currentPass";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':pass', $pass, PDO::PARAM_STR );
		$stmt->bindValue( ':currentPass', $currentPass, PDO::PARAM_STR );
		$stmt->bindValue( ':user', $_SESSION['authenticated'], PDO::PARAM_INT );
		$stmt->execute();
		if ( $stmt->rowCount() != 0 )
		{
			return true;
		}
		 else {
			 return false;
		 }
		$this->db = null;
	}//<<< * End * -->>>>
	
	public function updatePasswordRecover() {
		/*
		 * -------------------------------------------------
		 *  Update password Recover
		 *  from Page http://sitename.com/recover/ID_HASH
		 * -------------------------------------------------
		 */
		if ( preg_match( '/[^a-z0-9\_\-]/i',$_POST['idhash'] ) )
		{
			return false;
		}
		
		$pass = sha1( $_POST['pass_2'] );
		$sql = "UPDATE 
		users U 
		INNER JOIN recover_pass R ON U.email = R.email
		SET 
		U.password = :pass,
		R.verified = '1',
		R.date_update = '".$this->_dateNow."'
		WHERE R.id_hash = :idhash";
		
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':pass', $pass, PDO::PARAM_STR );
		$stmt->bindValue( ':idhash', $_POST['idhash'], PDO::PARAM_INT );
		
		if ( $stmt->execute() )
		{
			return true;
		}
		 else {
			 return false;
		 }
		$this->db = null;
	}//<<< * End * -->>>>
	
	public function getMessages( $_id, $where, $limit ) {
		/*
		 * ----------------------------------------
		 * Get messages private
		 * $_id : ID User
		 * $where : Condition
		 * $limit : Limit Messages
		 * ---------------------------------------
		 */
		$sql = $this->db->prepare( "
		SELECT 
	    mm.recipient_id,
	    m.*,
	    U.id id_user,
		U.username,
		U.name,
		U.type_account,
		U.avatar,
		U2.id id_2,
		U2.username username2,
		U2.name name2,
		U2.type_account type_account2,
		U2.avatar avatar2
		FROM (
		  SELECT
		  `from`,
		  `to`,
		    `from` + `to` - 1 as recipient_id,
		    Max(id) as id
		  FROM
		    messages
		  WHERE
		    `from` = :id && remove_from = '1' ".$where." ||
		    `to` = :id && remove_from = '1' ".$where."
		  GROUP BY
		    `from` + `to` - 1
		  ) mm
		    INNER JOIN
		  messages m
		    On
		  mm.id = m.id
		  LEFT JOIN users U ON U.id = mm.`to`
		  LEFT JOIN users U2 ON U2.id = mm.`from` 
		  ORDER BY date DESC
  			".$limit."
		");
		if( $sql->execute(  array( ':id' => $_id  )  ) )
			{
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<<<<-- * End * --->>>>
	
	public function getMessageId( $_from, $_to ) {
		/*
		 * ----------------------------------------
		 * Get messages by ID
		 * $_from : User From/Sender
		 * $_to : User To/Addressee
		 * ---------------------------------------
		 */
		$sql = $this->db->prepare( "
		SELECT 
		M.id,
		M.to,
		M.from,
		M.message,
		M.date,
		M.status,
		U.id id_user,
		U.username,
		U.name,
		U.type_account,
		U.avatar
		FROM messages M
		LEFT JOIN users U ON U.id = M.`from`
		WHERE `from` = :from && `to` = :to && remove_from = '1' || 
		`from` = :to && `to` = :from && remove_from = '1'
		GROUP BY M.id
		ORDER BY date ASC
		");
		if( $sql->execute(  array( ':from' => $_from, ':to' => $_to  )  ) )
			{
				//<<<--- Msg Read --->>>
				$_sql = $this->db->prepare( "UPDATE messages SET status = 'readed' WHERE `from` = :_from && `to` = :_user ");
   				$_sql->execute( array( ':_from' => $_from, ':_user' => $_SESSION['authenticated'] ) );
	 
				return  $sql->fetchall( PDO::FETCH_ASSOC );
			}
	}//<<<<-- * End * --->>>>
	
	public function deleteMsg() {
   	/*
	 * -------------------
	 * Delete Messages
	 * -------------------
	 */
   	 $sql = $this->db->prepare( "UPDATE messages SET remove_from = '0' WHERE id = :_id && `from` = :_user && remove_from = '1' ");
   	 $sql->execute( array( ':_id' => $_POST['_msgId'], ':_user' => $_SESSION['authenticated'] ) );
	 
	 if ( $sql->rowCount() != 0 )
		{
			return( 1 );
		}
	 else {
		 return false;
	 }
		$this->db = null;
   }//<-- end Method
   
   public function recoverPass() {
   	  /*
		 * ----------------------------------------
		 * Recover Pass
	     * @Verified : Check email is valid 
		 * ---------------------------------------
		 */
   	  $verified = self :: checkEmail( $_POST['email_recover'] ) ? 1 : 0;
   	  
   	  if( $verified == 1 )
   	  {
   	  	/* If e-mail is True, We insert */
   	  	$sql  = "INSERT INTO recover_pass VALUES( null, :idHash, :email, '0', '".$this->_dateNow."', '' );";
		$stmt = $this->db->prepare( $sql );
		$stmt->bindValue( ':idHash', $_POST['id_hash'], PDO::PARAM_STR );
		$stmt->bindValue( ':email', $_POST['email_recover'], PDO::PARAM_STR );
		$stmt->execute();
		
		 if ( $stmt->rowCount() != 0 ){
			return true;
		}
		 else {
			 return false;
		 }
		
   	  }//<<<---- If
		$this->db = null;
   	  
   	  
   }//<<<--- End Function
   
   
   public function search( $data, $where, $limit, $session ) {
   	   	/*
		 * ----------------------------------------
		 * Search #Hastag or some word
		 * $data    : Word to search
		 * $where   : Condition
		 * $limit   : Limit of records
		 * $session : Current Session
		 * ---------------------------------------
		 */
		 
			$data = trim( $data );
			$sql = "
			SELECT 
			COUNT(DISTINCT FA.id ) favoriteUser,
			COUNT(DISTINCT B.id) blockUser,
			P.id,
			P.token_id,
			P.post_details,
			P.photo,
			P.user,
			P.date,
			P.video_code,
			P.video_title,
			P.video_site,
			P.video_url,
			U.id user_id,
			U.name,
			U.username,
			U.avatar,
			U.type_account,
			U.mode,
			MATCH( P.post_details, P.video_title ) AGAINST( '".$data."' IN BOOLEAN MODE ) relevance
			FROM posts P 
			LEFT JOIN users U ON P.user = U.id
			LEFT JOIN favorites  FA ON P.id = FA.id_favorite && FA.id_usr = :id && FA.status = '1'
			LEFT JOIN block_user B ON U.id = B.user && B.user_blocked = :id && B.status = '1'
			WHERE 
			P.post_details LIKE :query  && U.mode = '1' ".$where." && B.id IS NULL ||
			MATCH( P.post_details, P.video_title ) AGAINST( '".$data."' IN BOOLEAN MODE ) && U.mode = '1' && B.id IS NULL ".$where." ||
			MATCH( P.post_details, P.video_title ) AGAINST( '".$data."*' IN BOOLEAN MODE ) && U.mode = '1' && B.id IS NULL ".$where."
			GROUP BY P.id 
			ORDER BY P.id DESC
			".$limit."
			";
			$output = $this->db->prepare( $sql );
			$output->bindValue( ':query', '%'.$data.'%', PDO::PARAM_STR );
			$output->bindValue( ':id',  $session, PDO::PARAM_INT );
			
			
			if ( $output->execute() )
			{
				return $output->fetchall( PDO::FETCH_ASSOC );
				$this->db = null;
			}
			
    }//<--- * END FUNCTION *-->
    
    public function searchUsers( $data, $where, $limit, $session ) {
   	   		/*
			 * ----------------------------------------
			 * Search Users
			 * $data    : Word to search
			 * $where   : Condition
			 * $limit   : Limit of records
			 * $session : Current Session
			 * ---------------------------------------
			 */
			$data = trim( $data, '@' );
			$data = trim( $data, '#' );
			$sql = "
			SELECT 
			COUNT(DISTINCT FO.id ) followActive,
			COUNT(DISTINCT B.id) blockUser,
			U.bio,
			U.location,
			U.id,
			U.name,
			U.username,
			U.avatar,
			U.type_account,
			U.mode
			FROM users U 
			LEFT JOIN followers FO ON U.id = FO.following && FO.follower = :id && FO.status = '1'
			LEFT JOIN block_user B ON U.id = B.user && B.user_blocked = :id && B.status = '1'
			WHERE 
			U.username LIKE :query && U.mode = '1' && B.id IS NULL ".$where." || 
			U.bio LIKE :query && U.mode = '1' && B.id IS NULL ".$where." || 
			U.name LIKE :query && U.mode = '1' && B.id IS NULL ".$where." 
			GROUP BY U.id
			".$limit."
			";
			$output = $this->db->prepare( $sql );
			$output->bindValue( ':query', '%'.$data.'%', PDO::PARAM_STR );
			$output->bindValue( ':id',  $session, PDO::PARAM_INT );
			
			if ( $output->execute() )
			{
				return $output->fetchall( PDO::FETCH_ASSOC );
				$this->db = null;
			}
			
    }//<--- * END FUNCTION *-->
   
}//*************************************** End Class AjaxRequest() *****************************************//
?>