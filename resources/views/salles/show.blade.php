@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($salle->name) ? $salle->name : 'Salle' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('salles.salle.destroy', $salle->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('salles.salle.index') }}" class="btn btn-primary" title="Show All Salle">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('salles.salle.create') }}" class="btn btn-success" title="Create New Salle">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('salles.salle.edit', $salle->id ) }}" class="btn btn-primary" title="Edit Salle">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Salle" onclick="return confirm(&quot;Click Ok to delete Salle.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $salle->name }}</dd>

        </dl>

    </div>
</div>

@endsection