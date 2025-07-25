<style>
    .table td,
    .table th,
    .table tr {
        font-size: 14px;
    }

    .nav-line-tabs .nav-item .nav-link.active,
    .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
    .nav-line-tabs .nav-item.show .nav-link {
        background-color: transparent !important;
        border: 0;
        border-bottom: 2px solid #237075;
        transition: color 0.2s ease, background-color 0.2s ease;
        padding: 13px;
        color: rgb(0, 0, 0) !important;
    }

    .btn-outline-primary {
        border: 1px solid #237075 !important;
        /* border-color: #237075 !important; */
        color: #237075 !important;
    }

    .btn-check:active+.btn.btn-active-primary,
    .btn-check:checked+.btn.btn-active-primary,
    .btn.btn-active-primary.active,
    .btn.btn-active-primary.show,
    .btn.btn-active-primary:active:not(.btn-active),
    .btn.btn-active-primary:focus:not(.btn-active),
    .btn.btn-active-primary:hover:not(.btn-active),
    .show>.btn.btn-active-primary {
        color: #0b6476;
        border-color: #0b6476;
        background-color: #f1faff !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #0b6476;
        border-color: #0b6476;
        background-color: #f1faff !important;
    }
</style>

<style>
    /* Tracking System */
    .trackNavbar {
        align-items: center;
        height: 200px;
        display: flex;
        width: 90%;
        margin: auto;
    }

    .trackNavbar ul {
        position: relative;
        margin: 0;
        display: flex;
        justify-content: space-between;
        width: 100%;
        background-color: #e4e6ef;
        height: 5px;
    }

    .trackNavbar .nav-tabs {
        border-bottom: none;
    }

    .trackNavbar .nav-tabs .nav-link {
        border: none;
        padding: 0px;
    }

    .trackNavbar ul li.inactive {
        pointer-events: none;
    }

    .trackNavbar ul li.inactive a:before {
        content: "";
        z-index: 99;
        display: block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        margin: auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 4px #4a82b5;
        background: #4a82b5;
        transition: box-shadow 0.3s cubic-bezier(0.75, 0, 0.24, 1);
    }

    .trackNavbar ul li.active a i,
    .trackNavbar ul li.active a span {
        color: #0b6476;
    }

    .trackNavbar ul li.active .ripple {
        position: relative;
    }

    .trackNavbar ul li.active .ripple:before {
        animation: ripple 2s linear infinite;
        content: "";
    }

    .trackNavbar ul li a {
        position: relative;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: #4a82b5;
        text-align: center;
    }

    .trackNavbar ul li a i {
        display: block;
        position: absolute;
        left: 50%;
        bottom: 0;
        height: 40px;
        width: 40px;
        margin-bottom: 20px;
        border-radius: 100%;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid #0b6476;
        transform: translateX(-50%);
        transition: opacity 0.3s ease-out, bottom 0.5s ease;
        animation-direction: alternate;
    }

    .trackNavbar ul li a.active>i {
        color: #ffffff;
        background: #0b6476;
        border-radius: 100%;
        height: 40px;
        width: 40px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trackNavbar ul li a span {
        display: block;
        position: absolute;
        left: 40%;
        top: 100%;
        margin-top: 40px;
        margin-bottom: 10px;
        transform: translateX(-45%);
        padding-left: 5px;
        padding-right: 5px;
        transition: opacity 0.3s ease-out, bottom 0.5s ease;
        font-size: 12px;
        width: 100px;
        font-family: "Poppins";
    }

    .trackNavbar ul li a:before {
        content: "";
        z-index: 99;
        display: block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        margin: auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 4px #0b6476;
        background: #0b6476;
        transition: box-shadow 0.3s cubic-bezier(0.75, 0, 0.24, 1);
    }

    .trackNavbar ul li a.active:before {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 10px #0b6476;
    }

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
</style>
