// Recupera os dados do vale
const dadosVale = JSON.parse(localStorage.getItem("valeAtual"));

if (!dadosVale) {

    alert("Nenhum vale encontrado.");

    window.location.href = "index.html";

}

// Preenche os dados do cupom
document.getElementById("empresa").textContent = dadosVale.empresa;

document.getElementById("cnpj").textContent = dadosVale.cnpj;

document.getElementById("numero").textContent = dadosVale.numero;

document.getElementById("data").textContent = dadosVale.data;

document.getElementById("funcionario").textContent = dadosVale.funcionario;

document.getElementById("funcionario2").textContent = dadosVale.funcionario;

document.getElementById("valor").textContent = Number(dadosVale.valor).toLocaleString("pt-BR", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
});

document.getElementById("valor2").textContent = Number(dadosVale.valor).toLocaleString("pt-BR", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
});

document.getElementById("motivo").textContent = dadosVale.motivo;


// Aguarda o carregamento da página antes de imprimir
window.onload = function () {

    setTimeout(function () {

        window.print();

        // Fecha a janela após a impressão
        setTimeout(function () {

            window.close();

        }, 500);

    }, 300);

};
