@extends('layouts.guest')

@section('body')
<main class="h-dvh flex justify-center items-center p-4">
    <section class="max-w-sm mx-auto w-full p-4 border border-gray-50 shadow rounded-lg">
        <h1 class="text-center text-xl font-medium">Register</h1>
        
        @include('includes.alert')

        <form method="POST">
            @csrf
            <div class="mb-5">
                <x-basic-label for="name" title="name" />
                <x-basic-input type="text" id="name" name="name" value="{{ old('name')}} " required />
            </div>
            <div class="mb-5">
                <x-basic-label for="email" title="Email" />
                <x-basic-input type="email" id="email" name="email" value="{{ old('email')}} " required />
            </div>
            <div class="mb-5">
                <x-basic-label for="password" title="Password" />
                <x-basic-input type="password" id="password" name="password" required />
            </div>
            <div class="mb-2">
                <p class="text-xs">sudah punya akun ? <a href="{{ route('login') }}" class="hover:underline">login</a></p>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
            </div>
        </form>
    </section>
</main>
@endsection