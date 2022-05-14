<div class="modal" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabelLarge">Add new user</h4>
            </div>
            <div>
                <form method="post" action="{{ session()->has('update') ? session()->get('update') : route('user_create') }}" name="manage_user_form">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('users.user_form')
                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-md btn-ghost">Cancel</button>
                            <button type="submit" name="user_submit" id="user_submit" class="btn btn-md btn-main">Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>