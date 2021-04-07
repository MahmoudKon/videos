@csrf
<div class="row">
    @php  $input = 'name' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'email' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php  $input = 'password' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password Confirmation</label>
            <input type="password" name="password_confirmation" autocomplete="off" class="form-control">
        </div>
    </div>
    @php  $input = 'group' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User Group</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                <option value="admin" {{ isset($row) && $row->{$input} == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ isset($row) && $row->{$input} == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $pageTitle }}</button>
</div>
