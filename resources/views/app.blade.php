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
        
        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }
        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }
        .username{
            color: red;
            background-color:#4a5568;
            margin-left: 1000px;
            border: solid 1px;
            border-radius: 20%;
        }
        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>
    @if(Auth::user())
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="username">
            <div> wellcome {{ Auth::user()->name }}<a href="{{url('logout/')}}">/logout</a></div>
        </div>
            
        
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="{{url('/')}}"><img src={{ URL::asset('images/2.png') }} width="100%" height="100%"/></a>
        </div>
        <div  class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-2 md:grid-cols-1">
                <div  class="p-6">
                    @include('header')
                </div>
                <div  class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    @yield('game_theme')
                </div>
                <div class="p-1 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    @yield('game_contents')
                </div>
            </div>
        </div>
        @include('footer')
    </div>
    @else
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <strong>you must be login or register</strong>
        <div class="username">
            <a href="{{url('loginView/')}}">login</a>/<a href="{{ url('registration/')}}">register</a>
        </div>
    </div>
    @endif
</body>
</html>
