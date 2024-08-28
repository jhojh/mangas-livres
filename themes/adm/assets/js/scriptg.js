let logins = [
];

let mangas = [];



const sairg = document.querySelector('#sairg')
/* volta pro inicio (chama no html) */
function inicio() {
  const url = 'index.html';
  window.location.href = url;
}

/*adiciona os emails e senhas que estao salvos no json numa tabela no documento */
const tcorpo = document.querySelector('tbody');
let user = localStorage.getItem('user');
user = JSON.parse(user);
logins = user;

let str = ''
for (let i in logins) {
  const contas = logins[i]
  str += `
<tr><td>${contas.email}</td><td>${contas.senha}</td></tr>
`;
}
tcorpo.innerHTML = str;

/*mostra a caixa de adicionar*/
function mostraradd() {
  var caixaadd = document.getElementById("caixa");
  caixaadd.classList.remove("escondido");
}
function fecharadd() {
  var caixaadd = document.getElementById("caixa");
  caixaadd.classList.add("escondido");
}

/*obj pro array dos mangas que vai ser colocado no html usando  */
const srcaadd = document.querySelector('#srcadd');
const nomeadd = document.querySelector('#nomeadd');
const valoradd = document.querySelector('#valoradd');
const mandarobj = document.querySelector('#mandarobj');

mandarobj.addEventListener('click', () => {
  const objman = {
    src: srcaadd.value,
    nome: nomeadd.value,
    valor: valoradd.value
  }
  mangas.push(objman);
  const jscmangs = JSON.stringify(mangas);
  localStorage.setItem('mangas', jscmangs)
});

const apagac = document.querySelector('#apagac');

function apagacontas() {
  logins.pop();
  let jsc = JSON.stringify(logins);
  localStorage.setItem('user', jsc)
};

const apagamangas = document.querySelector('#apagamangas').addEventListener('click', () => {
  mangas.pop();
  let jsc= JSON.stringify(mangas);
  localStorage.setItem('mangas', jsc)

});
