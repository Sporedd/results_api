<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ResultApi {

  private array $config;

  public function __construct() {
    $this->config = json_decode(file_get_contents('config.json'), TRUE);
  }

  public function getResults() {
    $folders = $this->config['paths_to_results'];
    $results = [];

    foreach ($folders as $folder) {
      foreach (glob($folder . '/*.json') as $file) {
        $filetext = file_get_contents($file);
        $filetext = mb_convert_encoding($filetext, "UTF-8", "UTF-16LE");
        $results[$folder][] = json_decode($filetext, TRUE);
      }
    }

    return $results;
  }

}