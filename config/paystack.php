<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /**
     * Dev mode [test, live]
     *
     */
    'mode' => getenv('PAYMENT_MODE', 'test'),

    /**
     * Required fields for customer verification and account creation
     */
    'required_fields' => env('PAYSTACK_REQUIRED_FIELDS', ['first_name', 'last_name', 'phone', 'email']),

    /**
     * Default banks accounts
     */
    'preferred_banks' => (getenv('PAYMENT_MODE', 'test') == 'test') ? ['test-bank'] : env('PAYSTACK_BANK_ACCOUNTS', ['wema-bank', 'access-bank']),

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => (getenv('PAYMENT_MODE', 'test') == 'test') ? getenv('PAYSTACK_TEST_PUBLIC_KEY') : getenv('PAYSTACK_PUBLIC_KEY'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => (getenv('PAYMENT_MODE', 'test') == 'test') ? getenv('PAYSTACK_TEST_SECRET_KEY') : getenv('PAYSTACK_SECRET_KEY'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => getenv('PAYSTACK_PAYMENT_URL'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),
];
