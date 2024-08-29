<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar livewire</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/Livewire.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
</head>

<body class="bg-gray-200">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="container mx-auto max-w-7xl shadow-sm">
            <div class="rounded-lg shadow-md p-6 md:p-8 lg:p-10 bg-white">
                @livewire('post')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>
