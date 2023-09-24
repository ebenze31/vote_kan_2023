<div class="form-group {{ $errors->has('name_amphoe') ? 'has-error' : ''}}">
    <label for="name_amphoe" class="control-label">{{ 'Name Amphoe' }}</label>
    <input class="form-control" name="name_amphoe" type="text" id="name_amphoe" value="{{ isset($vote_kan_all_score->name_amphoe) ? $vote_kan_all_score->name_amphoe : ''}}" >
    {!! $errors->first('name_amphoe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_1') ? 'has-error' : ''}}">
    <label for="number_1" class="control-label">{{ 'Number 1' }}</label>
    <input class="form-control" name="number_1" type="text" id="number_1" value="{{ isset($vote_kan_all_score->number_1) ? $vote_kan_all_score->number_1 : ''}}" >
    {!! $errors->first('number_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_2') ? 'has-error' : ''}}">
    <label for="number_2" class="control-label">{{ 'Number 2' }}</label>
    <input class="form-control" name="number_2" type="text" id="number_2" value="{{ isset($vote_kan_all_score->number_2) ? $vote_kan_all_score->number_2 : ''}}" >
    {!! $errors->first('number_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Amount_person') ? 'has-error' : ''}}">
    <label for="Amount_person" class="control-label">{{ 'Amount Person' }}</label>
    <input class="form-control" name="Amount_person" type="text" id="Amount_person" value="{{ isset($vote_kan_all_score->Amount_person) ? $vote_kan_all_score->Amount_person : ''}}" >
    {!! $errors->first('Amount_person', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
