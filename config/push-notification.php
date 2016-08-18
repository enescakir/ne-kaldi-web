<?php

return array(

    'appNameIOS'     => array(
        'environment' =>'production',
        'certificate' => app_path() . '/NeKaldiPush.pem',
        'passPhrase'  =>'@Kaliforniya11@',
        'service'     =>'apns'
    ),
    'appNameAndroid' => array(
        'environment' =>'production',
        'apiKey'      =>'yourAPIKey',
        'service'     =>'gcm'
    )

);