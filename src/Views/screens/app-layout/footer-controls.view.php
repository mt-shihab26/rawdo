<x-ui.button
    variant="ghost-sidebar"
    size="icon"
    display="hidden"
    class="mt-1 w-full lg:group-data-[collapsed=true]:flex"
    :attrs="['data-sidebar-collapse-toggle' => '', 'aria-label' => 'Expand sidebar']"
>
    <x-icons.collapse-icon />
</x-ui.button>
