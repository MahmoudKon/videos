@csrf
<div class="row">
    @php  $input = 'name' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page Name</label>
            <input type="text" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'meta_keywords' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="{{ $input }}" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'des' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page Description</label>
            <textarea name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">{{ isset($row)? $row->{$input} : old($input) }}</textarea>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php  $input = 'meta_des' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">{{ isset($row)? $row->{$input} : old($input) }}</textarea>
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
