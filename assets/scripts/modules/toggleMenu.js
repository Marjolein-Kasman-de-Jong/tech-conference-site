(() => {
    const toggleButton = document.getElementById("menu-toggle");

    if (!toggleButton) return;

    const header = document.getElementById("page-header");

    if (!header) return;

    toggleButton.addEventListener("click", () => {
        const menuState = header.dataset.menuState;

        header.dataset.menuState = menuState === "closed" ? "open" : "closed";
    });
})();
