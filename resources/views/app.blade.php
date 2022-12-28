<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        
        html, body{
            padding: 50px;
            align-items: center;
            align-self: center;
            align-content: center;
            justify-content: center;
            justify-self: center;
            justify-items: center;
            text-align: center;
            text-justify: auto;
        }
    </style>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="{{url('/')}}"><img src={{ URL::asset('images/2.png') }} width="100%" height="100%"/></a>
        </div>
        <div  class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="table"  class="grid grid-cols-2 md:grid-cols-1">
                <div  class="p-6">
                    @include('header')
                </div>
                <div  class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    @yield('game_theme')
                </div>
                <div  class="gamecontents" class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    @yield('game_contents')
                </div>
            </div>
        </div>

        @include('footer')
    </div>
</body>
</html>
