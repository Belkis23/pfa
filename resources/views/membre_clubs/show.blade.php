@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Membre Club' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('membre_clubs.membre_club.destroy', $membreClub->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('membre_clubs.membre_club.index') }}" class="btn btn-primary" title="Show All Membre Club">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('membre_clubs.membre_club.create') }}" class="btn btn-success" title="Create New Membre Club">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('membre_clubs.membre_club.edit', $membreClub->id ) }}" class="btn btn-primary" title="Edit Membre Club">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Membre Club" onclick="return confirm(&quot;Click Ok to delete Membre Club.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Etudiant</dt>
            <dd>{{ optional($membreClub->etudiant)->name }}</dd>
            <dt>Club</dt>
            <dd>{{ optional($membreClub->club)->name }}</dd>

        </dl>

    </div>
</div>

@endsection