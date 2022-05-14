/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/user_modal.js":
/*!*******************************************!*\
  !*** ./resources/assets/js/user_modal.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  if ($('#addUserModal .error-input').length > 0) {
    $('#addUserModal').modal('show');
  }
});

function getAjaxUserFormError(error) {
  var modalBod = $('[name="manage_user_form"] .modal-body');
  modalBod.empty();
  var errorMessage = '<p class="error-load-message text-center">User management form was not able to load.</p>';
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
    success: function success(response) {
      getAjaxUserFormSuccess(response, form_url);
    },
    error: getAjaxUserFormError
  });
}

function manageUserEditForm() {
  var userEditRoute = $(this).data('user-edit-route');
  var userId = $(this).data('user-id');
  var token = $('form[name="manage_user_form"] [name="_token"]').val();
  var sendingData = {
    userId: userId,
    _token: token
  };
  getUserForm('/ajax-edit-form', userEditRoute, sendingData);
}

function manageUserCreateForm() {
  var newEditRoute = $(this).data('user-create-route');
  var token = $('form[name="manage_user_form"] [name="_token"]').val();
  var sendingData = {
    _token: token
  };
  getUserForm('/ajax-new-form', newEditRoute, sendingData);
}

function manageUserDelete() {
  var userDeleteRoute = $(this).data('user-delete-route');
  $('#deleteUserModal').modal('show');
  $('#deleteUserModal [name="delete-user-form"]').prop('action', userDeleteRoute);
}

$(document).on('click', '.edit-user', manageUserEditForm);
$(document).on('click', '.new-user', manageUserCreateForm);
$(document).on('click', '.delete-user', manageUserDelete);

/***/ }),

/***/ 1:
/*!*************************************************!*\
  !*** multi ./resources/assets/js/user_modal.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\13laa\Documents\Systems\developer-test\task1\UserRegistry\resources\assets\js\user_modal.js */"./resources/assets/js/user_modal.js");


/***/ })

/******/ });