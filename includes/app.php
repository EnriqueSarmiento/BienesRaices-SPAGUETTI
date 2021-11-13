<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// CONECTAR A LA BASE DE DATOS
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);

