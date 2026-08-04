<?php

// Busca o próximo número do vale
$arquivo = "dados/contador.txt";

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, "0");
}

$numeroAtual = intval(file_get_contents($arquivo));
$proximoVale = $numeroAtual + 1;

$numeroFormatado = "VG-" . str_pad($proximoVale, 6, "0", STR_PAD_LEFT);


// Data atual
$dataAtual = date("d/m/Y");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistema de Emissão de Vales - Postos Graciosa</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>


<body>


<div class="container mt-5">


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


<option value="POSTO PIRAI LTDA">
POSTO PIRAI LTDA
</option>


<option value="POSTOS GRACIOSA MATRIZ LTDA">
POSTOS GRACIOSA MATRIZ LTDA
</option>


<option value="POSTO GRACIOSA FILIAL">
POSTO GRACIOSA FILIAL
</option>


<option value="POSTO GRACIOSA NORTE">
POSTO GRACIOSA NORTE
</option>


<option value="POSTO GRACIOSA SUL">
POSTO GRACIOSA SUL
</option>


</select>


</div>



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




<div class="mb-3">

<label class="form-label">
Funcionário
</label>


<input 
type="text"
class="form-control"
name="funcionario"
required>


</div>



<div class="mb-3">

<label class="form-label">
Valor do Vale
</label>


<input 
type="number"
step="0.01"
class="form-control"
name="valor"
placeholder="0,00"
required>


</div>




<div class="mb-3">


<label class="form-label">
Motivo do Vale
</label>


<textarea
class="form-control"
name="motivo"
rows="3"
required></textarea>


</div>




<div class="row">


<div class="col-md-6">


<label>
Número do Vale
</label>


<input 
class="form-control"
value="<?php echo $numeroFormatado; ?>"
readonly>


<input 
type="hidden"
name="numero"
value="<?php echo $numeroFormatado; ?>">


</div>




<div class="col-md-6">


<label>
Data
</label>


<input 
class="form-control"
value="<?php echo $dataAtual; ?>"
readonly>


<input 
type="hidden"
name="data"
value="<?php echo $dataAtual; ?>">


</div>


</div>




<br>


<button 
class="btn btn-success w-100"
type="submit">

EMITIR E IMPRIMIR

</button>



</form>



</div>


</div>


</div>



<script src="js/app.js"></script>


</body>

</html>
