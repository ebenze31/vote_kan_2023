<div class="form-group {{ $errors->has('amphoe') ? 'has-error' : ''}}">
    <label for="amphoe" class="control-label">{{ 'Amphoe' }}</label>
    <input class="form-control" name="amphoe" type="text" id="amphoe" value="{{ isset($person_of_polling_station->amphoe) ? $person_of_polling_station->amphoe : ''}}" >
    {!! $errors->first('amphoe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tambon') ? 'has-error' : ''}}">
    <label for="tambon" class="control-label">{{ 'Tambon' }}</label>
    <input class="form-control" name="tambon" type="text" id="tambon" value="{{ isset($person_of_polling_station->tambon) ? $person_of_polling_station->tambon : ''}}" >
    {!! $errors->first('tambon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('polling_station_at') ? 'has-error' : ''}}">
    <label for="polling_station_at" class="control-label">{{ 'Polling Station At' }}</label>
    <input class="form-control" name="polling_station_at" type="text" id="polling_station_at" value="{{ isset($person_of_polling_station->polling_station_at) ? $person_of_polling_station->polling_station_at : ''}}" >
    {!! $errors->first('polling_station_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity_person') ? 'has-error' : ''}}">
    <label for="quantity_person" class="control-label">{{ 'Quantity Person' }}</label>
    <input class="form-control" name="quantity_person" type="text" id="quantity_person" value="{{ isset($person_of_polling_station->quantity_person) ? $person_of_polling_station->quantity_person : ''}}" >
    {!! $errors->first('quantity_person', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
