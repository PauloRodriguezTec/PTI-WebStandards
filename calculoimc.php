<?php
// Função para classificar o IMC
function classificarIMC($imc) {
    $faixas = [
        ["limiteMin" => 0,     "limiteMax" => 18.5, "classificacao" => "Magreza"],
        ["limiteMin" => 18.51, "limiteMax" => 24.9, "classificacao" => "Saudável"],
        ["limiteMin" => 25.0,  "limiteMax" => 29.9, "classificacao" => "Sobrepeso"],
        ["limiteMin" => 30.0,  "limiteMax" => 34.9, "classificacao" => "Obesidade Grau I"],
        ["limiteMin" => 35.0,  "limiteMax" => 39.9, "classificacao" => "Obesidade Grau II"],
        ["limiteMin" => 40.0,  "limiteMax" => INF,  "classificacao" => "Obesidade Grau III"]
    ];

    foreach ($faixas as $faixa) {
        if ($imc >= $faixa["limiteMin"] && $imc <= $faixa["limiteMax"]) {
            echo "Atenção, seu IMC é " . number_format($imc, 2, ".", "") . 
                 ", e você está classificado como " . $faixa["classificacao"] . ".<br>";
            return;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // debug – mostra todo o conteúdo do formulário
    echo '<pre>$_POST: ' . print_r($_POST, true) . '</pre>';

    $altura = $_POST["altura"]; // altura em cm
    $peso   = $_POST["peso"];   // peso em kg

    // imprime os valores individuais
    echo "altura recebida: $altura cm<br>";
    echo "peso recebido: $peso kg<br>";

    // cálculo do IMC (altura convertida para metros)
    $alturaMetros = $altura / 100;
    $imc = $peso / ($alturaMetros * $alturaMetros);

    // chama a função para classificar o IMC
    classificarIMC($imc);
}
?>