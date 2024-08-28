let logins = [
];

let mangas = [];


const caixacont = document.querySelector('.caixa');

let mgsalvos = localStorage.getItem('mangas');
mangas = JSON.parse(mgsalvos);

let carro = [];

/*coloca os mangas nos html */
for (let i in mangas) {
  let mangasv = mangas[i];
  let colocam = document.createElement('div');
  colocam.id = 'conteudos';
  colocam.classList.add('caixasmangs');
  colocam.innerHTML = `
    <img class="img" src="${mangasv.src}"></img>
    <p class="nomemang">NOME:${mangasv.nome}</p>
    <p class="preco">R$:${mangasv.valor}</p>
    <button class="comprar">COMPRAR</button>
  `;
  caixacont.appendChild(colocam)
/* seleciona os botoes e cria os eventos pra eles enquantos eles sao adicionados  */
  colocam.querySelector('.buy-button').addEventListener('click', () => {

    carro.push(mangasv)
    /* salva eles no carro quando cliados no botao*/
    
   

    const jsccarro = JSON.stringify(carro);
    localStorage.setItem('produto', jsccarro)
    atucarro()/*coloca no carrinho percorrendo o array carro */
  });
}

const log = document.querySelector('#logbox');
const botlog = document.querySelector('#botlog');
const botreg = document.querySelector('#botreg');
const senhar = document.querySelector('#senhar');
const emailr = document.querySelector('#emailr');
const email = document.querySelector('#email');
const senha = document.querySelector('#senha');
const compra = document.querySelectorAll('.comprar');




//atualiza o carrinho com json e ao mesmo tempo a coloca no carrinho
function atucarro() {
  let produtoss = localStorage.getItem('produto');
  produtonos = JSON.parse(produtoss);

  const carrinhocont = document.querySelector('#carrinhocaixa')
  carrinhocont.innerHTML = ''/* limpa o carrinho pra adicionar mais mangas */
  for (let i in produtonos) {
    let mangascomprados = produtonos[i];
    var colocam = document.createElement('div');
    colocam.innerHTML = `
  <img class="imgcarrinho" src="${mangascomprados.src}"></img><p class="nomecarrinho">NOME:${mangascomprados.nome}</p><p class="precocarrinho">R$:${mangascomprados.valor}</p>
  `;
    carrinhocont.appendChild(colocam)
   
  }
  /* coloca o botao para finalozar e transforma os valores que estao em texto para int */
  carrinhocont.insertAdjacentHTML('beforeend','<button class="botaocarro" onclick="fecharcarrinho()">FECHAR</button><button class="botaocarro" id="finaliza">FINALIZAR</button>')
  const botaofinalizar=document.querySelector('#finaliza')/*seleciona aqui pq o botao nao foi criado */
  botaofinalizar.addEventListener('click',()=>{
  let text=false;
  let flagvalor=0;
   for(let i in carro){
    console.log(carro) 
    let obj=carro[i]
    precoverdadeiro=parseInt(obj.valor)
    flagvalor=flagvalor+precoverdadeiro
    if(flagvalor>1){
      text=true
     }
   }
   if(flagvalor==true){
    let url2 =' <?=url("pagar");?> ';
    window.location.href = url2;

    atucarro();
   }
  });
}
atucarro();






/*
const corf = document.querySelector('#corf');
let somacor = 1;
corf.addEventListener('click', () => {
  somacor = somacor + 1
  if (somacor % 2 == 0) {
    document.body.style.backgroundColor = 'black';
    document.querySelectorAll('.caixasmangs').forEach(e => e.style.border = '1px solid #e4e4e4');
    document.body.style.color = 'white';
    corf.innerHTML = 'FUNDO CLARO';
  }
  if (somacor % 2 !== 0) {
    document.body.style.backgroundColor = 'white';
    document.querySelectorAll('.caixasmangs').forEach(e => e.style.border = '1px solid #000');
    document.body.style.color = 'black';
    corf.innerHTML = 'FUNDO ESCURO';
  }
});*/

/*mostrar login */
function perfil() {
    
    let url2 = 'login.php';
    window.location.href = url2;

  /*var formulario = document.getElementById("formulario-login");
  formulario.classList.remove("escondido");*/
}
function home() {
    
  let url2 = 'home.php';
  window.location.href = url2;

}
/*function fecharFormulario() {
  var formulario = document.getElementById("formulario-login");
  formulario.classList.add("escondido");
}*/

//teste para login
botreg.addEventListener('click', () => {
  const item = {
    email: emailr.value,
    senha: senhar.value,
  }

  logins.push(item);

  const jsc = JSON.stringify(logins);/*salva o array no localstorege e 
  carrega ele ao recarregar a pagina para testar as contas */
  localStorage.setItem('user', jsc)
  console.log(logins);

});
let logado;
let gerenlogado = false;
botlog.addEventListener('click', () => {
  let user = localStorage.getItem('user');
  user = JSON.parse(user);
  logins = user;
  logado = false;
  for (let i in logins) {
    const usuario = logins[i]
    if (senha.value == logins.senha && email.value == logins.email) {
      logado = true
    }
    console.log(senha.value)

  }
  /*senha da gerencia */
  if (senha.value == '123456') {
    gerenlogado = true;
    logado=true
  }
  if (logado == true) {
    alert('Bem vindo você esta logado')
  }
  if (logado == false) {
    alert('Erro no login revise a senha e o email')
  }
  if (gerenlogado == true) {
    let url2 = 'gerente.html';
    window.location.href = url2;
  }
});

/*mostra o carrinho*/
function mostrarcarrinho() {
  var formulario = document.getElementById("carrinhocaixa");
  formulario.classList.remove("escondidocarrinho");
}
function fecharcarrinho() {
  var formulario = document.getElementById("carrinhocaixa");
  formulario.classList.add("escondidocarrinho");
}



