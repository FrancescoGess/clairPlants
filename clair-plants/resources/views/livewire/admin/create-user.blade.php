{{-- <div class="max-w-xl mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Crea nuovo utente</h2>

    @if (session()->has('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="createUser">
        <div class="mb-2">
            <label>Nome</label>
            <input type="text" wire:model="name" class="input" />
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label>Cognome</label>
            <input type="text" wire:model="cognome" class="input" />
            @error('cognome') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" wire:model="email" class="input" />
            @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label>Password</label>
            <input type="text" wire:model="password" class="input" />
            @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label>Partita IVA</label>
            <input type="text" wire:model="partita_iva" class="input" />
            @error('partita_iva') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label><input type="checkbox" wire:model="is_admin"> Admin?</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Crea utente
        </button>
    </form>
</div> --}}


@extends('layouts.app')

@section('content')
    @livewire('admin.create-user')
@endsection
