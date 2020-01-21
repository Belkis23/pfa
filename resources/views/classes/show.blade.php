@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Classe' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('classes.classe.destroy', $classe->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('classes.classe.index') }}" class="btn btn-primary" title="Show All Classe">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('classes.classe.create') }}" class="btn btn-success" title="Create New Classe">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('classes.classe.edit', $classe->id ) }}" class="btn btn-primary" title="Edit Classe">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Classe" onclick="return confirm(&quot;Click Ok to delete Classe.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Section</dt>
            <dd>{{ optional($classe->section)->name }}</dd>
            <dt>Neveau</dt>
            <dd>{{ $classe->neveau }}</dd>

        </dl>

    </div>
</div>

@endsection