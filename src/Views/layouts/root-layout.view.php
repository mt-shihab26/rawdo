@props(['title' => null, 'description' => null])

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="{{ $description }}" />
        <script>
            (function () {
                try {
                    const m = localStorage.getItem("rawdo-theme") || "system";
                    const d = m === "dark" || (m === "system" && window.matchMedia("(prefers-color-scheme: dark)").matches);
                    if (d) document.documentElement.classList.add("dark");
                } catch (e) {
                    console.log(e);
                }
            })();
        </script>
        <title>{{ $title }} - Rawdo</title>
        <link rel="icon" type="image/svg+xml" href="favicon.svg" />
        <link rel="stylesheet" href="build/css/app.css" />
    </head>
    <body class="min-h-screen bg-background font-sans text-foreground antialiased">
        {!! $slot !!}
        <script src="build/js/app.js"></script>
    </body>
</html>
