<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PrintAja.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo  base_url() ?>assetss/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo  base_url() ?>assetss/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="<?php echo  base_url() ?>assetss/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo  base_url() ?>assetss/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo  base_url() ?>assetss/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo  base_url() ?>assetss/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo  base_url() ?>assetss/lib/venobox/venobox.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <!-- Nivo Slider Theme -->
    <link href="<?php echo  base_url() ?>assetss/css/nivo-slider-theme.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php echo  base_url() ?>assetss/css/style.css" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="<?php echo  base_url() ?>assetss/css/responsive.css" rel="stylesheet">

    <!-- ======================================================= Theme Name:
        eBusiness Theme URL:
        https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/ Author:
        BootstrapMade.com License: https://bootstrapmade.com/license/
        ======================================================= -->
    <style>
        /* CSS reset */

        html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}




        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        fieldset,
        img {
            border: 0;
        }

        input {
            border: 1px solid #b0b0b0;
            padding: 3px 5px 4px;
            color: #979797;
            width: 190px;
        }

        address,
        caption,
        cite,
        code,
        dfn,
        th,
        var {
            font-style: normal;
            font-weight: normal;
        }

        ol,
        ul {
            list-style: none;
        }

        caption,
        th {
            text-align: left;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: 100%;
            font-weight: normal;
        }

        q:before,
        q:after {
            content: '';
        }

        abbr,
        acronym {
            border: 0;
        }

        /* General Demo Style */
        body {
            font-family: "helvetica neue", helvetica;
            /* background: #000; */
            font-weight: 400;
            font-size: 15px;
            /* color: #aa3e03; */
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .ie7 body {
            overflow: hidden;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        /* .container {
            /* position: relative; */
        /* text-align: center; */
        }

        /* .clr {
            clear: both;
        }

        .container>header {
            padding: 30px 30px 10px 20px;
            margin: 0px 20px 10px 20px;
            position: relative;
            display: block;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .container>header h1 {
            font-family: "helvetica neue", helvetica;
            font-size: 35px;
            line-height: 35px;
            position: relative;
            font-weight: 400;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            padding: 0px 0px 5px 0px;
        } */
        */ .container>header h1 span {}

        .container>header h2,
        p.info {
            font-size: 16px;
            font-style: italic;
            color: #f8f8f8;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6);
        }

        .slideshow,
        .slideshow:after {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            z-index: 0;
        }

        .slideshow:after {
            content: '';
            background: transparent url(../images/pattern.png) repeat top left;
        }

        .slideshow li span {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            color: transparent;
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: none;
            opacity: 0;
            z-index: 0;
            -webkit-backface-visibility: hidden;
            -webkit-animation: imageAnimation 36s linear infinite 0s;
            -moz-animation: imageAnimation 36s linear infinite 0s;
            -o-animation: imageAnimation 36s linear infinite 0s;
            -ms-animation: imageAnimation 36s linear infinite 0s;
            animation: imageAnimation 36s linear infinite 0s;
        }

        .slideshow li div {
            z-index: 1000;
            position: absolute;
            bottom: 30px;
            left: 0px;
            width: 100%;
            text-align: center;
            opacity: 0;
            -webkit-animation: titleAnimation 36s linear infinite 0s;
            -moz-animation: titleAnimation 36s linear infinite 0s;
            -o-animation: titleAnimation 36s linear infinite 0s;
            -ms-animation: titleAnimation 36s linear infinite 0s;
            animation: titleAnimation 36s linear infinite 0s;
        }

        .slideshow li div h3 {
            font-family: "helvetica neue", helvetica;
            text-transform: uppercase;
            font-size: 80px;
            padding: 0;
            line-height: 100px;
            color: rgba(255, 255, 255, 0.8);
        }

        .slideshow li:nth-child(1) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider1.jpg')
        }

        .slideshow li:nth-child(2) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider2.jpg');
            -webkit-animation-delay: 6s;
            -moz-animation-delay: 6s;
            -o-animation-delay: 6s;
            -ms-animation-delay: 6s;
            animation-delay: 6s;
        }

        .slideshow li:nth-child(3) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider3.jpg');

            -webkit-animation-delay: 12s;
            -moz-animation-delay: 12s;
            -o-animation-delay: 12s;
            -ms-animation-delay: 12s;
            animation-delay: 12s;
        }

        .slideshow li:nth-child(4) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider4.jpeg');

            -webkit-animation-delay: 18s;
            -moz-animation-delay: 18s;
            -o-animation-delay: 18s;
            -ms-animation-delay: 18s;
            animation-delay: 18s;
        }

        .slideshow li:nth-child(5) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider5.jpg');

            -webkit-animation-delay: 24s;
            -moz-animation-delay: 24s;
            -o-animation-delay: 24s;
            -ms-animation-delay: 24s;
            animation-delay: 24s;
        }

        .slideshow li:nth-child(6) span {
            background-image: url('<?php echo base_url() ?>assetss/img/slider/slider6.jpg');

            -webkit-animation-delay: 30s;
            -moz-animation-delay: 30s;
            -o-animation-delay: 30s;
            -ms-animation-delay: 30s;
            animation-delay: 30s;
        }

        .slideshow li:nth-child(2) div {
            -webkit-animation-delay: 6s;
            -moz-animation-delay: 6s;
            -o-animation-delay: 6s;
            -ms-animation-delay: 6s;
            animation-delay: 6s;
        }

        .slideshow li:nth-child(3) div {
            -webkit-animation-delay: 12s;
            -moz-animation-delay: 12s;
            -o-animation-delay: 12s;
            -ms-animation-delay: 12s;
            animation-delay: 12s;
        }

        .slideshow li:nth-child(4) div {
            -webkit-animation-delay: 18s;
            -moz-animation-delay: 18s;
            -o-animation-delay: 18s;
            -ms-animation-delay: 18s;
            animation-delay: 18s;
        }

        .slideshow li:nth-child(5) div {
            -webkit-animation-delay: 24s;
            -moz-animation-delay: 24s;
            -o-animation-delay: 24s;
            -ms-animation-delay: 24s;
            animation-delay: 24s;
        }

        .slideshow li:nth-child(6) div {
            -webkit-animation-delay: 30s;
            -moz-animation-delay: 30s;
            -o-animation-delay: 30s;
            -ms-animation-delay: 30s;
            animation-delay: 30s;
        }





        /* Animation for the slideshow images */
        @-webkit-keyframes imageAnimation {
            0% {
                opacity: 0;
                -webkit-animation-timing-function: ease-in;
            }

            8% {
                opacity: 1;
                -webkit-transform: scale(1.05);
                -webkit-animation-timing-function: ease-out;
            }

            17% {
                opacity: 1;
                -webkit-transform: scale(1.1);
            }

            25% {
                opacity: 0;
                -webkit-transform: scale(1.1);
            }

            100% {
                opacity: 0
            }
        }


        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            background-color: #000;
            filter: alpha(opacity=50);
            -moz-opacity: 0.7;
            opacity: 0.7;

        }

        #overlay span {
            font-family: 'Lobster', cursive;
            padding: 5px;
            border-radius: 5px;
            text-shadow: 2px 2px 8px #3ec1d5;
            color: white;

            position: relative;
            top: 50%;
            font-size: 60px;
        }

        #overlay span a {
            font-family: 'arial', cursive;
            /* padding: 5px;
            border-radius: 5px;
            text-shadow: 2px 2px 8px #3ec1d5;
            color: white;

            position: relative;
            top: 50%;
            font-size: 60px; */
        }

        @-moz-keyframes imageAnimation {
            0% {
                opacity: 0;
                -moz-animation-timing-function: ease-in;
            }

            8% {
                opacity: 1;
                -moz-transform: scale(1.05);
                -moz-animation-timing-function: ease-out;
            }

            17% {
                opacity: 1;
                -moz-transform: scale(1.1);
            }

            25% {
                opacity: 0;
                -moz-transform: scale(1.1);
            }

            100% {
                opacity: 0
            }
        }

        @-o-keyframes imageAnimation {
            0% {
                opacity: 0;
                -o-animation-timing-function: ease-in;
            }

            8% {
                opacity: 1;
                -o-transform: scale(1.05);
                -o-animation-timing-function: ease-out;
            }

            17% {
                opacity: 1;
                -o-transform: scale(1.1);
            }

            25% {
                opacity: 0;
                -o-transform: scale(1.1);
            }

            100% {
                opacity: 0
            }
        }

        @-ms-keyframes imageAnimation {
            0% {
                opacity: 0;
                -ms-animation-timing-function: ease-in;
            }

            8% {
                opacity: 1;
                -ms-transform: scale(1.05);
                -ms-animation-timing-function: ease-out;
            }

            17% {
                opacity: 1;
                -ms-transform: scale(1.1);
            }

            25% {
                opacity: 0;
                -ms-transform: scale(1.1);
            }

            100% {
                opacity: 0
            }
        }

        @keyframes imageAnimation {
            0% {
                opacity: 0;
                animation-timing-function: ease-in;
            }

            8% {
                opacity: 1;
                transform: scale(1.05);
                animation-timing-function: ease-out;
            }

            17% {
                opacity: 1;
                transform: scale(1.1);
            }

            25% {
                opacity: 0;
                transform: scale(1.1);
            }

            100% {
                opacity: 0
            }
        }

        /* Animation for the title */
        @-webkit-keyframes titleAnimation {
            0% {
                opacity: 0;
                -webkit-transform: translateY(200px);
            }

            8% {
                opacity: 1;
                -webkit-transform: translateY(0px);
            }

            17% {
                opacity: 1;
                -webkit-transform: scale(1);
            }

            19% {
                opacity: 0
            }

            25% {
                opacity: 0;
                -webkit-transform: scale(10);
            }

            100% {
                opacity: 0
            }
        }

        @-moz-keyframes titleAnimation {
            0% {
                opacity: 0;
                -moz-transform: translateY(200px);
            }

            8% {
                opacity: 1;
                -moz-transform: translateY(0px);
            }

            17% {
                opacity: 1;
                -moz-transform: scale(1);
            }

            19% {
                opacity: 0
            }

            25% {
                opacity: 0;
                -moz-transform: scale(10);
            }

            100% {
                opacity: 0
            }
        }

        @-o-keyframes titleAnimation {
            0% {
                opacity: 0;
                -o-transform: translateY(200px);
            }

            8% {
                opacity: 1;
                -o-transform: translateY(0px);
            }

            17% {
                opacity: 1;
                -o-transform: scale(1);
            }

            19% {
                opacity: 0
            }

            25% {
                opacity: 0;
                -o-transform: scale(10);
            }

            100% {
                opacity: 0
            }
        }

        @-ms-keyframes titleAnimation {
            0% {
                opacity: 0;
                -ms-transform: translateY(200px);
            }

            8% {
                opacity: 1;
                -ms-transform: translateY(0px);
            }

            17% {
                opacity: 1;
                -ms-transform: scale(1);
            }

            19% {
                opacity: 0
            }

            25% {
                opacity: 0;
                -webkit-transform: scale(10);
            }

            100% {
                opacity: 0
            }
        }

        @keyframes titleAnimation {
            0% {
                opacity: 0;
                transform: translateY(200px);
            }

            8% {
                opacity: 1;
                transform: translateY(0px);
            }

            17% {
                opacity: 1;
                transform: scale(1);
            }

            19% {
                opacity: 0
            }

            25% {
                opacity: 0;
                transform: scale(10);
            }

            100% {
                opacity: 0
            }
        }

        .posisijudul {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            line-height: 32px;
            z-index: 15;



        }

        .posisijudul h6 {
            font-size: 50px;
            z-index: 15;


        }


        /* Show at least something when animations not supported */
        .no-cssanimations .slideshow li span {
            opacity: 1;
        }

        @media screen and (max-width: 1140px) {
            .slideshow li div h3 {
                font-size: 100px
            }

        }

        @media only screen and (max-width: 990px) and (min-width: 250px)  {
            .slideshow li div h3 {
                font-size: 50px
            }

      
.modal-body{
    max-height: calc(120vh - 220px);
    overflow-y: auto;
    
}

        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">