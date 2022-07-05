<?php

function getWithParamethers($url, $params,$typeParams){
    if($typeParams==1){
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"idSubCategoria: ".$params.""                            
            )
          );
          $context=stream_context_create($options);
          $response=file_get_contents($url,false,$context);              
    }elseif(typeParams==2){
        //Implementación con JSON
    }else{
        $response=file_get_contents($url,false,null);  
    }
    
   
    return json_decode($response,true);
}
     	
?>