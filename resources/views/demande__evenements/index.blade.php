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
                <h4 class="mt-5 mb-5">Demande  Evenements</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('demande__evenements.demande__evenement.create') }}" class="btn btn-success" title="Create New Demande  Evenement">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($demandeEvenements) == 0)
            <div class="panel-body text-center">
                <h4>No Demande  Evenements Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Club</th>
                            <th>Name</th>
                            <th>Lieu</th>
                            <th>Date</th>
                            <th>Start</th>
                            <th>End</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($demandeEvenements as $demandeEvenement)
                        <tr>
                            <td>{{ optional($demandeEvenement->club)->name }}</td>
                            <td>{{ $demandeEvenement->Name }}</td>
                            <td>{{ $demandeEvenement->Lieu }}</td>
                            <td>{{ $demandeEvenement->Date }}</td>
                            <td>{{ $demandeEvenement->Start }}</td>
                            <td>{{ $demandeEvenement->End }}</td>

                            <td>

                                <form method="POST" action="{!! route('demande__evenements.demande__evenement.destroy', $demandeEvenement->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('demande__evenements.demande__evenement.show', $demandeEvenement->id ) }}" class="btn btn-info" title="Show Demande  Evenement">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('demande__evenements.demande__evenement.edit', $demandeEvenement->id ) }}" class="btn btn-primary" title="Edit Demande  Evenement">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Demande  Evenement" onclick="return confirm(&quot;Click Ok to delete Demande  Evenement.&quot;)">
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
            {!! $demandeEvenements->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection