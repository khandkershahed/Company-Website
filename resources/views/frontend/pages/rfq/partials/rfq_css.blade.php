<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-control {
        color: #212529;
        background-color: #fbfbfb;
    }

    form .btn {
        width: 100%;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
        top: -5px;
    }

    .rfq-header {
        background-color: #f6f5f4;
        color: white;
    }

    .rfq-add-btns {
        width: 5%;
    }

    .rfq-title-btns {
        width: 100%;
    }

    .rfq-delete-btns {
        width: 5%;
    }

    .rfq-repeater {
        display: flex;
        align-items: end;
    }

    .rfq-add-btns button {
        color: #ae0a46;
        background-color: transparent;
        border: 0;
        padding: 5px;
        width: 40px;
        height: 40px;
        border: 1px solid #ae0a46;
    }

    .rfq-delete-btns button {
        color: #ae0a46;
        /* color: white; */
        background-color: transparent;
        border: 0;
        padding: 5px;
        height: 50px;
        margin-left: 5px;
    }

    .checkbox-wrapper-4 * {
        box-sizing: border-box;
    }

    .checkbox-wrapper-4 .cbx {
        -webkit-user-select: none;
        user-select: none;
        cursor: pointer;
        padding: 6px 8px;
        border-radius: 6px;
        overflow: hidden;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .checkbox-wrapper-4 .cbx:not(:last-child) {
        margin-right: 6px;
    }

    .checkbox-wrapper-4 .cbx:hover {
        background: #ae0a462a;
    }

    .checkbox-wrapper-4 .cbx span {
        float: left;
        vertical-align: middle;
        transform: translate3d(0, 0, 0);
    }

    .checkbox-wrapper-4 .cbx span:first-child {
        position: relative;
        width: 18px;
        height: 18px;
        border-radius: 4px;
        transform: scale(1);
        border: 1px solid #cccfdb;
        transition: all 0.2s ease;
        box-shadow: 0 1px 1px rgba(0, 16, 75, 0.05);
    }

    .checkbox-wrapper-4 .cbx span:first-child svg {
        position: absolute;
        top: 3px;
        left: 2px;
        fill: none;
        stroke: #fff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        stroke-dashoffset: 16px;
        transition: all 0.3s ease;
        transition-delay: 0.1s;
        transform: translate3d(0, 0, 0);
    }

    .checkbox-wrapper-4 .cbx span:last-child {
        padding-left: 8px;
        line-height: 18px;
    }

    .checkbox-wrapper-4 .cbx:hover span:first-child {
        border-color: #ae0a46;
    }

    .checkbox-wrapper-4 .inp-cbx {
        position: absolute;
        visibility: hidden;
    }

    .checkbox-wrapper-4 .inp-cbx:checked+.cbx span:first-child {
        background: #ae0a46;
        border-color: #ae0a46;
        animation: wave-4 0.4s ease;
    }

    .checkbox-wrapper-4 .inp-cbx:checked+.cbx span:first-child svg {
        stroke-dashoffset: 0;
    }

    .checkbox-wrapper-4 .inline-svg {
        position: absolute;
        width: 0;
        height: 0;
        pointer-events: none;
        user-select: none;
    }

    @media screen and (max-width: 640px) {
        .checkbox-wrapper-4 .cbx {
            width: 100%;
            display: inline-block;
        }
    }

    @-moz-keyframes wave-4 {
        50% {
            transform: scale(0.9);
        }
    }

    @-webkit-keyframes wave-4 {
        50% {
            transform: scale(0.9);
        }
    }

    @-o-keyframes wave-4 {
        50% {
            transform: scale(0.9);
        }
    }

    @keyframes wave-4 {
        50% {
            transform: scale(0.9);
        }
    }

    .select2.select2-container {
        width: 100% !important;
    }

    .select2-dropdown {
        background-color: white;
        border: 1px solid #b3b3b363;
    }

    .select2.select2-container .select2-selection {
        border: 1px solid #f7f6f5;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        height: 50px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
        color: #748188;
        line-height: 48px;
        padding-right: 33px;
        font-size: 13px;
        background-color: #f7f6f5;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
        background: #f8f8f8;
        border-left: 1px solid #f7f6f5;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        height: 48px;
        width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
        background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .select2-search--dropdown {
        display: block;
        padding: 4px;
        border-top: 1px solid #f7f6f5;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        border: 1px solid #f7f6f5;
        padding: 10px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f7f6f5;
        color: #000000;
    }

    .select2-results__option[aria-selected] {
        cursor: pointer;
        padding: 14px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        font-weight: normal;
    }

    .select-inputs {
        background-color: #f7f6f5;
        border: 0;
        padding: 14px;
        border-radius: 3px;
    }

    .rfq-header {
        background-image: url('{{ asset('images/rfq-bg-banner.jpg') }}');
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
    }

    .cst-select {
        height: 50px;
        background: #f7f6f5;
        border: 0;
        color: #808a8f;
        font-size: 14px;
        -webkit-appearance: none;
        /* Removes default dropdown arrow in WebKit browsers */
        -moz-appearance: none;
        /* Removes default dropdown arrow in Firefox */
        appearance: none;
        /* Removes default dropdown arrow */
        padding-right: 30px;
        /* Adds space for the arrow */
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        /* Adjust the position of the arrow */
        background-size: 12px 12px;
        /* Set the size of the arrow */
    }

    .btn-secondary-disable {
        height: 55px;
        padding: 0 25px;
        background-color: #6c757d !important;
        color: white !important;
        cursor: not-allowed;
        border: 0;
    }

    .btn-color:hover {
        border: 1px solid var(--secoandaryborder-color) !important;
        background-color: #fff !important;
        color: #ae0a46 !important;
        transition: all 0.8s ease-in-out;
    }
</style>
