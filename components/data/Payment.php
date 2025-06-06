<?php

namespace frontend\components\data;


class Payment
{
    
    public static function card()
    {
        return [
            [
                'image' => '/data/image/payment/visa.svg',
                'title' => 'Visa',
            ],
            [
                'image' => '/data/image/payment/amex.svg',
                'title' => 'Amex',
            ],
            [
                'image' => '/data/image/payment/discover.svg',
                'title' => 'Discover',
            ],
            [
                'image' => '/data/image/payment/maestro.svg',
                'title' => 'Maestro',
            ],
            [
                'image' => '/data/image/payment/mastercard.svg',
                'title' => 'MasterCard',
            ],
            [
                'image' => '/data/image/payment/paypal.svg',
                'title' => 'PayPal'
            ],
        ];
    }

}