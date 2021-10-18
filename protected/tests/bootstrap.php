<?php

// change the following paths if necessary
$yiit='C:\Users\HP\Downloads\Compressed\yii-1.1.24.a5ab20\framework\yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
