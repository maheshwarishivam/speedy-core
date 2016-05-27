<?php 
Class Session {
	
	function Session(){
		session_start();
	}
	
	public function setSessionData($id, $data) {
		
		if( empty( $id ) )
			return false;
		
		$_SESSION[$id] = $data;
		
		return true;
	}
	
	public function getSessionData($id) {
		
		if( is_array ( $id ) ) {
			$data = array();
			
			foreach($id as $row){
				$data[$row] = $_SESSION[$row];
			}
			
			return $data;
		}
		
		return $_SESSION[$id];
	}
	
	public function setAllSessionData( $data = array() ) {
		
		if( count( $data ) > 0 ){
			foreach($data as $key => $row){
				$_SESSION[$key] = $row;
			}
		}
		return true;
	}
	
	public function getAllSessionData() {
		return $_SESSION;
	}
	
	public function removeSessionData($id) {
		
		if( is_array ( $id ) ) {
			
			foreach($id as $row){
				unset( $_SESSION[$row] );
			}
			
			return true;
		}
		
		unset( $_SESSION[$id] );
		
		return true;
	}
	
	public function removeSession(){
		
		session_destroy();
		
		return true;
	}
	
	public function is_setSession( $id = '' ){
		
		if( empty( $id )){
			
			return (count($_SESSION) > 0)?true:false;
			
		} else if( !empty( $_SESSION[$id] ) ){
			return true;
		}
		
		return false;
	}   
	
	public function messageData( $id, $data = ''){
		
		if( empty( $data )){
			
			if(isset($_SESSION[$id])){
				$msg = $_SESSION[$id];
				unset( $_SESSION[$id] );
			
				return $msg;
			} else {
				return '';
			}
			
		} else {
			
			$_SESSION[$id] = $data;
			
		}
		 
	}
	
}
