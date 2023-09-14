<x-layout>
    <x-navbar></x-navbar>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <x-flexRow>
        <div class="shadow-md rounded-md bg-gray-200">
            <form action="" method="post">
                @csrf
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required autofocus>
                @error('email')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
                <br/>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
                <br/>
                <input class="bg-blue-400 text-white" type="submit"></button>
            </form>
        </x-flexRow>
    </body>
    </html>
</x-layout>