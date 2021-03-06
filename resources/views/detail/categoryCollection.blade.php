    
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
            <title>Electro - HTML Ecommerce Template</title>
    
            <!-- Google font -->
            <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,500,700')}}" rel="stylesheet">
    
            <!-- Bootstrap -->
            <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
             <!-- set img icon -->
             <link rel="icon" href="{{asset('img/img-core/electroneum.png')}}"/>
            <!-- Slick -->
            <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
            <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>
    
            <!-- nouislider -->
            <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>
    
            <!-- Font Awesome Icon -->
            <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
            <!-- Custom stlylesheet -->
            <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
    
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    
        </head>
        <body>
    <!-- SECTION -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('./img/shop01.png')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('./img/shop03.png')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('./img/shop02.png')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
        <!-- /SECTION -->
        <!-- jQuery Plugins -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.min.js')}}"></script>
		<script src="{{asset('js/nouislider.min.js')}}"></script>
		<script src="{{asset('js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
</body>
</html>