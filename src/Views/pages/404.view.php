<!DOCTYPE html>
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
        (m === "system" && window.matchMedia("(prefers-color-scheme: dark)").matches);
      if (d) document.documentElement.classList.add("dark");
    } catch (e) {}
  })();
</script>
<title>Page not found · Rowdo</title>
<link rel="stylesheet" href="build/css/app.css" />
<link rel="icon" type="image/svg+xml" href="assets/icons/favicon.svg" />
</head>
<body class="min-h-screen bg-background font-sans text-foreground antialiased">

  <div class="flex min-h-screen flex-col items-center justify-center px-4 py-12 text-center">

    <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-muted">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-muted-foreground" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
        <circle cx="10.5" cy="10.5" r="6.5" />
        <path stroke-linecap="round" d="M15.35 15.35 21 21" />
        <path stroke-linecap="round" d="M8.25 8.25 12.75 12.75M12.75 8.25 8.25 12.75" />
      </svg>
    </div>

    <p class="text-sm font-semibold uppercase tracking-wider text-primary">404</p>
    <h1 class="mt-1 text-2xl font-bold tracking-tight">Page not found</h1>
    <p class="mt-2 max-w-xs text-sm text-muted-foreground">
      The page you're looking for doesn't exist, moved, or the link is out of date.
    </p>

    <a
      href="index.html"
      class="mt-6 rounded-lg bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground hover:bg-primary/90"
    >
      Back to dashboard
    </a>
  </div>

  <script src="assets/js/app.js"></script>
</body>
</html>
