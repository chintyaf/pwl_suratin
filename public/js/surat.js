document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("loadSnippet").addEventListener("click", () => {
        console.log("Click");
        let url = "/surat-detail"; // Default URL
        // let body_url = "{{ url('/sk-mahasiswa-aktif/detail') }}";
        let body_url = "/sp-tugas-mk/detail";
        let surat_name="Surat Keterangan Aktif";

        let modalContent = document.getElementById("modalContent");
        let modalTitle = document.getElementById("suratDetailTitle");

        let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        fetch(url, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            // body: JSON.stringify({ key: "value" })
        })
        .then(res => res.text())
        .then(data =>
            modalContent.innerHTML = data,
        )
        .then(data=>
            document.getElementById("suratDetailTitle").innerText = surat_name
        )
        .catch(err => console.error("Error loading content:", err));

        fetch(body_url, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            // body: JSON.stringify({ key: "value" })
        })
        .then(res => res.text())
        .then(data =>
            document.getElementById("suratDetailBody").innerHTML = data
        )
        .catch(err => console.error("Error loading content:", err));

    });
});
