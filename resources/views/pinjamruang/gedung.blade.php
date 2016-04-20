@extends('sidebar')

@section('sidebar_gedung', 'active')

@section('konten')
<div class="subsection">
	<h5>Daftar Gedung</h5>
	<div class="divider"></div><br>

	<div class="row">
		<div class="col s6 push-s3">
			<table class="bordered responsive-table">						
		        <thead>
		          	<tr>
		            	<th><b>Id</b></th>
		            	<th><b>Nama Gedung</b></th>
	            		<th><p></p></th>
	            		<th><p></p></th>
		          	</tr>
		        </thead>

		        <tbody>
		        	@foreach ($data['allgedung'] as $gedung)

					<tr>
						<td>{{$gedung->IdGedung}}</td>
						<td colspan="5" class="NamaGedung">{{$gedung->NamaGedung}}</td>							
						<td>
							<form action="{{ url('pinjamruang/gedung') }}" method="POST">									
								{!! csrf_field() !!}
								<input type="hidden" name="hash" value="{{$gedung->hash}}">
								<button class="btn teal waves-light waves-effect tooltipped" data-position="top" data-delay="10" data-tooltip="UBAH">
									<i class="material-icons">edit</i>
								</button>
							</form>		
						</td>
						<td>
							<form action="{{ url('pinjamruang/gedung/hapus') }}" method="POST">									
								{!! csrf_field() !!}
								<input type="hidden" name="hash" value="{{$gedung->hash}}">
								<button class="btn red waves-light waves-effect tooltipped" data-position="top" data-delay="10" data-tooltip="HAPUS">
									<i class="material-icons">delete</i>
								</button>
							</form>																					
						</td>
					</tr>

		        	@endforeach
				</tbody>
		    </table>
		</div>
	</div>
</div>

@stop