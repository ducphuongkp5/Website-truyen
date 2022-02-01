<?php
    session_start();
?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Thể loai</title>
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <!-- Site Icons -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Site CSS -->

    <link rel="stylesheet" href="css/style-men.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <script defer src="/your-path-to-fontawesome/js/all.js"></script>
    <script src="http://kit.fontawesome.com/67c66657c7.js"></script>

    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script defer src="/your-path-to-fontawesome/js/all.js"></script>
    <script src="http://kit.fontawesome.com/67c66657c7.js"></script>
    <style>
        .info {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 30px;
            width: 70%;
        }
        .main .container {
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #fff;
        }
        .breadcrumb {
            margin-top: 0;
            margin-bottom: 10px;
            padding-left: 0;
            padding-right: 0;
            padding-top: 0;
            background-color: transparent;
        }
        .breadcrumb {
            padding: 8px 15px;
            margin-bottom: 20px;
            list-style: none;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        .breadcrumb>li {
            display: inline-block;
        }
        .breadcrumb>li+li:before {
            content: "\00BB";
        }
        .breadcrumb>li+li:before {
            content: ">>\00a0";
            padding: 0 5px
        ;
            color: #ccc;
        }
        .breadcrumb li span{
            color:blue;
        }
        main{
            padding-top:100px;
        }
        .row{
            margin-left: -15px;
            margin-right: -15px;
        }
        .center-side {
            width: 75%;
            padding-left: 50px;
        }
        .main .center-side {
            margin-bottom: 10px;
        }
        .module h1 {
            text-align: center;
            margin: 0;
            font-size: 25px;
            font-weight: 400;
        }
        .module .description {
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .module .description .info {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .module-items .item .module-image {
            position: relative;
            height: auto;
            line-height: 200px;
            border: 1px solid #f2f2f2;
            border-radius: 4px;
            box-shadow: #000 0 0 0;
            text-align: center;
            overflow: hidden;
        }
        .item {
            width: 20%;
            display: inline-block;
            margin: 7px;
        }
        .module-items .item .module-image img{
            vertical-align: middle;
            width: 100%;
            max-width:100%;
        }
        .module-items .item .figcaption {
            padding: 5px 0 0;
            position: relative;
        }
        .module-items .item .figcaption h3 {
            font-size: 16px;
            margin: 0 0 7px;
            font-weight: 400;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .module-items .item .figcaption ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .module-items .item .figcaption ul li {
            margin-bottom: 6px;
        }
        .module-chapter a {
            font-size: 13px;
            color: #000;
        }
        .module-chapter .time {
            color: silver;
            font-size: 11px;
            line-height: 20px;
            font-style: italic;
            float: right;
            max-width: 47%;
            overflow: hidden;
            white-space: nowrap;
        }
        .ad{
            width:23%;
            border: 1px solid #ddd;
            text-align:center;
            margin-left: 9px;
        }
        @media screen and (max-width: 664px){
            main .container .info{
            display: none !important;
            }
        }
    
    </style>
</head>

<body>

    <?php include("template/header.php") ?>

    <main>
        <div class="container">
            <div class="link-id">
                <ul class="breadcrumb">
                    <li><a href="index.php"><span>Trang chủ</span></a></li>
                    <li><a href="#"><span>Truyện Full</span></a></li>
                </ul>
            </div>
            <div class="info">
                Tổng hợp truyện đã hoàn thành!
            </div>

            <div class="row">
                <div class="center-side">
                    <div class="module-2">
                        <div class="module-content">
                            <div class="module-items">
                                <div class="row">
                                    <?php include 'Model/TruyenFull.php';?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ad">
                        <h1>AD</h1>
                </div>
            </div>
        </div>
    </main>
</body>