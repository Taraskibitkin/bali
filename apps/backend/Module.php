<?php

namespace Multiple\Backend;

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Flash\Direct as FlashDirect;

class Module
{
   public function registerAutoloaders()
   {
      $loader = new Loader();

      $loader->registerNamespaces([
         'Multiple\Backend\Controllers' => __DIR__ . '/controllers/',
         'Multiple\Shared\Models'       => __DIR__ . '/../shared/models/',
         'Multiple\Backend\Views'       => __DIR__ . '/views/',
         'Multiple\Shared\Libs'         => __DIR__ . '/../shared/libs/',
      ]);
      $loader->register();
   }





   public function registerServices( $di )
   {
      $config = include __DIR__ . "/config/config.php";

      $di->set('dispatcher', function () {
         $dispatcher = new Dispatcher();
         $dispatcher->setDefaultNamespace("Multiple\Backend\Controllers");
         return $dispatcher;
      });

      $di->set('modelsManager', function () {
         return new ModelsManager();
      });

      $di->set('flash', function () {

         $flash = new FlashDirect([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning'
         ]);

         $flash->setImplicitFlush(false);

         return $flash;
      });



      $di->set('url', function () {
         $url = new UrlResolver();
         $url->setBaseUri('/');
         return $url;
      }, true);




      $di['view'] = function () {
         $view = new View();
         $view->setViewsDir(__DIR__ . '/views/');
         $view->registerEngines([
            ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
         ]);
         return $view;
      };




      $di->set('session', function () {
         $session = new SessionAdapter();
         session_set_cookie_params(136000000);
         $session->start();
         return $session;
      });





      $di->set('modelsMetadata', function () {
         return new MetaDataAdapter();
      });

      $di->set('db', function () use ( $config ) {
         return new \Phalcon\Db\Adapter\Pdo\Mysql([
            "host"     => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname"   => $config->database->dbname,
            'charset'  => 'utf8',
         ]);
      });
   }
}
