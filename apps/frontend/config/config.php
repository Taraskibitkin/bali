<?php

use Multiple\Frontend\Forms;

class_alias('Multiple\Shared\Models\Rooms', 'Rooms');
class_alias('Multiple\Shared\Models\Hosters', 'Hosters');
class_alias('Multiple\Shared\Models\Users', 'Users');
class_alias('Multiple\Shared\Models\HosterLang', 'HosterLang');

class_alias('Multiple\Frontend\Forms\ProfileForm', 'ProfileForm');
class_alias('Multiple\Frontend\Forms\LoginForm', 'LoginForm');
class_alias('Multiple\Frontend\Forms\RegistrationForm', 'RegistrationForm');

return new \Phalcon\Config([

   'database'    => [
      'adapter'  => 'Mysql',
      'host'     => 'localhost',
      'username' => 'candoo_baliprore',
      'password' => '}FF8d9u3123DAS32_!@da',
      'dbname'   => 'candoo_baliprore',
      'charset'  => 'utf8',
   ],

   'application' => [
      'controllersDir' => __DIR__ . '/../controllers/',
      'modelsDir'      => __DIR__ . '/../models/',
      'formsDir'       => __DIR__ . '/../forms/',
      'viewsDir'       => __DIR__ . '/../views/'
   ]
]);
