<?php
namespace Multiple\Shared\Libs;

class FacebookAuth
{
   public static $client_id = '898218456892986';
   public static $client_secret = 'b5f07f0856ea03fb4ad8487b9b9dd5c4';


   public static $redirect_uri = 'http://baliprorent.com/user/facebookCallback';

   public static $token_url = 'https://graph.facebook.com/oauth/access_token?';

   public static $scope = 'email';



   public static function getFacebookURL()
   {
      $url = 'https://www.facebook.com/dialog/oauth';

      $params = [
         'client_id' => self::$client_id,
         'redirect_uri' => self::$redirect_uri,
         'response_type' => 'code',
         'scope' => self::$scope
      ];
      
      return $url . '?' . urldecode(http_build_query($params));
   }
}