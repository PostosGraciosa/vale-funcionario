// Carrega as empresas no campo de seleção

const selectEmpresa = document.getElementById("empresa");


empresas.forEach((empresa) => {


    let option = document.createElement("option");

    option.value = empresa.nome;

    option.textContent = empresa.nome;

    option.dataset.cnpj = empresa.cnpj;


    selectEmpresa.appendChild(option);


});




// Preenche o CNPJ automaticamente

selectEmpresa.addEventListener("change", function(){


    let opcaoSelecionada = this.options[this.selectedIndex];


    document.getElementById("cnpj").value =
    opcaoSelecionada.dataset.cnpj || "";


});





// Gera número do vale

function gerarNumeroVale(){


    let ultimoNumero =
    localStorage.getItem("numeroVale") || 0;


    ultimoNumero++;


    localStorage.setItem(
        "numeroVale",
        ultimoNumero
    );


    return "VG-" +
    String(ultimoNumero).padStart(6,"0");


}







// Formata data para impressão

function formatarData(data){


    let partes = data.split("-");


    return `${partes[2]}/${partes[1]}/${partes[0]}`;


}








// Número do vale será gerado somente ao emitir





// Define data atual como padrão

let hoje = new Date();


let ano = hoje.getFullYear();

let mes = String(hoje.getMonth() + 1).padStart(2,"0");

let dia = String(hoje.getDate()).padStart(2,"0");



document.getElementById("dataVale").value =
`${ano}-${mes}-${dia}`;









// Função para salvar os dados do vale

function emitirVale(destino){

    // Validação do formulário
    if(!document.getElementById("formVale").checkValidity()){
        document.getElementById("formVale").reportValidity();
        return;
    }

    // Gera o número somente na emissão
    let numeroGerado = gerarNumeroVale();

    let dadosVale = {

        empresa: document.getElementById("empresa").value,

        cnpj: document.getElementById("cnpj").value,

        funcionario: document.getElementById("funcionario").value,

        valor: document.getElementById("valor").value,

        motivo: document.getElementById("motivo").value,

        numero: numeroGerado,

        data: formatarData(
            document.getElementById("dataVale").value
        )

    };

    localStorage.setItem(
    "valeAtual",
    JSON.stringify(dadosVale)
);

// Se for impressão térmica, abre em uma nova aba
if (destino === "termica.html") {

    window.open("termica.html", "_blank");

} else {

    window.location.href = destino;

}


// Botão A4

document.getElementById("btnA4")
.addEventListener("click", function(){

    emitirVale("imprimir.html");

});


// Botão Impressora Térmica

document.getElementById("btnTermica")
.addEventListener("click", function(){

    emitirVale("termica.html");

});
