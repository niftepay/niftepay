<?php


return [
    'api_url'    => env('NIFTePay_PRODUCTION_URL', ''),
    'sandbox_api_url'=>env('NIFTePay_SANDBOX_URL',''),
    'merchant_id'=> env('NIFTePay_MERCHANTID', ''),
    'password'=> env('NIFTePay_PASSWORD', ''),
    'hash_key'   => env('NIFTePay_HASHKEY',''),
    'return_url' => env('NIFTePay_RETURNURL', ''),
    'mode'       => env('NIFTePay_PAYMENTMODE', 'sandbox'),
    'mpin' => env('NIFTePay_MPIN')
];
