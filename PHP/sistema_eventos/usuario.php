<?php

class Usuario{
    private $nome;
    private $email;
    private $senha;


    public function __construct($nome, $email, $senha) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    }


    public function getNome() {
    return $this->nome;
    }

    public function getEmail() {
    return $this->email;
    }

    public function verificarSenha($senha) {
        return $this->senha === $senha;
    }

    public function exibirUsuario() {
        echo "Nome do Usuário: " . $this->getNome() . "<br>";
        echo "Email: " . $this->getEmail() . "<br>";
        echo "-----------------------------<br>";
    }
}