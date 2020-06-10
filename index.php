<?php
// CONFIGURAÇÃO DE SESSÃO 
session_start();


// CRIAR ROTA PARA A URL LOGIN
// Configuração de estrutura MVC: app/controller - model - view
// BLOQUEAR ACESSO DIRETO AS PÁGINAS 

require_once 'app/core/Core.php';
require_once 'lib/Vitor/Database/Connection.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/DashboardController.php';
require_once 'vendor/autoload.php';
require_once 'app/model/User.php';

$core = new Core;
echo $core->start($_GET); 