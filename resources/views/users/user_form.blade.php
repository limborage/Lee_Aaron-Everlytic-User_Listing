<div class="form-group">
    <label for="name">Name</label>
    <input name="name" id="name" type="text" value="{{ $mode === 'edit' ? $user->name : old('name') }}"
           class="{{ $errors->has('name') ? 'error-input' : '' }}"
           placeholder="Enter your name">
    <p class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>
</div>
<div class="form-group">
    <label for="surname">Surname</label>
    <input name="surname" id="surname" type="text" value="{{ $mode === 'edit' ? $user->surname : old('surname') }}"
           class="{{ $errors->has('surname') ? 'error-input' : '' }}"
           placeholder="Enter your surname">
    <p class="text-danger">{{ $errors->has('surname') ? $errors->first('surname') : '' }}</p>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input name="email" id="email" type="email" value="{{ $mode === 'edit' ? $user->email : old('email') }}"
           class="{{ $errors->has('email') ? 'error-input' : '' }}"
           placeholder="Enter your email">
    <p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>
</div>
<div class="form-group">
    <label for="position">Position</label>
    <input name="position" id="position" type="text" value="{{ $mode === 'edit' ? $user->position : old('position') }}"
           class="{{ $errors->has('position') ? 'error-input' : '' }}"
           placeholder="Enter your position">
    <p class="text-danger">{{ $errors->has('position') ? $errors->first('position') : '' }}</p>
</div>