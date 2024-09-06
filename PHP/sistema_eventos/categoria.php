<?php
class Categoria {
    private $nome;
    private $descricao;

    public function __construct($nome, $descricao) {
        $this->nome = $nome;
        $this->descricao = $descricao;
    }


    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Método para exibir informações da categoria
    public function exibirCategoria() {
        echo "Nome da Categoria: " . $this->getNome() . "<br>";
        echo "Descrição: " . $this->getDescricao() . "<br>";
        echo "-----------------------------<br>";
    }
}