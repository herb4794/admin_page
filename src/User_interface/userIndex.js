const product_tbody = document.querySelector('.product_tbody');
const update_form = document.getElementById('edit-product-form');
const editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
const showAlert = document.getElementById("showAlert");


// TODO Show Eide Status Function
const showAlertFunction = async () => {
  const data = await fetch("connection.php?showAlertInfo=1", {
    method: 'GET',
  })
  const response = await data.text();
  showAlert.innerHTML = response;
 }

update_form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(update_form);
  formData.append('editProduct', 1);

  if (update_form.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    update_form.classList.add('was-validated');
    return false;
  }
  else {
    document.getElementById('update-product-btn').value = 'Please Wait...';
    await fetch('connection.php', {
      method: 'POST',
      body: formData,
    });

    const response = showAlertFunction();
    showAlert.innerHTML = response;
    document.getElementById('update-product-btn').value = 'Update Product Info';
    update_form.classList.remove('was-validated');
    editModal.hide();
    productInfo()
  }

})



// TODO ajax fetch to the user info
const productInfo = async () => {
  const data = await fetch("connection.php?userInfo=1", {
    method: 'GET',
  })
  const response = await data.text();
  product_tbody.innerHTML = response;
}

productInfo()

// TODO ajax fetch to the update product function
product_tbody.addEventListener('click', (e) => {
  if (e.target && e.target.matches('a.editLink')) {
    e.preventDefault();
    const id = e.target.getAttribute('id');
    updateProduct(id)
  }
})

const updateProduct = async (id) => {
  const data = await fetch(`connection.php?updateProduct=1&id=${id}`, {
    method: "GET",
  })
  try {
    const response = await data.json();
    document.getElementById('product_id').value = response.id;
    document.getElementById('product_name').value = response.product_name;
    document.getElementById('product_image').file = response.product_image;
    document.getElementById('price').value = response.product_price;
    document.getElementById('discount').value = response.product_discount;
    document.getElementById('description').value = response.product_description;
    document.getElementById('oldProductImage').value = response.product_image;
    console.log(response);
    console.log(data)
  } catch (e) {
    console.log(e)
  }
}

// TODO Delete User Ajax Request
product_tbody.addEventListener('click', (e) => {
  if (e.target && e.target.matches("a.deleteLink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    deleteUser(id);
    console.log(id);
  }
})

// Review
const deleteUser = async (id) => {
  const data = await fetch(`connection.php?deleteBtn=1&id=${id}`, {
    method: "GET",
  })
  const response = await data.text();
  showAlert.innerHTML = response;
  productInfo()
}
