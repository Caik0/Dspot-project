<div>
    <form wire:submit.prevent="register">
        @csrf


        <div>
            <label for="dominio">Dominio</label>
            <input type="text" id="dominio" wire:model.defer="dominio" required maxlength="10">
            @error('dominio')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>




        <div>
            <label for="nome">Nome</label>
            <input type="text" id="nome" wire:model.defer="nome" required>
            @error('nome')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div>
            <label for="telefone">telefone</label>
            <input type="text" id="telefone" wire:model.defer="telefone">
            @error('telefone')
                <span class="error">{{ $message }}</span>
            @enderror

        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" id="password" wire:model="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirme a Senha</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" required>
            @error('password_confirmation')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" style="background: green">Registrar</button>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (session()->has('error'))
            <div>{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
    </form>
</div>
