<!DOCTYPE html>
<!-- master layout dari semua page yang ada -->
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<title>SIFITRIA - {{ $data['title'] }}</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
	    <link rel="stylesheet" href="{{ url('css/materialize.min.css') }}"  media="screen,projection"/>
	    <link rel="stylesheet" href="{{ url('css/master-css.css') }}" media="screen,projection"/>	    

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	    
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	    <script type="text/javascript" src="{{ url('js/materialize.min.js') }}"></script>
	    <script type="text/javascript" src="{{ url('js/javascript.js') }}"></script>
	    <script type="text/javascript" src="{{ url('js/id.js') }}"></script>
	</head>

	<body>
		
		<!-- Header goes here -->
		<div id="header" class = 'collapsible-header'>
	  		<nav>	  			
	    		<div class="nav-wrapper">
	     			<img class="brand-logo" src="{{ url('images/logo FIA.png') }}" alt="logo FIA"/>	   
	     	
	     			<a id="title" class="brand-logo" href="{{ url('/') }}">
	     				<h5 class="center-align">
	     					Portal Aplikasi Internal - Sistem Informasi Fasilitas & Infrastruktur FIA
	     				</h5>
	     			</a>

	     			@if ($data['isLoggedIn'])	

	     			<div class="right">
						<form action="{{ url('logout') }}" method="POST">
       			 			{!! csrf_field() !!}

       			 			<button class="btn btn-primary btn-small">LOGOUT</button>
       			 		</form>
					</div>

	     			@endif

	    		</div>
	  		</nav>
		</div>
	    <!-- Page Layout here -->
	    <div class="row">	    
	      	<div id="sidebar"class="col s3"> 
		        <div class="collection">	           	
		         	@if ($data['isLoggedIn'])	 
		         		@yield('sidebar_menu')	       	    		       	    	
	        		@else
					
					<div class="row">
						<div class="col s12 center">
							<h5 class="center">SSO UI Login</h5>
							<h6 class="center">Login terlebih dahulu dengan akun juita</h6><br>
							<a href="{{ url('SSO') }}" class="btn btn-primary">LOGIN</a>						
						</div>
					</div>

	        		@endif
		        </div>
		    </div>

	      	<div id="content" class="col s9"> 	
		      	<div class="row">
			   		@if ($data['isLoggedIn'])	

			      	<!-- <div id="loginas" class="col s6 offset-s6">	      		
			      		<h6 class="right-align">Login sebagai {{ $data['user_sess']->name }}</h6>	      		
			      	</div> -->

			      	@endif	      		

		          	<div class="section">		    					    				    		
		    			@yield('konten')
		  	   		</div>	        	      		
		      	</div>
	    	</div>		    
	    </div>	   	
	</body>
</html>