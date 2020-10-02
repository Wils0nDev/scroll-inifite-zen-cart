<?php

class base {

  var $observers = array();
 
  function attach(&$observer, $eventIDArray) {
    foreach($eventIDArray as $eventID) {
      $nameHash = md5(get_class($observer).$eventID);
      $this->observers[$nameHash] = array('obs'=>&$observer, 'eventID'=>$eventID);
    }
  }
  /**
   * method used to detach an observer from the notifier object
   * @param object
   * @param array
   */
  function detach($observer, $eventIDArray) {
    foreach($eventIDArray as $eventID) {    
      $nameHash = md5(get_class($observer).$eventID);
      unset($this->observers[$nameHash]);
    }
  }
  /**
   * method to notify observers that an event as occurred in the notifier object
   * 
   * @param string The event ID to notify for
   * @param array paramters to pass to the observer, useful for passing stuff which is outside of the 'scope' of the observed class.
   */
  function notify($eventID, $paramArray = array()) {
    foreach($this->observers as $key=>$obs) {
      if ($obs['eventID'] == $eventID) {
        $obs['obs']->update($this, $eventID, $paramArray);
      }
    }
  }
}
?>