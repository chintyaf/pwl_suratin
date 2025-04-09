    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.querySelector(".search-input");

        searchInput?.addEventListener("input", () => {
            const searchTerm = searchInput.value.toLowerCase();

            document.querySelectorAll("table tbody").forEach(tbody => {
                let hasMatches = false;
                const visibleRows = tbody.querySelectorAll("tr:not(.no-data-message)");

                visibleRows.forEach(row => {
                    const matches = searchTerm === '' || row.textContent.toLowerCase().includes(searchTerm);
                    row.style.display = matches ? "" : "none";
                    if (matches) hasMatches = true;
                });

                const noDataMsg = tbody.querySelector(".no-data-message");
                if (noDataMsg) {
                    console.log(hasMatches)
                    noDataMsg.style.display = hasMatches ? "" : "none";
                }
            });
        });
    });
