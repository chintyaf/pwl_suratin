document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("tbody").addEventListener("click", async (event) => {
        let button = event.target.closest("button[data-id]");
        if (!button) return;

        // console.log(button.dataset.id)

        // let suratType = button.dataset.surat;

        // let suratNames = {
        //     "sk_mhs_aktif": "Surat Keterangan Mahasiswa Aktif",
        //     "sk_tugas_mk": "Surat Pengantar Tugas Mata Kuliah",
        //     "sk_lulus": "Surat Keterangan Lulus",
        //     "lhs": "Laporan Hasil Studi"
        // };

        // let routeMap = {
        //     "sk_mhs_aktif": "/sk-mahasiswa-aktif/detail",
        //     "sk_tugas_mk": "/sp-tugas-mk/detail",
        //     "sk_lulus": "/sk-lulus/detail",
        //     "lhs": "/lhs/detail"
        // };

        // let surat_name = suratNames[suratType] || "Surat Detail";
        // let body_url = routeMap[suratType] || "/surat-detail";
        let surat_name = "Edit Akun";
        let body_url = "/user/edit/" + button.dataset.id;
        console.log(body_url)

        let modalContent = document.getElementById("modalContent");
        modalContent.innerHTML = `<div class="modal-content p-3 text-center">Loading...</div>`;

        let csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        try {
            // Fetch modal content and surat details in parallel
            let [modalRes, bodyRes] = await Promise.all([
                fetch("/box-modal", {
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
