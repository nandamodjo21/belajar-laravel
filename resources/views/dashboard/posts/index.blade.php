@extends('dashboard.layouts.main')
@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2>{{ $title }}</h2>
  </div>
  
  <div class="table-responsive col-lg-8">
    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addModal">
        Tambah
      </button>
      
       <table class="table table-striped table-sm mt-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Category</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
            
       
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name }}</td>
        <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a>
            <a href="" class="badge bg-warning"> <span data-feather="edit"></span></a>
            <a href="" class="badge bg-danger"> <span data-feather="x-circle"></span></a>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/dashboard/posts" method="post">
            @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" disabled readonly>
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select class="custom-select" name="category_id" id="category_id">
                        <option selected>--pilih--</option>
                        @foreach ($data as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                        
                       
                      </select>
                  </div>    
        </form>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>
@endsection



  