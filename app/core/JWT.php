<?php
namespace App\Core;
// require_once __DIR__ ."/../../vendor/autoload.php";
use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;

class JWT {
    private static $secret;

    public static function setSecret($secret) {
        self::$secret = $secret;
    }

    public static function create($payload, $expMinutes = 60) {
        $issuedAt = time();
        $expire = $issuedAt + ($expMinutes * 60);

        $payload['iat'] = $issuedAt;
        $payload['exp'] = $expire;

        return FirebaseJWT::encode($payload, self::$secret, 'HS256');
    }

    public static function verify($jwt) {
        return FirebaseJWT::decode($jwt, new Key(self::$secret, 'HS256'));
    }
}