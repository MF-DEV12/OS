<?php
  
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=spreadsheet.xls" );
	 
 	$startDate = date_create($startdate);

	$toStartMonth = date_format($startDate, 'F');
	$toStartYear = date_format($startDate, 'Y');
	$tointMonth = date_format($startDate, 'm');
	 
	$rowHeader = "";
	$rowSubHeader = "";
	// echo "<pre>";
	// print_r($listdate);
	// die();
	foreach($listdate as $key) { 
 
	 	if((int)$tointMonth	 <= date_parse($key->MONTH)['month'] || (int)$toStartYear <= (int)$key->YEAR){
 			$rowHeader .= $key->MONTH . " " . $key->YEAR;
		 	$listweeks = explode(",",$key->WEEKS->LISTDAYS); 
			 foreach($listweeks as $day) { 
			 	$rowSubHeader .= $day . ' - ' . substr($key->MONTH, 0, 3) . " \t";
			 	$rowHeader.= " \t";
			 }
	 	}
	 
	}  

	$rowHeader = " \t \t" . $rowHeader; 
	$rowSubHeader = "Contributor's name \t Total \t" . $rowSubHeader; 
 	 
	echo $rowHeader . "\n" . $rowSubHeader . "\n";
 

	$contribrow = "";
 
	 foreach($contributors as $row){ 
	 
			 $totalContribution = 0;
			 $ctr = 0; 
			 $lcontrib = explode(";",$row->CONTRIBUTION);
			 $lamount = explode(";",$row->AMOUNTPAY); 
			 $total = (float)($lamount[$ctr]); 
			 $contrib = (float)($lcontrib[$ctr]);  

			 foreach($listdate as $key) {  
			 		 
				 	 $listweeks = explode(",",$key->WEEKS->LISTDAYS); 
					 foreach($listweeks as $day) {  
							 if( $total == 0){  
								 $ctr++;  
								 if(array_key_exists($ctr,$lamount)){
								 	 
									 $total = (float)($lamount[$ctr]); 
									 $contrib = (float)($lcontrib[$ctr]);
									 if((int)$tointMonth <= date_parse($key->MONTH)['month'] || (int)$toStartYear <= (int)$key->YEAR) {
									 	$totalContribution += $contrib;
									 	$contribrow .= $contrib . "\t"; 
									 } 
									 		
									 $total -= $contrib;

									 
								 } else { 
									$contribrow .= "\t";  
								 }    
							 } else {  
							 	 
							  
			 		 			 if((int)$tointMonth <= date_parse($key->MONTH)['month'] || (int)$toStartYear <= (int)$key->YEAR){
			 		 			 		$totalContribution += $contrib;
									 	$contribrow .= $contrib . "\t"; 
			 		 			 }	  
								 $total -= $contrib;
							 }  

						} 
				 
		 		
		 		 
			 }  
			$contribrow = $row->NAME . "\t " . $totalContribution . "\t" . $contribrow; 
		  	echo $contribrow . " \n ";
 		    $contribrow = "";
 		    $ctr = 0;
 		    $totalContribution = 0;
	 }  
 
?>