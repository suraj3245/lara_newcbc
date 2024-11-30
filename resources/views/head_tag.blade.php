<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<link rel="icon" type="image/x-icon" href="{{ asset('home/img/core-img/Logo.png') }}">

<script src="{{ asset('google-jqry.js') }}"></script>
    {{-- <script>
        // Add the $.ajaxSetup code here
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}

<!-- CSS files -->
<link href="{{ asset('dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{asset('dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




<link rel="stylesheet" href="{{ asset('dist/iconfont/tabler-icons.css') }}">

<!-- FAV ICON -->
<link rel="shortcut icon" type="image/icon" href="../../images/fav.png" />


<style>
    .an-pre-loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-size: 200px 200px !important;
        background: url(../dist/images/pre_loader.gif) center no-repeat #fff;
    }
</style>

<style>


/* .ts-dropdown .active {
    background-color: #b7d8ff !important;
    color: inherit !important;
    font-weight: 600;
} */

/* .ts-dropdown [data-selectable] .highlight {
   
    background: #206bc4 !important;
    color: #fff !important;
} */

    /* table tr td, th, tr, thead, tbody{
        border: 2px solid #206bc4;
    }
    
    table tr td, tr{
        padding: 3px !important;
        font-size: 15px !important;
        font-weight: 500 !important;
    }
    */ table thead  th {
        background-color: #206bc4 !important;
        color: #fff !important;
        font-size: 13px !important;
    }  

    /* .pagination {
        border: 3px solid #206bc4;
        border-radius: 10px;
    }

    .pagination li {
        font-weight: 800 !important;
        font-size: 15px !important;
    } */

    .form-check-input {
        background-color: #eee;
    }

    .form-check-input:checked {
        background-color: #2fb344;
    }

    @media (max-width:600px) {
        .excelBtn {
            display: none;
        }
    }

    .req::after {
        content: " *";
        color: red;
        font-size: 15px;
        font-weight: 800;
    }

    .text-right {
        text-align: right !important;
    }


    ::selection {
  color: #fff;
  background: black;
}
</style>