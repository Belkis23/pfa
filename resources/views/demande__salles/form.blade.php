
<div class="form-group {{ $errors->has('Club_id') ? 'has-error' : '' }}">
    <label for="Club_id" class="col-md-2 control-label">Club</label>
    <div class="col-md-10">
        <select class="form-control" id="Club_id" name="Club_id">
        	    <option value="" style="display: none;" {{ old('Club_id', optional($demandeSalle)->Club_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select club</option>
        	@foreach ($clubs as $key => $club)
			    <option value="{{ $club->id }}" {{ old('Club_id', optional($demandeSalle)->Club_id) == $club->id ? 'selected' : '' }}>
			    	{{ $club->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Club_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Salle_id') ? 'has-error' : '' }}">
    <label for="Salle_id" class="col-md-2 control-label">Salle</label>
    <div class="col-md-10">
        <select class="form-control" id="Salle_id" name="Salle_id">
        	    <option value="" style="display: none;" {{ old('Salle_id', optional($demandeSalle)->Salle_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select salle</option>
        	@foreach ($salles as $key => $salle)
			    <option value="{{ $key }}" {{ old('Salle_id', optional($demandeSalle)->Salle_id) == $key ? 'selected' : '' }}>
			    	{{ $salle }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Salle_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date', optional($demandeSalle)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Start') ? 'has-error' : '' }}">
    <label for="Start" class="col-md-2 control-label">Start</label>
    <div class="col-md-10">
        <input class="form-control" name="Start" type="time" id="Start" value="{{ old('Start', optional($demandeSalle)->Start) }}" minlength="1" placeholder="Enter start here...">
        {!! $errors->first('Start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('End') ? 'has-error' : '' }}">
    <label for="End" class="col-md-2 control-label">End</label>
    <div class="col-md-10">
        <input class="form-control" name="End" type="time" id="End" value="{{ old('End', optional($demandeSalle)->End) }}" minlength="1" placeholder="Enter end here...">
        {!! $errors->first('End', '<p class="help-block">:message</p>') !!}
    </div>
</div>

