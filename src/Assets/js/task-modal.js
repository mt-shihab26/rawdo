export function initModals() {
    document.querySelectorAll("[data-modal-open]").forEach(btn => {
        btn.addEventListener("click", () => {
            const id = btn.getAttribute("data-modal-open");
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            }
        });
    });

    document.querySelectorAll("[data-modal-close]").forEach(btn => {
        btn.addEventListener("click", () => {
            const modal = btn.closest(".js-modal-backdrop");
            if (modal) {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            }
        });
    });

    document.querySelectorAll(".js-modal-backdrop").forEach(backdrop => {
        backdrop.addEventListener("click", e => {
            if (e.target === backdrop) {
                backdrop.classList.add("hidden");
                backdrop.classList.remove("flex");
            }
        });
    });

    document.addEventListener("keydown", e => {
        if (e.key === "Escape") {
            document.querySelectorAll(".js-modal-backdrop:not(.hidden)").forEach(m => {
                m.classList.add("hidden");
                m.classList.remove("flex");
            });
        }
    });
}
