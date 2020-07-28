@extends('admin.layouts.master')

@section('meta-content')
  <title>Edit Guide</title>
@endsection

@section('content')
{!! Form::model($guide, ['route' => ['admin.guides.update', $guide->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
  <div class="row">
    <div class="col-12 pull-left mb-3">
      <a href="{{ route('admin.guides.index') }}" class="btn back-btn">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>  
    </div>

    <div class="col-12">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Edit Guide</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Name</label>
                {{ Form::text('name', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Category</label>
                {{ Form::select('category', [
                  "Metal" => "Metal", 
                  "Plastic" => "Plastic",
                  "Paper" => "Paper",
                  "Fabric" => "Fabric",
                  "Glass" => "Glass",
                  "E-Waste" => "E-Waste"
                  ], null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Photo</label>
                <input name="photo" type="file" placeholder="Upload photo" class="form-control">
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Description</label>
                {!! Form::textarea('description', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Recyclable</label>
                {{ Form::select('recyclable', [
                  'Yes' => 'Yes', 
                  'No' => 'No'
                  ], null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Upcycle/Alternatives</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Photo</label>
                <input name="photo_upcycling" type="file" placeholder="Upload photo" class="form-control">
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Description</label>
                {!! Form::textarea('description_upcycling', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
              </div>
            </div>
          </div>
          
          <div class="row pt-3">
            <div class="col text-right">
              <button type="submit" value="Submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection