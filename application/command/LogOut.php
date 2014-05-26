<?php
	class LogOut extends Command{
		public function publicPage(){
			return true;
		}
		public function execute(){
			Auth::getAuth($this->siteRoot)->logOut();		
			header("Location:".$this->siteRoot);			
		}
	}
?>