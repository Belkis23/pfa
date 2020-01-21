@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($club->name) ? $club->name : 'Club' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clubs.club.destroy', $club->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clubs.club.index') }}" class="btn btn-primary" title="Show All Club">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clubs.club.create') }}" class="btn btn-success" title="Create New Club">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clubs.club.edit', $club->id ) }}" class="btn btn-primary" title="Edit Club">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Club" onclick="return confirm(&quot;Click Ok to delete Club.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $club->name }}</dd>
            <dt>Etudiant</dt>
            <dd>{{ optional($club->etudiant)->name }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $club->photo) }}</dd>
            <dt>Mombre</dt>
            <dd>{{ $club->mombre }}</dd>

        </dl>

    </div>
</div>

@endsection