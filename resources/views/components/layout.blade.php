<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'sign in'}}</title>
</head>
<body class="bg-white w-full flex justify-center flex-col min-h-screen">
    {{ $slot }}
</body>
</html>