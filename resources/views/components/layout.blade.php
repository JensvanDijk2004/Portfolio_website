<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cyan-400">
  <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
    <div>
      <span class="text-2x1 font-[Poppins] cursor-pointer">
        <img class="h-10 inline" src="">
      </span>
    </div>

    <ul class="md:flex md:items-center">
      <li class="mx-4">
        <a href="{{ route('home') }}" class="text-x1 hover:text-cyan-500 duration-500">home</a>
      </li>
      <li class="mx-4">
        <a href="{{ route('signUp') }}" class="text-x1 hover:text-cyan-500 duration-500">signup</a>
      </li>
      <li class="mx-4">
        <a href="{{ route('login') }}" class="text-x1 hover:text-cyan-500 duration-500">login</a>
      </li>
      <li class="mx-4">
        <a href="{{ route('postCreate') }}" class="text-x1 hover:text-cyan-500 duration-500">create</a>
      </li>
      @if (Auth::check())
      <div class="loggedinuser">
          Welkom {{Auth::user()->name}}
      </div>
      @endif
    </ul>
  </nav>

 
</body>
</html>


    {{$slot}}