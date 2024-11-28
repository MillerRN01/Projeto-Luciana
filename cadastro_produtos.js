const form = document.getElementById('product-form');
const productList = document.getElementById('product-list');
const productSummaryList = document.getElementById('product-list-summary');

let products = [];

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (!validateForm()) return; // Se a validação falhar, sai da função

  const productName = document.getElementById('nome').value;
  const productDescription = document.getElementById('descricao').value;
  const productPrice = document.getElementById('preco').value;
  const productCategory = document.getElementById('categoria').value;
  const productImage = document.getElementById('product-image').files[0];

  const newProduct = {
    name: productName,
    description: productDescription,
    price: productPrice,
    category: productCategory,
    image: productImage,
  };

  products.push(newProduct);
  renderProductList();
  renderProductSummary();
  form.reset();
});

function validateForm() {
  const nome = document.getElementById('nome').value;
  const descricao = document.getElementById('descricao').value;
  const preco = document.getElementById('preco').value;
  const categoria = document.getElementById('categoria').value;
  const productImage = document.getElementById('product-image').value;

  // Verifica se os campos estão vazios
  if (nome === '' || descricao === '' || preco === '' || categoria === '' || productImage === '') {
    alert('Preencha todos os campos obrigatórios!');
    return false;
  }

  // Verifica se o preço é válido
  if (!preco.match(/^[0-9]+(\.[0-9]+)?$/)) {
    alert('Digite um preço válido (ex: 10.99)');
    return false;
  }

  // Se todos os campos estiverem preenchidos corretamente, retorna true
  return true;
}

function renderProductList() {
  productList.innerHTML = '';
  products.forEach((product) => {
    const productItem = document.createElement('div');
    productItem.className = 'product-item';
    productItem.innerHTML = `
      <h3>${product.name}</h3>
      <p>${product.description}</p>
      <p>Preço: R$ ${product.price}</p>
      <p>Categoria: ${product.category}</p>
      <img src="${URL.createObjectURL(product.image)}" alt="${product.name}">
    `;
    productList.appendChild(productItem);
  });
}

function renderProductSummary() {
  productSummaryList.innerHTML = '';
  products.forEach((product) => {
    const productSummaryItem = document.createElement('li');
    productSummaryItem.innerHTML = `${product.name} - R$ ${product.price}`;
    productSummaryList.appendChild(productSummaryItem);
  });
}