<div class="card text-left" id="profileCard" style="display: none;">
    <div class="card-header">
        <h4 style="margin-top: 0;font-weight: bold; color: #717171;">Update Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('front.profile.update') }}" method="post">
            @csrf
            <div class="row">
                @php $input = 'name' @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($user) ? $user->{$input} : old($input) }}">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @php $input = 'email' @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($user)? $user->{$input} : old($input) }}">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                @php $input = 'password' @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Change Password</label>
                        <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" placeholder="write a new password">
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
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
