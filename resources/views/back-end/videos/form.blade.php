@csrf
<div class="row">
    @php  $input = 'name' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
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
            <input type="text" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'image' @endphp
    <div class="col-md-6">
        <div class="">
            <label class="">Upload Image</label>
            <input type="file" name="{{ $input }}" class="@error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'youtube' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube URL</label>
            <input type="url" name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror" value="{{ isset($row)? $row->{$input} : old($input) }}">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'cat_id' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category Name</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($row) && $row->{$input} == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'published' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                <option value="1" {{ isset($row) && $row->{$input} == 1 ? 'selected' : '' }}>Published</option>
                <option value="0" {{ isset($row) && $row->{$input} == 0 ? 'selected' : '' }}>Hidden</option>
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'des' @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
            <textarea name="{{ $input }}" autocomplete="off" class="form-control @error($input) is-invalid @enderror">{{ isset($row)? $row->{$input} : old($input) }}</textarea>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'meta_des' @endphp
    <div class="col-md-12">
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
    @php  $input = 'skills' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills Name</label>
            <select name="{{ $input }}[]" multiple style="height:80px" class="form-control @error($input) is-invalid @enderror">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php  $input = 'tags' @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags Name</label>
            <select name="{{ $input }}[]" multiple style="height:80px" class="form-control @error($input) is-invalid @enderror">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
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
