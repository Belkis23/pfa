
<div class="form-group {{ $errors->has('club_id') ? 'has-error' : '' }}">
    <label for="club_id" class="col-md-2 control-label">Club</label>
    <div class="col-md-10">
        <select class="form-control" id="club_id" name="club_id">
        	    <option value="" style="display: none;" {{ old('club_id', optional($classeFormation)->club_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select club</option>
        	@foreach ($clubs as $key => $club)
			    <option value="{{ $key }}" {{ old('club_id', optional($classeFormation)->club_id) == $key ? 'selected' : '' }}>
			    	{{ $club }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('club_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('etudiant_id') ? 'has-error' : '' }}">
    <label for="etudiant_id" class="col-md-2 control-label">Etudiant</label>
    <div class="col-md-10">
        <select class="form-control" id="etudiant_id" name="etudiant_id">
        	    <option value="" style="display: none;" {{ old('etudiant_id', optional($classeFormation)->etudiant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select etudiant</option>
        	@foreach ($etudiants as $key => $etudiant)
			    <option value="{{ $key }}" {{ old('etudiant_id', optional($classeFormation)->etudiant_id) == $key ? 'selected' : '' }}>
			    	{{ $etudiant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('etudiant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('post') ? 'has-error' : '' }}">
    <label for="post" class="col-md-2 control-label">Post</label>
    <div class="col-md-10">
        <input class="form-control" name="post" type="text" id="post" value="{{ old('post', optional($classeFormation)->post) }}" minlength="1" placeholder="Enter post here...">
        {!! $errors->first('post', '<p class="help-block">:message</p>') !!}
    </div>
</div>

