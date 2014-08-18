@extends('server.dash')

@section('cashier')
<script type="text/javascript">
    $(document).ready(function(){
         $( "#hcash" ).addClass("active1" );
         $( "#hcash" ).animate({ "margin-left": "-=209px" }, "fast" );
          $( "#hcasha" ).addClass("active" );
          $( "#hcash i" ).addClass("active" );
});
</script>


<div class = "table-responsive" id = "tablet" >
<h2 id = "cat" style = "">List of Cashier&nbsp;/<a href = "Cashier/create" style = "text-decoration: none;">&nbsp;+<small style = "color: #428bca;">New</small></a></h2>
<table class="table table-hover" id = "table">
  <thead>
        <tr style = "font-size:12px;">
            <th class = "text-center">ID</th>
            <th class = "text-center">Name</th>
            <th class = "text-center">Age</th>
            <th class = "text-center">Gender</th>
            <th class = "text-center">Degree</th>
            <th class = "text-center">Email</th>
            <th class = "text-center">Contact</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cashiers as $cashier)
            <tr style = "font-size:11px;" id = "items">
                <td class = "text-center"> {{ $cashier->c_id}}</td>
                <td class = "text-center">{{ ucwords($cashier->fname) . ' ' . ucwords($cashier->mname) . ' ' . ucwords($cashier->lname)}} </td>
                <td class = "text-center"> {{ $cashier->age}}</td>
                <td class = "text-center"> {{ $cashier->gender}}</td>
                <td class = "text-center"> {{ $cashier->degree}}</td>
                <td class = "text-center"> {{ $cashier->email}}</td>
                <td class = "text-center"> {{ $cashier->contact}}</td>
                <td style = "width:13px;">{{ link_to_route('Cashier.edit', 'Edit',
                     array($cashier->c_id), array('class' => 'btn btn-info', 'id' => 'btnedit')) }}
                </td>
                 <td  style = "width:13px;">
                        {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Cashier.destroy', $cashier->c_id))) }}                       
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