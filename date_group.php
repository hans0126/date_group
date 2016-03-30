<?php
	
		
	$arrDate = ["2015-10-03","2015-10-03","2015-10-03","2015-10-01","2015-10-05","2015-10-09","2015-10-10"];
	

	$aa = dateGroup($arrDate);

	print_r($aa);

	function dateGroup($arrDate){

		if( !is_array($arrDate) || count($arrDate)<2){
			return false;
		}

		sort($arrDate);
		for($i=0;$i<count($arrDate);$i++){
			$arrDate[$i] = new DateTime($arrDate[$i]);
		}

		$re = [[]];
		$arrayCount = count($arrDate);
		$re[0][0] = $arrDate[0];


		$idx = 1;

	
		while($idx < $arrayCount){
			$lastDate =  $re[count($re)-1];
			$lastDate = $lastDate[count($lastDate)-1];

			$interval = $lastDate->diff($arrDate[$idx]);
			$num =  $interval->format('%a');
			
			if($num!=0){

			if($num!=1){
				array_push($re,array());
			} 

			array_push($re[count($re)-1],$arrDate[$idx]);
		}
			$idx++;		

		}


		for( $i=0;$i<count($re);$i++){
			for( $j=0;$j<count($re[$i]);$j++ ){
				//$re[$i][$j] =;

				 $re[$i][$j] =  $re[$i][$j]->format("Y-m-d");
			}
		}

		return $re;

	}

	

	



?>