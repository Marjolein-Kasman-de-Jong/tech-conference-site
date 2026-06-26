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
	//#region blocks/hero/index.js
	if (typeof window !== "undefined" && window.wp && window.wp.blocks && window.wp.blocks.registerBlockType) window.wp.blocks.registerBlockType("tech-conference-site/hero", {
		edit: function() {
			const blockProps = window.wp.blockEditor.useBlockProps();
			return window.wp.element.createElement("div", blockProps, window.wp.element.createElement("div", null, window.wp.element.createElement("h1", null, "Hero Block"), window.wp.element.createElement("p", null, "Slogan en featured keynote")));
		},
		save: function() {
			return null;
		}
	});
	//#endregion
	//#region assets/js/app.js
	document.addEventListener("DOMContentLoaded", () => {
		initPageHeader();
	});
	//#endregion
})();

//# sourceMappingURL=main.js.map