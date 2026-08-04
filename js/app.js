function buscarCnpj(){


let empresa = document.getElementById("empresa").value;


let cnpj = document.getElementById("cnpj");


let empresas = {


"POSTO JARIVA LTDA":
"04.123.127/0001-59",


"AUTO POSTO FÁTIMA LTDA":
"79.270.211/0001-02",


"POSTO BEMER LTDA":
"81.512.683/0001-68",


"POSTO GRACIOSA V LTDA":
"84.708.437/0001-74",


"AUTO POSTO PIRAÍ LTDA":
"11.168.652/0001-56",


"POSTO GRACIOSA LTDA":
"76.608.660/0001-11"


};


cnpj.value = empresas[empresa] || "";


}
