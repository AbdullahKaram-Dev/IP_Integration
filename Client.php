<?php
include 'ClientTraitIP.php';

class Client
{
    use ClientTraitIP;
}

$user_data = new Client();

$http_query_array = ['status','message','countryCode','regionName','city','lat','lon','timezone','currency','mobile'];
$http_query_string = 'status,message,countryCode,regionName,city,lat,lon,timezone,currency,mobile';

$user_ip = '102.40.181.211';

/**
 *  her we set user info  by sending user ip and our query string
 *  query string possible type Array Or String Or Null
 *
 * note that :- Case Null will return all data api provide it
 */
/**  */
$user_data->setUserInfo($user_ip,$http_query_string /** pass array or string or null all will work */);

/** here we get all response
 *
 *  to get specific key from response just pass it like example
 */
$response = $user_data->getResponse('city');

echo '<pre>';
print_r($response);




































