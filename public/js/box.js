document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("tbody").addEventListener("click", async (event) => {
        let button = event.target.closest("button[data-id]");
        if (!button) return;

        let bodyUrl = "/user/edit/" + button.dataset.id;
        console.log(bodyUrl);

        // Set loading state
        document.getElementById(
            "suratDetailBody"
        ).innerHTML = `<div class="text-center">Loading...</div>`;

        // Load content via AJAX (fetch)
        fetch(bodyUrl)
            .then((response) => response.text())
            .then((html) => {
                document.getElementById("suratDetailBody").innerHTML = html;
            })
            .catch((err) => {
                document.getElementById("suratDetailBody").innerHTML = `
                <div class="text-danger text-center">Failed to load.</div>
            `;
            });
    });
});
