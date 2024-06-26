<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TurnstileServices
{
    /**
     * verify turnstile
     *
     * @param  string  $token
     * @param  string|null  $ip
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyCaptcha($token, $ip = null)
    {
        return Http::asForm()
            ->post(
                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                [
                    'secret' => 'secret_key',
                    'response' => $token,
                    'remoteip' => $ip,
                ]
            )->json() ?? response()->json([
                'status' => false,
            ]);
    }
}
