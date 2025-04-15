<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CreateUser extends Component
{
    public $name, $cognome, $email, $password, $partita_iva, $is_admin = false;

    public function mount()
    {
        // Blocca l'accesso ai non-admin
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403);
        }
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'partita_iva' => 'required|string|size:11|unique:users,partita_iva',
        ]);

        $generatedPassword = Str::random(10); // GENERA UNA PASSWORD CASUALE

        $user = User::create([
            'name' => $this->name,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'password' => Hash::make($generatedPassword),
            'partita_iva' => $this->partita_iva,
            'is_admin' => $this->is_admin,
        ]);

        // INVIO MAIL CON CREDENZIALI D'ACCESSO ALL'UTENTE REGISTRATO DALL'ADMIN
        Mail::to($user->email)->send(new NewUserCredentialsMail($user, $this->password));

        session()->flash('success', 'Utente creato con successo. Abbiamo inviato una email con le credenziali');
        $this->reset(); // Resetta i campi
    }

    public function render()
    {
        return view('livewire.admin.create-user');
    }
}

