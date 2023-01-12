const product_tbody = document.querySelector('.product_tbody');

//  ajax fetch to the user info
const userInfo = async () => {
  const data = await fetch("connection.php?userInfo=1", {
    method: 'GET',
  })
  const response = await data.text();
  product_tbody.innerHTML = response;
}

userInfo()

// ajax fetch to the update product function
product_tbody.addEventListener('click', (e) => {
  if (e.target && e.target.matches('.updateProduct')) {
    e.preventDefault();
    const id = e.target.getAttribute('id');
    updateProduct(id)
  }
})

const updateProduct = async (id) => {
  const data = await fetch(`connection.php?updateProduct=1&id=${id}`, {
    method: "GET",
  })
  console.log(data);
  try {
    const response = await data.json();
    document.getElementById('product_id').value = response.id;
    document.getElementById('product_name').value = response.product_name;
    document.getElementById('price').value = response.product_price;
    document.getElementById('product_image').value = response.product_image;
    document.getElementById('discount').value = response.product_discount;
    document.getElementById('description').value = response.product_description;
    console.log(response)
  } catch (e) {
    console.log(data);
    console.log(e)
  }
}


