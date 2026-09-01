<?php
$links = [
    ['route' => 'home.index', 'icon' => 'icons.today-icon', 'label' => 'Today', 'badge' => 5, 'active' => true],
    ['route' => 'calendar.index', 'icon' => 'icons.upcoming-icon', 'label' => 'Upcoming', 'badge' => null, 'active' => false],
    ['route' => 'tasks.index', 'icon' => 'icons.list-icon', 'label' => 'All tasks', 'badge' => 12, 'active' => false],
    ['route' => 'completed.index', 'icon' => 'icons.check-circle-icon', 'label' => 'Completed', 'badge' => null, 'active' => false],
];

$projects = [
    ['label' => 'Website Redesign', 'color' => 'bg-chart-1'],
    ['label' => 'Marketing Plan', 'color' => 'bg-chart-4'],
    ['label' => 'Personal', 'color' => 'bg-chart-2'],
];
?>
<div
    id="sidebar-overlay"
    class="fixed inset-0 z-30 hidden bg-foreground/50 lg:hidden"
></div>

<aside
    id="sidebar"
    class="group fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full transform flex-col border-r border-sidebar-border bg-sidebar text-sidebar-foreground transition-all duration-200 lg:sticky lg:top-0 lg:h-screen lg:w-72 lg:translate-x-0"
    data-collapsed="false"
>
    <div class="flex items-center justify-between gap-2 px-5 py-5 group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-0">
        <x-elements.logo />
        <x-app-layout.header-controls />
    </div>
    <x-app-layout.task-modal-button />
    <nav
        class="mt-6 flex-1 space-y-6 overflow-y-auto px-3 pb-4 group-data-[collapsed=true]:px-2"
    >
        <div class="space-y-1">
            <?php foreach ($links as $item) { ?>
                <a
                    href="{{ route($item['route']) }}"
                    class="flex items-center justify-between rounded-lg px-3 py-2 text-sm group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2 <?= $item['active'] ? 'bg-sidebar-primary/10 font-semibold text-sidebar-primary' : 'font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground' ?>"
                >
                    <span class="flex items-center gap-3">
                        <?= $this->component($item['icon']) ?><span class="group-data-[collapsed=true]:hidden"><?= htmlspecialchars($item['label'], ENT_QUOTES) ?></span>
                    </span>
                    <?php if ($item['badge'] !== null) { ?>
                        <span 
                            class="rounded-full px-2 py-0.5 text-xs group-data-[collapsed=true]:hidden <?= $item['active'] ? 'bg-sidebar-primary font-bold text-sidebar-primary-foreground' : 'bg-sidebar-accent font-semibold text-sidebar-accent-foreground' ?>"
                        >
                            <?= $item['badge'] ?>
                        </span>
                    <?php } ?>
                </a>
            <?php } ?>
        </div>
        <div class="group-data-[collapsed=true]:hidden">
            <div class="flex items-center justify-between px-3 pb-2">
                <span class="text-xs font-semibold uppercase tracking-wider text-muted-foreground">Projects</span>
                <a
                    href="{{ route('projects.index') }}"
                    class="rounded p-0.5 text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    aria-label="Add project"
                >
                    <x-icons.plus-icon />
                </a>
            </div>
            <div class="space-y-1">
                <?php foreach ($projects as $project) { ?>
                    <a
                        href="{{ route('project-detail.index') }}"
                        class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                    >
                        <span class="h-2.5 w-2.5 shrink-0 rounded-full <?= $project['color'] ?>"></span>
                        <?= htmlspecialchars($project['label'], ENT_QUOTES) ?>
                    </a>
                <?php } ?>
                <a
                    href="{{ route('projects.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-muted-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground"
                >
                    View all projects
                </a>
            </div>
        </div>
    </nav>
    <div class="border-t border-sidebar-border p-3">
        <a
            href="{{ route('settings.index') }}"
            class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-sidebar-foreground/70 hover:bg-sidebar-accent hover:text-sidebar-accent-foreground group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:px-2"
        >
            <x-icons.gear-icon />
            <span class="group-data-[collapsed=true]:hidden">Settings</span>
        </a>
        <div
            class="flex items-center gap-3 rounded-lg px-3 py-2 group-data-[collapsed=true]:justify-center group-data-[collapsed=true]:gap-0 group-data-[collapsed=true]:px-0"
        >
            <img
                src="https://i.pravatar.cc/64?img=12"
                alt=""
                class="h-8 w-8 shrink-0 rounded-full ring-2 ring-sidebar"
            />
            <div class="min-w-0 flex-1 group-data-[collapsed=true]:hidden">
                <p class="truncate text-sm font-semibold">Alex Morgan</p>
                <p class="truncate text-xs text-muted-foreground">test@example.com</p>
            </div>
        </div>
        <x-app-layout.footer-controls />
    </div>
</aside>
