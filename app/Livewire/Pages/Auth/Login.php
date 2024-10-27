<?php

namespace App\Livewire\Pages\Auth;

use App\Models\empresas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $role, $dominio;

    public function login()
    {
        // Validação dos campos de entrada
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'dominio' => 'required|string|max:10',
        ]);

        // Verifica se o domínio existe
        $empresa = empresas::where('dominio', $this->dominio)->first();
        if (!$empresa) {
            session()->flash('error', 'Erro: domínio inválido');
            return;
        }

        // Busca o usuário com o email informado
        $user = User::where('email', $this->email)->first();

        // Verifica as credenciais do usuário
        if ($user && Hash::check($this->password, $user->password)) {
            // Loga o usuário
            Auth::login($user);

            // Redireciona o usuário para a tela de login após o login bem-sucedido
            return redirect()->route('login');
        } else {
            // Exibe erro de credenciais inválidas
            session()->flash('error', 'Credenciais inválidas.');
        }
    }

    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts.auth-layout');
    }
}




