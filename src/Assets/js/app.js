import { initTaskModals } from "./task-modal.js";
import { initControls } from "./controls.js";

(() => {
    "use strict";

    const getStoredThemeMode = () => localStorage.getItem("rawdo-theme") || "system";

    const applyTheme = mode => {
        const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        const isDark = mode === "dark" || (mode === "system" && prefersDark);
        document.documentElement.classList.toggle("dark", isDark);
    };

    const syncThemeControls = mode => {
        document.querySelectorAll("[data-theme-set]").forEach(btn => {
            const active = btn.getAttribute("data-theme-set") === mode;
            btn.classList.toggle("bg-card", active);
            btn.classList.toggle("text-foreground", active);
            btn.classList.toggle("shadow-sm", active);
            btn.classList.toggle("text-muted-foreground", !active);
            btn.setAttribute("aria-pressed", String(active));
        });
    };

    const setThemeMode = mode => {
        localStorage.setItem("rawdo-theme", mode);
        applyTheme(mode);
        syncThemeControls(mode);
    };

    const initTheme = () => {
        const mode = getStoredThemeMode();
        syncThemeControls(mode);

        document.querySelectorAll("[data-theme-set]").forEach(btn => {
            btn.addEventListener("click", () => setThemeMode(btn.getAttribute("data-theme-set")));
        });

        window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
            if (getStoredThemeMode() === "system") applyTheme("system");
        });
    };

    /* ---------- Generic dropdown menus ---------- */
    const initDropdowns = () => {
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
    };

    /* ---------- Task checkbox strike-through ---------- */
    const initTaskCheckboxes = () => {
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
    };

    /* ---------- Optional stat counters that reflect checked tasks ---------- */
    const updateTaskCounts = () => {
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
    };

    /* ---------- Tabs (settings, calendar view switcher, etc.) ---------- */
    const initTabs = () => {
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
    };

    /* ---------- Password visibility toggles ---------- */
    const initPasswordToggles = () => {
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
    };

    /* ---------- Init ---------- */
    document.addEventListener("DOMContentLoaded", () => {
        initTheme();
        initControls();
        initDropdowns();
        initTaskModals();
        initTaskCheckboxes();
        initTabs();
        initPasswordToggles();
    });
})();
