<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$debug = FALSE;

if ($debug || isset($_POST['AUTH_KEY']) && $_POST['AUTH_KEY'] === 'gasdg51sdr6g51ser61g6sdr1g') {
  include 'ResultApi.php';
  if (!$debug) {
    header('Content-type: application/json');
  }
  $resultApi = new ResultApi();
  echo json_encode($resultApi->getResults());
}
else {
  echo 'Authorisation failed.';
}