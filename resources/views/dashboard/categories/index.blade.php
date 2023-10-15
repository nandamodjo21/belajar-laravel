@extends('dashboard.layouts.main')
@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h2>{{ $title }}</h2>
  </div>
  
  <div class="table-responsive col-lg-8">
    <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#addCategoryModal">
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
          <th>Category Name</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $categories)
            
       
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $categories->name }}</td>

        <td>
            <a href="/dashboard/categories/{{ $categories->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a>
            <a href="/dashboard/categories/{{ $categories->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
           
            <form action="/dashboard/categories/{{ $categories->slug }}" class="d-inline" method="POST">
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

  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">{{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/dashboard/posts" method="POST">
          @csrf
        <div class="modal-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" required autofocus>
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



  