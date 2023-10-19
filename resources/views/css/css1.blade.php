<style>
    @media (min-width: 768px) {
        .card-filter {
            max-width: 500px;
        }

        .has-search .form-control {
            max-width: 500px;
        }

        .card-img-top-custom {
            width: 100% !important;
            height: 14vw !important;
            object-fit: cover !important;
        }

        .card-img-top-custom2 {
            width: 12vw !important;
            height: 12vw !important;
            object-fit: cover !important;
        }

        .card-img-top-custom-detail {
            width: 100% !important;
            height: 28vw !important;
            object-fit: cover !important;
        }
    }

    ::-webkit-scrollbar {
        /* width: 17px; */
        width: 0px;
    }

    /* scrollbar width=17px except default global scrollbar */
    .show-scrollbar::-webkit-scrollbar {
        width: 17px;
    }

    ::-webkit-scrollbar-track {
        background-color: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3974fe;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3974fe;
        border-radius: 20px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3974fe;
        border-radius: 20px;
        border: 6px solid transparent;
        background-clip: content-box;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #3974fe;
    }

    /* card image hover animation in work with stretched-link*/
    .card-animation {
        transition: transform 0.5s ease;
    }

    .card-animation:hover {
        transform: scale(1.1);
    }

    /* card hover change opacity */
    .card-body-animation:hover {
        opacity: 0.8;
    }

    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }


    .form-control::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        /* color: red !important; */
        opacity: 0.5 !important;
        /* Firefox */
    }

    .form-control:-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        /* color: red !important; */
        opacity: 0.5 !important;
    }

    .form-control::-ms-input-placeholder {
        /* Microsoft Edge */
        /* color: red !important; */
        opacity: 0.5 !important;
    }

    /* custom boostrap 4 disbaled input ng color */
    .custom-disabled .form-control {
        background-color: #26313dd7 !important;
        opacity: 1;
    }
</style>
