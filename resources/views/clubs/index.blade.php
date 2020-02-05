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
                <h4 class="mt-5 mb-5">Clubs</h4>
            </div>

            @can('admin')
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clubs.club.create') }}" class="btn btn-success" title="Create New Club">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>
            @endcan

        </div>
        
        @if(count($clubs) == 0)
            <div class="panel-body text-center">
                <h4>No Clubs Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Etudiant</th>
                            <th>Mombre</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clubs as $club)
                        <tr><td>
                            <img src="{{ url('thumbs/' . $club->photo) }}" style="border-radius: 50%;height:100px;width:100px;">  </td>
                            <td>{{ $club->name }}</td>
                            <td>{{ optional($club->etudiant)->name }}</td>
                            <td>{{ $club->mombre }}</td>

                            <td>

                                <form method="POST" action="{!! route('clubs.club.destroy', $club->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clubs.club.show', $club->id ) }}" class="btn btn-info" title="Show Club">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clubs.club.edit', $club->id ) }}" class="btn btn-primary" title="Edit Club">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        @if(Auth::guard('web')->check())

                                        <button type="submit" class="btn btn-danger" title="Delete Club" onclick="return confirm(&quot;Click Ok to delete Club.&quot;)">
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
            {!! $clubs->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection