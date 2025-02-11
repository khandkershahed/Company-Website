<div class="col-lg-12 mb-7">
    <x-metronic.label class="form-label required">Row Two Title</x-metronic.label>
    <x-metronic.input type="text" name="row_two_title" class="mb-2 form-control"
        placeholder="Row Two Title" :value="old('row_two_title')">
    </x-metronic.input>

</div>
<div class="col-lg-12 mb-7">
    <x-metronic.label class="form-label required">Row Two Header</x-metronic.label>
    <textarea name="row_two_header" class="mb-2 form-control"
        placeholder="Row Two Header">
        {{ old('row_two_header', $solution->row_two_header) }}
    </textarea>
</div>
