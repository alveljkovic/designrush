<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="This is a test task created by Aleksandar Veljkovic.">
        <title>DesignRush - Test</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>
    <body class="bg-primary ">
        <div class="container mx-auto p-4">
            @inertia
        </div>
    </body>
</html>