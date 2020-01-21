
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($club)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('etudiant_id') ? 'has-error' : '' }}">
    <label for="etudiant_id" class="col-md-2 control-label">Etudiant</label>
    <div class="col-md-10">
        <select class="form-control" id="etudiant_id" name="etudiant_id">
        	    <option value="" style="display: none;" {{ old('etudiant_id', optional($club)->etudiant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select etudiant</option>
        	@foreach ($etudiants as $key => $etudiant)
			    <option value="{{ $key }}" {{ old('etudiant_id', optional($club)->etudiant_id) == $key ? 'selected' : '' }}>
			    	{{ $etudiant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('etudiant_id', '<p class="help-block">:message</p>') !!}
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

        @if (isset($club->photo) && !empty($club->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $club->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mombre') ? 'has-error' : '' }}">
    <label for="mombre" class="col-md-2 control-label">Mombre</label>
    <div class="col-md-10">
        <input class="form-control" name="mombre" type="text" id="mombre" value="{{ old('mombre', optional($club)->mombre) }}" minlength="1" placeholder="Enter mombre here...">
        {!! $errors->first('mombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

