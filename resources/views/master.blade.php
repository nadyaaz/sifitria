<!DOCTYPE html>
<!-- master layout dari semua page yang ada -->
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<title>SIFITRIA - {{ $data['title'] }}</title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!--Import materialize.css-->
	    <link rel="stylesheet" href="{{ url('css/materialize.min.css') }}" />
	    <link rel="stylesheet" href="{{ url('css/fullcalendar.min.css') }}" media="screen,projection"/>	    
	    <link rel="stylesheet" href="{{ url('css/master-css.css') }}" media="screen,projection"/>	    
	    <link rel="stylesheet" href="{{ url('css/materialdesign-fc.css') }}" media="screen,projection"/>	    
	
		<!-- implement csrf token for AJAX calling -->		
		<meta name="_token" content="{!! csrf_token() !!}"/>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	    
	    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
	    <script type="text/javascript" src="{{ url('js/materialize.min.js') }}"></script>
	    <script type="text/javascript" src="{{ url('js/javascript.js') }}"></script>
	    <script type="text/javascript" src="{{ url('js/id.js') }}"></script>
		
		@yield('fullcalendar')		   
	</head>

	<body>		
		<!-- Header goes here -->
		<div id="header" class = 'collapsible-header'>
	  		<nav>	  			
	    		<div class="nav-wrapper">
	    			<div class="row form-row">
			     		<a href="{{ url('/') }}">
			    			<div class="col s12 valign-wrapper">	    				
			     				<img class="left-align" width="241" height="96" src="{{ url('images/logo FIA.png') }}" alt="logo FIA"/>
			     				<span class="title valign">
			     					Portal Aplikasi Internal - Sistem Informasi Fasilitas & Infrastruktur FIA
			     				</span>
			    			</div>			    			
			     		</a>
	    			</div>

	    			<div class="row form-row">
	    				<div class="col s4 offset-s8 right-align">
	    					@if ($data['isLoggedIn'])	

		     				<span class="black-text">{{ $data['user_sess']->name.' ('.$data['user_sess']->role.')' }}</span>&nbsp;&nbsp;&nbsp;
			     			<form class="btn-out right" action="{{ url('logout') }}" method="POST">
	       			 			{!! csrf_field() !!}
	       			 			<button class="btn-out waves-effect waves-light btn red tooltipped" data-position="top" data-delay="10" data-tooltip="LOGOUT">
	       			 				<i class="tiny material-icons white-text right">cancel</i>
	       			 			</button>
	       			 		</form>	

		     				@endif	     				
	    				</div>
	    			</div>
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
		          	<div class="section">		    					    				    		
		    			@yield('konten')
		  	   		</div>	        	      		
		      	</div>
	    	</div>		    
	    </div>
	    @yield('ajax_calling')
	</body>
</html>