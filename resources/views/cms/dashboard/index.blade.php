@extends ('layouts.cms.master')

@section ('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Dashboard</h3>
				</div>
				<div class="box-body">
					<pre>{!! json_encode($analyticsData, JSON_PRETTY_PRINT) !!}</pre>
				</div>
			</div>
		</div>
	</div>
@endsection