<?php

class ResultApi {

  public function getResults() {
    $folders = glob('results/*', GLOB_ONLYDIR);
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