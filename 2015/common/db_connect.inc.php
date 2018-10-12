<?php

	$staging_db="meg_production";
	$production_db="meg_production";
	$conn = mysql_connect("localhost", "meg_user", "134679as") or die("Could not connect : " . mysql_error());
	//mysql_query("SET SESSION character_set_results = 'BIG5'");  	
	mysql_select_db($production_db) or die("Could not select database");
	Function formatDateInput($dteDate)
	{
		$format_date=date("d/m/Y",strtotime($dteDate));
		return $format_date;
	}
	
	//set server location for recruitment referral
	//$serverpath_recruit="http://prodev01.fevaworks.com/hksm/";
	$path1=split("/",$_SERVER['SCRIPT_NAME']);
	$path2="";
	for ($i=0;$i<count($path1)-1;$i++)
  		$path2=$path2.$path1[$i]."/";	
	$serverpath_recruit="http://".$_SERVER['HTTP_HOST'].$path2;
	
	
	function make_seed()
	{
   		list($usec, $sec) = explode(' ', microtime());
   		return (float) $sec + ((float) $usec * 100000);
	}
	
	function proLangStr($strTC,$strEN,$the_lang)
	{
		if ($the_lang=="en")		 			
			return $strEN;         
		else	   
			return $strTC;	    
	}
	
	function getLangURL($curPage,$curQS)
	{
		$newURL=$curPage."?".$curQS;
		if ((strpos($newURL,"lg=en")>0)||(strpos($newURL,"lg=tc")>0))
		{
			if (strpos($newURL,"lg=en")>0)
				$newURL=str_replace("lg=en","lg=tc",$newURL);
			else	
				$newURL=str_replace("lg=tc","lg=en",$newURL);		
		}
		else
		{
			if ($_SESSION['lang']=="en")
				$newURL=$newURL."&lg=tc";
			else
				$newURL=$newURL."&lg=en";	
		}
		return urlencode($newURL);
	}	
	
?>	
