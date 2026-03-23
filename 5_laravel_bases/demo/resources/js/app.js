import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const ticketPage = document.querySelector('[data-ticket-page]');

if (ticketPage) {
    const modal = ticketPage.querySelector('[data-ticket-modal]');
    const openButtons = document.querySelectorAll('[data-open-ticket-modal]');
    const closeButtons = ticketPage.querySelectorAll('[data-close-ticket-modal]');
    const openOnLoad = ticketPage.dataset.openOnLoad === 'true';

    const openModal = () => {
        if (!modal.open) {
            modal.showModal();
        }
    };

    const closeModal = () => {
        if (modal.open) {
            modal.close();
        }
    };

    openButtons.forEach((button) => {
        button.addEventListener('click', openModal);
    });

    closeButtons.forEach((button) => {
        button.addEventListener('click', closeModal);
    });

    modal.addEventListener('click', (event) => {
        const rect = modal.getBoundingClientRect();
        const clickedOutside =
            event.clientX < rect.left ||
            event.clientX > rect.right ||
            event.clientY < rect.top ||
            event.clientY > rect.bottom;

        if (clickedOutside) {
            closeModal();
        }
    });

    if (openOnLoad) {
        openModal();
    }
}
