function sendForm() {
    if (typeof formOrder === 'undefined') return;

    formOrder.onsubmit = async (e) => {
        e.preventDefault();

        const code = e.target.querySelector('#code');
        if (!code) console.log('Empty data');

        let data = JSON.parse(code.innerText);

        data.order.status = e.submitter.dataset.status;

        let response = await fetch(e.target.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        let result = await response.json();

        if (result.redirect !== undefined && result.redirect !== null) window.location = result.redirect;
    };
}

sendForm();
