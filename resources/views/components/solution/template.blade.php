{{-- <style>
    .custom-solution-template {
        padding: 0px !important;
        display: flex;
        justify-content: center;
        height: 200px;
        width: 100%;
    }

    @media (max-width: 1366px) {
        .custom-solution-template {
          height: 100px;
        }

        .solution-type-mobile {}
    }

    @media (max-width: 768px) {
        .custom-solution-template {
            height: auto;
        }
    }
</style>
<div class="row">
    @foreach ($templates as $template)
        <div class="col-lg-3">
            <input type="radio" class="btn-check solution_template_radio" name="solution_template" value="{{ $template['value'] }}"
                {{ $loop->first ? 'checked' : '' }} id="{{ $template['value'] }}">
            <label
                class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5 template-solution"
                for="{{ $template['value'] }}">
                <img class="solution-type-mobile" height="350px" width="100%"
                    style="width: 100% !important; object-fit: scale-down !important;"
                    src="{{ asset($template['image']) }}" alt="{{ $template['value'] }}">
            </label>
        </div>
    @endforeach
</div>

@push('scripts')
    <script>
        document.querySelectorAll('.solution_template_radio').forEach(radio => {
            radio.addEventListener('change', event => {
                if (radio.checked) {

                    const stepper = document.querySelector('[data-kt-stepper]');
                    if (stepper) {
                        const stepperInstance = KTStepper.getInstance(stepper);
                        if (stepperInstance) {
                            stepperInstance.goNext();
                        } else {
                            console.error('Stepper instance not found.');
                        }
                    } else {
                        console.error('Stepper element not found.');
                    }
                }
            });
        });
    </script>
@endpush --}}

<style>
    .window {
        width: 350px;
        margin: auto;
        border: 7px solid #1d505d;
        border-radius: 5px;
        box-shadow: 15px 5px 36px 2px #bcc6ff;
        cursor: n-resize;
    }

    .window img {
        width: 100%;
        object-fit: cover;
        object-position: top;
        height: 400px;
        transition: 5s all ease;
    }

    .window img:hover {
        object-position: bottom;
    }

    .btn-check:active+.btn.custom-active,
    .btn-check:checked+.btn.custom-active,
    .btn.custom-active.active,
    .btn.custom-active.show,
    .btn.custom-active:active:not(.btn-active),
    .btn.custom-active:focus:not(.btn-active),
    .btn.custom-active:hover:not(.btn-active),
    .show>.btn.custom-active {
        opacity: 0.8;
    }
</style>

@props([
    'templates' => [],
    'selectedTemplate' => null, // Default to null if not provided
])

<div style="margin: auto" class="px-10">
    <div class="row mt-5">
        @php
            $counter = 0;
        @endphp
        @foreach ($templates as $template)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
                <div>
                    <input type="radio" class="btn-check template-btn-check" name="solution_template"
                        value="{{ $template['value'] }}" id="{{ $template['value'] }}"
                        @if ($counter === 0) checked @endif @checked($template['value'] == $selectedTemplate) />
                    <label
                        class="btn template-btn btn-outline btn-outline-dashed btn-active-primary custom-active p-4 d-flex align-items-center mb-5 custom-radio"
                        for="{{ $template['value'] }}">
                        <div class="window">
                            <img src="{{ asset($template['image']) }}" alt="{{ $template['value'] }}">
                        </div>
                    </label>
                </div>
            </div>
            @php
                $counter++;
            @endphp
        @endforeach
    </div>
</div>
