
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" />
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app"></div>
    <script>
        window.baseUrl = '{{ url("/")}}'
    </script>
</body>
</html>

