let carro=[];

let produtoss = localStorage.getItem('produto');
carro = JSON.parse(produtoss);

console.log(carro)

let flagvalor=0;
   for(let i in carro){
    let obj=carro[i]
    let precoverdadeiro=parseInt(obj.valor)
    flagvalor=flagvalor+precoverdadeiro
}

const conteudo=document.querySelector('#totalapagar')
conteudo.insertAdjacentHTML('beforeend',`<h2>R$${flagvalor}</h2> `)

const nc=document.querySelector('#cardnumber')
const data=document.querySelector('#expirationDate')
const cvv=document.querySelector('#cvv')

//evento do botao  que apaga a chave produto== carrinho
const subimt=document.querySelector('#submit')

subimt.addEventListener('click',()=>{
    alert('O pagamento foi efetuado')
    localStorage.removeItem('produto');
    let url = 'mangasjho.html';
    window.location.href=url;
});