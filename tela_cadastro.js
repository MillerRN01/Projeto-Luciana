let btn = document.querySelector('#verSenha')
let btnConfirm = document.querySelector('#verConfirmSenha')

let nome = document.querySelector('#nome')
let labelNome = document.querySelector('#labelNome')
let validNome = false

let usuario = document.querySelector('#usuario')
let labelUsuario = document.querySelector('#labelUsuario')
let validUsuario = false

let cargo = document.querySelector('#cargo')
let labelCargo = document.querySelector('#labelCargo')
let validCargo = false

let email = document.querySelector('#email')
let labelEmail = document.querySelector('#labelEmail')
let validEmail = false

const cpf = document.querySelector('#cpf');
const labelCpf = document.querySelector('#labelCpf');
const validCpf = false;

const telefone = document.querySelector('#telefone')
const labelTelefone = document.querySelector('#labelTelefone')
const validTelefone = false

const endereco = document.querySelector('#endereco');
const labelEndereco = document.querySelector('#labelEndereco');

let senha = document.querySelector('#senha')
let labelSenha = document.querySelector('#labelSenha')
let validSenha = false

let confirmSenha = document.querySelector('#confirmSenha')
let labelConfirmSenha = document.querySelector('#labelConfirmSenha')
let validConfirmSenha = false

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')


nome.addEventListener('keyup', () => {
  if(nome.value.length <= 2){
    labelNome.setAttribute('style', 'color: red')
    labelNome.innerHTML = 'Nome Insira no minimo 3 caracteres'
    nome.setAttribute('style', 'border-color: red')
    validNome = false
  } else {
    labelNome.setAttribute('style', 'color: green')
    labelNome.innerHTML = 'Nome'
    nome.setAttribute('style', 'border-color: green')
    validNome = true
  }
});

cargo.addEventListener('input', () => {
  if (cargo.value === '') {
    cargo.parentNode.classList.add('msgError');
    cargo.parentNode.classList.remove('msgSuccess');
    validCargo = false;
  } else {
    cargo.parentNode.classList.add('msgSuccess');
    cargo.parentNode.classList.remove('msgError');
    validCargo = true;
  }
})
cargo.addEventListener('input', () => {
  if (cargo.value!== '') {
    cargo.classList.add('selected'); // add class when an option is selected
  } else {
    cargo.classList.remove('selected'); // remove class when no option is selected
  }
});
cargo.addEventListener('input', () => {
  if (cargo.value!== '') {
    cargo.classList.add('selected'); // add class when an option is selected
  } else {
    cargo.classList.remove('selected'); // remove class when no option is selected
  }
});

usuario.addEventListener('keyup', () => {
  if(usuario.value.length <= 4){
    labelUsuario.setAttribute('style', 'color: red')
    labelUsuario.innerHTML = 'Usuário tem que ter no minimo 5 caracteres'
    usuario.setAttribute('style', 'border-color: red')
    validUsuario = false
  } else {
    labelUsuario.setAttribute('style', 'color: green')
    labelUsuario.innerHTML = 'Usuário'
    usuario.setAttribute('style', 'border-color: green')
    validUsuario = true
  }
})

email.addEventListener('keyup', () => {
  if (email.value.length <= 4 || !email.value.includes('@')) {
    labelEmail.setAttribute('style', 'color: red');
    labelEmail.innerHTML = 'Email inválido';
    email.setAttribute('style', 'border-color: red');
    validEmail = false;
  } else {
    labelEmail.setAttribute('style', 'color: green');
    labelEmail.innerHTML = 'Email válido';
    email.setAttribute('style', 'border-color: green');
    validEmail = true;
  }
});

cpf.addEventListener('input', () => {
  let cpfValue = cpf.value.replace(/\D/g, ''); // remove non-digit characters
  cpfValue = cpfValue.substring(0, 11); // limit to 11 digits

  // format CPF with dots and dashes
  cpfValue = cpfValue.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');

  cpf.value = cpfValue;

  if (cpfValue.length <= 10) {
    labelCpf.setAttribute('style', 'color: red');
    labelCpf.innerHTML = 'CPF inválido. Por favor, insira um CPF válido.';
    cpf.setAttribute('style', 'border-color: red');
    validCpf = false;
  } else {
    labelCpf.setAttribute('style', 'color: green');
    labelCpf.innerHTML = 'CPF válido';
    cpf.setAttribute('style', 'border-color: green');
    validCpf = true;
  }
});

telefone.addEventListener('input', () => {
  let telefoneValue = telefone.value.replace(/\D/g, ''); // remove non-digit characters
  telefoneValue = telefoneValue.substring(0, 10); // limit to 11 digits

  if (telefoneValue.length <= 2) {
    telefoneValue = `(${telefoneValue}`;
  } else if (telefoneValue.length <= 6) {
    telefoneValue = `(${telefoneValue.substring(0, 2)}) ${telefoneValue.substring(2)}`;
  } else {
    telefoneValue = `(${telefoneValue.substring(0, 2)}) ${telefoneValue.substring(2, 6)}-${telefoneValue.substring(6)}`;
  }
  telefone.value = telefoneValue;

  if (telefoneValue.length <= 13) {
    labelTelefone.setAttribute('style', 'color: red');
    labelTelefone.innerHTML = 'Numero inválido. Por favor, insira um Numero válido.';
    telefone.setAttribute('style', 'border-color: red');
    validTelefone = false;
  } else {
    labelTelefone.setAttribute('style', 'color: green');
    labelTelefone.innerHTML = 'Numero válido';
    telefone.setAttribute('style', 'border-color: green');
    validTelefone = true;
  }
});

endereco.addEventListener('keyup', () => {
  if(endereco.value.length <= 5){
    labelEndereco.setAttribute('style', 'color: red')
    labelEndereco.innerHTML = 'Ainda Falta Informações'
    endereco.setAttribute('style', 'border-color: red')
    validEndereco = false
  } else {
    labelEndereco.setAttribute('style', 'color: green')
    labelEndereco.innerHTML = 'Endereço'
    endereco.setAttribute('style', 'border-color: green')
    validEndereco = true
  }
})

senha.addEventListener('keyup', () => {
  if(senha.value.length <= 7){
    labelSenha.setAttribute('style', 'color: red')
    labelSenha.innerHTML = 'Senha Insira no minimo 8 caracteres'
    senha.setAttribute('style', 'border-color: red')
    validSenha = false
  } else {
    labelSenha.setAttribute('style', 'color: green')
    labelSenha.innerHTML = 'Senha'
    senha.setAttribute('style', 'border-color: green')
    validSenha = true
  }
})

confirmSenha.addEventListener('keyup', () => {
  if(senha.value != confirmSenha.value){
    labelConfirmSenha.setAttribute('style', 'color: red')
    labelConfirmSenha.innerHTML = 'Confirmar Senha As senhas não conferem'
    confirmSenha.setAttribute('style', 'border-color: red')
    validConfirmSenha = false
  } else {
    labelConfirmSenha.setAttribute('style', 'color: green')
    labelConfirmSenha.innerHTML = 'Confirmar Senha'
    confirmSenha.setAttribute('style', 'border-color: green')
    validConfirmSenha = true
  }
})

function cadastrar(){
  if(validNome && validUsuario && validSenha && validConfirmSenha){
    let listaUser = JSON.parse(localStorage.getItem('listaUser') || '[]')
    
    listaUser.push(
    {
      nomeCad: nome.value,
      userCad: usuario.value,
      senhaCad: senha.value
    }
    )
    
    localStorage.setItem('listaUser', JSON.stringify(listaUser))
    
   
    msgSuccess.setAttribute('style', 'display: block')
    msgSuccess.innerHTML = '<strong>Cadastrando usuário...</strong>'
    msgError.setAttribute('style', 'display: none')
    msgError.innerHTML = ''
    
    setTimeout(()=>{
        window.location.href = '../HTML/TelaDeInicio.html'
    }, 2000)
  
    
  } else {
    msgError.setAttribute('style', 'display: block')
    msgError.innerHTML = '<strong>Preencha todos os campos corretamente antes de cadastrar</strong>'
    msgSuccess.innerHTML = ''
    msgSuccess.setAttribute('style', 'display: none')
  }
}

btn.addEventListener('click', ()=>{
  let inputSenha = document.querySelector('#senha')
  
  if(inputSenha.getAttribute('type') == 'password'){
    inputSenha.setAttribute('type', 'text')
  } else {
    inputSenha.setAttribute('type', 'password')
  }
})

btnConfirm.addEventListener('click', ()=>{
  let inputConfirmSenha = document.querySelector('#confirmSenha')
  
  if(inputConfirmSenha.getAttribute('type') == 'password'){
    inputConfirmSenha.setAttribute('type', 'text')
  } else {
    inputConfirmSenha.setAttribute('type', 'password')
  }
})