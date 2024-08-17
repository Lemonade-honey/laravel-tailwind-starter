@extends('layouts.app')

@section('body')
    <x-main-header title="Profile" />

    @include('includes.alert')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="p-4 w-full border border-gray-100 shadow rounded-lg h-min">
            <div class="mb-5">
                <x-basic-label for="email" title="Email" />
                <x-basic-input type="email" id="email" name="email" value="{{ $user->email }}" disabled />
            </div>
        </div>
        <form method="POST" class="p-4 w-full border border-gray-100 shadow rounded-lg">
            @csrf
            <div class="mb-5">
                <x-basic-label for="name" title="Name" />
                <x-basic-input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required />
            </div>
            <div class="mb-5">
                <x-basic-label for="birth" title="Birth" />
                <x-basic-input type="date" id="birth" name="birth" value="{{ old('birth', $user->profile->birth_date) }}" />
            </div>
            <div class="mb-5">
                <x-basic-label for="phone" title="phone" />
                <x-basic-input type="number" id="phone" name="phone" value="{{ old('phone', $user->profile->phone_number) }}" />
            </div>
            <div class="mb-5">
                <x-basic-label for="address" title="Address" />
                <textarea name="address" id="address" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('address', $user->profile->address) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
            </div>
        </form>
    </div>
@endsection