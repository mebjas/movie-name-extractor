<?php
/**
 * this library has been created by Minhaz @Cistoner
 * Anyone can use this library in their applications without any permissions
 * Further contributions will be welcomed.
 */
 
/**
 * Function to retrieve information from filename
 * @input param: (string)
 * @output: array of (string)s
 */
function getmovieDetails($str)
{
	/**
	 * declaring return variable as array
	 */
	$output = array();
	
	/**
	 * replace "." with spaces
	 */
	$str = str_replace("."," ",$str); 
	 
	/**
	 * code to get information like [s01e5]
	 */
	$regex = "/[.*?]/i";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		//incomplete
	}
	
	/**
	 * task 2: identify the part of movie
	 */
	$regex = "/\b\d /";
	preg_match_all($regex,$str,$out,PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$output['part'] = $out[0][0];
	}
	
	/**
	 * task 3: identify and replace movie year
	 */
	$regex = "/\d{3,4}/i";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['year'] = $out[0][0];
	}
	
	/**
	 * task 4: identify and replace 2d/3d i.e. dimension
	 */
	$regex = "/[0-9]{1}D|[0-9]{1}d/i";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['dimension'] = $out[0][0];
	}
	
	/**
	 * task 4: identify and replace resolution
	 */
	$regex = "/\d{1,4}p|\d{1,4}P/i";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['resolution'] = $out[0][0];
	}
	
	/**
	 * now save the filtered filename as movie title
	 */
	$output['title'] = $str;
	
	return $output;
} 



?>