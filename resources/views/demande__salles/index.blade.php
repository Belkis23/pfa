@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Demande  Salles</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('demande__salles.demande__salle.create') }}" class="btn btn-success" title="Create New Demande  Salle">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
                @can('admin')
                <a id="print" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a><br>
                @endcan

            </div>

        </div>
        
        @if(count($demandeSalles) == 0)
            <div class="panel-body text-center">
                <h4>No Demande  Salles Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="table" class="table table-striped ">
                    <thead>
                        <tr>
                             <th>Day</th>
                            <th>Club</th>
                            <th>Salle</th>
                            <th>Date</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>confirmed</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($demandeSalles as $demandeSalle)
                        <tr>
                            <td>{{  date('l', strtotime($demandeSalle->date))}}</td>
                            <td>{{ optional($demandeSalle->club)->name }}</td>
                            <td>{{ optional($demandeSalle->salle)->name }}</td>
                            <td>{{  $demandeSalle->date}}</td>
                             
                            <td>{{ $demandeSalle->Start }}</td>
                            <td>{{ $demandeSalle->End }}</td>
                             <td>
                                @if($demandeSalle->confirmed == 0)
                                <span class="badge badge-danger">No</span> 
                                @else
                    
                                <span class="badge badge-success">confirmed</span>
                                @endif
                               </td>

                            <td>

                                <form method="POST" action="{!! route('demande__salles.demande__salle.destroy', $demandeSalle->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                            @can('admin')
                                     @if($demandeSalle->confirmed == 0)
                                        <button type="button" id="confirmed" class="btn btn-success" title="confirmed Demande  Evenement" onclick=" confirmedmy({{ $demandeSalle->id}})">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </button>
                                    @endif
                                    @endcan
                                        <a href="{{ route('demande__salles.demande__salle.show', $demandeSalle->id ) }}" class="btn btn-info" title="Show Demande  Salle">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('demande__salles.demande__salle.edit', $demandeSalle->id ) }}" class="btn btn-primary" title="Edit Demande  Salle">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @if($demandeSalle->confirmed == 0)
                                        <button type="submit" class="btn btn-danger" title="Delete Demande  Salle" onclick="return confirm(&quot;Click Ok to delete Demande  Salle.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        @endif
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $demandeSalles->render() !!}
        </div>
        
        @endif
    
    </div>




      <div class="modal" id="myModal"  role="dialog" style="top: 70px;    height: 86%;" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">


      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">choix Date</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body form-horizontal">

           
            <div id="divt" class="form-group">
                  <label for="type" class="col-sm-2 control-label">Date Start</label>
            
                  <div class="col-sm-10">
               <input type="date"   id="start"  name="start" class="form-control select2 ">


                           
            </div>
            </div>

            <div id="divt" class="form-group">
                  <label for="type" class="col-sm-2 control-label">Date End</label>
            
                  <div class="col-sm-10">
               <input type="date"   id="end"  name="end" class="form-control select2 ">


                           
            </div>
            </div>  


            
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="pront"   class="btn btn-success pull-right">Print</button>
        </div>
        
      </div>
    </div>
  </div>


@endsection



@section('js')
<script>
$(function () {

        $('#table').DataTable({
            dom: 'Bfrtip',
  
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
             "buttons": [
        {
            extend: 'pdf',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
        });


       $("#print").on("click", function() {
         $('#myModal').modal();
});





       $("#pront").on("click", function() {
        // Dynamic Rows Code

         var start = $("#start").val();
         var end = $("#end").val();

         if(start < end && start != null && end !=null){
            window.location  = "{{url('/printsale')}}?start="+start+"&end="+end;
         }



        

  
       

        
      
        // Get max row id and set new id
       
});



    });
</script>
  <script>
     
      function confirmedmy(id) {
        console.log(id);
            $.get("{{ url('confirmedeventsalle')}}", 
        { id: id }, 
        function(data) {
            location.reload(true);

           console.log(data);
        });

}
  </script>
@endsection