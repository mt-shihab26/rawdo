<x-ui.button variant="ghost-sidebar" size="icon" class="lg:hidden" :attrs="['data-sidebar-toggle' => '', 'aria-label' => 'Close menu']">
    <x-icons.close-icon />
</x-ui.button>
<x-ui.button variant="ghost-sidebar" size="icon" display="hidden" class="lg:group-data-[collapsed=false]:inline-flex" :attrs="['data-sidebar-collapse-toggle' => '', 'aria-label' => 'Collapse sidebar']">
    <x-icons.collapse-icon />
</x-ui.button>
