$(document).ready(function () {
    if ($('#addUserModal .error-input').length > 0) {
        $('#addUserModal').modal('show');
    }
})

function getAjaxUserFormError(error) {
    let modalBod = $('[name="manage_user_form"] .modal-body');
    modalBod.empty();

    const errorMessage = '<p class="error-load-message text-center">User management form was not able to load.</p>';
    modalBod.html(errorMessage);

    $('#addUserModal').modal('show');
    $('#addUserModal .modal-footer').prop('hidden', false);
}

function getAjaxUserFormSuccess(data, form_url) {
    var modalBod = $('[name="manage_user_form"] .modal-body');
    modalBod.empty();
    modalBod.html(data.data);

    $('#addUserModal').modal('show');
    $('#addUserModal .modal-footer').prop('hidden', false);
    $('#addUserModal [name="manage_user_form"]').prop('action', form_url);
}

function getUserForm(ajax_url, form_url, data) {
    $.ajax({
        type: 'POST',
        data: data,
        url: ajax_url,
        success: function (response) {
            getAjaxUserFormSuccess(response, form_url)
        },
        error: getAjaxUserFormError
    });
}

function manageUserEditForm() {
    const userEditRoute = $(this).data('user-edit-route');
    const userId = $(this).data('user-id');
    const token = $('form[name="manage_user_form"] [name="_token"]').val();
    const sendingData = {
        userId: userId,
        _token: token
    };

    getUserForm('/ajax-edit-form', userEditRoute, sendingData);
}

function manageUserCreateForm() {
    const newEditRoute = $(this).data('user-create-route');
    const token = $('form[name="manage_user_form"] [name="_token"]').val();
    const sendingData = {
        _token: token
    };

    getUserForm('/ajax-new-form', newEditRoute, sendingData);
}

function manageUserDelete() {
    const userDeleteRoute = $(this).data('user-delete-route');

    $('#deleteUserModal').modal('show');
    $('#deleteUserModal [name="delete-user-form"]').prop('action', userDeleteRoute);
}

$(document).on('click', '.edit-user', manageUserEditForm);
$(document).on('click', '.new-user', manageUserCreateForm)
$(document).on('click', '.delete-user', manageUserDelete)
