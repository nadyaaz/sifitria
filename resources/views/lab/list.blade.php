<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SIFITRIA - @yield('title')</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/master-css.css" media="screen,projection"/>
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


</head>
<style>
	
</style>

<body>

    
	<!-- Header goes here -->
	<div id="header" class = 'collapsible-header'>

  	<nav>
    <div class="nav-wrapper">
     	<img class="brand-logo" src="images/logo FIA.png" alt="logo FIA">
   
     	
     	<a id="title" class="brand-logo" href=""><h5 class="center-align">	Portal Aplikasi Internal - Sistem Informasi Fasilitas & Infrastruktur FIA</h5></a>
     
      <ul id="nav-mobile" class="right hide-on-med-only">
        <li><a href="">Logout</a></li>

      </ul>
    </div>
  	</nav>
		
	</div>
    <!-- Page Layout here -->
    <div class="row">

      <div id="sidebar"class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
       <!-- Grey navigation panel
		              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          
			
          <div class="collection">
           	<li id="judulModul"class="collection-header"><h5 align="center">@yield('modul')</h5></li>
          	<a href="" class="collection-item active">@yield('sidebar1')</a>
       		<a href="/peminjamanRuangan/buat_peminjaman_ruangan" class="collection-item">@yield('sidebar2')</a>
        	@yield('addSidebar')
          </div>
          
          
      </div>
   
      <div id="loginas"  class="col s4 offset-s5">
      	
      		<h6 class="right-align">Login sebagai Jundi Ahmad Alwan (mahasiswa)</h6>
      	
      </div>
     
      <div id="content" class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->
          <div class="section">
    		<h5>@yield('sidebar1')</h5>
    		<div class="divider"></div>
    		<div class="subsection">
    			<h6>@yield('tableTitle')</h6>
    			<div class="divider"></div>
    				<div id="tableHead" class="row">
    					<div class="col s2">@yield('thead1')</div>
    					<div class="col s2">@yield('thead2')</div>
    					<div class="col s2">@yield('thead3')</div>
    					<div class="col s2">@yield('thead4')</div>
    					<div class="col s2">@yield('thead5')</div>
    					<div class="col s2">@yield('thead6')</div>
    				</div>

	    		 	<ul class="collapsible" data-collapsible="accordion">
	    				
					 	<li>
					   	
					      <div class="collapsible-header">
					      
					    	<div id="tableRow" class="row">

			    				<div class="col s2">000001</div>
			    				<div class="col s2">Auditorium</div>
			    				<div class="col s2">14/03/2016, 11:00 - 12:30</div>
			    				<div class="col s2">01/30/2015, 14:03</div>
			    				<div class="col s2">Dalam Status Persetujuan</div>
			    				<div id="coba" class="col s2">
			    					
        							<a id="button" class="waves-effect waves-light btn">
        							Batal
        							</a>
			    				</div>
    						</div>
					     
					      </div>
					      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p>

					      </div>
					   	 
					    </li>
					   
					   
					    <li>
					    
					      <div class="collapsible-header">
					      	
					    	<div id="tableRow" class="row">

			    				<div class="col s2">000001</div>
			    				<div class="col s2">Auditorium</div>
			    				<div class="col s2">14/03/2016, 11:00 - 12:30</div>
			    				<div class="col s2">01/30/2015, 14:03</div>
			    				<div class="col s2">Dalam Status Persetujuan</div>
			    				<div id="coba" class="col s2">
			    					
        							<a id="button" class="waves-effect waves-light btn">
        							Batal
        							</a>
			    				</div>
    						</div>


					      </div>
					      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
					    
					    </li>
					    <li>
					    	
					      <div class="collapsible-header">
					      	
					    	<div id="tableRow" class="row">

			    				<div class="col s2">000001</div>
			    				<div class="col s2">Auditorium</div>
			    				<div class="col s2">14/03/2016, 11:00 - 12:30</div>
			    				<div class="col s2">01/30/2015, 14:03</div>
			    				<div class="col s2">Dalam Status Persetujuan</div>
			    				<div id="coba" class="col s2">
			    					
        							<a id="button" class="waves-effect waves-light btn">
        							Batal
        							</a>
			    				</div>
    						</div>
	

					      </div>
					      <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
					     
					    </li>
					    
					   
					</ul>
				
					
						
    		</div>
  	      </div>
          @yield('content')
      </div>

    </div>
</body>
</html>