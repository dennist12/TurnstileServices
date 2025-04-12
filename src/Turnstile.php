<?php

namespace Dennist12\TurnstileServices;

use Illuminate\Support\Facades\Http;

class Turnstile
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
                    'secret' => config('turnstile.key'),
                    'response' => $token,
                    'remoteip' => $ip,
                ]
            )->json() ?? response()->json([
                'status' => false,
            ]);
    }
}
