<?php
//to give permission to other server to sent request by js example
header("Access-Control-Allow-Origin: http://127.0.0.1:5500 ");

//get how many sec to christmas   from  since January 1 1970 00:00:00 GMT.
$christmas = date('Y-12-25');
$date = strtotime("now");
//get how many sec to christmas   from  now.
$secTochristmas = strtotime($christmas) - $date;
$secInDay = 86400;
$secInHour = 3600;
$secInMin = 60;
//get it in more  detials
$days = (int)($secTochristmas / $secInDay);
$hour = (int)(($secTochristmas % $secInDay) / $secInHour);
$min = (int)((($secTochristmas % $secInDay) % $secInHour) / $secInMin);
$sec = (int)(((($secTochristmas % $secInDay) % $secInHour) % $secInMin));
$results = [
  "days" => $days,
  "hour" => $hour,
  "min" => $min,
  "seconds" => $sec,
];
echo json_encode($results);
