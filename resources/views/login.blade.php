@extends('sidebar')

@section('konten')
<div class="subsection">
	<h5>Login SIFITRIA</h5>
	<div class="divider"></div><br>

	<div class="row">
		<div class="col s6 push-s3">
			@if (session()->get('login_error') != '' )

			<span class="red-text">{{ session()->get('login_error') }}</span>

			@endif

			<form action="{{ url('login') }}" method="POST">
				{!! csrf_field() !!}
				<input type="text" name="user" placeholder="username" required><br>
				<input type="password" name="pass" placeholder="password" required><br>
				<button class="btn waves-light waves-effect right">
					<i class="material-icons right">send</i>
					LOGIN
				</button>
				<input type="reset" class="btn-flat waves-red waves-effect right">&nbsp;&nbsp;&nbsp;
			</form>	
								
		</div>
	</div>
</div>
@stop