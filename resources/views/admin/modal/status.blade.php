@if ($sponsor->trashed())
    {{-- activate--}}
    <div class="modal fade" id="activate-user-{{$sponsor->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-user-checked"></i> Activate User
                </h3>
            </div>

        <div class="modal-body">
            Are you sure you want to activate <span class="fw-bold">{{$sponsor->name}}</span>
        </div>
            <div class="modal-footer border-0">
                <form action="{{ route('admin.sponsor.activate', $sponsor->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
    {{-- deactivate--}}
    <div class="modal fade" id="deactivate-user-{{$sponsor->id}}">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-user-slash"></i> Deactivate User
                    </h3>
                </div>

            <div class="modal-body">
                Are you sure you want to deactivate <span class="fw-bold">{{$sponsor->name}}</span>
            </div>
                <div class="modal-footer border-0">
                    <form action="{{ route('admin.sponsor.deactivate', $sponsor->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif








