<?php 

/* Spotify Application Client ID and Secret Key */
$client_id     = '89d51dda161e4f91a2b71ba8e15e7eb8'; 
$client_secret = '5108741a84a341dba79b5604e5fbd620'; 

/* Get Spotify Authorization Token */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

$result=curl_exec($ch);
$json = json_decode($result, true);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL,            'https://api.spotify.com/v1/users/axcelaration/playlists' );
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1 );
// curl_setopt($ch2, CURLOPT_POST,           1 );
// curl_setopt($ch2, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch2, CURLOPT_HTTPHEADER,     array('Authorization: Bearer '.$json['access_token'], 'Accept: application/json', 'Content-Type: application/json')); 

$result2=curl_exec($ch2);
$json2 = json_decode($result2);

$lastItemIndex = sizeof($json2->items) - 1;
echo 'Name: ', $json2->items[$lastItemIndex]->name, ' | ';
echo 'URI: ', $json2->items[$lastItemIndex]->uri;

//exec('curl -i "https://api.spotify.com/v1/search?q=Maycon+%26+Vinicius+&limit=1&type=artist" -H "Accept: application/json" -H "Authorization: Bearer '.$json['access_token'].'" -H "Content-Type: application/json" 2>&1', $pp);

// exec('curl -i "https://api.spotify.com/v1/users/axcelaration/playlists" -H "Accept: application/json" -H "Authorization: Bearer '.$json['access_token'].'" -H "Content-Type: application/json" 2>&1', $list);
?>