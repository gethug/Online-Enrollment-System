@extends('server.dash')

@section('add')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hadmin" ).addClass("active1" );
});
</script>


<div class = "table-responsive" style = "width : 909px; top:-290px; left:187px; position:relative;" >
<h2 id = "cat" style = "">List of Administrator</h2>
<table class="table table-striped table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
             <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">UserName</th>
             <th class = "text-center">Password</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
            <tr style = "font-size:11px;">
                <td class = "text-center"> {{ $admin->a_id}}</td>
                <td class = "text-center">{{ ucwords($admin->Fname) . ' ' . ucwords($admin->Mname) . ' ' . ucwords($admin->Lname)}} </td>
                <td class = "text-center"> {{ $admin->user}}</td>
                <td class = "text-center"> {{ $admin->pass}}</td>
                <td style = "width:13px;">{{ link_to_route('administrator.edit', 'Edit',
                     array($admin->a_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('administrator.destroy', $admin->a_id))) }}                       
                            {{ Form::submit('Delete', array('class'
                    => 'btn btn-danger', 'id' => 'btndel')) }}
                        {{ Form::close() }}
                    </td>
            </tr>
        @endforeach

    </tbody>
</table>
</div>

@stop