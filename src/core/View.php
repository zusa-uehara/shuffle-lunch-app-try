<?php

class View{

  protected $baseDir;

  public function __construct($baseDir){
    $this->baseDir = $baseDir;
  }

  public function render($path, $variables, $layout = false){
    //['groups' => [] ]
    // $groups = [];
    extract($variables);

    //レイアウトとそれ以外でわけるとレイアウトくずれるので
    //ob_startで内部的に保存（バッファリング）する
    ob_start();

    //require 'views/shuffle/index.php'
    require $this->baseDir . '/' . $path . '.php';


    //require 'views/shuffle/index.php'
    $content = ob_get_clean();

    ob_start();
    require $this->baseDir . '/' . $layout . '.php';
    $layout = ob_get_clean();

    //ここでhtmlの情報を返している
    return $layout;
  }
}
