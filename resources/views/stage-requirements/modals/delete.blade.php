@component('components.themes.default.modal', ['id' => $id])
    Are you sure you wish to delete this Stage Requirement?
    @slot('footer')
        <div class="modal-footer">
            <form action="" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete"/>
                <button type="submit" class="btnDelete btn btn-danger">Delete</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    @endslot
@endcomponent

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery(document).ready(function ($) {
                $('#{{$id}}').on('show.bs.modal', function (event) {
                    const id = $(event.relatedTarget).data('id');
                    $('#{{$id}}').find('form').attr('action', `{{route('stage-requirements.index')}}/${id}`);
                });
            });
        });
    </script>
@endpush
