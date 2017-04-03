<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
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
use Multiple\Frontend\Libs\Auth;
use Multiple\Frontend\Libs\Acl;
use Multiple\Frontend\Libs\Mail;

class Module
{
   public function registerAutoloaders()
   {
      $loader = new Loader();

      $loader->registerNamespaces([
         'Multiple\Frontend\Controllers' => __DIR__ . '/controllers/',
         'Multiple\Shared\Models'        => __DIR__ . '/../shared/models/',
         'Multiple\Frontend\Forms'       => __DIR__ . '/forms/',
         'Multiple\Shared\Libs'          => __DIR__ . '/../shared/libs/',

      ]);

      $loader->register();
   }





   /**
    * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
    */
   public function registerServices( $di )
   {

      $config = include __DIR__ . "/config/config.php";

      $di->set('dispatcher', function () {

         $eventsManager = new \Phalcon\Events\Manager();
         $eventsManager->attach("dispatch", function ( $event, $dispatcher, $exception ) {

            if ( $event->getType() == 'beforeException' ) {
               switch ($exception->getCode()) {
                  case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                  case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                     $dispatcher->forward([
                        'controller' => 'index',
                        'action'     => 'index'
                     ]);

                     return false;
               }
            }
         });

         $dispatcher = new Dispatcher();
         $dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers");
         $dispatcher->setEventsManager($eventsManager);

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

      $di->set('session', function () {
         $session = new SessionAdapter();
         $session->start();
         return $session;
      });

      $di['view'] = function () {

         $view = new View();

         $view->setViewsDir(__DIR__ . '/views/');

         $view->registerEngines([
            ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
         ]);

         return $view;
      };

      $di->setShared('view', function () use ( $config ) {

         $view = new View();

         $view->setViewsDir(__DIR__ . '/views/');

         $view->registerEngines([

               '.volt'  => function ( $view, $di ) use ( $config ) {

                  $volt = new VoltEngine($view, $di);

                  $volt->setOptions([
                     'compiledPath'      => __DIR__ . '/cache/',
                     'compiledSeparator' => '_'
                  ]);

                  return $volt;
               },

               '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
            ]
         );

         return $view;
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
