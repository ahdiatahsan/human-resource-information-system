@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show">
		{{ session('success') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('info'))
	<div class="alert alert-info alert-dismissible fade show">
		{{ session('info') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('danger'))
	<div class="alert alert-danger alert-dismissible fade show">
		{{ session('danger') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif