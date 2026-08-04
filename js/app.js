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







// Data atual

function dataAtual(){


    let hoje = new Date();


    let dia = String(hoje.getDate()).padStart(2,"0");

    let mes = String(hoje.getMonth()+1).padStart(2,"0");

    let ano = hoje.getFullYear();



    return `${dia}/${mes}/${ano}`;


}







// Carrega informações iniciais

document.getElementById("numeroVale").value =
gerarNumeroVale();



document.getElementById("dataVale").value =
dataAtual();








// Envio do formulário

document.getElementById("formVale")
.addEventListener("submit", function(e){



    e.preventDefault();



    let dadosVale = {


        empresa:
        document.getElementById("empresa").value,


        cnpj:
        document.getElementById("cnpj").value,


        funcionario:
        document.getElementById("funcionario").value,


        valor:
        document.getElementById("valor").value,


        motivo:
        document.getElementById("motivo").value,


        numero:
        document.getElementById("numeroVale").value,


        data:
        document.getElementById("dataVale").value


    };





    localStorage.setItem(
        "valeAtual",
        JSON.stringify(dadosVale)
    );



    window.location.href = "imprimir.html";



});
