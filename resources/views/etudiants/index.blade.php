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
                <h4 class="mt-5 mb-5">Etudiants</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('etudiants.etudiant.create') }}" class="btn btn-success" title="Create New Etudiant">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($etudiants) == 0)
            <div class="panel-body text-center">
                <h4>No Etudiants Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Prenom</th>
                            <th>Cin</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Classe</th>
                            <th>Email</th>
                            <th>Password</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->name }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->cin }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ optional($etudiant->classe)->created_at }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <td>{{ $etudiant->password }}</td>

                            <td>

                                <form method="POST" action="{!! route('etudiants.etudiant.destroy', $etudiant->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('etudiants.etudiant.show', $etudiant->id ) }}" class="btn btn-info" title="Show Etudiant">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('etudiants.etudiant.edit', $etudiant->id ) }}" class="btn btn-primary" title="Edit Etudiant">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Etudiant" onclick="return confirm(&quot;Click Ok to delete Etudiant.&quot;)">
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
            {!! $etudiants->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection