<?php
	class DashboardController
	{
		public function index()
		{
			//echo 'Usuário Logado com Sucesso <a href="http://localhost/login/login02/dashboard/logout"> Logout </a>';
		$loader = new \Twig\Loader\FilesystemLoader('app/view');
		$twig = new \Twig\Environment($loader, [
		//'cache' => '/path/to/compilation_cache',
		'auto_reload' => true
		]);
		
		$template = $twig->load('dashboard.html');
		$paramters['name_user'] = $_SESSION['usr'] ['name_user'];

		return $template->render($paramters);
		}

		public function logout(){

			unset($_SESSION['usr']);
			session_destroy();
			header('Location: http://localhost/Portifolio/vitorguedes.io/');
		}
	}