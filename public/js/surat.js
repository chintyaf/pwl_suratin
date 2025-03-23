document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("tbody").addEventListener("click", async (event) => {
        let button = event.target.closest("button[data-surat]");
        if (!button) return;

        let id_surat = button.dataset.idsurat

        let surat_name = button.dataset.surat || "Surat Detail";
        let body_url = "/detail/" + id_surat;
        console.log(body_url)

        let modalContent = document.getElementById("modalContent");
        modalContent.innerHTML = `<div class="modal-content p-3 text-center">Loading...</div>`;

        let csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        try {
            // Fetch modal content and surat details in parallel
            let [modalRes, bodyRes] = await Promise.all([
                fetch("/surat-detail/" + id_surat, {
                    method: "GET",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrfToken }
                }).then(res => res.text()),
                fetch(body_url, {
                    method: "GET",
                    headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrfToken }
                }).then(res => res.text())
            ]);

            modalContent.innerHTML = modalRes;
            document.getElementById("suratDetailTitle").innerText = surat_name;
            document.getElementById("suratDetailBody").innerHTML = bodyRes;
        } catch (err) {
            console.error("Error loading modal:", err);
            modalContent.innerHTML = `<div class="modal-content p-3 text-danger text-center">Failed to load.</div>`;
        }
    });

    // Reset modal content when it's closed
    document.getElementById("myModal").addEventListener("hidden.bs.modal", () => {
        setTimeout(() => {
            document.getElementById("modalContent").innerHTML = `
                <div class="modal-content p-3 text-center">
                    <p>Loading...</p>
                </div>
            `;
        }, 300); // Delay to ensure modal is completely hidden before resetting
    });
});
