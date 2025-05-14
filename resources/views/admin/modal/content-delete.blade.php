<div class="modal fade" id="content-delete-{{$content->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Content</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
        </div>
        
        <div class="modal-footer">
            <form action="{{ route('admin.content.destroy', $content->id) }}" method="post">
                @csrf
                @method('DELETE')
                <p class="fw-bold">{{ $content->title }}</p>
                <p>Do you really want to delete this Content? The Event that already posted will be categorized as "Uncategorized". </p>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Stop</button>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  