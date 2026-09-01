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
        {!! $slot !!}
        <script src="build/js/app.js"></script>
    </body>
</html>
