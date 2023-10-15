@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1 class="h2">
    </div>

<div class="col-lg-8">


    @foreach ($posts as $post)
    
    @if ($post)
    <!-- Kode untuk menampilkan form edit -->

    <form class="mb-3" action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{old('title',$post->title) }}" class="form-control @error('title') is-invalid @enderror" id="title" required autofocus>
                @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-group">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control @error('slug') is-invalid @enderror" id="slug" required autofocus>
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
                      @foreach ($data as $d)
                      @if (old('category_id', $post->category_id)=== $d->id)
                      <option value="{{ $d->id }}" selected>{{ $d->name }}</option>
                     @else
                      <option value="{{ $d->id }}">{{ $d->name }}</option>
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
                  <input type="hidden" name="oldImage" value="{{ $post->image }}">
                  <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                  @enderror" id="body" name="body" rows="7" required autofocus>{{ old('body', $post->body) }}</textarea>
                  @error('body')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
                </div>
      </div>
        <a href="/dashboard/posts" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    @else
    <p>Post tidak ditemukan.</p>
@endif
    @endforeach
</div>
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