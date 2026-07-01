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
		edit: function({ attributes, setAttributes }) {
			const blockProps = window.wp.blockEditor.useBlockProps();
			const RichText = window.wp.blockEditor.RichText;
			return window.wp.element.createElement("div", blockProps, window.wp.element.createElement(RichText, {
				tagName: "h2",
				className: "featured-keynote-title",
				value: attributes.featuredKeynoteTitle,
				allowedFormats: [],
				placeholder: "Keynote-titel",
				onChange: function(value) {
					setAttributes({ featuredKeynoteTitle: value });
				}
			}), window.wp.element.createElement(RichText, {
				tagName: "span",
				className: "featured-keynote-button-text",
				value: attributes.buttonText,
				allowedFormats: [],
				placeholder: "Knoptekst",
				onChange: function(value) {
					setAttributes({ buttonText: value });
				}
			}));
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