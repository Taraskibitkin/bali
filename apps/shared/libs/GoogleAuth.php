<?php
namespace Multiple\Shared\Libs;

class GoogleAuth
{
  public static $client_id     = '903927344669-1p39mn956ioedsnn0nd9bs36rct3es0p.apps.googleusercontent.com';
  public static $client_secret = '0WxC1j67cvh_NwgQNa9P3s0Y';
  public static $redirect_uri  = 'http://baliprorent.com/user/googleCallback';
  
  public static $auth_url = 'https://accounts.google.com/o/oauth2/auth';
  public static $token_url = 'https://accounts.google.com/o/oauth2/token';
  
  
  public static function getGoogleURL( )
  {
    $params = [
        'redirect_uri'  => self::$redirect_uri,
        'response_type' => 'code',
        'client_id'     => self::$client_id,
        'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
    ];
    
    return self::$auth_url . '?' . urldecode( http_build_query( $params ) );
  }
}