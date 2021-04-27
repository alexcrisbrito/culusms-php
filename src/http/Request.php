<?php


namespace alexcrisbrito\culusms\http;


class Request
{

    /**
     * Perform GET request
     * to API
     *
     * @param string $url
     * @param array $query
     * @return string
     */
    public static function get(string $url, $query = []) :string
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url ."&". http_build_query($query));
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return $response;
    }

    /**
     * Perform POST request
     * to API
     *
     * @param $url
     * @param $body
     * @return string
     */
    public static function post($url, $body) : string
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $body);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, 'POST');

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return $response;
    }

}