<?php

namespace Multiple\Shared\Libs;

use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\Settings;
use Phalcon\Mvc\Model\Manager as ModelsManager;

class Helper
{

   public static $availableLangs = [ 'en' => 1, 'ru' => 2 ];

   public static $defaultLangID = 1;
   public static $defaultLangCode = 'en';





   public static function getSocialLinks()
   {

      $social = Settings::find([
         'conditions' => 'id <= 5'
      ]);

      $socialLinks = [ ];
      foreach ( $social as $soc ) {
         $socialLinks[] = $soc->value;
      }

      return $socialLinks;
   }





   public static function getAdminEmails()
   {
      $adminEmails = Settings::find([
         'conditions' => 'grouped = ?0',
         'bind'       => [ 'email' ],
         'columns'    => 'value'
      ]);

      $emails = [ ];
      foreach ( $adminEmails as $email ) {
         $emails[] = trim($email->value);
      }

      return array_unique($emails);
   }





   public static function getLangCode( $langID )
   {
      $languages = array_flip(self::$availableLangs);

      if ( isset( $languages[$langID] ) ) {
         return $languages[$langID];
      }

      return self::$defaultLangCode;
   }





   public static function getLangID( $langCode )
   {
      if ( self::$availableLangs[$langCode] ) {
         return self::$availableLangs[$langCode];
      }

      return self::$defaultLangID;
   }





   public static function getRandomString( $length )
   {
      return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
   }





   public static function curlRequest( $url, $queryString = '', $type = 'get' )
   {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      if ( $type === 'post' ) {
         curl_setopt($curl, CURLOPT_POSTFIELDS, $queryString);
         curl_setopt($curl, CURLOPT_POST, 1);
      }

      $result = curl_exec($curl);
      curl_close($curl);

      return $result;
   }




   /**
    * Проверяет Открыта ли вилла для заселения или занята
    * true - открыта
    * false - занята
    * @return boolean
    */
   public static function isVillaOpened($villaID, $checkInDate, $checkOutDate)
   {
      $villa  = Rooms::find($villaID);


   }


}