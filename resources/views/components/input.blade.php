<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="{{ $id }}">{{ $label }} : </label>
    <div class="col-sm-10">
        <input type="{{ $type }}"
            name="{{ $name }}"
            value="{{ old($value) }}"
            class="form-control {{ $class }}"
            id="{{ $id }}"
            placeholder="{{ $placeholder  }}"
            {{  $readonly }}>
    </div>
</div>