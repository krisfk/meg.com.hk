<?php 
function translateAnswer($value){
	switch($value){
		case '1':
			return 'A';
		case '2':
			return 'B';
		case '3':
			return 'C';
		case '4':
			return 'D';
	}
}
function myPadding($Value, $PadCharacter, $Length, $Direction) {
   if (strlen($Value) >= $Length)
      return($Value);
   else {
      $ReturnValue = $Value;
      while(strlen($ReturnValue) < $Length)
         if ($Direction == "r")
            $ReturnValue = $PadCharacter.$ReturnValue;
         else
            $ReturnValue .= $PadCharacter;
      return($ReturnValue);
   }
}

function FormatTimer($Lang, $Second) {
	return(myPadding((string)(integer)($Second / 60), "0", 2, "r")." 分鐘 ".
			myPadding((string)($Second % 60), "0", 2, "r"))." 秒";
  /* $Second = TestTime - $Second;
   if ($Second <= 0) {
      //echo "<script language=\"JavaScript\">location.replace(\"index.php\");</script>";
      $BeginTime = null;
      return("00:00");
   } else
      if ($Lang == "zh")
         return(myPadding((string)(integer)($Second / 60), "0", 2, "r")." 分鐘 ".
                myPadding((string)($Second % 60), "0", 2, "r"))." 秒";
      else
         return(myPadding((string)(integer)($Second / 60), "0", 2, "r")." min ".
                myPadding((string)($Second % 60), "0", 2, "r"))." sec";*/
}

function now(){
	return date('Y-m-d H:i:s');
}

function getPaperNum($id){
	return "A1-".str_pad($id,7,'0',STR_PAD_LEFT);
}

function dump($value){
	echo "<pre>";
	var_dump($value);
	echo "<pre>";
}

function getIp(){
	return $_SERVER['REMOTE_ADDR'];
}

function redirect($uri = '', $method = 'auto', $code = NULL){
	// IIS environment likely? Use 'refresh' for better compatibility
	if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
	{
		$method = 'refresh';
	}
	elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
	{
		if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
		{
			$code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
				? 303	// reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
				: 307;
		}
		else
		{
			$code = 302;
		}
	}

	switch ($method)
	{
		case 'refresh':
			header('Refresh:0;url='.$uri);
			break;
		default:
			header('Location: '.$uri, TRUE, $code);
			break;
	}
	exit;
}
?>