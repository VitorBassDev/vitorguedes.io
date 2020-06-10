<?php

class LoginController
{
	public function index(){
		$loader = new \Twig\Loader\FilesystemLoader('app/view');
		$twig = new \Twig\Environment($loader, [
			//'cache' => '/path/to/compilation_cache',
			'auto_reload' => true
		]);
		$template = $twig->load('login.html');
		$paramters['error'] = $_SESSION['msg_error'] ?? null;

		return $template->render($paramters);
	}

	public function check(){
	/**
	 * Recebe - Email e Senha digitado e enviado pelo formulário
	 * Aciona o Médotdo validateLogin para validar o login
	 */
	
	 try{
			$user = new User;
			$user->setEmail($_POST['email']);
			$user->setSenha($_POST['senha']);
			$user->validateLogin();
			header('Location: http://localhost/Portifolio/vitorguedes.io/Dashboard/index');

			}catch(\Exception $e){
				$_SESSION['msg_error'] = array ('msg' => $e->getMessage(), 'count' => 0);
				header('Location: http://localhost/Portifolio/vitorguedes.io/');
	 }
	}
}