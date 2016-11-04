<?php

namespace ApiBundle\Classes;




class Api
{
    private $url;
    private $privateKey;
    private $publicKey;

    public function __construct($url,$privateKey,$publicKey) {
        $this->url = $url;
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;

    }

    public function call($route,$parameters = []) {


        $url = $this->url.'/'.$route;
        $urlParameter = '';
        if (!empty($parameters))
        {
            foreach ($parameters as $key => $parameter)
            {
                $urlParameter .= '&'.$key.'='.$parameter;
            }
        }
        $ts = time();
        $hash = md5($ts.$this->privateKey.$this->publicKey);

        $url .= '?apikey='.$this->publicKey.'&ts='.$ts.'&hash='.$hash;

        if (!empty($urlParameter))
        {
            $url .= $urlParameter;
        }
        


        $query = curl_init();
        curl_setopt($query, CURLOPT_URL, $url);
        curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($query, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($query);
        curl_close($query);
        /*$query = new HttpRequest();
        $query->setMethod($method)
                ->setUrl($url)
                ->send();

        if ($query->getResponseCode() != 200)
        {
            die('Erreur lors de la requête ('.$query->getResponseCode().')');
        }

        return $this->decode($query->getResponseBody());
    */
       /*$decode  = $this->decode($response);
        var_dump($decode->data->results);
       exit();*/
        return $this->decode($response);
    }

    private function decode($content)
    {
        return json_decode($content);
    }
}