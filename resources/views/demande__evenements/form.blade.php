
<div class="form-group {{ $errors->has('club_id') ? 'has-error' : '' }}">
    <label for="club_id" class="col-md-2 control-label">Club</label>
    <div class="col-md-10">
        <select class="form-control" id="club_id" name="club_id">
        	    <option value="" style="display: none;" {{ old('club_id', optional($demandeEvenement)->club_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select club</option>
        	@foreach ($clubs as $key => $club)
			    <option value="{{ $club->id }}" {{ old('club_id', optional($demandeEvenement)->club_id) == $club->id ? 'selected' : '' }}>
			    	{{ $club->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('club_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('Salle_id') ? 'has-error' : '' }}">
    <label for="Salle_id" class="col-md-2 control-label">Salle</label>
    <div class="col-md-10">
        <select class="form-control" id="Salle_id" name="Salle_id">
                <option value="" style="display: none;" {{ old('Salle_id', optional($demandeEvenement)->Salle_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select salle</option>
            @foreach ($salles as $key => $salle)
                <option value="{{ $salle->id }}" {{ old('Salle_id', optional($demandeEvenement)->Salle_id) == $salle->id ? 'selected' : '' }}>
                    {{ $salle->name }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('Salle_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('Name') ? 'has-error' : '' }}">
    <label for="Name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="Name" type="text" id="Name" value="{{ old('Name', optional($demandeEvenement)->Name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('Name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Lieu') ? 'has-error' : '' }}">
    <label for="Lieu" class="col-md-2 control-label">Lieu</label>
    <div class="col-md-10">
        <input class="form-control" name="Lieu" type="text" id="Lieu" value="{{ old('Lieu', optional($demandeEvenement)->Lieu) }}" minlength="1" placeholder="Enter lieu here...">
        {!! $errors->first('Lieu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="Date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date', optional($demandeEvenement)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Start') ? 'has-error' : '' }}">
    <label for="Start" class="col-md-2 control-label">Start</label>
    <div class="col-md-10">
        <input class="form-control" name="Start" type="time" id="Start" value="{{ old('Start', optional($demandeEvenement)->Start) }}" minlength="1" placeholder="Enter start here...">
        {!! $errors->first('Start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('End') ? 'has-error' : '' }}">
    <label for="End" class="col-md-2 control-label">End</label>
    <div class="col-md-10">
        <input class="form-control" name="End" type="time" id="End" value="{{ old('End', optional($demandeEvenement)->End) }}" minlength="1" placeholder="Enter end here...">
        {!! $errors->first('End', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($demandeEvenement)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

