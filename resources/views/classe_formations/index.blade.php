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
                <h4 class="mt-5 mb-5">Classe Formations</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('classe_formations.classe_formation.create') }}" class="btn btn-success" title="Create New Classe Formation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($classeFormations) == 0)
            <div class="panel-body text-center">
                <h4>No Classe Formations Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Club</th>
                            <th>Etudiant</th>
                            <th>Post</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classeFormations as $classeFormation)
                        <tr>
                            <td>{{ optional($classeFormation->club)->name }}</td>
                            <td>{{ optional($classeFormation->etudiant)->name }}</td>
                            <td>{{ $classeFormation->post }}</td>

                            <td>

                                <form method="POST" action="{!! route('classe_formations.classe_formation.destroy', $classeFormation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('classe_formations.classe_formation.show', $classeFormation->id ) }}" class="btn btn-info" title="Show Classe Formation">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('classe_formations.classe_formation.edit', $classeFormation->id ) }}" class="btn btn-primary" title="Edit Classe Formation">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Classe Formation" onclick="return confirm(&quot;Click Ok to delete Classe Formation.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
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
            {!! $classeFormations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection