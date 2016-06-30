<?php

namespace Drupal\comscore;

class InlineScript {

  public function render($current_url, $genre = '', $package = '', $segment = '') {
    $data = [];
    $data['c1'] = '2';

    if ($current_url) {
      $data['c4'] = $current_url;
    }
    if ($genre) {
      $data['c5'] = $genre;
    }

    if ($package) {
      $data['c6'] = $package;
    }

    if ($segment) {
      $data['c15'] = $segment;
    }

    $json = json_encode($data);

    $script = <<<COMSCORE
 var _comscore = _comscore || [];
  _comscore.push($json);

 (function() {
   var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
   s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
   el.parentNode.insertBefore(s, el);
 })();
COMSCORE;
    return $script;
  }

}
