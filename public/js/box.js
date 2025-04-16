document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("tbody").addEventListener("click", async (event) => {
        let button = event.target.closest("button[data-id]");
        if (!button) return;

        let bodyUrl = button.dataset.url;
        console.log(bodyUrl);

        // Set loading state
        document.getElementById(
            "boxContent"
        ).innerHTML = `<div class="text-center">Loading...</div>`;

        // Load content via AJAX (fetch)
        fetch(bodyUrl)
            .then((response) => response.text())
            .then((html) => {
                document.getElementById("boxContent").innerHTML = html;
            })
            .catch((err) => {
                document.getElementById("boxContent").innerHTML = `
                <div class="text-danger text-center">Failed to load.</div>
            `;
            });
    });
});

// Update jadi langsung url
// jan lupa ganti ke yg halaman admin juga yg user
