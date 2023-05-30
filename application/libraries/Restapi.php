<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restapi
{
    public function curl_request($url,$request,$data=array())
    {
        // persiapkan curl
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request );
        
        $output = curl_exec($ch); 
        
        curl_close($ch);

        if( $output ){
            $return =  json_decode($output);
        }else{
            $return = [];
        }

        return $return;
    }

    public function get_products($url){
        $curl = $this->curl_request($url,'GET');
        return $curl;
    }
}
