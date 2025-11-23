function copyToClipboard(btn) {
    const text = btn.getAttribute("data-copy");
    const icon = btn.querySelector(".copy-icon");

    navigator.clipboard.writeText(text).then(() => {

        icon.classList.remove("bi-copy");
        icon.classList.add("bi-check-lg");

        setTimeout(() => {
            icon.classList.remove("bi-check-lg");
            icon.classList.add("bi-copy");
        }, 2000);

    }).catch(err => console.error("Copy failed:", err));
}

document.querySelectorAll(".copy-btn").forEach(btn => {
    btn.addEventListener("click", function () {
        copyToClipboard(btn);
    });
});

function updatePrismTheme() {
    const theme = document.documentElement.getAttribute("data-bs-theme") || "light";
    const light = document.getElementById("prism-theme-light");
    const dark  = document.getElementById("prism-theme-dark");

    if (theme === "dark") {
        dark.disabled = false;
        light.disabled = true;
    } else {
        light.disabled = false;
        dark.disabled = true;
    }
}

updatePrismTheme();

// Jika kamu punya tombol pengubah tema, panggil ini lagi setelah berubah
document.addEventListener("themeChanged", updatePrismTheme);