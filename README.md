# Laravel Turnstile Services

A simple Laravel wrapper for integrating [Cloudflare Turnstile](https://developers.cloudflare.com/turnstile/) CAPTCHA verification.

## Installation

Install the package via Composer:

```bash
composer require dennist12/turnstile-services
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=dennist12/turnstile-config
```

config/turnstile.php

```php
<?php


return [
    // Default turnstile key
    'key' => env('TURNSTILE_KEY', 'your-default-key'),
];


```

## Usage Example

```php
use Dennist12\Turnstile\TurnstileServices;
use Illuminate\Validation\ValidationException;

// Instantiate the TurnstileServices class
$turnsTile = new TurnstileServices();

// Verify the CAPTCHA response
$response = $turnsTile->verifyCaptcha($this->captcha, request()->ip());

// Handle the response
if ($response['success']) {
    // CAPTCHA verification passed
    // Proceed with login or other logic
} else {
    // CAPTCHA verification failed
    throw ValidationException::withMessages([
        'captcha' => $response['error-codes'],
    ]);
}
```

## Example Responses

### ✅ Successful Validation

```json
{
  "success": true,
  "challenge_ts": "2022-02-28T15:14:30.096Z",
  "hostname": "example.com",
  "error-codes": [],
  "action": "login",
  "cdata": "sessionid-123456789"
}
```

### ❌ Failed Validation

```json
{
  "success": false,
  "error-codes": ["invalid-input-response"]
}
```

## Documentation

For more information on server-side validation with Turnstile, check out the official Cloudflare docs:

👉 [Turnstile Server-side Validation](https://developers.cloudflare.com/turnstile/get-started/server-side-validation/)
