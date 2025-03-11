// Product - Like Button
document.querySelectorAll('.product-card .product-info .like-share-save .like-icon').forEach(i => i.addEventListener('click', e => {
  i.classList.toggle('active');
}));

// Product - Saved Button
document.querySelectorAll('.product-card .product-info .like-share-save .save-icon').forEach(i => i.addEventListener('click', e => {
  i.classList.toggle('active');
}));

// Product - Add to Cart Button
// document.querySelectorAll('.product-card .product-info .add-to-cart-container .add-to-cart-btn').forEach(button => button.addEventListener('click', e => {
//     if (!button.classList.contains('loading')) {
//         button.classList.add('loading');
//         setTimeout(() => button.classList.remove('loading'), 3700);
//     console.log("23124124")
//     }
//     e.preventDefault();
// }));


