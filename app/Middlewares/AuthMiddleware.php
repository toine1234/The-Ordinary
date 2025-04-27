<?php
namespace App\Middlewares;

use App\Core\JWT;

class AuthMiddleware{
    
    public static function AuthJWT(){
        if (isset($_COOKIE['accessToken'])){
            JWT::setSecret('hoaSYT98etSi3txRYAyvYO1dbNNoCy');
            $jwt_decode = JWT::verify($_COOKIE['accessToken']);
            return $jwt_decode;
        }

        return false;
        
    }
}