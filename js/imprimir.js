// Recupera os dados do vale

let dados = localStorage.getItem("valeAtual");



// Verifica se existe um vale gerado

if (!dados) {


    alert("Nenhum vale encontrado.");


    window.location.href = "index.html";


}




// Converte os dados

dados = JSON.parse(dados);





// Preenche os campos


document.getElementById("empresa").textContent =
dados.empresa;



document.getElementById("cnpj").textContent =
dados.cnpj;



document.getElementById("funcionario").textContent =
dados.funcionario;



document.getElementById("numero").textContent =
dados.numero;



document.getElementById("data").textContent =
dados.data;





// Formata valor

let valorFormatado = Number(dados.valor)
.toLocaleString("pt-BR", {

    minimumFractionDigits: 2,

    maximumFractionDigits: 2

});





document.getElementById("valor").textContent =
valorFormatado;



document.getElementById("valor2").textContent =
valorFormatado;





// Motivo

document.getElementById("motivo").textContent =
dados.motivo;
