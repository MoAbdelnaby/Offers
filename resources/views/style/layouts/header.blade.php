<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{{ setting()->description }}"/>

  <meta name="keywords" content="{{ setting()->keywords }}"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{ setting()->sitename_ar }}</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ url('public/design/style') }}/css/bootstrap.min.css" />
    
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ url('public/design/style') }}/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="{{ url('public/design/style') }}/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ url('public/design/style') }}/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ url('public/design/style') }}/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ url('public/design/style') }}/css/style.css" />
	<link rel="icon" href="{{ Storage::url(setting()->icon) }}">
	  <link rel="stylesheet" href="{{ url('public') }}/design/adminlte/jstree/themes/default/style.css">
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<style type="text/css">
    html,body,h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
      font-family: 'Cairo', sans-serif;
      font-weight: normal;
      font-size: 16px;
    }
  </style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>