<?php

function evil_autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	} 
}

spl_autoload_register('evil_autoload');

?>