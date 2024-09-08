<div class="container" id="l" style="margin-top: 50px;">
    <form method="post" action="{{ route('password.updatee') }}">
        @csrf
        @method('put')
        <h2>Mettre à jour Password</h2>

        <div class="form-group">
            <label for="current_passwordd">Current Password :</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="form-group">
            <label for="password">New Password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password :</label>
            <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation" required>
        </div>

        <button type="submit">Mettre à jour Password</button>
    </form>
</div>
