<style>
    .progress-bar-steps {
        display: flex;
        margin-bottom: 30px;
        border-bottom: 1px solid #eee;
    }

    .step {
        flex: 1;
        text-align: center;
        display: flex;
        align-items: center;
        padding: 10px 10px;
        border-radius: 0px;
        background-color: #fcfbfb;
        transition: background-color 0.3s;
    }

    /* Hide checkmark icons by default */
    .step .fa-check {
        display: none;
    }

    /* Show checkmark icon only on completed steps */
    .step.completed .fa-check {
        display: inline-block;
    }

    /* Style the icon inside the step circle */
    .step .circle i {
        font-size: 16px;
        color: #ae0a46;
        transition: color 0.3s, background-color 0.3s;
    }

    /* Step label default style */
    .step .step-label {
        font-weight: 600;
        font-size: 16px;
        color: #333;
        transition: color 0.3s, background-color 0.3s;
    }

    /* Completed step style */
    .step.completed {
        background-color: #eee;
        color: black;
    }

    .step.completed .step-label,
    .step.completed .circle i {
        background-color: #eee !important;
        color: black !important;
    }

    /* ✅ Active/current step style - red background */
    .step.active {
        background-color: #ae0a46;
        color: white;
    }

    .step.active .step-label,
    .step.active .circle i {
        text-align: center;
        color: #ae0a46 !important;
        background-color: transparent !important;
    }

    .step.completed .circle i,
    .step.completed .step-label {
        color: white;
        font-weight: bold;
    }

    .step-content {
        display: none;
    }

    .step-content.active {
        display: block;
    }

    .icon-info {
        border: 1px solid #eee;
        width: 30px;
        text-align: center;
        height: 30px;
        line-height: 30px;
        cursor: pointer;
    }

    .form-select {
        color: #212529;
        background-color: #f7f7f717;
        border-radius: 0px;
        padding: 6px 10px;
        box-shadow: none !important;
        z-index: 10;
        transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -webkit-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
    }

    .form-control {
        color: #212529;
        background-color: #f1f0f0cf;
        border-radius: 0px;
        padding: 10px;
        box-shadow: none !important;
        z-index: 10;
        transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -webkit-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
        font-size: 0.8rem !important;
        font-weight: 500 !important;
    }

    .is-invalid {
        font-size: 0.8rem;
        font-weight: 600;
    }

    .form-control:focus {
        color: #212529;
        background-color: #f1f0f0cf;
        border-radius: 0px;
        padding: 10px;
        box-shadow: none !important;
        z-index: 10;
        transition-duration: 0.4s;
        -moz-transition-duration: 0.4s;
        -webkit-transition-duration: 0.4s;
        -o-transition-duration: 0.4s;
    }

    .rfq-add-btns {
        color: #ae0a46;
        background-color: transparent;
        border: 0;
        padding: 10px;
        border-radius: 5px;
        width: 150px;
        border: 1px solid #ae0a46;
    }

    .rfq-add-btns:hover {
        color: #fff;
        background-color: #ae0a46;
        border-radius: 5px;
        transition: 0.5s all;
    }

    .trash-btn {
        background-color: transparent;
        color: #ae0a46;
        border: 0;
        border-radius: 5px;
        font-size: 20px;
    }

    .trash-btn:hover {
        background-color: red;
        color: white;
        border: 0;
        border-radius: 5px;
        font-size: 20px;
    }

    .next-btn {
        padding: 10px 20px;
        border-radius: 5px;
        width: 150px;
        background-color: #ae0a46;
        border: 1px solid #ae0a46;
    }

    .next-btn:hover {
        padding: 10px 20px;
        width: 150px;
        border-radius: 5px;
        background-color: #ae0a46;
        border: 1px solid #ae0a46;
    }

    .prev-btn {
        padding: 10px 20px;
        border-radius: 5px;
        width: 150px;
        background-color: black;
        border: 1px solid black;
    }

    .prev-btn:hover {
        padding: 10px 20px;
        width: 150px;
        border-radius: 5px;
        background-color: black;
        border: 1px solid black;
    }

    .btn.disabled,
    .btn:disabled,
    fieldset:disabled .btn {
        background-color: #ae0a466c;
        border: 1px solid #ae0a466c;
    }

    .form-control::placeholder {
        color: #888888b2;
        opacity: 3;
        font-size: 16px;
    }

    .custom-form-check:checked {
        background-color: #ae0a46 !important;
        border-color: #ae0a46 !important;
    }

    .custom-form-check:focus {
        border-color: #ae0a46;
        outline: 0;
        box-shadow: 0 0 0 0.25rem #ae0a4623;
    }

    .check-label {
        font-size: 18px;
        color: #ae0a46;
        font-weight: 600;
    }

    /* Shine animation keyframes */
    @keyframes shine {
        0% {
            left: -100%;
        }

        40% {
            left: 100%;
        }

        100% {
            left: 100%;
        }
    }

    /* .counting-btn {
  position: relative;
  top: -51px;
  left: 38px;
} */
    .qty-btn {
        font-size: 10px;
        padding: 0px;
        width: 21px !important;
        height: 22px !important;
    }

    .increment-quantity {
        border: 2px solid #eee;
    }

    .decrement-quantity {

        border: 2px solid #eee;
    }

    .current-step-red {
        background-color: transparent !important;
        /* Bootstrap red */
        color: #ae0a46 !important;
        display: flex;
        justify-content: center;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
            rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }

    .current-step-red .step-label {
        background-color: transparent !important;
        /* Bootstrap red */
        color: #ae0a46 !important;
    }

    .is-invalid {
        border: 0;
    }

    .sl-input.is-valid,
    .was-validated .sl-input:valid {
        border-color: #198754;
        padding-right: 0.75rem;
        /* Or whatever fits your layout */
        background: none !important;
        background-image: none !important;
        background: #f7f7f717 !important;
    }


    @media only screen and (max-width: 600px) {
        .rfq-title {
            font-size: 20px;
        }

        .case-title {
            font-size: 12px;
        }

        .step .step-label {
            font-weight: 600;
            font-size: 11px;
            color: #333;
            transition: color 0.3s;
        }
    }
</style>
