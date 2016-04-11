@extends('master')

@section('pinjamruang_header')
	<h5 align="center">Peminjaman Ruangan</h5>
@endsection

@section('registrasibarang_header')
	<h5 align="center">Registrasi Barang</h5>
@endsection

@section('pinjamruang')
	<a href="{{ url('pinjamruang') }}" class="collection-item @yield('sidebar_dashboard')">Dashboard</a>
@endsection

@section('pinjamruang/buat')
	<a href="{{ url('pinjamruang/buat') }}" class="collection-item @yield('sidebar_buatpinjam')">Buat Permohonan Peminjaman Ruangan</a>
@endsection

@section('pinjamruang/ruangan')
	<a href="{{ url('pinjamruang/ruangan') }}" class="collection-item @yield('sidebar_ruangan')">Ruangan</a>
@endsection

@section('pinjamruang/ruangan/buat')
	<a href="{{ url('pinjamruang/ruangan/buat') }}" class="collection-item @yield('sidebar_buatruang')">Buat Ruangan</a>
@endsection

@section('pinjamruang/ruangan/jadwal')
	<a href="{{ url('/') }}" class="collection-item @yield('sidebar_jadwal')">Jadwal</a>
@endsection

@section('pinjamruang/ruangan/buatjadwal')
	<a href="{{ url('/') }}" class="collection-item @yield('sidebar_jadwal')">Buat Jadwal</a>
@endsection

@section('registrasibarang')
	<a href="{{ url('registrasibarang') }}" class="collection-item @yield('sidebar_dashboard')">Dashboard</a>
@endsection

@section('registrasibarang/buat')
	<a href="{{ url('registrasibarang/buat') }}" class="collection-item @yield('sidebar_buatregis')">Buat Permohonan Registrasi Barang</a>
@endsection

@section('registrasibarang/barang')
	<a href="{{ url('registrasibarang/barang') }}" class="collection-item @yield('sidebar_barang')">Barang</a>	          		
@endsection

@section('registrasibarang/barang/buat')
	<a href="{{ url('registrasibarang/barang/buat') }}" class="collection-item @yield('sidebar_buatbarang')">Buat Barang</a>
@endsection

@section('sidebar_menu')
	@if ($data['isLoggedIn'])
	
	@if ($data['title'] == 'Beranda')
	<h5 align="center">Logged In</h5>	

	@elseif ($data['user_sess']->username == 'jundi.ahmad')
	@yield('pinjamruang_header')
	@yield('pinjamruang')
	@yield('pinjamruang/buat')
	@yield('pinjamruang/ruangan')
	@yield('pinjamruang/ruangan/buat')
	@yield('pinjamruang/ruangan/jadwal')
	@yield('pinjamruang/ruangan/buatjadwal')
	<br>
	
	@yield('registrasibarang')
	@yield('registrasibarang/buat')
	@yield('registrasibarang/barang')
	@yield('registrasibarang/barang/buat')

	@elseif ($data['user_sess']->role == 'managerpinjamsekre' || $data['user_sess']->role == 'managerpinjamppaa')	
	<!-- Sidebar Peminjaman Ruangan, Manager Peminjaman -->
	@yield('pinjamruang_header')
	@yield('pinjamruang')
	@yield('pinjamruang/buat')
	@yield('pinjamruang/ruangan')
	@yield('pinjamruang/ruangan/buat')
	@yield('pinjamruang/ruangan/jadwal')
	@yield('pinjamruang/ruangan/buatjadwal')
	
	@elseif ($data['user_sess']->role = 'mahasiswa')
	<!-- Sidebar Registrasi Barang -->
	@yield('registrasibarang_header')
	@yield('registrasibarang')
	@yield('registrasibarang/buat')
	
	@elseif ($data['user_sess']->role == 'managerfasilitas' || true)
	<!-- Sidebar Registrasi Barang, Pihak Fasilitas dan Infrastruktur -->
	@yield('registrasibarang_header')
	@yield('registrasibarang')
	@yield('registrasibarang/barang')
	@yield('registrasibarang/barang/buat')
	
	@elseif ($data['user_sess']->role == 'mahasiswa')
	<!-- Sidebar Peminjaman Ruangan, Peminjam -->	          		
	@yield('registrasibarang_header')
	@yield('registrasibarang')
	@yield('registrasibarang/buat')

	@else


	@endif
	<!-- end if role -->

	@endif
	<!-- end if check login -->

@endsection