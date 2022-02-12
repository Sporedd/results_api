<?php
if (isset($_POST['AUTH_KEY']) && $_POST['AUTH_KEY'] === 'gasdg51sdr6g51ser61g6sdr1g') {
  include 'ResultApi.php';
  header('Content-type: application/json');
  $resultApi = new ResultApi();
  echo json_encode($resultApi->getResults());
}
else {
  echo 'Authorisation failed.';
}