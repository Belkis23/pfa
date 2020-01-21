
<div class="form-group {{ $errors->has('club_id') ? 'has-error' : '' }}">
    <label for="club_id" class="col-md-2 control-label">Club</label>
    <div class="col-md-10">
        <select class="form-control" id="club_id" name="club_id">
        	    <option value="" style="display: none;" {{ old('club_id', optional($post)->club_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select club</option>
        	@foreach ($clubs as $key => $club)
			    <option value="{{ $key }}" {{ old('club_id', optional($post)->club_id) == $key ? 'selected' : '' }}>
			    	{{ $club }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('club_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Titre') ? 'has-error' : '' }}">
    <label for="Titre" class="col-md-2 control-label">Titre</label>
    <div class="col-md-10">
        <input class="form-control" name="Titre" type="text" id="Titre" value="{{ old('Titre', optional($post)->Titre) }}" minlength="1" placeholder="Enter titre here...">
        {!! $errors->first('Titre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($post)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($post->photo) && !empty($post->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $post->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($post)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lieu') ? 'has-error' : '' }}">
    <label for="lieu" class="col-md-2 control-label">Lieu</label>
    <div class="col-md-10">
        <input class="form-control" name="lieu" type="text" id="lieu" value="{{ old('lieu', optional($post)->lieu) }}" minlength="1" placeholder="Enter lieu here...">
        {!! $errors->first('lieu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('etudiant_id') ? 'has-error' : '' }}">
    <label for="etudiant_id" class="col-md-2 control-label">Etudiant</label>
    <div class="col-md-10">
        <select class="form-control" id="etudiant_id" name="etudiant_id">
        	    <option value="" style="display: none;" {{ old('etudiant_id', optional($post)->etudiant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select etudiant</option>
        	@foreach ($etudiants as $key => $etudiant)
			    <option value="{{ $key }}" {{ old('etudiant_id', optional($post)->etudiant_id) == $key ? 'selected' : '' }}>
			    	{{ $etudiant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('etudiant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

