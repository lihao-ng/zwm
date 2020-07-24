<form class="" action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
  <!-- @csrf -->

  <div class="row">
    <div class="col">
      <div class="form-group has-label">
        <label>Team Name *</label>
        <input name="name" type="text" placeholder="Team name" class="form-control" value="{{old('name')}}">
      </div>
    </div>

    <div class="col">
      <div class="form-group has-label">
        <label>Team photo </label>
        <input name="cover_image" type="file" placeholder="Upload profile photo" class="form-control">
      </div>
    </div>
    
  </div>


  <div class="row">
    <div class="col">
      <div class="form-group has-label">
        <label>Origin *</label>
        <input name="origin" type="text" placeholder="Origin" class="form-control" value="{{old('origin')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group has-label">
        <label>History *</label>
        <input name="history" type="text" placeholder="History" class="form-control" value="{{old('history')}}">
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
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="form-group has-label">
        <label>Team Number </label>
        <input name="team_n" type="text" placeholder="Team number" class="form-control" value="{{old('team_n')}}">
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
        <label>Qualification </label>
        <input name="qualification" type="text" placeholder="Qualification" class="form-control" value="{{old('qualification')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group has-label">
        <label>Established </label>
        <input name="established" type="text" placeholder="Established" class="form-control" value="{{old('established')}}">
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