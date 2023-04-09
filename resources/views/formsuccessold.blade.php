<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Noor-games">
    <meta name="author" content="Noor-games">
    <meta name="keywords" content="Noor-games">
    <meta content="" name="Noor-games">
    <meta content="" name="Noor-games">
    <!-- Favicons -->
    <link href="{{ URL::to('/images/logochangecolor.gif') }}" rel="icon">
    <link href="{{ URL::to('/images/logochangecolor.gif') }}" rel="apple-touch-icon">
    <!-- Title Page-->
    <title>Noor-games</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Icons font CSS-->
    <!-- Font special for pages-->
    <!-- Vendor CSS-->
    {{-- <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all"> --}}
    <!-- Main CSS-->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet" media="all">
    <link href="https://unpkg.com/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        @media screen and (max-width: 576px) {
         #myVideo {
         position: fixed;
         right: -8%;
         top: 0;
         height: 100vh;
         }
         .form-image-dragon-mobile{
         position: absolute;
         top: 110px;
         left: 70px;
         }
         .card-mobile{
         height: 800px;
         }
         .new-step-wizard{
         margin-top: 150px;
         }
         .smartwizard{
         left: -30px;
         width: 120%;
         }
         .tab-content{
         padding: 10px 5px 0 10px;
         }
         .rainbow {
         left: -35px;
         width: 280px;
         }
         }
      </style>
    <style>
        * {
         box-sizing: border-box;
         }
         body {
         background-color: #f1f1f1;
         }
         .modal-backdrop-bg {
         background-image: url({{asset('images/bgStars.jpg')}});
         }
         .modal-header{
         border:none;
         }
         .modal-cross{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         animation: color-change 2s infinite;
         color: #fff;
         letter-spacing: 2px;
         font-size: 65px;
         }
         #regForm {
         /*background-color: #ffffff;*/
         /*margin: 100px auto;*/
         font-family: Raleway;
         padding: 0 40px 0px 40px;
         /*width: 70%;*/
         min-width: 300px;
         }
         h1 {
         text-align: center;
         }
         /* Mark input boxes that gets an error on validation: */
         input.invalid {
         background-color: #ffdddd;
         }
         /* Hide all steps by default: */
         .tab {
         display: none;
         }
         .tab-pane{
            padding: 20px;
         }
         /*#prevBtn {*/
         /*  background-color: #bbbbbb;*/
         /*}*/
         /* Make circles that indicate the steps of the form: */
         .step {
         height: 15px;
         width: 15px;
         margin: 0 2px;
         background-color: #0b6bf7;
         border: none;
         border-radius: 50%;
         display: inline-block;
         opacity: 0.5;
         }
         .step.active {
         opacity: 1;
         }
         /* Mark the steps that are finished and valid: */
         .step.finish {
         background-color: #004cbb;
         }
         .modal-header-text{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         padding: 20px;
         animation: color-change 2s infinite;
         color: #fff;
         letter-spacing: 2px;
         text-decoration: underline;
         }
         .modal-content{
         box-shadow: 0 0 2px #006aff, 0 0 4px #006aff, 0 0 6px #006aff, 0 0 8px #006aff, 0 0 10px #006aff, 0 0 12px #006aff, 0 0 14px #006aff, 0 0 16px #006aff;
         }
         .numberText{
         font-family: "NeonPlanetDisplay;!important";
         font-size: 20px;
         }
         .neon_planetdisplay{
         font-family: 'neon_planetdisplay', Arial, sans-serif;
         }
         .inline-block
         {
         display: inline-block;
         }
         .font-size-20
         {
         font-size: 20px;
         }
         button:focus
         {
         outline: none;
         }
         .overflow-hidden
         {
         overflow: hidden;
         }
         .active-tab
         {
         transform: translateX(0);
         }
         .inactive-tab
         {
         transform: translateX(120%);
         transition: transform ease-out 0.3s;
         }
         .input-form-modal{
         border: 1px solid;
         border-radius: 10px;
         padding: 10px 10px 10px 10px;
         }
         .input--style-1:focus{
         color: #fff;
         }
         .card-1{
         background-color: rgb(0 0 0 / 76%) !important;
         }
         .display-none{
         display:none!important;
         }
         /*.main-header-text{*/
         /*background-color: none!important;*/
         /*}*/
         @keyframes rotate {
         100% {
         transform: rotate(1turn);
         }
         }
         .rainbow {
         position: relative;
         z-index: 0;
         border-radius: 10px;
         overflow: hidden;
         }
         .rainbow::before {
         content: '';
         position: absolute;
         z-index: -2;
         left: -50%;
         top: -50%;
         width: 200%;
         height: 200%;
         /*background-color: #399953;*/
         background-repeat: no-repeat;
         background-size: 50% 50%, 50% 50%;
         background-position: 0 0, 100% 0, 100% 100%, 0 100%;
         background-image:
         linear-gradient(#f11b7e, #f11b7e),
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e),
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e),
         linear-gradient(#0032fb, #0032fb),
         linear-gradient(#f11b7e, #f11b7e);
         animation: rotate 4s linear infinite;
         }
         .rainbow::after {
         content: '';
         position: absolute;
         z-index: -1;
         left: 6px;
         top: 6px;
         width: calc(100% - 12px);
         height: calc(100% - 12px);
         border-radius: 5px;
         background:black;
         }
         .select2-results__options{
             background:black;
         }
         .select2-selection__rendered{
                 font-family: 'neon_planetdisplay', Arial, sans-serif;
                color: #fff!important;
    text-shadow: 0 0 2px #dc3545, 0 0 4px #dc3545, 0 0 6px #dc3545, 0 0 8px #dc3545, 0 0 10px #dc3545, 0 0 12px #dc3545, 0 0 14px #dc3545, 0 0 16px #dc3545;


         }
         .select2-results__options li{
                 font-family: 'neon_planetdisplay', Arial, sans-serif;
                color: #fff;
    text-shadow: 0 0 2px #dc3545, 0 0 4px #dc3545, 0 0 6px #dc3545, 0 0 8px #dc3545, 0 0 10px #dc3545, 0 0 12px #dc3545, 0 0 14px #dc3545, 0 0 16px #dc3545;
         }
        .select2-container{
            width:100%!important;
        }
      </style>
</head>

<body>

    <div class="page-wrapper font-robo">
        <video autoplay muted loop id="myVideo">
            <source src="{{asset('images/fin.mp4')}}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
  <div class="page-wrapper font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1 py-5">
            <!--<div class="card-heading">  -->
            <!--</div>-->
          <div>
                <h2 class="font-weight-bold text-center main-header-text">
                   WELCOME TO THE PART OF THE NOOR GAME FAMILY
                </h2>
            </div>
            <div class="card-body p-5">
                <div class = "text-left">
                    <h3 style="line-height:2rem;">
                            <span class="neon-text font-weight-bold blink"> </span><span class="just-neon"></span><span class="neon-text font-weight-bold"></span>
                    </h3>
                    <h4 class="mt-4">
                        <span class="neon-text neon-text-danger font-weight-bold blink-danger">Someone will reach out to you soon</span>.
                    </h4>
                    <h3 class="mt-4">
                        <span class="neon-text font-weight-bold blink">Thank you</span>
                    </h3>
                </div>
                <!--<img src="{{ URL::to('/images/polacy.png') }}" width="500" height="600">-->


                <div class = "text-center logo">
                  <img src="{{ URL::to('/images/dragonnn.gif') }}" width="220" height="250" class="w-auto">
            </div>
            </div>

                <div class="text-center pt-3">
                    <h4><b><span class="neon-text font-weight-bold">Copyright Noorgames</span> <span class="just-neon">© 2021</span> <span class="neon-text"> All Rights Reserved</span><b></h4>
                </div>
          </div>
    </div>
</div>

    </div>
    <!-- Jquery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="js/global.js"></script> --}}
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" type="text/javascript"></script>
    <script src="js/jquery-input-mask-phone-number.min.js"></script>

    <!-- steps -->
    <script>
    $(document).ready(function() {
        // SmartWizard initialize
        $('#smartwizard').smartWizard({
            transition: {
                animation: 'slide-swing', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
            },
            disabledSteps: [], // Array Steps disabled
            backButtonSupport: false,
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right, center
                showNextButton: false, // show/hide a Next button
                showPreviousButton: false, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            }
        });
        $('.input-name').keyup(function(){
            // if($('.error-msg').hasClass('display-none')){
                $('.error-msg').addClass('display-none');
            // }
        });
        $(".next-btn").click(function() {
            var inputName = $('.input-name').val()
            if(inputName.length <= 0){
                $('.error-msg').removeClass('display-none');
            }else{
                $('.error-msg').addClass('display-none');
                $('#smartwizard').smartWizard("next");
                $('.input-name-text').html('Perfect '+$('.input-name').val()+' what could be the best phone number to reach out to you?');
            }

        });
        $(".yes-btn").click(function() {
            var inputClass = $(this).data('input');
            if(inputClass != 'input'){
                $(inputClass).val('yes');
            }

        });
        $(".no-btn").click(function() {
            var inputClass = $(this).data('input');
            if(inputClass != 'input'){
                $(inputClass).val('no');
            }

        });

        $(".back-btn").click(function() { $('#smartwizard').smartWizard("prev"); });
        // $("#state").change(function() { $('#smartwizard').smartWizard("next"); });
         function denyBtn() {
        $('.tab-content').html('<p style="font-size: 25px;">Thanks for considering to work with us.</p>');
    }


    });
    </script>
    <!-- state -->
    <script>
        $('#state').change(function(){
            $('#smartwizard').smartWizard("next");
        });
    </script>
    <!-- phone -->
    <script>
        $(function(){
            $('#phone-number').usPhoneFormat({
                format:'xxx-xxx-xxxx'
            });
        });
    </script>
    <!-- form submit validation -->
    <script>
        $('.submit-btn').click(function(e){
            e.stopImmediatePropagation();
            var form = $('#regForm');
            var inputName = $('.input-name').val()
            if(inputName.length <= 0){
                $('.error-msg').removeClass('display-none');
            }
            else{
                if($('#phone-number').val() == ''){
                    $('.error-msg-num').removeClass('display-none');
                }else{
                    console.log($('#phone-number').length);
                    form.submit();
                }
            }

        });
        $('#state').select2();
    </script>
</body>

</html>

</html>
