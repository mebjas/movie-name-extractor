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
	 * code to get information like [s01e5] or (2x23)
	 * it extract infrmation of form
	 * season = 1
	 * episode_no = 5 from first case
	 * expecting movie not to contial both : in that case first one will be considered
	 */
	$regex = "/\[.*?\]|\(.*?\)/";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]) &&($out[0][0] != "" ))
	{
		foreach($out[0] as $o)
		{
			$str = str_replace($o,"",$str);
			$regex = "/s(\d{1,})e(\d{1,}\b)|(\d{1,})x(\d{1,}\b)/Ui";
			preg_match_all($regex,$o,$secOut, PREG_PATTERN_ORDER);
			if(count($secOut) && count($secOut[0]))
			{
				if(count($secOut[1]) && ($secOut[1][0] != "" ))$output['season'] = $secOut[1][0];
				else if(count($secOut[3]) && ($secOut[3][0] != "" ))$output['season'] = $secOut[3][0];
				if(count($secOut[2]) && ($secOut[2][0] != "" ))$output['episode_no'] = $secOut[2][0];
				else if(count($secOut[4]) && ($secOut[4][0] != "" ))$output['episode_no'] = $secOut[4][0];
			}
		}
	}
	
	/**
	 * code to get information like season 05 or s09 
	 * not enclosed in [] or ()
	 * similar to previos case
	 */
	$regex = "/season\s?(\d{1,})|s(\d{1,})/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]) &&($out[0][0] != "" ))
	{
		$str = str_replace($out[0][0],"",$str);
		if($out[1][0] != "")
			$output['season'] = $out[1][0];
		else if($out[2][0] != "")
			$output['season'] = $out[2][0];	
	}
	
	/**
	 * code to get information like episode 09 or E01
	 * not enclosed in [] or ()
	 * similar to previos case
	 */
	$regex = "/episode\s?(\d{1,})\s|e(\d{1,}\b)/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]) &&($out[0][0] != "" ))
	{
		$str = str_replace($out[0][0],"",$str);
		if($out[1][0] != "")
			$output['episode_no'] = $out[1][0];
		else if($out[2][0] != "")
			$output['episode_no'] = $out[2][0];	
	}
	
	/**
	 * code to get information from season|episode information encoded in format like 11X13 
	 * not between [] or ()
	 */
	$regex = "/(\d{1,})x(\d{1,}\b)/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]) &&($out[0][0] != "" ))
	{
		$str = str_replace($out[0][0],"",$str);
		if($out[1][0] != "") $output['season'] = $out[1][0];
		if($out[2][0] != "")$output['episode_no'] = $out[2][0];	
	}
	
	/**
	 * task 2: identify the part of movie
	 */
	$regex = "/\b\d /Ui";
	preg_match_all($regex,$str,$out,PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$output['part'] = $out[0][0];
	}
	
	/**
	 * task 3: identify and replace resolution
	 */
	$regex = "/\d{1,4}p|\d{1,4}P/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['resolution'] = $out[0][0];
	}
	
	/**
	 * task 4: identify and replace movie year
	 */
	$regex = "/\d{3,4}/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['year'] = $out[0][0];
	}
	
	/**
	 * task 4: identify and replace 2d/3d i.e. dimension
	 */
	$regex = "/[0-9]{1}D|[0-9]{1}d/Ui";
	preg_match_all($regex,$str,$out, PREG_PATTERN_ORDER);
	if(count($out) && count($out[0]))
	{
		$str = str_replace($out[0][0],"",$str);
		$output['dimension'] = $out[0][0];
	}
	
	
	
	/**
	 * now save the filtered filename as movie title
	 */
	$output['title'] = $str;
	
	return $output;
}  



?>
