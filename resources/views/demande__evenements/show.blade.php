@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($demandeEvenement->Name) ? $demandeEvenement->Name : 'Demande  Evenement' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('demande__evenements.demande__evenement.destroy', $demandeEvenement->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('demande__evenements.demande__evenement.index') }}" class="btn btn-primary" title="Show All Demande  Evenement">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('demande__evenements.demande__evenement.create') }}" class="btn btn-success" title="Create New Demande  Evenement">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('demande__evenements.demande__evenement.edit', $demandeEvenement->id ) }}" class="btn btn-primary" title="Edit Demande  Evenement">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Demande  Evenement" onclick="return confirm(&quot;Click Ok to delete Demande  Evenement.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Club</dt>
            <dd>{{ optional($demandeEvenement->club)->name }}</dd>
            <dt>Name</dt>
            <dd>{{ $demandeEvenement->Name }}</dd>
            <dt>Lieu</dt>
            <dd>{{ $demandeEvenement->Lieu }}</dd>
            <dt>Date</dt>
            <dd>{{ $demandeEvenement->date }}</dd>
            <dt>Start</dt>
            <dd>{{ $demandeEvenement->Start }}</dd>
            <dt>End</dt>
            <dd>{{ $demandeEvenement->End }}</dd>
            <dt>Description</dt>
            <dd>{{ $demandeEvenement->description }}</dd>

        </dl>

    </div>
</div>

@endsection