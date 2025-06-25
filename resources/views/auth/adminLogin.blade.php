<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- CHAMP CACHÉ pour dire que c'est un login admin -->
        <input type="hidden" name="guard" value="admin">

        <!-- Email -->
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <!-- Mot de passe -->
        <div>
            <label>Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <!-- Se souvenir de moi -->
        <div>
            <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
        </div>

        <button type="submit">Connexion admin</button>
    </form>
</x-guest-layout>
