<?php
$events = get_field('events');

$year_now = date('Y');
$main_events = [];
$all_events  = [];


if(!empty($events)){
  $k = 1;
  foreach($events as $event){
    $date_parts  = explode('.', $event['date']);
    $event_day   = $date_parts[0];
    $event_month = $date_parts[1];
    $event_year  = $date_parts[2];

    if(!$event['repeated'] && $event_year != $year_now){ continue; }

    if($event['main']){
      $main_events[$k] = date('F j', strtotime($event['date'])) . ' - ' . $event['title'];
    }

    $all_events[$k] = [
      'title' => $event['title'],
      'date' => $event['date'],
      'date_day' => $event_day,
      'date_month' => $event_month,
      'image' => $event['image']['sizes']['large'],
    ];

    ++ $k;
  }
}