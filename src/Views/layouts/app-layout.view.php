<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script>
            (function () {
                try {
                    var m = localStorage.getItem("rowdo-theme") || "system";
                    var d =
                        m === "dark" ||
                        (m === "system" &&
                            window.matchMedia("(prefers-color-scheme: dark)").matches);
                    if (d) document.documentElement.classList.add("dark");
                } catch (e) {}
            })();
        </script>
        <title>Today · Rowdo</title>
        <link rel="stylesheet" href="build/css/app.css" />
        <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    </head>
    <body class="min-h-screen bg-background font-sans text-foreground antialiased">
        <div class="flex min-h-screen">
            <x-sidebar />
            <div class="flex min-w-0 flex-1 flex-col">
                <x-topbar />
                <main class="flex-1 px-4 py-6 lg:px-8 lg:py-8">
                    {!! $slot !!}
                </main>
            </div>
        </div>
        <x-task-modal />
        <script src="build/js/app.js"></script>
    </body>
</html>
