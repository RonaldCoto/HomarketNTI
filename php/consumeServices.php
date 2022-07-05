<?php

function getWithParamethers($url, $params,$typeParams){
    if($typeParams==1){
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"idSubCategoria: ".$params.""                            
            )
          );              
    }elseif(typeParams==2){
        //Implementación con JSON
    }else{
        //Implementación sin parametros
    }
    
    $context=stream_context_create($options);
    $response=file_get_contents($url,false,$context);
    return json_decode($response,true);
}
     	
?>