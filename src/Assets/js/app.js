(function () {
    "use strict";

    function getStoredThemeMode() {
        return localStorage.getItem("Rawdo-theme") || "system";
    }

    function applyTheme(mode) {
        const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        const isDark = mode === "dark" || (mode === "system" && prefersDark);
        document.documentElement.classList.toggle("dark", isDark);
    }

    function syncThemeControls(mode) {
        document.querySelectorAll("[data-theme-set]").forEach(btn => {
            const active = btn.getAttribute("data-theme-set") === mode;
            btn.classList.toggle("bg-card", active);
            btn.classList.toggle("text-foreground", active);
            btn.classList.toggle("shadow-sm", active);
            btn.classList.toggle("text-muted-foreground", !active);
            btn.setAttribute("aria-pressed", String(active));
        });
    }

    function setThemeMode(mode) {
        localStorage.setItem("Rawdo-theme", mode);
        applyTheme(mode);
        syncThemeControls(mode);
    }

    function initTheme() {
        const mode = getStoredThemeMode();
        syncThemeControls(mode);

        document.querySelectorAll("[data-theme-set]").forEach(btn => {
            btn.addEventListener("click", () => setThemeMode(btn.getAttribute("data-theme-set")));
        });

        window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
            if (getStoredThemeMode() === "system") applyTheme("system");
        });
    }

    /* ---------- Mobile sidebar ---------- */
    function initSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("sidebar-overlay");
        if (!sidebar) return;

        function setOpen(open) {
            sidebar.classList.toggle("-translate-x-full", !open);
            sidebar.classList.toggle("translate-x-0", open);
            if (overlay) overlay.classList.toggle("hidden", !open);
            document.body.classList.toggle("overflow-hidden", open && window.innerWidth < 1024);
        }

        document.querySelectorAll("[data-sidebar-toggle]").forEach(btn => {
            btn.addEventListener("click", () => {
                const isOpen = sidebar.classList.contains("translate-x-0");
                setOpen(!isOpen);
            });
        });

        if (overlay) {
            overlay.addEventListener("click", () => setOpen(false));
        }

        function setCollapsed(collapsed) {
            sidebar.setAttribute("data-collapsed", String(collapsed));
            sidebar.classList.toggle("lg:w-16", collapsed);
            sidebar.classList.toggle("lg:w-72", !collapsed);
            localStorage.setItem("Rawdo-sidebar-collapsed", String(collapsed));
        }

        setCollapsed(localStorage.getItem("Rawdo-sidebar-collapsed") === "true");

        document.querySelectorAll("[data-sidebar-collapse-toggle]").forEach(btn => {
            btn.addEventListener("click", () => {
                setCollapsed(sidebar.getAttribute("data-collapsed") !== "true");
            });
        });
    }

    /* ---------- Generic dropdown menus ---------- */
    function initDropdowns() {
        document.addEventListener("click", e => {
            const trigger = e.target.closest("[data-dropdown-trigger]");
            const openMenus = document.querySelectorAll(".js-dropdown-menu:not(.hidden)");

            if (trigger) {
                const id = trigger.getAttribute("data-dropdown-trigger");
                const menu = document.getElementById(id);
                const isOpen = menu && !menu.classList.contains("hidden");
                openMenus.forEach(m => m.classList.add("hidden"));
                if (menu) menu.classList.toggle("hidden", isOpen);
                e.stopPropagation();
                return;
            }

            if (!e.target.closest(".js-dropdown-menu")) {
                openMenus.forEach(m => m.classList.add("hidden"));
            }
        });
    }

    /* ---------- Generic modals ---------- */
    function initModals() {
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

    /* ---------- Task checkbox strike-through ---------- */
    function initTaskCheckboxes() {
        document.querySelectorAll("[data-task-checkbox]").forEach(checkbox => {
            checkbox.addEventListener("change", () => {
                const row = checkbox.closest("[data-task-row]");
                const title = row ? row.querySelector("[data-task-title]") : null;
                if (title) {
                    title.classList.toggle("line-through", checkbox.checked);
                    title.classList.toggle("text-muted-foreground", checkbox.checked);
                }
                updateTaskCounts();
            });
        });
    }

    /* ---------- Optional stat counters that reflect checked tasks ---------- */
    function updateTaskCounts() {
        document.querySelectorAll("[data-task-count-scope]").forEach(scope => {
            const container = document.querySelector(scope.getAttribute("data-task-count-scope"));
            if (!container) return;
            const total = container.querySelectorAll("[data-task-row]").length;
            const done = container.querySelectorAll(
                "[data-task-row] [data-task-checkbox]:checked",
            ).length;
            scope.textContent = scope.hasAttribute("data-task-count-remaining")
                ? String(total - done)
                : String(done);
        });
    }

    /* ---------- Tabs (settings, calendar view switcher, etc.) ---------- */
    function initTabs() {
        document.querySelectorAll("[data-tabs]").forEach(group => {
            const buttons = group.querySelectorAll("[data-tab]");
            const panels = document.querySelectorAll(
                `[data-tab-panel][data-tabs-for="${group.id}"]`,
            );

            buttons.forEach(btn => {
                btn.addEventListener("click", () => {
                    const target = btn.getAttribute("data-tab");

                    buttons.forEach(b => {
                        b.classList.remove("bg-card", "text-foreground", "shadow-sm");
                        b.classList.add("text-muted-foreground");
                    });
                    btn.classList.add("bg-card", "text-foreground", "shadow-sm");
                    btn.classList.remove("text-muted-foreground");

                    panels.forEach(p => {
                        p.classList.toggle("hidden", p.getAttribute("data-tab-panel") !== target);
                    });
                });
            });
        });
    }

    /* ---------- Password visibility toggles ---------- */
    function initPasswordToggles() {
        document.querySelectorAll("[data-password-toggle]").forEach(btn => {
            const input = btn.parentElement.querySelector(
                'input[type="password"], input[type="text"][data-password-input]',
            );
            if (!input) return;

            btn.addEventListener("click", () => {
                const showing = input.type === "text";
                input.type = showing ? "password" : "text";
                input.setAttribute("data-password-input", "");
                btn.querySelector("[data-eye-icon]").classList.toggle("hidden", !showing);
                btn.querySelector("[data-eye-off-icon]").classList.toggle("hidden", showing);
                btn.setAttribute("aria-label", showing ? "Show password" : "Hide password");
            });
        });
    }

    /* ---------- Init ---------- */
    document.addEventListener("DOMContentLoaded", () => {
        initTheme();
        initSidebar();
        initDropdowns();
        initModals();
        initTaskCheckboxes();
        initTabs();
        initPasswordToggles();
    });
})();
