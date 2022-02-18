<?php


class ResultApi {

  public function getResults($serverPath) {
    $results = [];

    foreach (glob($serverPath . '/*.json') as $file) {
      $filetext = file_get_contents($file);
      $filetext = mb_convert_encoding($filetext, "UTF-8", "UTF-16LE");
      $results[] = json_decode($filetext, TRUE);
    }

    return $results;
  }

}