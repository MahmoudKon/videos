@csrf
<div class="row">
    @php  $input = 'name' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skill Name</label>
            <input type="text" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
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
