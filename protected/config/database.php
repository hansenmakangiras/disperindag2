<?php

// This is the database connection configuration.
return array(
    //'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database

    'connectionString' => 'mysql:host=127.0.0.1;dbname=disperindag',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'BlackID85',
    'charset' => 'utf8',
    'tablePrefix' => 'sys_',
    'schemaCachingDuration' => 3600,
    'enableParamLogging' => true,
    'enableProfiling' => true,

);
