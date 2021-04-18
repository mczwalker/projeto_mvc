//Pega o valor do CEP digitado no Input    
let inputCep = document.getElementById("cep");

inputCep.onblur = function(){
    console.log(this.value);
    let cep = this.value;

    requisitaDadosPeloCep(cep);
}

//Faz a requisição da API para trazer os dados do endereço pelo CEP
function requisitaDadosPeloCep(cep){
    const url= `https://viacep.com.br/ws/${cep}/json/`;
    fetch(url)
        .then((resposta)=>resposta.json())
        .then((json)=>{
            //console.log(json);
            preencheCamposDoEndereco(json);
        })
        
}
    
//Percorre o objeto e preenche os respectivos campos do endereço

function preencheCamposDoEndereco(obj){
    Object.keys(obj).forEach(item=>{        
        if(document.querySelector("#"+item)){//atribui valores apenas aos campos que possuem o id igual a chave do objeto
            document.getElementById(item).value = obj[item];
            //console.log(item + " = " + obj[item]);
        }
    });
}


//Validar o valor do CNPJ/CPF
let Cpf_Cnpj = document.getElementById("cpf-cnpj");

Cpf_Cnpj.onblur = function(){
    let dado = this.value;
    dado = dado.replace(/[^\d]+/g,'');
    console.log('Replace: '+dado);

    if(dado.length === 11){
        console.log('CPF ok');
        atualizaCampoCnpj_Cpf(dado);
        document.getElementById("divErro").style.display = "none";
    }else if(dado.length === 14){
        console.log('CNPJ ok');
        atualizaCampoCnpj_Cpf(dado);
        document.getElementById("divErro").style.display = "none";
    }else if(dado.length === 0){
        document.getElementById("divErro").style.display = "none";
    }    
    else{
        console.log('invalido');
        document.getElementById("divErro").style.display = "block";
        document.getElementById("erroMsg").innerHTML = 'Dados Inválidos';
    }
} 

//Devolve para os campos input os valores sem caracteres especiais
function atualizaCampoCnpj_Cpf(dadosTratados){
    document.getElementById("cpf-cnpj").value = dadosTratados;
}


//Adiciona novos campos de contato para cadastro
function adicionar(){
    var destino = document.getElementById("contato-add");
    var novadiv = document.createElement("div");
    var conteudo = document.getElementById("contatos");
    novadiv.innerHTML = conteudo.innerHTML;
    destino.appendChild(novadiv);
}