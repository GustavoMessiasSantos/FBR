<?php

function criarEvento($titulo_evento, $organizador, $data_evento, $status, $publico, $arrecadacao) {

       return[
        'titulo' => $titulo_evento,
        'organizador' => $organizador,
        'data_evento' => $data_evento,
        'status' => $status,
        'publico' => $publico,
        'arrecadacao' => $arrecadacao
       ];
    }  

function exibirEvento($evento){     
    echo "Titulo do evento: " . $evento['titulo'] . "<br>";
    echo "Organizador: " . $evento['organizador'] . "<br>";
    echo "Data do Evento: " . $evento['data_evento'] . "<br>";
    echo "Status: " . $evento['status'] ."<br>";
    echo "Publico: " . $evento['publico'] . " Pessoas <br>";
    echo "Arrecadação: R$ " . $evento['arrecadacao'] . "<br>";

//Lógica da exibição

    if($evento['status'] == "Concluido") {
        echo "Este evento já ocorreu, lamentamos. Esperamos você no próximo!<br>";

    }elseif($evento['status'] == "Em andamento"){
        echo "Este evento está em andamento, corra antes que o" . $evento['titulo'] . " acabe<br>";
    }elseif($evento['status'] == "Pendente"){
        echo "Este evento ainda irá ocorrer, corra e garanta sua vaga para " . $evento['titulo'] . " na  
        seguinte data: <br>" . $evento['data_evento'];
    }else{
        echo "Este evento não existe!<br>";
       
}

echo "-----------------------------<br>"; 

}



