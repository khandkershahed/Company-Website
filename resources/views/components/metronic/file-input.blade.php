@props(['id' => '', 'name', 'source' => ''])

<div class="row gx-1">
    <div class="col-10">
        <input id="{{ $id ?? 'file-input' }}" type="file" class="form-control @error($name)is-invalid @enderror"
            name="{{ $name }}" accept="image/*" {{ $attributes }} onchange="previewFile(this)" />

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-2 mt-n7">
        <img id="{{ $id ?? 'file-input' }}-preview" src="{{ !empty($source) && file_exists($source) ? $source : asset('upload/no_image.jpg') }}"
            alt="Image Preview" class="img-thumbnail" style="display: {{ !empty($source) ? 'block' : 'none' }};height: 65px;">
    </div>
</div>

<script>

    function previewFile(input) {
        var file = input.files[0];
        var preview = document.getElementById(input.id + '-preview');
        var reader = new FileReader();

        if (file && file.size > 2 * 1024 * 1024) { // 2MB
            alert("File size must be less than 2MB");
            input.value = ''; // Clear the input
            preview.src = '';
            preview.style.display = 'none';
            return;
        }

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
