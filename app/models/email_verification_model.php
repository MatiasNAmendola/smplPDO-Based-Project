<?php

class Email_Verification_Model extends Master_Model {
	
	public function setup($email) {
	
		// generate the activation code
		$code = $this->generateCode();
		
		// set up the parameters
		$query_params = array(
			'email'					=> $email,
			'verification_code'		=> $code,
			'verification_status'	=> 0
		);
		
		// insert it into the database
		$this->db->insert('email_verification', $query_params);
		
		return $code;
		
	}
	
	private function generateCode() {
		
		$code = rand(1000000000, 9999999999);
		
		return $code;
		
	}
	
}

?>