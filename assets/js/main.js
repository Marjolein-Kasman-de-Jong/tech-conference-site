(function() {
	//#region template-parts/page-header/page-header.js
	function initPageHeader() {
		const pageHeader = document.querySelector(".page-header");
		if (!pageHeader) return;
		const menuWrapper = pageHeader.querySelector(".menu-wrapper");
		const btnMenuOpen = pageHeader.querySelector("#btn-menu-open");
		const btnMenuClose = pageHeader.querySelector("#btn-menu-close");
		if (!menuWrapper || !btnMenuOpen || !btnMenuClose) return;
		btnMenuOpen.addEventListener("click", () => {
			menuWrapper.classList.add("menu-open");
			menuWrapper.classList.remove("menu-closed");
		});
		btnMenuClose.addEventListener("click", () => {
			menuWrapper.classList.add("menu-closed");
			menuWrapper.classList.remove("menu-open");
		});
	}
	//#endregion
	//#region assets/js/app.js
	document.addEventListener("DOMContentLoaded", () => {
		initPageHeader();
	});
	//#endregion
})();

//# sourceMappingURL=main.js.map