@php
    $fields = [
        'name' => 'Name',
        'surname' => 'Surname',
        'email' => 'Email',
        'position' => 'Position'
        ];
@endphp

@foreach($fields as $userFieldKey => $userFieldValue)
    <div class="form-group">
        <label for="{{$userFieldKey}}">{{$userFieldValue}}</label>
        <input name="{{$userFieldKey}}" id="{{$userFieldKey}}" type="text" value="{{ $mode === 'edit' ? $user[$userFieldKey] : old($userFieldKey) }}"
               class="{{ isset($errors) && $errors->has($userFieldKey) ? 'error-input' : '' }}"
               placeholder="Enter your {{$userFieldKey}}">
        <p class="text-danger">{{ isset($errors) && $errors->has($userFieldKey) ? $errors->first($userFieldKey) : '' }}</p>
    </div>
@endforeach