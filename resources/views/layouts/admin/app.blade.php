<!DOCTYPE html>
<html lang="en" class="bg-yellow-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dani’s Catering and Events | Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    <div id="app" x-data="app">
        @include('layouts/admin/sidebar')

        <div x-bind:class="sidebar ? 'lg:pl-72' : ''">
            @include('layouts/admin/header')

            <main class="py-5">
                <div class="px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('app', () => ({
                    sidebar: true,
         
                    toggleSidebar() {
                        this.sidebar = ! this.sidebar
                    },
                }))
            })
        </script>
    </div>
</body>

</html>