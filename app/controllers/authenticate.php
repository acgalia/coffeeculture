<?php

	function authenticate($admin_un, $admin_pw){
		if($admin_un == "admin" && $admin_pw == "secret"){
			return true;
		}
		else {
			return false;
		}
	}

?>