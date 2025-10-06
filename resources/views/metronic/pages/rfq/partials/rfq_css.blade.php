<style>
    .clear-search {
        background: transparent;
        border: none;
        color: #999;
    }

    .clear-search:hover {
        color: #333;
    }

    .rfq-status-card {
        max-height: 232px;
        overflow-y: auto;
    }

    .nav-line-tabs .nav-item .nav-link {
        border: 1px solid #eee;
        margin: 0px 5px;
    }

    .rfq-box {
        width: 100%;
        height: 232px;
        flex-shrink: 0;
        border-radius: 0.625rem;
        background: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .rfq-status-card {
        padding-right: 42px;
        padding-left: 42px;
    }

    .rfq-status {
        height: 232px !important;
        border-radius: 0.625rem;
        background: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rfq-badge {
        width: 2.5rem;
        height: 1.8rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .total-rfq {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rfq-icon {
        display: flex;
        width: 50px;
        height: 50px;
        padding: 45px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
        aspect-ratio: 1/1;
        border-radius: 50px;
        background: #EFF4FF;
    }

    .total-rfq h1 {
        color: #000;
        font-family: Poppins;
        font-size: 32px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .total-rfq p {
        color: #8F8F8F;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .rfq-amount h1 {
        display: inline-flex;
        padding: 26px 30px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 8px;
        border-radius: 100px;
        background: #F2F4F6;
    }

    .rfq-amount .value {
        color: #296088;

        /* SubHeading 1/Regular */
        font-family: Poppins;
        font-size: 32px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .cl-badge {
        display: flex;
        width: 125px;
        padding: 6px 10px;
        justify-content: center;
        align-items: center;
        gap: 2px;
        border-radius: 4px;
        background: #EFF4FF;
    }



    .rfq-title {
        color: #000;
        font-family: Poppins;
        font-size: 32px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .rfq-para {
        color: #8F8F8F;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .rfq-pending {
        background: #EFF4FF !important;
        display: flex;
        padding: 8px !important;
        justify-content: space-between;
        align-items: center;
        align-self: stretch;
        margin-bottom: 12px;
        border-radius: 8px;
    }

    .rfq-quoted {
        border-radius: 8px;
        background: #E8E9FF !important;
        display: flex;
        padding: 8px !important;
        justify-content: space-between;
        align-items: center;
        align-self: stretch;
        margin-bottom: 12px;
    }

    .rfq-failed {
        border-radius: 8px;
        background: #FFDBDB !important;
        display: flex;
        padding: 8px !important;
        justify-content: space-between;
        align-items: center;
        align-self: stretch;
        margin-bottom: 12px;
    }

    .rfq-closed {
        border-radius: 8px;
        background: #FFEDD9 !important;
        display: flex;
        padding: 10px 16px;
        justify-content: space-between;
        align-items: center;
        align-self: stretch;
    }

    .nav-line-tabs .nav-item .nav-link.active,
    .nav-line-tabs .nav-item .nav-link:hover:not(.disabled),
    .nav-line-tabs .nav-item.show .nav-link {
        padding: 10px;
        background: #eee !important;
    }
</style>


<style>
    .table td,
    .table th,
    .table tr {
        font-size: 14px;
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
        color: #769E2D;
        border-color: #769E2D;
        background-color: #f1faff !important;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #769E2D;
        border-color: #769E2D;
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
        background-color: #769E2D;
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
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 4px #769E2D;
        background: #769E2D;
        transition: box-shadow 0.3s cubic-bezier(0.75, 0, 0.24, 1);
    }

    .trackNavbar ul li.active a i,
    .trackNavbar ul li.active a span {
        color: #769E2D;
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
        color: #769E2D;
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
        border: 2px solid #769E2D;
        transform: translateX(-50%);
        transition: opacity 0.3s ease-out, bottom 0.5s ease;
        animation-direction: alternate;
    }

    .trackNavbar ul li a.active>i {
        color: #ffffff;
        background: #769E2D;
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
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 4px #769E2D;
        background: #769E2D;
        transition: box-shadow 0.3s cubic-bezier(0.75, 0, 0.24, 1);
    }

    .trackNavbar ul li a.active:before {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2), 0 0 0 10px #769E2D;
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
        color: #769E2D !important;
        border: 1px solid #769E2D !important;
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
        background-color: #769E2D;
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
        color: #769E2D;
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
        color: #769E2D !important;
    }

    /* ✅ Active/current step style - red background */
    .step.active {
        background-color: #769E2D;
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
