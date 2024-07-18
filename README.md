# Laravel Turnstile Services

**Example**

```php

// Instantiate the TurnstileServices class, which handles CAPTCHA verification
$turnsTile = new TurnstileServices();

// Verify the CAPTCHA response using the verifyCaptcha method
$response = $turnsTile->verifyCaptcha($this->captcha, request()->ip());

// Check if the CAPTCHA verification was successful
if ($response['success']) {
    // Your login logic goes here
    // Example: authenticate the user, create a session, redirect to a dashboard, etc.
} else {
    // If CAPTCHA verification fails, throw a ValidationException with the error codes
    throw ValidationException::withMessages([
        'captcha' => $response['error-codes'],
    ]);
}

?>

```
**Successful validation response**
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
**Failed validation response**
```json

{
  "success": false,
  "error-codes": [
    "invalid-input-response"
  ]
}

```

For Further information visit (Turnstile Server-side validation)(https://developers.cloudflare.com/turnstile/get-started/server-side-validation/)
