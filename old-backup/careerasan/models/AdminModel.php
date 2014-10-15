<?php

/****************************************
 * 
 *  Author : Miguel Vasquez
 *  File   : adminModel.php
 *  Class AdminModel
 * 
 *  This class has the function get data, 
 *  which are called since the controller "adminController" 
 * 
 **************************************/
 
class AdminModel extends ModelBase
{
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
	
	public function getPageId( $page ) {
    	/*
		 * -----------------------
		 * get Pages static, Privacy
		 * Help, etc.
		 * -----------------------
		 */
        $sql = ("
        SELECT 
        title,
        content
        FROM pages_general 
        WHERE id = ?
        ");
		
		$output = $this->db->prepare( $sql );
		$output->bindValue( 1, $page, PDO::PARAM_STR );
		
		if( $output->execute() )
		{
			return $output->fetch( PDO::FETCH_OBJ );
		}
		$this->db = null;
    }
	
	public function getUsers(  $where, $limit ) {
    	/*
		 * -----------------------
		 * get all Users
		 * -----------------------
		 */
        $post = $this->db->query("
        SELECT
        id,
        username,
        name,
        email,
        date,
        avatar,
        type_account,
        status
        FROM users 
        ".$where."
        ORDER BY id DESC
        ".$limit." ");
        return $post->fetchall();
    } 
	
	public function getUsersReported() {
    	/*
		 * -----------------------
		 * get users reported
		 * -----------------------
		 */
        $post = $this->db->query("
        SELECT
        U.id,
        U.username,
        U.name,
        R.id report_id,
        R.date,
        U2.id r_id,
        U2.username r_username,
        U2.name r_name,
        U2.type_account r_account,
        U2.email r_email,
        U2.status r_status
        FROM users_reported R  
        LEFT JOIN users U ON R.user = U.id
        LEFT JOIN users U2 ON R.id_reported = U2.id
        ORDER BY U.id DESC
        ");
        return $post->fetchall();
    }  
	
	public function getPostReported() {
    	/*
		 * -----------------------
		 * get Posts reported
		 * -----------------------
		 */
        $post = $this->db->query("
        SELECT
        U.id,
        U.username,
        U.name,
        P.id report_id,
        P.date,
        U2.id r_id,
        U2.username r_username,
        U2.name r_name,
        PO.status,
        PO.id id_post
        FROM post_reported P  
        LEFT JOIN posts PO ON P.post_reported = PO.id
        LEFT JOIN users U ON P.user = U.id
        LEFT JOIN users U2 ON PO.user = U2.id
        ORDER BY P.id DESC
        ");
        return $post->fetchall();
    } 
}//<--- * END CLASS * ---> 

?>
