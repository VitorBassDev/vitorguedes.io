<?php
	
	/**
	 *Criação 
	 * Implementação da MODEL USER-USUARIO
	 * (classe que espelha o banco uma tablela do banco de dados) 
	 * Implementação dos atributos da classe
	 * Implementação de encapsulamento dos atributos e métodos
	 * Implementação da validação do login - MÉTODO
	 * Usar a classe de conexão com banco de dados
	 */

	use Vitor\Database\Connection;

	class User
	{
		private $id;
		private $nome;
		private $email;
		private $senha;

		public function validateLogin()
		{
			/** 
			 * conectar no banco de dados
			 * Validar email e senha informada do ato do login 
			 * Selecionar Usuario que tenho o email informado no ato do login
			 * Criar Sessão e Fazer e redirecionamento para o Painel Administrativos
			 * Tratar Erros 
			 * */
			
			// Conexão com o banco de dados
			$conn = Connection::getConn();
			//var_dump($conn);

			// Validar Email - Buscar no banco de dados
			$sql = 'SELECT * FROM usuario WHERE email = :email';
			
			// Executar o script - Conectar ao Banco e Executar o Scrip
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(':email', $this->email);
			$stmt->execute();
			
			if($stmt->rowCount()){
				$result = $stmt->fetch();

				if($result['senha'] === $this->senha){
					$_SESSION['usr'] = array(
						'id_user' => $result['id'],
						'name_user' => $result['name']
					);
					return true;
				} 
			}
			throw new \Exception('Login Inválido');

		}

		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function setSenha($senha)
		{
			$this->senha = $senha;
		}

		public function getSenha()
		{
			return $this->senha;
		}

	}