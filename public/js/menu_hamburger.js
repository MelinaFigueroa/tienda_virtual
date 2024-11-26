document.getElementById("menuToggle").addEventListener("click", function () {
    document.getElementById("mobileMenu").classList.remove("hidden");
});

document.getElementById("closeMenu").addEventListener("click", function () {
    document.getElementById("mobileMenu").classList.add("hidden");
});