<?php

// Recebe os dados do formulário

$empresa = $_POST['empresa'];
$cnpj = $_POST['cnpj'];
$funcionario = $_POST['funcionario'];
$valor = $_POST['valor'];
$motivo = $_POST['motivo'];
$numero = $_POST['numero'];
$data = $_POST['data'];


// Atualiza contador do vale

$arquivo = "dados/contador.txt";

$contadorAtual = intval(file_get_contents($arquivo));

file_put_contents($arquivo, $contadorAtual + 1);


// Formata valor

$valorFormatado = number_format($valor, 2, ",", ".");


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<title>
Vale Funcionário - <?php echo $numero; ?>
</title>


<link rel="stylesheet" href="css/print.css">


</head>


<body>



<div class="folha">



<div class="cabecalho">


<img src="img/logo.png" class="logo">


<h1>
POSTOS GRACIOSA
</h1>


<h2>
VALE FUNCIONÁRIO
</h2>


</div>





<div class="dados">


<p>
<strong>Empresa:</strong>
<?php echo $empresa; ?>
</p>


<p>
<strong>CNPJ:</strong>
<?php echo $cnpj; ?>
</p>


<p>
<strong>Número do Vale:</strong>
<?php echo $numero; ?>
</p>


<p>
<strong>Data:</strong>
<?php echo $data; ?>
</p>


</div>






<div class="declaracao">


<h3>
DECLARAÇÃO
</h3>


<p>

Eu,
<strong><?php echo $funcionario; ?></strong>,

declaro estar ciente do ocorrido descrito neste documento e autorizo o desconto do valor de

<strong>R$ <?php echo $valorFormatado; ?></strong>

em minha folha de pagamento, conforme a legislação aplicável, os acordos ou convenções coletivas vigentes e as normas internas da empresa.

</p>



<p>

<strong>Motivo do Vale:</strong>

</p>


<div class="motivo">

<?php echo nl2br($motivo); ?>

</div>



</div>







<div class="valor">


<strong>
Valor do Vale:
</strong>

R$ <?php echo $valorFormatado; ?>


</div>







<div class="assinaturas">


<div>


_________________________________

<br>

Assinatura do Funcionário


</div>




<div>


_________________________________

<br>

Responsável pela Empresa


</div>


</div>







<button onclick="window.print()" class="botao">

IMPRIMIR

</button>




</div>



</body>

</html>
