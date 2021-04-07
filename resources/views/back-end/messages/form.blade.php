<div class="row">
    @php  $input = 'name' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">User Name</label>
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
            <label class="bmd-label-floating">User E-mail</label>
            <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'message' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">{{ isset($row)? $row->{$input} : old($input) }}</textarea>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<hr>
    <h4>Replay On Message</h4>
    <br>
    <form action="{{ route('message.replay', $row->id) }}" method="post">
        @csrf
        @php  $input = 'replay' @endphp
        <div>
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Replay Message</label>
                <textarea name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">{{ old($input) }}</textarea>
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Replay</button>
    </form>

