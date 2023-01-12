///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Header of Nav-bar 
const searchBtn = document.querySelector("nav .desktop-nav .link-search");
const closeBtn = document.querySelector(".search-container .link-close");
const desktopNav = document.querySelector(".desktop-nav");
const searchContainer = document.querySelector(".search-container");
const overlay = document.querySelector(".search-container-overlay");
const shoppingBagBtn = document.querySelector("nav .desktop-nav .link-bag");
const shoppingBagContainer = document.querySelector(".shopping-bag-view");


searchBtn.addEventListener("click", () => {
    desktopNav.classList.add("hide");
    searchContainer.classList.remove("hide");
    overlay.classList.add("show");

    if (!shoppingBagContainer.classList.contains("hide")) {
        shoppingBagContainer.classList.add("hide");
    }
});

closeBtn.addEventListener("click", () => {
    desktopNav.classList.remove("hide");
    searchContainer.classList.add("hide");
    overlay.classList.remove("show");
})

overlay.addEventListener("click", () => {
    desktopNav.classList.remove("hide");
    searchContainer.classList.add("hide");
    overlay.classList.remove("show");

    if (!shoppingBagContainer.classList.contains("hide")) {
        shoppingBagContainer.classList.add("hide");
    }

    if (!mobileShoppingBagContainer.classList.contains("hide")) {
        mobileShoppingBagContainer.classList.add("hide");
    }
});

shoppingBagBtn.addEventListener("click", () => {

    if (!shoppingBagContainer.classList.contains("hide")) {
        shoppingBagContainer.classList.add("hide");
    } else {
        shoppingBagContainer.classList.remove("hide");
    }

    if (!overlay.classList.contains("show")) {
        overlay.classList.add("show");
    } else {
        overlay.classList.remove("show");
    }

    if (!mobileShoppingBagContainer.classList.contains("hide")) {
        mobileShoppingBagContainer.classList.add("hide");
    }
})

// Mobile Version - Header of Nav-bar 

const menuIconContainer = document.querySelector("nav .menu-icon-container");
const navContainer = document.querySelector(".nav-container");
const searchBar = document.querySelector(".mobile-search-container .search-bar");
const nav = document.querySelector(".nav-container nav");
const searchInput = document.querySelector(".mobile-search-container input");
const cancelBtn = document.querySelector(".mobile-search-container .cancel-btn");
const mobileShoppingBagBtn = document.querySelector("nav .mobile-nav .link-bag");
const mobileShoppingBagContainer = document.querySelector(".mobile-shopping-bag-view.hide");

menuIconContainer.addEventListener("click", () => {
    navContainer.classList.toggle("active");

    if (!mobileShoppingBagContainer.classList.contains("hide")) {
        mobileShoppingBagContainer.classList.add("hide");
    }
})

searchInput.addEventListener("click", () => {
    searchBar.classList.add("active");
    nav.classList.add("move-up");
    desktopNav.classList.add("move-down");
})

cancelBtn.addEventListener("click", () => {
    searchBar.classList.remove("active");
    nav.classList.remove("move-up");
    desktopNav.classList.remove("move-down");
})

mobileShoppingBagBtn.addEventListener("click", () => {

    if (!mobileShoppingBagContainer.classList.contains("hide")) {
        mobileShoppingBagContainer.classList.add("hide");
    } else {
        mobileShoppingBagContainer.classList.remove("hide");
    }

    if (!overlay.classList.contains("show")) {
        overlay.classList.add("show");
    } else {
        overlay.classList.remove("show");
    }

    if (!shoppingBagContainer.classList.contains("hide")) {
        shoppingBagContainer.classList.add("hide");
    }
})