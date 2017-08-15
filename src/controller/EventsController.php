<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'EventDAO.php';

class EventsController extends Controller {

  private $eventDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
  }

  public function index() {
    $event1 = $this->eventDAO->selectById( 13 );
    $this->set('event1', $event1);

    $event2 = $this->eventDAO->selectById( 20 );
    $this->set('event2', $event2);

    $event3 = $this->eventDAO->selectById( 5 );
    $this->set('event3', $event3);

    $event4 = $this->eventDAO->selectById( 4 );
    $this->set('event4', $event4);
  }

  public function agenda() {
    $conditions = array();

    //example: search on title
    // $conditions[] = array(
    //   'field' => 'title',
    //   'comparator' => 'like',
    //   'value' => 'de'
    // );

    //example: search on location_id
    // $conditions[] = array(
    //   'field' => 'location_id',
    //   'comparator' => '=',
    //   'value' => 4
    // );

    //example: search on location name
    // $conditions[] = array(
    //   'field' => 'location',
    //   'comparator' => 'like',
    //   'value' => 'biljartzaal'
    // );

    //example: search on performer id
    // $conditions[] = array(
    //   'field' => 'performer_id',
    //   'comparator' => '=',
    //   'value' => '1'
    // );

    //example: search on organiser name
    // $conditions[] = array(
    //   'field' => 'organiser',
    //   'comparator' => 'LIKE',
    //   'value' => 'NL'
    // );

    //example: search on tag name
    // $conditions[] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => 'figurentheater'
    // );

    //example: events in december - januari
    $conditions[] = array(
      'field' => 'start',
      'comparator' => '>=',
      'value' => '2017-12-01 00:00:00'
    );
    $conditions[] = array(
      'field' => 'start',
      'comparator' => '<',
      'value' => '2018-01-31 23:59:59'
    );

    //example: events in april
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '>=',
    //   'value' => '2018-04-01 00:00:00'
    // );
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '<',
    //   'value' => '2018-04-30 23:59:59'
    // );

    //example: events on januari 6
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '>=',
    //   'value' => '2018-01-06 00:00:00'
    // );
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '<',
    //   'value' => '2018-01-06 23:59:59'
    // );

    //example: events in december - januari, with a certain tag
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '>=',
    //   'value' => '2017-12-01 00:00:00'
    // );
    // $conditions[] = array(
    //   'field' => 'start',
    //   'comparator' => '<',
    //   'value' => '2018-01-31 23:59:59'
    // );
    // $conditions[] = array(
    //   'field' => 'tag',
    //   'comparator' => '=',
    //   'value' => 'figurentheater'
    // );

    $events = $this->eventDAO->search($conditions);
    $this->set('events', $events);
  }

  public function detail() {
    if( !isset( $_GET['id']) ){
      $_SESSION["error"] = ['Dit event bestaat niet'];
      $this->redirect('index.php');
    }

    $id = $_GET['id'];
    $event = $this->eventDAO->selectById( $id );

    $this->set('event', $event);
  }

}
