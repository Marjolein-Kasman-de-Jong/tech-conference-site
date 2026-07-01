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
			const InspectorControls = window.wp.blockEditor.InspectorControls;
			const PanelBody = window.wp.components.PanelBody;
			const ToggleControl = window.wp.components.ToggleControl;
			return window.wp.element.createElement(window.wp.element.Fragment, null, window.wp.element.createElement(InspectorControls, null, window.wp.element.createElement(PanelBody, {
				title: "Button-instellingen",
				initialOpen: true
			}, window.wp.element.createElement(ToggleControl, {
				label: "Pijl tonen",
				checked: attributes.showArrow,
				onChange: function(value) {
					setAttributes({ showArrow: value });
				}
			}))), window.wp.element.createElement("div", blockProps, window.wp.element.createElement(RichText, {
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
			}), window.wp.element.createElement(ToggleControl, {
				label: "Pijl in button tonen",
				checked: attributes.showArrow,
				onChange: function(value) {
					setAttributes({ showArrow: value });
				}
			})));
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