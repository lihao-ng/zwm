@extends('client.layouts.master')

@section('meta-content')
  <title>Edit Product</title>
@endsection

@section('content')
{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'id' => 'FormValidation', 'enctype' => 'multipart/form-data']) !!}
<div class="row">
    <div class="col">
      <div class="card p-3">
        <div class="card-body">
          <div class="row align-items-end mb-3">
            <div class="col">
              <h3>Edit Accepting Item</h3>
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
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 mb-3">
              <div class="form-group has-label">
                <label>Description</label>
                {!! Form::textarea('description', null, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
              </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Price</label>
                {{ Form::text('price', null, ['id' => 'form-validation', 'class' => 'form-control', 'required' => 'true']) }}
              </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <div class="form-group has-label">
                <label>Photo</label>
                <input name="photo" type="file" placeholder="Upload photo" class="form-control">
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