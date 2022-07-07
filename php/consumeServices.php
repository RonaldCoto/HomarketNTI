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
    }elseif($typeParams==2){

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json",
                'method'  => "POST",
                'content' => http_build_query($params)
            )
        );

        $context=stream_context_create($options);
        $response=file_get_contents($url,false,$context);

    }else{
        $response=file_get_contents($url,false,null);  
    }
    
   
    return json_decode($response,true);
}
     	
?>