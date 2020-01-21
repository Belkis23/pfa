
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($etudiant)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
    <label for="prenom" class="col-md-2 control-label">Prenom</label>
    <div class="col-md-10">
        <input class="form-control" name="prenom" type="text" id="prenom" value="{{ old('prenom', optional($etudiant)->prenom) }}" minlength="1" placeholder="Enter prenom here...">
        {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cin') ? 'has-error' : '' }}">
    <label for="cin" class="col-md-2 control-label">Cin</label>
    <div class="col-md-10">
        <input class="form-control" name="cin" type="text" id="cin" value="{{ old('cin', optional($etudiant)->cin) }}" minlength="1" placeholder="Enter cin here...">
        {!! $errors->first('cin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
    <label for="telephone" class="col-md-2 control-label">Telephone</label>
    <div class="col-md-10">
        <input class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone', optional($etudiant)->telephone) }}" minlength="1" placeholder="Enter telephone here...">
        {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
    <label for="adresse" class="col-md-2 control-label">Adresse</label>
    <div class="col-md-10">
        <input class="form-control" name="adresse" type="text" id="adresse" value="{{ old('adresse', optional($etudiant)->adresse) }}" minlength="1" placeholder="Enter adresse here...">
        {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('classe_id') ? 'has-error' : '' }}">
    <label for="classe_id" class="col-md-2 control-label">Classe</label>
    <div class="col-md-10">
        <select class="form-control" id="classe_id" name="classe_id">
        	    <option value="" style="display: none;" {{ old('classe_id', optional($etudiant)->classe_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select classe</option>
        	@foreach ($classes as $key => $classe)
			    <option value="{{ $key }}" {{ old('classe_id', optional($etudiant)->classe_id) == $key ? 'selected' : '' }}>
			    	{{ $classe }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('classe_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($etudiant)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($etudiant)->password) }}" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
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

        @if (isset($etudiant->photo) && !empty($etudiant->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $etudiant->photo }}
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

