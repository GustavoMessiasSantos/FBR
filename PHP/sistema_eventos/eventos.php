<?php

class Evento{
    private $titulo;
    private $organizador;
    private $data_evento;
    private $status;
    private $publico;
    private $arrecadacao;



    public function __construct($titulo, $organizador, $data_evento, $status, $publico, $arrecadacao){
        $this->titulo = $titulo;
        $this->organizador = $organizador;
        $this->data_evento = $data_evento;
        $this->status = $status;
        $this->publico = $publico;
        $this->arrecadacao = $arrecadacao;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getOrganizador(){
        return $this->organizador;
    }
    
    public function getDataEvento(){
        return $this->data_evento;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function getPublico(){
        return $this->publico;
    }
    
    public function getArrecadacao(){
        return $this->arrecadacao;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function setOrganizador($organizador){
        $this->organizador = $organizador;
    }
    
    public function setDataEvento($data_evento){
        $this->data_evento = $data_evento;
    }
   
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function setPublico($publico){
        $this->publico = $publico;
    }
    
    public function setArrecadacao($arrecadacao){
        $this->arrecadacao = $arrecadacao;
    }

    public function exibirEvento(){
        echo "Nome do Evento: " . $this->getTitulo() ."<br>";
        echo "Organizador: " . $this->getOrganizador() ."<br>";
        echo "Data do Evento: " . $this->getDataEvento() ."<br>";
        echo "Status do Evento: ". $this->getStatus() ."<br>";
        echo "Publico do Evento: " . $this->getPublico() . " Pessoas" ."<br>";
        echo "Arrecadacao do Evento: R$ " . $this->getArrecadacao() ."<br>";

        if($this->getStatus() == "Concluido"){
            echo "Esse evento já ocorreu!";
        }elseif($this->getStatus() == "Pendente"){
            echo "Esse evento ainda irá ocorrer!";
        }elseif($this->getStatus() == "Cancelado"){
            echo "Esse evento foi cancelado!";
        }elseif($this->getStatus() == "Em Andamento"){
            echo "Esse evento está ocorrendo agora!";
        }else{
            echo "Status desconhecido ou inexistente!";
        }
    }
 
    
}