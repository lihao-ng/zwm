@extends('client.layouts.master')

@section('meta-content')
  <title>Edit Category</title>
@endsection

@section('content')
{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
<div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Edit Category</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Name</label>
                {{ Form::text('name', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col text-right">
              <button type="submit" value="Submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{!! Form::close() !!}
@endsection