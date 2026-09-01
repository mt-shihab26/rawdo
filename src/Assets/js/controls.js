export const initControls = () => {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebar-overlay");

    if (!sidebar) return;

    const setOpen = open => {
        sidebar.classList.toggle("-translate-x-full", !open);
        sidebar.classList.toggle("translate-x-0", open);
        if (overlay) overlay.classList.toggle("hidden", !open);
        document.body.classList.toggle("overflow-hidden", open && window.innerWidth < 1024);
    };

    document.querySelectorAll("[data-sidebar-toggle]").forEach(btn => {
        btn.addEventListener("click", () => {
            const isOpen = sidebar.classList.contains("translate-x-0");
            setOpen(!isOpen);
        });
    });

    if (overlay) {
        overlay.addEventListener("click", () => setOpen(false));
    }

    const setCollapsed = collapsed => {
        sidebar.setAttribute("data-collapsed", String(collapsed));
        sidebar.classList.toggle("lg:w-16", collapsed);
        sidebar.classList.toggle("lg:w-72", !collapsed);
        localStorage.setItem("rawdo-sidebar-collapsed", String(collapsed));
    };

    setCollapsed(localStorage.getItem("rawdo-sidebar-collapsed") === "true");

    document.querySelectorAll("[data-sidebar-collapse-toggle]").forEach(btn => {
        btn.addEventListener("click", () => {
            setCollapsed(sidebar.getAttribute("data-collapsed") !== "true");
        });
    });
};
