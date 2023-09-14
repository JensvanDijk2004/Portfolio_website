<x-layout>
    <x-flexRow>
        <div class="shadow-md rounded-md bg-gray-200">
            <form action="" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" autofocus><br/>
                @error('name')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
                <label for="email">Email:</label>
                <input type="text" id="Email" name="email"><br/>
                @error('email')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br>
                @error('password')
                    <div class="text-red-400">{{$message}}</div>
                @enderror
                <label for="password_v">Password:</label>
                <input type="password" id="password_v" name="password_v"><br/>
                <button class="bg-blue-400 text-white" type="submit">Signup</button>
            </form>
        </div>
    </x-flexRow>
</x-layout>