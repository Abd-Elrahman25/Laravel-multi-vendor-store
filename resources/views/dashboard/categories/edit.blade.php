@extends('layouts.dashboard')

@section('title','Edit-category')

@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Categories</li>
  <li class="breadcrumb-item active">Edit Category</li>
@endsection



@section('content')


<form method="post" action="{{ route('categories.update',$category->id) }}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="" class="form-label">Category name</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Category parent</label>
        <select name="parent_id" class="form-select" aria-label="Default select example">
            <option value="">Parent category</option>
            @foreach ($parents as $parent )
                <option value="{{ $parent->id }}"  @selected($category->parent_id == $parent->id )>{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="mb-3">
        <label for="">Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="active" @checked($category->status == 'active')>
            <label class="form-check-label">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="archived" @checked($category->status == 'archived') >
            <label class="form-check-label" >
              Archived
            </label>
          </div>
    </div>

      <div>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

</form>


@endsection