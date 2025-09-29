<style>
        @keyframes ripple {
            0% {
                box-shadow: 0 0 0 0 rgba(74, 130, 181, 0.3),
                    0 0 0 0.03em rgba(74, 130, 181, 0.3), 0 0 0 0.05em rgba(74, 130, 181, 0.3),
                    0 0 0 0.08em rgba(74, 130, 181, 0.3);
            }

            100% {
                box-shadow: 0 0 0 0.01em rgba(74, 130, 181, 0.3),
                    0 0 0 0.5em rgba(74, 130, 181, 0.3), 0 0 0 1em rgba(74, 130, 181, 0.2),
                    0 0 0 2em rgba(74, 130, 181, 0);
            }
        }

        .tab-visible {
            display: block;
        }

        .tab-hidden {
            display: none;
        }

        .btn-outlines {
            color: #0b6476 !important;
            border: 1px solid #0b6476 !important;
            background-color: transparent !important;
        }

        /* For Deal Page css Only Start */
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
            color: #0b6476;
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
            color: #0b6476 !important;
        }

        /* ✅ Active/current step style - red background */
        .step.active {
            background-color: #0b6476;
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
            background-color: #f7f6f5;
            border-radius: 0px;
            padding: 10px;
            box-shadow: none !important;
            z-index: 10;
            transition-duration: 0.4s;
            -moz-transition-duration: 0.4s;
            -webkit-transition-duration: 0.4s;
            -o-transition-duration: 0.4s;
        }

        .form-control {
            color: #212529;
            background-color: #f5f8fa;
            border-radius: 0px;
            padding: 11.5px;
            box-shadow: none !important;
            z-index: 10;
            border: 0;
            transition-duration: 0.4s;
            -moz-transition-duration: 0.4s;
            -webkit-transition-duration: 0.4s;
            -o-transition-duration: 0.4s;
        }

        .form-control:focus {
            color: #212529;
            background-color: #f5f8fa;
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
            color: #0b6476;
            background-color: transparent;
            border: 0;
            padding: 10px;
            border-radius: 5px;
            width: 150px;
            border: 1px solid #0b6476;
        }

        .rfq-add-btns:hover {
            color: #fff;
            background-color: #0b6476;
            border-radius: 5px;
            transition: 0.5s all;
        }

        .trash-btn {
            background-color: transparent !important;
            color: #0b6476 !important;
            border: 0;
            border-radius: 5px;
            font-size: 20px;
        }

        .trash-btn:hover {
            background-color: red;
            color: #0b6476 !important;
            border: 0;
            border-radius: 5px;
            font-size: 20px;
        }

        .trash-btn i {
            color: red !important;
        }

        .next-btn {
            padding: 10px 20px;
            border-radius: 5px;
            width: 150px;
            background-color: #0b6476;
            border: 1px solid #0b6476;
        }

        .next-btn:hover {
            padding: 10px 20px;
            width: 150px;
            border-radius: 5px;
            background-color: #0b6476;
            border: 1px solid #0b6476;
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
            background-color: #0b64766c;
            border: 1px solid #0b64766c;
        }

        .form-control::placeholder {
            color: #c0c0c0;
            opacity: 3;
            font-size: 14px;
        }

        .form-check-input:checked {
            background-color: #0b6476;
            border-color: #0b6476;
        }

        .form-check-input:focus {
            border-color: #0b6476;
            outline: 0;
            box-shadow: 0 0 0 0.25rem #0b647623;
        }

        .check-label {
            font-size: 18px;
            color: #0b6476;
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

        .increment-quantity:hover {
            background-color: #0b6476 !important;
            margin-top: 0px;
            border: 2px solid #0b6476;
        }

        .increment-quantity:hover i {
            color: white !important;
        }

        .decrement-quantity {
            margin-top: 0px;
            border: 2px solid #eee;
        }

        .decrement-quantity:hover {
            background-color: #0b6476 !important;
            margin-top: 0px;
            border: 2px solid #0b6476;
        }

        .decrement-quantity:hover i {
            color: white !important;
        }

        .current-step-red {
            background-color: transparent !important;
            /* Bootstrap red */
            color: #0b6476 !important;
            display: flex;
            justify-content: center;
            /* border-bottom: 1px solid #0b6476; */
            /* box-shadow: rgba(14, 63, 126, 0.04) 0px 0px 0px 1px,
        rgba(42, 51, 69, 0.04) 0px 1px 1px -0.5px,
        rgba(42, 51, 70, 0.04) 0px 3px 3px -1.5px,
        rgba(42, 51, 70, 0.04) 0px 6px 6px -3px,
        rgba(14, 63, 126, 0.04) 0px 12px 12px -6px,
        rgba(14, 63, 126, 0.04) 0px 24px 24px -12px; */
            }

        .current-step-red .step-label {
            background-color: transparent !important;
            /* Bootstrap red */
            color: #0b6476 !important;
        }

        .is-invalid {
            border: 0;
        }

        .form-control.is-valid,
        .was-validated .form-control:valid {
            border-color: transparent !important;
            padding-right: calc(1.5em + 1.5rem) !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2350CD89' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round' d='M3 8l3 3 7-7'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat !important;
            background-position: right calc(0.375em + 0.375rem) center !important;
            background-size: calc(0.75em + 0.75rem) calc(0.75em + 0.75rem) !important;
        }

        .form-select.is-valid:not([multiple]):not([size]),
        .form-select.is-valid:not([multiple])[size="1"],
        .was-validated .form-select:valid:not([multiple]):not([size]),
        .was-validated .form-select:valid:not([multiple])[size="1"] {
            padding-right: 5.5rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='none' stroke='%237E8299' stroke-linecap='round' stroke-linejoin='round' stroke-width='1' d='M2 5l6 6 6-6'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22%3E%3Cpath fill=%22none%22 stroke=%22%2350CD89%22 stroke-width=%221.5%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22 d=%22M3 8l3 3 7-7%22/%3E%3C/svg%3E") !important;

            background-position: right 1rem center, center right 3rem;
            background-size: 16px 12px, calc(0.75em + 0.75rem) calc(0.75em + 0.75rem);
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

        /* For Deal Page css Only End */
    </style>
