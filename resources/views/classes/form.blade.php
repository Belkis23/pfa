
<div class="form-group {{ $errors->has('section_id') ? 'has-error' : '' }}">
    <label for="section_id" class="col-md-2 control-label">Section</label>
    <div class="col-md-10">
        <select class="form-control" id="section_id" name="section_id">
        	    <option value="" style="display: none;" {{ old('section_id', optional($classe)->section_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select section</option>
        	@foreach ($sections as $key => $section)
			    <option value="{{ $key }}" {{ old('section_id', optional($classe)->section_id) == $key ? 'selected' : '' }}>
			    	{{ $section }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('section_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('neveau') ? 'has-error' : '' }}">
    <label for="neveau" class="col-md-2 control-label">Neveau</label>
    <div class="col-md-10">
        <input class="form-control" name="neveau" type="text" id="neveau" value="{{ old('neveau', optional($classe)->neveau) }}" minlength="1" placeholder="Enter neveau here...">
        {!! $errors->first('neveau', '<p class="help-block">:message</p>') !!}
    </div>
</div>

