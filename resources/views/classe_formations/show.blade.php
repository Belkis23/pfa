@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Classe Formation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('classe_formations.classe_formation.destroy', $classeFormation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('classe_formations.classe_formation.index') }}" class="btn btn-primary" title="Show All Classe Formation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('classe_formations.classe_formation.create') }}" class="btn btn-success" title="Create New Classe Formation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('classe_formations.classe_formation.edit', $classeFormation->id ) }}" class="btn btn-primary" title="Edit Classe Formation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Classe Formation" onclick="return confirm(&quot;Click Ok to delete Classe Formation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Club</dt>
            <dd>{{ optional($classeFormation->club)->name }}</dd>
            <dt>Etudiant</dt>
            <dd>{{ optional($classeFormation->etudiant)->name }}</dd>
            <dt>Post</dt>
            <dd>{{ $classeFormation->post }}</dd>

        </dl>

    </div>
</div>

@endsection