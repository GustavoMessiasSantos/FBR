<?php 
/*
// Microprojeto 01

//Definir as Variaveis
$titulo_evento = "Lavagem de carro beneficente";
$descricao = "Lavar os carros sexta-feira a tarde<br> para arrecadar fundos para caridade";
$data_de_inicio = "29/09/2024";
$data_da_conclusão = "30/04/2024";
$clientes_do_dia = 50;
$organizador = "<h2>Gusta lava-jato<h2>";
$fundo_arrecadado = "R$1500";


//Exibir as Informacoes

echo "<h1>Organizador: </h1>" . $organizador . "<br>";
echo "<h2>Titulo do evento: " . "<h2>$titulo_evento</h2>" . "<br>";
echo "<b>Descricao da tarefa: </b>" . "<b><i>$descricao</i></b>" . "<br>";
echo "Data de Inicio: " . $data_de_inicio . "<br>";
echo "Data de Conclusão: " . $data_da_conclusão . "<br>";
echo "Clientes atendidos no dia: " . $clientes_do_dia . "<br>";
echo "Fundo arrecadado: " . $fundo_arrecadado . "<br>";

*/

//Array para armazenar multiplos eventos

/*require_once 'funcoesEventos.php';

$eventos = [];

$eventos[] = criarEvento("Doação de casaco", "Capela São João", '25/11/2024', "Pendente", 0, 0);
$eventos[] = criarEvento("Bingo do Gil", "Chacara do Seu Zé", "05/06/2024", "Concluido", 200, 2650.25);
$eventos[] = criarEvento("Doação de cestas básicas", "Ong dos Pobres", "02/09/2024", "Em andamento", 15, 6000);
$eventos[] = criarEvento("Forró beneficente", "Vovós do amanhã", "03/10/2024","Pendente", 0, 0);

foreach ($eventos as $evento) {
    exibirEvento($evento);
}*/

require_once 'eventos.php';
require_once 'usuario.php';
require_once 'categoria.php';

$categorias = [] ;

$categorias[] = new Categoria('Dança', 'Uma maneira de se divertir em uma tarde ou noite!');
$categorias[] = new Categoria('Aula','Uma maneira de aprender novas coisas e se beneficiar');
$categorias[] = new Categoria('Caridade','Ajude ao próximo e aqueles que necessitam!');

function exibirCategorias($categorias) {
    foreach ($categorias as $categoria) {
        echo "<h1>Categorias</h1>";
        $categoria->exibirCategoria(); // Chama o método exibirEvento de cada instância
        echo "<br><br>";
    }
}
exibirCategorias($categorias);

$usuarios = [];

$usuarios[] = new Usuario("Zé da Manga", "zezin@fake.com", "pirulito");
$usuarios[] = new Usuario("Vovo Rose", "vovozinha@fake.com", "paodelo");

function exibirUsuarios($usuarios){
    foreach($usuarios as $usuario) {
        echo "<h2>Usuarios da Plataforma</h2>";
        $usuario->exibirUsuario();
        echo "<br><br>";
}
}
exibirUsuarios($usuarios);

$eventos = [];

$eventos[] = new Evento(
    "Forró dos Véi",
    "Grupo da Terceira Idade Ativa",
    "07/09/2024",
    "Pendente",
    0,
    0
);

$eventos[] = new Evento(
    "Doação de Sextas Básicas",
    "Igreja São Miguel",
    "05/09/2024",
    "Concluido",
    25,
    8000
);

$eventos[] = new Evento(
    "Aula de Cerâmica",
    "Grupo Estadual do Governo",
    "06/09/2024",
    "Cancelado",
    0,
    0
);

$eventos[] = new Evento(
    "Aniversário da Cidade",
    "Governo",
    "07/09/2024",
    "Em Andamento",
    3262,
    0
);

function exibirEventos($eventos) {
    echo "<h1>Eventos do Mês</h1>";
    foreach ($eventos as $indice => $evento) {
        echo "<h2>Evento " . ($indice + 1) . ":</h2>";
        $evento->exibirEvento();
        echo "<br><br>";
    }
}
exibirEventos($eventos);
