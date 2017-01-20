<?php
function FindLongestPalindrone($source) {
	$source = strtoupper($source);
	$answer = "";
	$txtlen = strlen($source); # Get Source Text Length
	
	for ($firstLoop = 2; $firstLoop < $txtlen; $firstLoop++) {
		$preTxt = substr($source, 0, $firstLoop);
		$preTxtLen = strlen($preTxt);
		
		for ($secondLoop = 2; $secondLoop <= $preTxtLen; $secondLoop++) {
			$leadTxt = substr($preTxt, ($secondLoop * -1));
			
			$tail1Txt = strrev(substr($source, ($firstLoop - 1), $secondLoop));
			if ($leadTxt == $tail1Txt) {
				$tmpAnswer = $leadTxt . substr(strrev($tail1Txt), 1);
				if (strlen($tmpAnswer) > strlen($answer)) {
					$answer = $tmpAnswer;
				}
			}
			
			$tail2Txt = strrev(substr($source, $firstLoop, $secondLoop));
			if ($leadTxt == $tail2Txt) {
				$tmpAnswer = $leadTxt . strrev($tail2Txt);
				if (strlen($tmpAnswer) > strlen($answer)) {
					$answer = $tmpAnswer;
				}
			}
		}
	}
	
	return $answer;
}
?>