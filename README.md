<!--suppress ALL -->
<p align="center">
  <img src="niftepay.png" alt="NIFTePay Payment Gateway" width="150"/><br/>
  <!-- <h3 align="center">Payfast</h3> -->
</p>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/niftepay/niftepay.svg?style=flat-square)](https://packagist.org/packages/niftepay/niftepay)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/zfhassaan/niftepay.svg?style=flat-square)](https://packagist.org/packages/niftepay/niftepay)



<h4> Disclaimer </h4>
This is unofficial "NIFTePay API Payment Gateway. This repository  is only created to help developers in streamlining the integration process. You can Review the Official Payment Gateway <a href="https://merchants.niftepay.pk/CustomerPortal/transactionmanagement/merchantform" >here.</a> This Package only hosted checkout process. There's no Subscription option enabled yet.


#### About
NIFTePay is a leading payment gateway in Pakistan that allows businesses to securely accept online payments from their customers. With fast and reliable transaction processing, advanced fraud protection, and a user-friendly interface, NIFTePay makes it easy for merchants to grow their online sales. Whether you're a small business owner, e-commerce store owner, or a developer looking to integrate a payment gateway into your website or mobile app, NIFTePay has a solution that fits your needs.
This document contains a detailed explanation of how to integrate with NIFTePay's hosted checkout feature (version 1.0.0).

#### Intended Audience
This document is for merchants and developers who want to integrate with NIFTePay to perform a hosted checkout.

#### Integration Scope
The merchant will implement all e-commerce functionality. The NIFTePay service will only be used for payment processing with the hosted checkout feature.

#### API End Points
This package only contains the hosted checkout process. There are no API endpoints specified for direct checkout.

#### Integration Prerequisites
Merchants must be registered with NIFTePay prior to integration. After signing up for a NIFTePay account, the merchant will receive the following unique values to operate: `Merchant_ID`, `Password`, `Hashkey`, `Sandbox URL`, and `Production URL`. These keys are used to get a one-time authentication token, which

#### Installation
You can install the package via composer

````
composer require niftepay/niftepay
````

#### Set .env configurations

```
NIFTePay_PAYMENTMODE=sandbox
NIFTePay_MERCHANTID=
NIFTePay_PASSWORD=
NIFTePay_HASHKEY=
NIFTePay_MPIN=
NIFTePay_PRODUCTION_URL=
NIFTePay_SANDBOX_URL=
NIFTePay_RETURNURL=
```

#### configuration
In your `config/app.php` file, add the following line to the providers array:

```php 
    /*
    * Package Service Providers...
    */

    \niftepay\niftepay\provider\ServiceProvider::class,
```


In the `aliases` array of the same file, add the following line:

```php 
  'aliases' => Facade::defaultAliases()->merge([
        'Niftepay' => \niftepay\niftepay\facade\NiftepayFacade::class,
    ])->toArray(),
```
#### Publish Vendor:
Publish the package assets by running the following command:

```bash
php artisan vendor:publish 
```
This will show the following response in terminal:
![img.png](img.png)

press 9 to publish ```niftepay\niftepay\provider\ServiceProvider``` provider

#### Steps:
##### Hosted Checkout
To initiate the hosted checkout process, send a POST request with the following parameters:

```json
{
    "amount":"1",
    "billref":"bill-reference",
    "productDescription": "Product Description"
}
```

Then, in your controller, use the following code:

```php
        $niftepay = new NiftePay();
        $niftepay->setAmount($request->amount);
        $niftepay->setBillReference($request->billref);
        $niftepay->setProductDescription($request->productDescription);
        return $niftepay->sendRequest();
```
The index function is called and a new instance of the NiftePay class is created. The setAmount, setBillReference, and setProductDescription methods are called on the NiftePay object, passing in the amount, billref, and productDescription values from the request as arguments. These methods set the corresponding properties of the NiftePay object to the specified values.

The sendRequest method is called on the NiftePay object. This method sends a request to the NiftePay API to initiate the checkout process and returns the response from the API as an HTML template which can be rendered on the web and mobile application. To hide or show fields, you can use CSS to control the field's visibility on the frontend.

The response from the API is returned by the index function. This response can be used to display the hosted checkout form on your website or mobile app.

### Testing
To test the payment gateway, you can use the sandbox mode by setting `NIFTePay_PAYMENTMODE=sandbox` in your `.env` file. This will allow you to test the checkout process without actually processing any payments.

To switch to production mode, set `NIFTePay_PAYMENTMODE=production` in your `.env` file.

#### Changelog
Please see Changelog for more information what has changed recently.

#### Security
The following lines are taken from [briandk](https://gist.github.com/briandk/3d2e8b3ec8daf5a27a62) repository for contributing in an open source projects.

**Great Bug Reports** tend to have:

- A quick summary and/or background
- Steps to reproduce
    - Be specific!
    - Give sample code if you can. An issue includes sample code that *anyone* with a base R setup can run to reproduce what I was seeing
- What you expected would happen
- What actually happens
- Notes (possibly including why you think this might be happening, or stuff you tried that didn't work)


#### License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
