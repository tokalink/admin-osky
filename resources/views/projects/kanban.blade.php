@extends('crudbooster::admin_template')
@section('content')
{{-- menu Showdetail, Addnew --}}
<div class="row mb-2">    
</div>
<div class="">      
	<div class="table-responsive">
		<table class="table table-display" collapse="1" border="1" style="overflow-x: scroll">
			<thead>
				<th style="text-align:center; min-width: 300px; max-width: 300px; background-color: rgb(60, 255, 0)">Deal</th>
				<th style="text-align:center; min-width: 300px; max-width: 300px; background-color: rgb(252, 0, 0)">Cancel</th>
				<th style="text-align:center; min-width: 300px; max-width: 300px; background-color: rgb(255, 238, 0)">No Respon</th>								
			</thead>
			<tbody>
				<tr>
					<td style="min-width:300px; max-width: 300px">@include('projects.detail',['leads'=>$deal,'warna'=>'tomato'])</td>
					<td style="min-width:300px; max-width: 300px">@include('projects.detail',['leads'=>$cancel,'warna'=>'red'])</td>
					<td style="min-width:300px; max-width: 300px">@include('projects.detail',['leads'=>$norespon,'warna'=>'yellow'])</td>					
				</tr>
			</tbody>			
		</table>			
	</div>
</div>
@endsection
