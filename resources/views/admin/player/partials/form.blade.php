
{{-- CREATE --}}
<div>
  <form class="" action="{{ route('admin.players.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      
    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>First Name *</label>
          <input name="first_name" type="text" placeholder="First name" class="form-control" value="{{old('first_name')}}">
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>Last Name *</label>
          <input name="last_name" type="text" placeholder="Last name" class="form-control" value="{{old('last_name')}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Email *</label>
          <input name="email" type="text" placeholder="Email" class="form-control" value="{{old('email')}}">
        </div>
      </div>
      {{-- <div class="col">
        <div class="form-group has-label">
          <label>Password</label>
          <input name="password" type="password" placeholder="Password" class="form-control">
        </div>
      </div> --}}
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Date of birth</label>
          <div class="input-group date">
            <input name="date_of_birth" type='text' class="form-control" id='datetimepicker_player' />
            {{-- <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span> --}}
          </div>
          {{-- <input name="date_of_birth" type="text" placeholder="Date of birth" class="form-control"> --}}
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>Origin *</label>
          <input name="origin" type="text" placeholder="Origin" class="form-control" value="{{old('origin')}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Region *</label>
          <select name="region" class="form-control">
            @foreach ($regions as $region)
              <option value="{{ $region->id }}">{{$region->name}}</option>
            @endforeach
            {{-- <option>Region Two</option> --}}
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>League *</label>
          <select name="league" class="form-control">
            @foreach ($leagues as $league)
              <option value="{{ $league->id }}">{{$league->name}}</option>
            @endforeach
            {{-- <option>League One</option>
            <option>League Two</option> --}}
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Qualification </label>
          <input name="qualification" type="text" placeholder="Qualification" class="form-control" value="{{old('qualification')}}">
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>Rank </label>
          <input name="rank" type="text" placeholder="Rank" class="form-control" value="{{old('rank')}}">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Position </label>
          <input name="position" type="text" placeholder="Position" class="form-control" value="{{old('position')}}">
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>Team </label>
          <select name="team" class="form-control">
            <option value="0">None</option>
            @foreach ($teams as $team)
              <option value="{{ $team->id }}">{{$team->name}}</option>
            @endforeach
            {{-- <option>Team One</option>
            <option>Team Two</option> --}}
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Experience </label>
          <input name="experience" type="text" placeholder="Experience" class="form-control" value="{{old('experience')}}">
        </div>
      </div>
      <div class="col">
        <div class="form-group has-label">
          <label>Profile photo </label>
          <input name="profile_pic" type="file" placeholder="Upload profile photo" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Description </label>
          <textarea name="description" type="text" placeholder="Description" class="form-control" value="">{{old('description')}}</textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>History *</label>
          <textarea name="history" type="text" placeholder="History" class="form-control" value="">{{old('history')}}</textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-group has-label">
          <label>Feature player </label>
          <input name="is_featured" class="d-block" type="checkbox" value="1">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <button type="submit" value="Submit" class="btn btn-primary">Create</button>
        {{-- <button class="btn btn-primary">Save</button> --}}
      </div>
    </div>

  </form>

</div>
{{-- CREATE  ^ --}}



{{-- EDIT --}}


<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>First Name *</label>
      <input name="first_name" type="text" placeholder="First name" class="form-control" value="{{$player->first_name}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>Last Name *</label>
      <input name="last_name" type="text" placeholder="Last name" class="form-control" value="{{$player->last_name}}">
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Email *</label>
      <input name="email" type="text" placeholder="Email" class="form-control" value="{{$player->email}}" disabled>
    </div>
  </div>
  {{-- <div class="col">
    <div class="form-group has-label">
      <label>Password</label>
      <input name="password" type="password" placeholder="Password" class="form-control" value="{{$player->password}}">
    </div>
  </div> --}}
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Date of birth</label>
      <div class="input-group date">
        <input name="date_of_birth" type='text' class="form-control" id='datetimepicker_player' value="{{$player->birth_date}}" />
        {{-- <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span> --}}
      </div>
      {{-- <input name="date_of_birth" type="text" placeholder="Date of birth" class="form-control"> --}}
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>Origin *</label>
      <input name="origin" type="text" placeholder="Origin" class="form-control" value="{{$player->origin}}">
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Region *</label>
      <select name="region" class="form-control">
        @foreach ($regions as $region)
          <option value="{{ $region->id }}" @if($region->id == $player->region_id) selected @endif>{{$region->name}}</option>
        @endforeach
        {{-- <option>Region Two</option> --}}
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>League *</label>
      <select name="league" class="form-control">
        @foreach ($leagues as $league)
          <option value="{{ $league->id }}" @if($league->id == $player->league_id) selected @endif>{{$league->name}}</option>
        @endforeach
        {{-- <option>League One</option>
        <option>League Two</option> --}}
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Qualification </label>
      <input name="qualification" type="text" placeholder="Qualification" class="form-control" value="{{$player->qualification}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>Rank </label>
      <input name="rank" type="text" placeholder="Rank" class="form-control" value="{{$player->rank}}">
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Position </label>
      <input name="position" type="text" placeholder="Position" class="form-control" value="{{$player->position}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>Team </label>
      <select name="team" class="form-control">
        <option value="0">None</option>
        @foreach ($teams as $team)
          <option value="{{ $team->id }}" @if($team->id == $player->team_id) selected @endif>{{$team->name}}</option>
        @endforeach
        {{-- <option>Team One</option>
        <option>Team Two</option> --}}
      </select>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Experience </label>
      <input name="experience" type="text" placeholder="Experience" class="form-control" value="{{$player->experience}}">
    </div>
  </div>
  <div class="col">
    <div class="form-group has-label">
      <label>Profile photo </label>
      <input name="profile_pic" type="file" placeholder="Upload profile photo" class="form-control">
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Description </label>
      <textarea name="description" type="text" placeholder="Description" class="form-control" value="">{{$player->description}}</textarea>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>History *</label>
      <textarea name="history" type="text" placeholder="History" class="form-control" value="">{{$player->history}}</textarea>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group has-label">
      <label>Feature player </label>
      <input name="is_featured" class="d-block" type="checkbox" value="1" @if($player->is_featured) checked @endif>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <button type="submit" value="Submit" class="btn btn-primary">Save</button>
    {{-- <button class="btn btn-primary">Save</button> --}}
  </div>
</div>
{{-- EDIT  ^ --}}