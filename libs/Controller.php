<?php
/**
 * Controller class example
 * 
 * note: Model name passed in the constructor
 * 
 * TODO implement get/post request handler
 * 
 */
class Controller {
	
	function __construct($modelName='Model') {
			
		
	
			$this->viewLoader = new LoadView();
			$this->model=new $modelName();
	}
}
?>