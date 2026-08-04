<?php

// Controle do número do vale
$arquivo = "dados/contador.txt";

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "0");
}

$numeroAtual = intval(file_get_contents($arquivo));

$proximoVale = $numeroAtual + 1;

$numeroVale = "VG-" . str_pad($proximoVale, 6, "0", STR_PAD_LEFT);


// Data atual
$dataAtual = date("d/m/Y");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
Sistema de Emissão de Vales - Postos Graciosa
</title>


<!-- Bootstrap -->
<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet">


<!-- CSS do sistema -->
<link rel="stylesheet" href="css/style.css">


</head>


<body>


<div class="container mt-5 mb-5">


<div class="card shadow">


<div class="card-header text-center">


<h2>
POSTOS GRACIOSA
</h2>


<h5>
Sistema de Emissão de Vales
</h5>


</div>




<div class="card-body">



<form action="imprimir.php" method="POST">



<!-- EMPRESA -->

<div class="mb-3">

<label class="form-label">
Empresa
</label>


<select 
class="form-select"
name="empresa"
id="empresa"
onchange="buscarCnpj()"
required>


<option value="">
Selecione o posto
</option>


<option value="POSTO JARIVA LTDA">
POSTO JARIVA LTDA
</option>


<option value="AUTO POSTO FÁTIMA LTDA">
AUTO POSTO FÁTIMA LTDA
</option>


<option value="POSTO BEMER LTDA">
POSTO BEMER LTDA
</option>


<option value="POSTO GRACIOSA V LTDA">
POSTO GRACIOSA V LTDA
</option>


<option value="AUTO POSTO PIRAÍ LTDA">
AUTO POSTO PIRAÍ LTDA
</option>


<option value="POSTO GRACIOSA LTDA">
POSTO GRACIOSA LTDA
</option>


</select>


</div>





<!-- CNPJ -->

<div class="mb-3">


<label class="form-label">
CNPJ
</label>


<input 
type="text"
class="form-control"
name="cnpj"
id="cnpj"
readonly>


</div>





<!-- FUNCIONÁRIO -->

<div class="mb-3">


<label class="form-label">
Funcionário
</label>


<input 
type="text"
class="form-control"
name="funcionario"
placeholder="Digite o nome do funcionário"
required>


</div>





<!-- VALOR -->

<div class="mb-3">


<label class="form-label">
Valor do Vale
</label>


<div class="input-group">


<span class="input-group-text">
R$
</span>


<input 
type="number"
class="form-control"
name="valor"
step="0.01"
placeholder="0,00"
required>


</div>


</div>






<!-- MOTIVO -->

<div class="mb-3">


<label class="form-label">
Motivo do Vale
</label>


<textarea

class="form-control"

name="motivo"

rows="4"

placeholder="Descreva o motivo do vale"

required></textarea>


</div>






<!-- INFORMAÇÕES -->

<div class="row">


<div class="col-md-6 mb-3">


<label class="form-label">
Número do Vale
</label>


<input

type="text"

class="form-control"

value="<?php echo $numeroVale; ?>"

readonly>


<input

type="hidden"

name="numero"

value="<?php echo $numeroVale; ?>">


</div>






<div class="col-md-6 mb-3">


<label class="form-label">
Data
</label>


<input

type="text"

class="form-control"

value="<?php echo $dataAtual; ?>"

readonly>


<input

type="hidden"

name="data"

value="<?php echo $dataAtual; ?>">


</div>


</div>






<button 

type="submit"

class="btn btn-success w-100 btn-lg">


EMITIR E IMPRIMIR


</button>




</form>



</div>


</div>


</div>





<script src="js/app.js"></script>


</body>


</html>
