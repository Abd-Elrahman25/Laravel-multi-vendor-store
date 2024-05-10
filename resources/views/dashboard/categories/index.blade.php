@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')

  @if(session()->has('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif

  @if(session()->has('info'))
  <div class="alert alert-info">
      {{ session('info') }}
  </div>
  @endif

    <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>

    <br><br>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Created at</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <form method="post" action="{{ route('categories.destroy', $category->id) }}" onsubmit="return confirmDelete()">
                            @csrf
                            @method('delete')
                            <button  type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No categories identified</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        function confirmDelete() {
            var isConfirmed = confirm("Are you sure you want to delete?");
            return isConfirmed;
        }
    </script>
@endsection
