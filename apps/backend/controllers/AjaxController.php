<?php

namespace Multiple\Backend\Controllers;

use Multiple\Shared\Models\Rooms;
use Multiple\Shared\Models\RoomServices;
use Multiple\Shared\Models\RoomOptions;
use Multiple\Shared\Models\RoomToOptions;
use Multiple\Shared\Models\RoomToServices;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Query\Builder as Builder;

class AjaxController extends ControllerBase
{

  public function initialize()
  {
    $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    if ( !$this->request->isAjax() ) {
      return false;
    }
  }





  //
  // Admin service actions
  //
  public function addServiceAction()
  {
    $villaID   = $this->request->getPost('villaID', 'int');
    $serviceID = $this->request->getPost('id', 'int');

    $service = RoomToServices::findFirst([ 'room_id = ?0 AND service_id = ?1',
      'bind' => [
        $villaID,
        $serviceID
      ]
    ]);

    if ( $service === false ) {
      $rts             = new RoomToServices();
      $rts->room_id    = $villaID;
      $rts->service_id = $serviceID;

      if ( $rts->save() ) {

        $villaService = RoomServices::findFirstById($serviceID);
        die( '{"status": "ok", "title":"' . $villaService->service_title . '", "imgSrc": "' . $villaService->service_logo . '"}' );
      }
    } else {
      die( '{"status": "error"}' );
    }
  }





  //remove service
  public function removeServiceAction()
  {
    $service = RoomToServices::find([ 'room_id = ?0 AND service_id = ?1',
      'bind' => [
        $this->request->getPost('villaID', 'int'),
        $this->request->getPost('id', 'int') ]
    ]);

    $message = ( $service->delete() ) ? 'deleted' : 'error';
    die( $message );
  }




  //
  // Admin housing actions
  //
  public function removeHousingAction()
  {
    $housing = RoomToOptions::find([ 'room_id = ?0 AND option_id = ?1',
      'bind' => [
        $this->request->getPost('villaID', 'int'),
        $this->request->getPost('id', 'int')
      ]
    ]);

    $message = ( $housing->delete() ) ? 'deleted' : 'error';
    die( $message );
  }





  public function updateHousingAction()
  {
    $housing = RoomToOptions::findFirst([ 'room_id = ?0 AND option_id = ?1',
      'bind' => [
        $this->request->getPost('villaID', 'int'),
        $this->request->getPost('id', 'int')
      ]
    ]);

    if ( $housing ) {
      $housing->option_value = $this->request->getPost('housing');
      $housing->save();
      echo 'ok';
    }
  }





  public function addHousingAction()
  {
    $villaID   = $this->request->getPost('villaID', 'int');
    $housingID = $this->request->getPost('id', 'int');

    $housing = RoomToOptions::findFirst([ 'room_id = ?0 AND option_id = ?1',
      'bind' => [ $villaID,
        $housingID ]
    ]);

    if ( $housing === false ) {
      $housing               = new RoomToOptions();
      $housing->room_id      = $villaID;
      $housing->option_id    = $housingID;
      $housing->option_value = ' ';

      if( $housing->save()){
        $villaHousing = RoomOptions::findFirstById($housingID);
        die( '{"status": "ok", "title":"' . $villaHousing->option_title . ' "}' );
      }
    }
    die( '{"status": "error"}');
  }
}
