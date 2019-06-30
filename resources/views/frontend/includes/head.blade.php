<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Dokan Online Shopping </title>
    <link rel="stylesheet" href="{{URL::to('frontend/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/blue.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/rateit.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/style.css')}}">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{URL::to('frontend/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::to('frontend/css/simple-line-icons.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    @foreach($logo as $log)
    <link rel="icon" href="{{URL::to('frontend/image/logo/'.$log->image)}}" type="image/x-icon">
    @endforeach
    <style>

        .table-bordered th, .table-bordered td { border: 1px solid #000000 !important }
        
    </style>
    
    <style>
        ul.breadcrumb li+li:before {
  padding: 12px;
  color: black;
  content: "/\00a0";
}

ul.breadcrumb{
    margin-top:10px;
}
    </style>
    
    {{--<style>
        p {
            text-align: center;
            font-size: 20px;
            margin-top: 0px;
        }
    </style>--}}
</head>