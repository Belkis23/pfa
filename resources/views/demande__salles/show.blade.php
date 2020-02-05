@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Demande  Salle' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('demande__salles.demande__salle.destroy', $demandeSalle->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('demande__salles.demande__salle.index') }}" class="btn btn-primary" title="Show All Demande  Salle">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('demande__salles.demande__salle.create') }}" class="btn btn-success" title="Create New Demande  Salle">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('demande__salles.demande__salle.edit', $demandeSalle->id ) }}" class="btn btn-primary" title="Edit Demande  Salle">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Demande  Salle" onclick="return confirm(&quot;Click Ok to delete Demande  Salle.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Club</dt>
            <dd>{{ optional($demandeSalle->club)->name }}</dd>
            <dt>Salle</dt>
            <dd>{{ optional($demandeSalle->salle)->name }}</dd>
            <dt>Date</dt>
            <dd>{{ $demandeSalle->date }}</dd>
            <dt>Start</dt>
            <dd>{{ $demandeSalle->Start }}</dd>
            <dt>End</dt>
            <dd>{{ $demandeSalle->End }}</dd>

        </dl>

    </div>
</div>

@endsection