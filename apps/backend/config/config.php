<?php

use Multiple\Frontend\Models;
use Multiple\Frontend\Forms;


return new \Phalcon\Config([

//  'database' => [
//    'adapter' => 'Mysql',
//    'host' => 'localhost',
//    'username' => 'root',
//    'password' => '123',
//    'dbname' => 'enchway',
//    'charset' => 'utf8',
//  ],
//
      'database' => [
          'adapter'     => 'Mysql',
          'host'        => 'localhost',
          'username'    => 'candoo_baliprore',
          'password'    => '}FF8d9u3123DAS32_!@da',
          'dbname'      => 'candoo_baliprore',
          'charset'     => 'utf8',
      ],

  'application' => [
    'controllersDir' => __DIR__ . '/../controllers/',
    'modelsDir' => __DIR__ . '/../models/',
    'formsDir' => __DIR__ . '/../forms/',
    'viewsDir' => __DIR__ . '/../views/'
  ]
]);
