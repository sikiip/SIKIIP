<div>
	<a href="/logout">Logout</a>
</div>
<span>{{auth()->user()->username}}</span>
@if(auth()->user()->hak_akses == '1')
<div>
	<h1>admin</h1>
</div>
@endif
<div>
	<h1>karyawan</h1>
</div>