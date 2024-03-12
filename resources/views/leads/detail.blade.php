@forelse($leads as $le)  					
	<div class="">
		<div class="box box-default box-solid text-center">
			<div class="box-header with-border">
			<h3 class="box-title">{{$le->name}}</h3>
			<div class="pull-right box-tools">               
				<div class="btn-group">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-ellipsis-v	"></i></button>
				<ul class="dropdown-menu pull-right" role="menu">
					<li><a href="{{url('/admin/kanban-tasks/edit/'.$le->id.'?return_url='.url()->full())}}" class="text-default">Edit</a></li>    
                    <li>
						<form action="/admin/kanban-tasks/edit-save/{{$le->id.'?return_url='.url()->full()}}" method="post" id="frm{{$le->id}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">							
							<input type="hidden" name="done" value="Y">							
						</form>
						<a href="javascript:{}" onclick="document.getElementById('frm{{$le->id}}').submit();">Deal</a>                										
                    </li>
					<li class="divider"></li>
					<li>
						<form action="/admin/kanban-tasks/edit-save/{{$le->id.'?return_url='.url()->full()}}" method="post" id="frm{{$le->id}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">							
							<input type="hidden" name="status" value="Delete">							
						</form>
						<a href="javascript:{}" onclick="document.getElementById('frm{{$le->id}}').submit();">Delete</a>
				</ul>
				</div>               
			</div>              
			</div>
			<!-- /.box-header -->
			<div class="box-body" style="white-space: initial">
                <table class="table text-left">
                    <tr>
                        <td>Nama PT/Klien</td>
                        <td class="text-right">:</td>
                        <td>{{$le->klien}} </td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td class="text-right">:</td>
                        <td>{{$le->task=='Lainnya' ? $le->task_lainnya : $le->task}}</td>
                    </tr>
                    <tr>
                        <td>Jatuh Tempo</td>
                        <td class="text-right">:</td>
                        <td>{{$le->jatuh_tempo}}</td>
                    </tr>
                    <tr>
                        <td>Nama Domain</td>
                        <td class="text-right">:</td>
                        <td>{{$le->domain}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td class="text-right">:</td>
                        <td>{{$le->status=='Ya' ? 'Urgent' : 'Tidak Urgent'}}</td>
                    </tr>
                    <tr>
                        <td>Cabang</td>
                        <td class="text-right">:</td>
                        <td>{{$le->cabang}}</td>
                    </tr>

                    {{-- loop fu1--fu30, jika ada isinya tampilkan --}}
                    @for($i=1;$i<=30;$i++)
                        @if($le->{'fu'.$i})
                            <tr>
                                <td>Follow Up {{$i}}</td>
                                <td class="text-right">:</td>
                                <td>{{$le->{'fu'.$i} }}</td>                                
                            </tr>
                        @endif
                    @endfor
                    {{-- end loop fu1--fu30, jika ada isinya tampilkan --}}
                    
                </table>						
			</div>
			<!-- /.box-body -->
		</div>
	<!-- /.box -->
	</div>
@empty
	<div class="">
		<div class="box box-default box-solid text-center">
			<div class="box-header with-border">
				<h3 class="box-title">Tidak Tersedia</h3>			             
			</div>			
		</div>	
	</div>
@endforelse