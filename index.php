<?php
$config = file_get_contents('config.json');
if ($config) {
  $config = json_decode($config, TRUE);
}

$authKey = filter_input(INPUT_POST, 'AUTH_KEY', FILTER_SANITIZE_SPECIAL_CHARS);
if ($authKey === $config['auth_key']) {
  if ($serverPath = filter_input(INPUT_POST, 'RESULTS_SERVER_PATH', FILTER_SANITIZE_SPECIAL_CHARS)) {
    include 'ResultApi.php';
    header('Content-type: application/json');
    $resultApi = new ResultApi();
    echo json_encode($resultApi->getResults($serverPath));
  }
  else {
    echo 'no path set';
  }
}
else {
  echo 'Authorisation failed.';
}