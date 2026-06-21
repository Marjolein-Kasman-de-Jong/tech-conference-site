export function initPageHeader() {
    const pageHeader = document.querySelector('.page-header');

    if (!pageHeader) {
        return;
    }

    // Set up menu toggle buttons for the page header.
    // Clicking the open button switches the menu wrapper to the open state,
    // clicking the close button switches it back to the closed state.
    const menuWrapper = pageHeader.querySelector('.menu-wrapper');
    const btnMenuOpen = pageHeader.querySelector('#btn-menu-open');
    const btnMenuClose = pageHeader.querySelector('#btn-menu-close');

    if (!menuWrapper || !btnMenuOpen || !btnMenuClose) {
        return;
    }

    btnMenuOpen.addEventListener('click', () => {
        menuWrapper.classList.add('menu-open');
        menuWrapper.classList.remove('menu-closed');
    });

    btnMenuClose.addEventListener('click', () => {
        menuWrapper.classList.add('menu-closed');
        menuWrapper.classList.remove('menu-open');
    });
}