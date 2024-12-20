<?php


namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class FilePresenter extends Presenter{

	
	/**
	 *
	 * RETURNS - An absolute path to the given image filename OR to the default avatar icon
	 * 
	 */
	
	public function limitStringLength($string, $length='50', $sufix='')
	{
				
		return str_limit($string, $length, $sufix);
	
	}	
	
}

