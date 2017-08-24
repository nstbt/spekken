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
    $tags = $this->eventDAO->selectTags();
    $this->set('tags', $tags);

    $id = $_GET['id'];
    $this->searchOnPeriod( $id );

    if ( isset( $_GET['tag'] ) ) {
      $tag = $_GET['tag'];
      $this->searchOnTag( $id, $tag );
    }

    if ( isset( $_GET['start_age'] ) && isset( $_GET['end_age'] ) ) {
      $startAge = $_GET['start_age'];
      $endAge = $_GET['end_age'];
      $this->searchOnAge( $id, $startAge, $endAge );
    }
  }

  private function searchOnPeriod( $id ) {
    $conditions = array();

    $conditions[0] = array(
      'field' => 'period',
      'comparator' => '=',
      'value' => $id
    );

    $events = $this->eventDAO->search($conditions);

    if( !$events ){
      $_SESSION["error"] = 'Er zijn geen events deze periode';
    }

    $this->set('events', $events);
  }

  private function searchOnTag( $id, $tag ) {
    $conditions = array();

    $conditions[0] = array(
      'field' => 'period',
      'comparator' => '=',
      'value' => $id
    );

    $conditions[1] = array(
      'field' => 'tag',
      'comparator' => '=',
      'value' => $tag
    );

    $events = $this->eventDAO->search($conditions);

    if( !$events ){
      $_SESSION["error"] = 'Er zijn geen events teruggevonden met deze tag';
    }

    $this->set('events', $events);
  }

  private function searchOnAge( $id, $startAge, $endAge ) {
    $conditions = array();

    $conditions[0] = array(
      'field' => 'period',
      'comparator' => '=',
      'value' => $id
    );

    $conditions[1] = array(
      'field' => 'start_age',
      'comparator' => '<=',
      'value' => $startAge
    );

    $conditions[2] = array(
      'field' => 'end_age',
      'comparator' => '>=',
      'value' => $endAge
    );

    $events = $this->eventDAO->search($conditions);

    if( !$events ){
      $_SESSION["error"] = 'Er zijn geen events teruggevonden met deze leeftijdsgroep';
    }

    $this->set('events', $events);
  }


  public function search() {
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

    if( !$event ){
      $_SESSION["error"] = 'Dit event bestaat niet';
    }

    $this->set('event', $event);
  }

}
