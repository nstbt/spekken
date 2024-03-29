<?php
require_once __DIR__ . '/DAO.php';
class EventDAO extends DAO {

  public function search($conditions = array()) {
    $sql = "SELECT DISTINCT
      ma3_spekken_events.*,
      ma3_spekken_performers.name as performer,
      ma3_spekken_locations.name as location
      FROM `ma3_spekken_events`
      INNER JOIN `ma3_spekken_performers` ON ma3_spekken_events.performer_id = ma3_spekken_performers.id
      LEFT OUTER JOIN `ma3_spekken_locations` ON ma3_spekken_events.location_id = ma3_spekken_locations.id
      LEFT OUTER JOIN `ma3_spekken_events_tags` ON ma3_spekken_events.id = ma3_spekken_events_tags.event_id
      LEFT OUTER JOIN `ma3_spekken_tags` ON ma3_spekken_tags.id = ma3_spekken_events_tags.tag_id
      WHERE 1
    ";
    $conditionSqls = array();
    $conditionParams = array();
    //handle the conditions
    $conditionsSqls = array();
    $i = 0;
    foreach($conditions as &$condition) {
      if(empty($condition['comparator'])) {
        $condition['comparator'] = '=';
      }
      $comparator = DAO::getSanitizedComparator($condition['comparator']);
      $columnName = DAO::getSanitizedColumnName($condition['field']);
      //special columns?
      if($columnName == 'location_id') {
        $columnName = 'ma3_spekken_locations.id';
      } else if($columnName == 'location') {
        $columnName = 'ma3_spekken_locations.name';
      } else if($columnName == 'organiser') {
        $columnName = 'ma3_spekken_performers.name';
      } else if($columnName == 'tag_id') {
        $columnName = 'ma3_spekken_tags.id';
      } else if($columnName == 'tag') {
        $columnName = 'ma3_spekken_tags.tag';
      }
      //handle functions
      if(!empty($condition['function'])) {
        $function = DAO::getSanitizedFunction($condition['function']);
        $columnName = "{$function}({$columnName})";
      }
      $conditionSqls[] = "{$columnName} {$comparator} :{$i}";
      if($comparator == 'like') {
        $conditionParams[$i] = '%' . $condition['value'] . '%';
      } else {
        $conditionParams[$i] = $condition['value'];
      }
      $i++;
    }
    if(!empty($conditionSqls)) {
      $sql .= 'AND ' . implode(' AND ', $conditionSqls);
    }
    $sql .= " ORDER BY `start` ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($conditionParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(empty($result)) {
      return $result;
    }
    $eventIds = $this->_getEventIdsFromResult($result);
    $tagsByEventId = $this->_getTagsForEventIds($eventIds);
    //handle the tags & locations in the foreach loop - we want to see all tags for a given event
    foreach($result as &$row) {
      $row['tags'] = array();
      if(!empty($tagsByEventId[$row['id']])) {
        $row['tags'] = $tagsByEventId[$row['id']];
      }
    }
    return $result;
  }

  public function selectById($id) {
    $sql = "SELECT DISTINCT
      ma3_spekken_events.*,
      ma3_spekken_performers.name as performer,
      ma3_spekken_tags.tag as tag,
      ma3_spekken_locations.name as location
      FROM `ma3_spekken_events`
      INNER JOIN `ma3_spekken_performers` ON ma3_spekken_events.performer_id = ma3_spekken_performers.id
      LEFT OUTER JOIN `ma3_spekken_locations` ON ma3_spekken_events.location_id = ma3_spekken_locations.id
      LEFT OUTER JOIN `ma3_spekken_events_tags` ON ma3_spekken_events.id = ma3_spekken_events_tags.event_id
      LEFT OUTER JOIN `ma3_spekken_tags` ON ma3_spekken_tags.id = ma3_spekken_events_tags.tag_id
      WHERE ma3_spekken_events.id = :id
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // if(empty($result)) {
    //   return $result;
    // }
    // $eventIds = $this->_getEventIdsFromResult($result);
    // $tagsByEventId = $this->_getTagsForEventIds($eventIds);
    // //handle the tags & locations in the foreach loop - we want to see all tags for a given event
    // foreach($result as &$row) {
    //   $row['tags'] = array();
    //   if(!empty($tagsByEventId[$row['id']])) {
    //     $row['tags'] = $tagsByEventId[$row['id']];
    //   }
    // }
    // return $result;
  }

  private function _getEventIdsFromResult(&$result) {
    $eventIds = array();
    foreach($result as &$row) {
      $eventIds[] = $row['id'];
    }
    return $eventIds;
  }

  private function _getTagsForEventIds($eventIds) {
    $tagsByEventId = array();
    $eventIdsImploded = implode(', ', $eventIds);
    $sql = "SELECT
      ma3_spekken_tags.*,
      ma3_spekken_events_tags.event_id
      FROM `ma3_spekken_tags`
      RIGHT OUTER JOIN `ma3_spekken_events_tags` ON ma3_spekken_events_tags.tag_id = ma3_spekken_tags.id
      WHERE ma3_spekken_events_tags.event_id IN ({$eventIdsImploded})
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row) {
      if(empty($tagsByEventId[$row['event_id']])) {
        $tagsByEventId[$row['event_id']] = array();
      }
      $tagsByEventId[$row['event_id']][] = $row;
    }
    return $tagsByEventId;
  }

  public function selectTags() {
    $sql = "SELECT * FROM ma3_spekken_tags";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
