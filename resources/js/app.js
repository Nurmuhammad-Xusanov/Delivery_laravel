import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// DARK MODE TOGGLE BUTTON
document.addEventListener("DOMContentLoaded", function () {
const themeToggle = document.getElementById("theme-toggle");
const darkIcon = document.getElementById("theme-toggle-dark-icon");
const lightIcon = document.getElementById("theme-toggle-light-icon");

function updateIcons(theme) {
if (theme === "dark") {
darkIcon.classList.remove("hidden");
lightIcon.classList.add("hidden");
} else {
darkIcon.classList.add("hidden");
lightIcon.classList.remove("hidden");
}
}

// LocalStorage ni tekshiramiz
const savedTheme = localStorage.getItem("theme") || "light";
if (savedTheme === "dark") {
document.documentElement.classList.add("dark");
} else {
document.documentElement.classList.remove("dark");
}
updateIcons(savedTheme);

// Tugma bosilganda
themeToggle.addEventListener("click", function () {
document.documentElement.classList.toggle("dark");
let newTheme = document.documentElement.classList.contains("dark") ? "dark" : "light";
localStorage.setItem("theme", newTheme);
updateIcons(newTheme);
});
});
