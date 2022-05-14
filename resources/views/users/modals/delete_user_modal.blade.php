<div class="modal" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="modalLabelLarge">Confirm delete</h4>
            </div>
            <form method="post" action="" name="delete-user-form">
                {{ csrf_field() }}

                <div class="modal-body">
                    <p class="confirm-delete-text">Please confirm that you would like to delete this user.</p>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button data-dismiss="modal" aria-label="Close" class="btn btn-md btn-ghost">Cancel</button>
                        <button type="submit" name="user_delete" id="user_delete" class="btn btn-md btn-main">Confirm</button>
                        <input type="hidden" value="" name="user_id" id="user_id">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>