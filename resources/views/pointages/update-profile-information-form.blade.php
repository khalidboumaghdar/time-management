<div class="container" id="l">
    <form method="post" action="{{ route('profile.updatee') }}">
      @csrf
      @method('put')
      <h2>Mettre à jour les informations de l'employé</h2>

      <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail :</label>
        <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
      </div>
      @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="mb-3">
          <p>
            {{ __('Votre adresse e-mail n\'a pas encore été vérifiée.') }}
            <button type="submit" form="send-verification" class="btn btn-danger">
              {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
            </button>
          </p>
          <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
          </form>
          @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600">
              {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
            </p>
          @endif
        </div>
      @endif
      <button type="submit">Mettre à jour</button>
    </form>
  </div>
