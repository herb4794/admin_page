const productContainers = document.querySelector(".side-scroll .product-container");
const rightBtn = document.querySelector(".side-scroll .product .right-btn");
const lefttBtn = document.querySelector(".side-scroll .product .left-btn");

// Prev Button
lefttBtn.addEventListener("click", () => {
    productContainers.scrollLeft -= 500;
});

// Next Button
rightBtn.addEventListener("click", () => {
    productContainers.scrollLeft += 500;
});

