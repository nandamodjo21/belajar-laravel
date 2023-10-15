@extends('dashboard.layouts.main')
@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2>{{ $title }}</h2>
  </div>
  
  <div class="table-responsive col-lg-8">
    <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#addModal">
        Tambah
      </button>
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
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
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
           
            <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="POST">
            @csrf
            @method('delete')
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></button>
            </form>
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
        <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title" required autofocus>
                  @error('title')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" id="slug" required autofocus>
                    @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required autofocus>
                        <option selected>--pilih--</option>
                        @foreach ($data as $data)
                        @if (old('category_id')=== $data->id)
                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                       @else
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endif
                        @endforeach
                      </select>
                      @error('category_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="image" class="form-label">Foto</label>
                    <img class="img-preview img-fluid">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" onchange="previewImage()" required>
                    @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  </div>
                    
                  <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control @error('body')
                        is-invalid
                    @enderror" id="body" name="body" rows="3" value="{{ old('body') }}" required autofocus></textarea>
                    @error('body')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  </div>    
       
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  {{-- modal edit  --}}


  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    function previewImage(){
      const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);
    ofReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;

    }
    
    }

    
  </script>
@endsection



  