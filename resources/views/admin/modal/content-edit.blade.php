<div class="modal fade" id="content-edit-{{$content->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Content</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
        </div>
        
        <div class="modal-body">
            <p class="fw-bold">{{ $content->title }}</p>
            <label for="content_name" class="form-label">New label name</label>
            <input type="text" name="name" id="content_name" class="form-control" value="{{ old('name', $content->name) }}">
        </div>
        
        <div class="modal-footer">
            <form action="{{ route('admin.content.update', $content->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stop</button>
                <button type="submit" class="btn btn-danger">Update</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  