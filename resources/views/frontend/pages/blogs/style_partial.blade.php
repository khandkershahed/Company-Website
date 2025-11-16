<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    body {
        font-family: "Poppins", sans-serif;
    }

    .nav-tabs .nav-item .nav-link.active {
        border: 1px solid transparent;
        padding: 0;
        border-radius: 60px;
        font-size: 0.9em;
        ;
        font-weight: 400;
        color: var(--white);
        background: transparent;
    }

    .page-item:not(:first-child) .page-link {
        margin-left: -1px;
        height: 47px;
    }

    .nav-tabs .nav-item .nav-link {
        border: 1px solid transparent;
        padding: 0;
        border-radius: 60px;
        font-size: 0.9em;
        ;
        font-weight: 400;
        color: var(--white);
        background: transparent;
        margin-bottom: 5px;
    }

    .nav-tabs .nav-item .nav-link:hover {
        border: 1px solid transparent;
        padding: 0;
        border-radius: 60px;
        font-size: 0.9em;
        ;
        font-weight: 400;
        color: var(--white);
        background: transparent;
    }

    /* Blogs Start */
    .blogs-banners {
        position: relative;
        display: flex;
        align-items: center;
        height: 400px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .blogs-banners::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Adjust the color & opacity */
        z-index: 1;
    }

    .blogs-banners>* {
        position: relative;
        z-index: 2;
        /* Ensures content is above the overlay */
    }

    .banner-content {
        border-left: 3px solid #ae0a46;
        border-left: 3px solid #ae0a46;
        background: none;
        border: 0;
    }

    .search-inputs:focus {
        box-shadow: none;
        border-color: #ae0a46;
    }

    .search-btn {
        border: 1px solid #ae0a46;
        border-right: 1px solid white !important;
    }

    .search-inputs {
        border: 1px solid #ae0a46;
        border-radius: 0;
    }

    .blog-color {
        color: #ae0a46;
    }

    .blog-bg-color {
        background-color: #ae0a46 !important;
    }

    .blogs-icons {
        color: #9d9fa3;
    }

    [tooltip] {
        position: relative;
    }

    [tooltip]::before,
    [tooltip]::after {
        text-transform: none;
        font-size: 12px;
        line-height: 1;
        user-select: none;
        pointer-events: none;
        position: absolute;
        display: none;
        opacity: 0;
    }

    [tooltip]::before {
        content: "";
        border: 5px solid transparent;
        z-index: 1001;
    }

    [tooltip]::after {
        content: attr(tooltip);
        font-family: Helvetica, sans-serif;
        text-align: center;
        min-width: 3em;
        max-width: 21em;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 1ch 1.5ch;
        border-radius: 0.3ch;
        box-shadow: 0 1em 2em -0.5em rgba(0, 0, 0, 0.35);
        background: #333;
        color: #fff;
        z-index: 1000;
    }

    [tooltip]:hover::before,
    [tooltip]:hover::after {
        display: block;
    }

    [tooltip=""]::before,
    [tooltip=""]::after {
        display: none !important;
    }

    [tooltip]:not([flow])::before,
    [tooltip][flow^="up"]::before {
        bottom: 100%;
        border-bottom-width: 0;
        border-top-color: #333;
    }

    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::after {
        bottom: calc(100% + 5px);
    }

    [tooltip]:not([flow])::before,
    [tooltip]:not([flow])::after,
    [tooltip][flow^="up"]::before,
    [tooltip][flow^="up"]::after {
        left: 50%;
        transform: translate(-50%, -0.5em);
    }

    @keyframes tooltips-vert {
        to {
            opacity: 0.9;
            transform: translate(-50%, 0);
        }
    }

    @keyframes tooltips-horz {
        to {
            opacity: 0.9;
            transform: translate(0, -50%);
        }
    }

    [tooltip]:not([flow]):hover::before,
    [tooltip]:not([flow]):hover::after,
    [tooltip][flow^="up"]:hover::before,
    [tooltip][flow^="up"]:hover::after {
        animation: tooltips-vert 300ms ease-out forwards;
    }

    a {
        text-decoration: none !important;
    }

    .links:hover {
        text-decoration: underline !important;
    }

    .fusion-button.button-orange {
        background: #fd521a;
        color: #fff;
        border: 1px solid #fd521a;
        padding: 13px 29px;
        border-radius: 0 !important;
    }

    .fusion-reading-box-container .fusion-mobile-button {
        display: none;
        float: none;
        margin: 15px 0 0;
    }

    .fusion-button.button-orange:hover {
        background: #fff;
        color: #fd521a;
        border: 1px solid #fd521a;
    }

    .blog-footer {
        border-top: 1px solid #ae0a46;
        border-bottom: 1px solid #ae0a46;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .blog-more {
        border-bottom: 2px solid transparent;
    }

    .blog-more:hover {
        border-bottom: 2px solid #ae0a46;
    }

    .blog-list-content p {
        line-height: 1.9;
    }

    .blog-list-img {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .blog-list-img img {
        display: block;
        width: 100%;
        transition: transform 0.3s ease-in-out;
    }

    .overlay-blogs {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: #00a688ea;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: left 0.5s ease-in-out;
    }

    .overlay-blogs p {
        color: black;
        font-size: 18px;
        font-weight: bold;
        opacity: 0;
        text-align: center;
        padding: 0px 40px;
        transition: opacity 0.5s ease-in-out;
    }

    .blog-list-img:hover .overlay-blogs {
        left: 0;
    }

    .blog-list-img:hover .overlay-blogs p {
        opacity: 1;
    }

    .blog-link-icons {
        background-color: #ae0a46;
    }

    .research-alert-box {
        position: relative;
        top: -50px;
        z-index: 5;
        border: 0;
    }

    .research-page__research-alerts-list {
        margin: 5px 0 0;
        padding: 0;
        list-style: none;
    }

    .research-page__research-alerts-list li {
        border-top: 1px solid #b2c0d1;
        margin: 0;
        padding: 9px 0 8px;
        font-size: 1.02em;
        font-weight: 500;
        display: block;
    }

    .research-box-nav-btn {
        text-align: start;
    }

    .research-box-nav-btn:hover {
        text-align: start;
    }

    .research-box-nav-btn:focus,
    .research-box-nav-btn:focus-visible,
    .research-box-nav-btn:focus-within {
        outline: none;
        box-shadow: none;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        outline: none;
        border: 0 !important;
    }

    .research-box-nav-btn {
        font-size: 1.15em;
    }

    .research-box-nav-btn span {
        color: #9bacc3;
        padding: 4px 0;
        text-decoration: none;
    }

    .research-box-nav-btn.active {
        border-top: 0;
        border-left: 0;
        border-right: 0;
    }

    .research-box-nav-btn.active span {
        color: #2b405a !important;
        border-bottom: 2px solid #0079dd !important;
    }

    .research-box-nav-btn span:focus-visible {
        outline: none !important;
    }

    .nav-tabs .nav-link {
        margin: 0;
        border: 0;
    }

    .title-border-bottom {
        color: #a4adb7;
        text-transform: uppercase;
        width: 100%;
        z-index: 1;
        margin: 0 0 20px;
        position: relative;
        overflow: hidden;
    }

    .title-border-bottom:before,
    .title-border-bottom:after {
        width: 50%;
        height: 1px;
        content: " ";
        background-color: #a4adb7;
        position: absolute;
        top: 51%;
        overflow: hidden;
    }

    .title-border-bottom:before {
        text-align: right;
        margin-left: -51%;
    }

    .title-border-bottom:after {
        text-align: left;
        margin-left: 1%;
        margin-right: -51%;
    }

    .card-body .date {
        color: #b2c0d1;
        text-transform: uppercase;
        display: block;
        font-weight: 700;
        overflow: hidden;
    }

    .recent-items {
        color: #2b405a;
        float: left;
        border-radius: 5px;
        margin-bottom: 20px;
        margin-right: 1.9%;
        font-weight: 700;
        overflow: hidden;
    }

    .btn-subscibe {
        border: 2px solid #041e42;
        padding: 0.6875rem 1.5rem;
        font-size: 1rem;
    }

    .btn-subscibe:hover {
        background-color: #041e42;
        padding: 0.6875rem 1.5rem;
        color: #fff;
        font-size: 1rem;
    }

    .breadcrumbs-blogs {
        border-bottom: 1px solid #041e42;
        color: #041e42;
        font-size: 1.2rem;
    }

    .blog-details .contents {
        box-shadow: 0 0 15px #0079dd4d;
        border: 0;
        padding: 60px 70px;
    }

    .blog-details .contents .autors {
        margin-top: 30px;
        padding: 15px 0px;
        border-top: 1px solid #041e42;
        border-bottom: 1px solid #041e42;
    }

    .blog-details .contents .blog-main-content {
        margin-top: 40px;
        font-size: 1.6em;
        line-height: 1.6;
    }

    .blog-details .contents .blog-sub-content p {
        margin-top: 40px;
        font-size: 18px;
    }

    .blog-details .contents .blog-title-content {
        font-size: 18px;
    }

    pre {
        color: #435364;
        background: #f5f5f5;
        border: 1px solid #d0d0d0;
        border-radius: 4px;
        padding: 1em;
        font-size: 0.75em;
        overflow: auto;
    }

    .tag[data-v-5bdddea5] {
        display: inline-block;
        color: #2668c5;
        padding: 0 8px 1px;
        line-height: 16px;
        border-radius: 4px;
        background: #2668c51a;
        margin: 0 4px 8px;
        text-decoration: none;
    }

    .a-link {
        display: inline-block;
        text-decoration: none;
        background: none;
        padding: 0;
        border: 0;
        outline: 0;
        cursor: pointer;
        color: var(--av-link-primary);
    }

    .tags[data-v-5bdddea5] {
        text-align: center;
        margin-bottom: 16px;
    }

    .tag[data-v-5bdddea5] .a-link__content {
        font-size: 11px;
        line-height: 16px;
        font-weight: 700;
        letter-spacing: 0.5px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .a-dangerous-html {
        word-break: normal;
        overflow-wrap: anywhere;
    }

    @media only screen and (max-width: 600px) {
        .blogs-banners {
            height: 600px;
        }

        .pagination {
            justify-content: center !important;
        }

        .blog-details .contents {
            padding: 30px 25px;
        }

        .autors div {
            display: flex;
            flex-direction: column;
        }

        .blog-socials {
            display: flex;
        }

        .social-blogs-main {
            display: flex;
            flex-direction: row !important;
        }

        .autors .blog-create {
            text-align: center;
        }

        .blog-details .contents .blog-main-content {
            font-size: 16px;
        }

        .single-pagination {
            flex-direction: column;
        }

        .autor-boxes {
            width: 100% !important;
        }

        .subscribe-boxes {
            margin-top: 50px;
            text-align: center;
            width: 100% !important;
        }

        .blog-brand-promo {
            text-align: center;
        }
    }

    /* Hide the form initially */
    #subscriptionForm {
        display: none;
    }

    /* Blogs End*/
    .hover-scale {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-scale:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    .overlay {
        transition: all 0.3s ease;
    }

    .card:hover .overlay {
        opacity: 1;
    }

    .text-truncate a {
        display: inline-block;
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>