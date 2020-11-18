<div class="row">
    <div class="form-group col-sm-12 col-md-6">
        <label for="name">Nome </label>
        <input type="text" name="name" id="name" autofocus class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$user->name) }}">
        @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="email">E-mail </label>
        <input type="email" name="email" id="email" autofocus class="form-control @error('email') is-invalid @enderror" required value="{{ old('email',$user->email) }}">
        @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password" class="required">Senha </label>
            <input type="password" name="password" id="password" required class="form-control">
            @error('password')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password_confirmation" class="required">Confirme a senha </label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
    </div>
    @can('viewAny',  App\User::class)
    <div class="col-md-12">
        <div class="form-group">
            <label>Administrador</label>
            <input type="checkbox" name="is_admin" id="is_admin" {{ $user->is_admin===1 ? 'checked' : '' }}   class="form-control">
        </div>
    </div>
@endcan
</div>
   