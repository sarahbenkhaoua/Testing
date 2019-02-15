<?php


 
 class csv extends mysqli 
 {
 	private $state_csv = false ;
 	public function __construct()
 	{
 	  parent::__construct("localhost","root","","csv");
 	  if($this->connect_error){
 	  	echo "Faild connection".$this->connect_error;
 	  }
 	}

 	public function import($file){ 
 		$file = fopen($file, 'r');
 		while ($row = fgetcsv($file)) {
 		//print_r($row);
 			//var_dump($row);
 			$value = "'".implode("','", $row)."'" ;
              $q="INSERT INTO file(first name) VALUES(".$value.") " ;
               
                     
             
 			if ( $this->query($q) ) {
 				$this->state_csv = true ;
 			}else{
 				$this->state_csv = false;
 				echo $this->error ;
 			}
 	    }
        if ($this->state_csv ) {
       	 echo "file imported ";
          }else{
       	echo "erreur ";
         }
 	}


 }
?>