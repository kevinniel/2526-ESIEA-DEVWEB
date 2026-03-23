document.addEventListener('DOMContentLoaded', function () {
    const ticketPage = document.querySelector('[data-ticket-page]');

    if (!ticketPage) {
        return;
    }

    const modal = ticketPage.querySelector('[data-ticket-modal]');
    
    if (!modal) {
        return;
    }

    const openButtons = document.querySelectorAll('[data-open-ticket-modal]');
    const closeButtons = ticketPage.querySelectorAll('[data-close-ticket-modal]');
    const apiForm = ticketPage.querySelector('[data-ticket-api-form]');
    const titleInput = ticketPage.querySelector('#ticket-title');
    const submitButton = ticketPage.querySelector('[data-ticket-submit-button]');
    const ticketList = ticketPage.querySelector('[data-ticket-list]');
    const openOnLoad = ticketPage.dataset.openOnLoad === 'true';


    function openModal() {
        if (!modal.open) {
            modal.showModal();
        }
    }

    function closeModal() {
        if (modal.open) {
            modal.close();
        }
    }

    function updateSubmitButtonState() {
        if (!titleInput || !submitButton) {
            return;
        }

        submitButton.disabled = titleInput.value.trim().length < 1;
    }

    function addTicketToTable(ticket) {
        if (!ticketList) {
            return;
        }

        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${ticket.id}</td>
            <td>${ticket.user_name}</td>
            <td>${ticket.title}</td>
            <td class="ticket-actions-cell">
                <a href="${ticket.show_url}">voir</a>
                <a href="${ticket.edit_url}">modifier</a>
                <form action="${ticket.destroy_url}" method="POST">
                    <input type="hidden" name="_token" value="${apiForm.querySelector('input[name=\"_token\"]').value}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="${ticket.id}">
                    <button type="submit">supprimer</button>
                </form>
            </td>
        `;

        ticketList.appendChild(row);
    }

    openButtons.forEach(function (button) {
        button.addEventListener('click', openModal);
    });

    closeButtons.forEach(function (button) {
        button.addEventListener('click', closeModal);
    });

    if (apiForm) {
        updateSubmitButtonState();

        titleInput.addEventListener('input', function () {
            updateSubmitButtonState();
        });

        apiForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const title = titleInput.value;
            const userId = apiForm.querySelector('input[name="user_id"]').value;

            const response = await fetch(apiForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    title: title,
                    user_id: userId
                }),
            });

            if (response.ok) {
                const data = await response.json();

                addTicketToTable(data.ticket);
                apiForm.reset();
                updateSubmitButtonState();
                closeModal();
            }
        });
    }

    if (openOnLoad) {
        openModal();
    }
});
