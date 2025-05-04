<!-- モーダル -->
<div class="modal fade" id="delete-{{$reservation->post->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Cancel Your Reservation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
        </div>
        
        <div class="modal-body">
            <p class="fw-bold">{{ $reservation->post->title }}</p>
            <p>Do you really want to cancel this reservation? Please note that cancellations are non-refundable </p>
        </div>
        
        <div class="modal-footer">
            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stop</button>
                <button type="submit" class="btn btn-danger">Cancel</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  