<?php
    class Connection {
        const linkURL = "http://localhost:3000/";
        public function connect($action) {
            $url = self::linkURL . $action;
            $curl = curl_init($url);
            $token = (isset($_SESSION['user_token'])) ? $_SESSION['user_token'] : '';
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: ' . $token
            ]);
            $response = json_decode(curl_exec($curl), true);
            curl_close($curl);
            return $response;
        }

        public function sendBodyAndToken($action, $body) {
            $url = self::linkURL . $action;
            $curl=curl_init($url);
            // session_start();
            $token = (isset($_SESSION['user_token'])) ? $_SESSION['user_token'] : '';
    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                'X-RapidAPI-Key: 7xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'Authorization: ' . $token,
            ]);
            curl_setopt($curl, CURLOPT_POST,1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
            $response = json_decode(curl_exec($curl), true);
            curl_close($curl);
            return $response;
        }
    }
?>