<?php

// プロジェクトの設定ファイルを読み込む
require_once __DIR__.'/../config/ProjectConfiguration.class.php';

// アプリケーションの設定を取得
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);

// アプリケーションのフロントコントローラを起動
sfContext::createInstance($configuration)->dispatch();

