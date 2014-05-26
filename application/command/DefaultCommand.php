<?php	
	//дефолтная команда - отображение индекса
	class DefaultCommand extends Command{
		public function publicPage(){
			return true;
		}
		public function execute(){		
		
		}
	}
?>