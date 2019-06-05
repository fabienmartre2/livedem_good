<?php

/*
* Smarty plugin
* -------------------------------------------------------------
* Type:     modifier
* Name:     relative_date
* Version:  1.1
* Date:     November 28, 2008
* Author:   Chris Wheeler <chris@haydendigital.com>
* Purpose:  Output dates relative to the current time
* Input:    timestamp = UNIX timestamp or a date which can be converted by strtotime()
*           days = use date only and ignore the time
*           format = (optional) a php date format (for dates over 1 year)
* -------------------------------------------------------------
*/

function smarty_modifier_relative_date($timestamp, $days = false, $format = "d/m/Y à H:i") {
  if (!is_numeric($timestamp)) {
    // It's not a time stamp, so try to convert it...
    $timestamp = strtotime($timestamp);
  }
  
  if (!is_numeric($timestamp)) {
    // If its still not numeric, the format is not valid
    return false;
  }
  
  // Calculate the difference in seconds
  $difference = time() - $timestamp;
  // Check if we only want to calculate based on the day
  if ($days && $difference < (60*60*24)) { 
    return "<abbr title=\"".date($format, $timestamp)."\">Aujourd'hui</abbr>"; 
  }
  if ($difference < 3) { 
    return "<abbr title=\"".date($format, $timestamp)."\">A l'instant</abbr>"; 
  }
  if ($difference < 60) {    
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a ".$difference . " secondes</abbr>"; 
  }
  if ($difference < (60*2)) {    
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a 1 minute</abbr>"; 
  }
  if ($difference < (60*60)) { 
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a ".intval($difference / 60) . " minutes</abbr>"; 
  }
  if ($difference < (60*60*2)) { 
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a 1 heure</abbr>"; 
  }
  if ($difference < (60*60*24)) {    
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a ".intval($difference / (60*60)) . " heures</abbr>"; 
  }
  if ($difference < (60*60*24*2)) { 
    return "<abbr title=\"".date($format, $timestamp)."\">Il y 1 jour</abbr>"; 
  }
  if ($difference < (60*60*24*7)) { 
    return "<abbr title=\"".date($format, $timestamp)."\">Il y a ".intval($difference / (60*60*24)) . " jours</abbr>"; 
  }
  
  // More than a year ago, just return the formatted date
  return @date($format, $timestamp);

}

?>