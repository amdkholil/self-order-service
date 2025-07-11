<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>

    <div class="flex min-h-screen w-full bg-gray-200 dark:bg-black">
        <div class="container max-w-xl  mx-auto bg-secondary-200 dark:bg-gray-800">
            <div id="app"></div>
        </div>
    </div>
    <script>
        window.baseUrl = '{{ url('/') }}'
    </script>
</body>

</html>
