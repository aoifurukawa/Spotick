<div class="modal fade" id="content-delete-{{$content->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Content</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
        </div>
        
        <div class="modal-body">
            <p class="fw-bold">{{ $content->title }}</p>
            <p>Do you really want to delete this Post? You can delete this post, because this post desn't have any reservation. </p>
        </div>
        
        <div class="modal-footer">
            <form action="" method="post">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stop</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  