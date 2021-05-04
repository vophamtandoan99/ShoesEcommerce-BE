<?php

namespace App\Libraries;

use Config;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Ramsey\Uuid\Uuid;
use App\Exceptions\UserUnauthorizedException;

class Session
{
    public function __construct()
    {
        $this->prefix = Config::get('api.session.prefix');
        $this->duration = Config::get('api.session.duration');
    }

    public function set($user)
    {
        $sessionId = Uuid::uuid4()->toString();
        $sessionKey = $this->prefix . $sessionId;
        Redis::set($sessionKey, $this->formatSession($user->toArray()));
        Redis::expire($sessionKey, $this->duration);
        return Crypt::encryptString($sessionId);
    }

    public function get($token)
    {
        $sessionId = $this->decryptToken($token);
        $sessionkey = $this->prefix . $sessionId;
        return json_decode(Redis::get($sessionkey), true);
    }

    public function verify($token, $email)
    {
        $sessionData = $this->get($token);
        return (Arr::get($sessionData, 'email') === $email);
    }

    public function destroy($token)
    {
        $sessionId = $this->decryptToken($token);
        $sessionkey = $this->prefix . $sessionId;
        return Redis::del($sessionkey);
    }

    public function formatSession($user)
    {
        return json_encode(Arr::only($user, ['user_oid', 'email', 'password', 'name']));
    }

    public function decryptToken($token)
    {
        try {
            return Crypt::decryptString($token);
        } catch (DecryptException $exception) {
            throw new UserUnauthorizedException;
        }
    }
}
