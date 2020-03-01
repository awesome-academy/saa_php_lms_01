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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/user/profile.js":
/*!**************************************!*\
  !*** ./resources/js/user/profile.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

jQuery(document).ready(function () {
  //
  $.noConflict();
});

var Profile =
/*#__PURE__*/
function () {
  function Profile() {
    _classCallCheck(this, Profile);

    this.initEvents();
  }

  _createClass(Profile, [{
    key: "initEvents",
    value: function initEvents() {
      this.clickEvent();
    }
  }, {
    key: "clickEvent",
    value: function clickEvent() {
      jQuery(document).on('click', '.followers-tab', this.followerTabClick);
      jQuery(document).on('click', '.followings-tab', this.followingTabClick);
      jQuery(document).on('click', '.likes-tab', this.likeTabClick);
      jQuery(document).on('click', '.button-follow', this.followButtonClick);
    }
  }, {
    key: "followerTabClick",
    value: function followerTabClick() {
      jQuery(this).addClass('active');
      jQuery('.list-followers').show();
      jQuery('.list-liked-book').hide();
      jQuery('.list-following').hide();
      jQuery('.followings-tab').removeClass('active');
      jQuery('.likes-tab').removeClass('active');
    }
  }, {
    key: "followingTabClick",
    value: function followingTabClick() {
      jQuery(this).addClass('active');
      jQuery('.list-followers').hide();
      jQuery('.list-following').show();
      jQuery('.list-liked-book').hide();
      jQuery('.followers-tab').removeClass('active');
      jQuery('.likes-tab').removeClass('active');
    }
  }, {
    key: "likeTabClick",
    value: function likeTabClick() {
      jQuery(this).addClass('active');
      jQuery('.list-followers').hide();
      jQuery('.list-following').hide();
      jQuery('.list-liked-book').show();
      jQuery('.followings-tab').removeClass('active');
      jQuery('.followers-tab').removeClass('active');
    }
  }, {
    key: "followButtonClick",
    value: function followButtonClick() {
      var parameter = {
        _token: jQuery('#ip_token').val(),
        following_id: jQuery('#input-us-id').val()
      };
      jQuery('.icon-checked').toggleClass('appear')
      if (jQuery('.icon-checked').hasClass('appear')) {
        jQuery.ajax({
          method: 'POST',
          url: '/user/follow',
          data: JSON.stringify(parameter),
          contentType: "application/json;charset=utf-8",
          dataType: "json",
          success: function success(res) {
            console.log(res,1);
            // jQuery('.button-follow').addClass('followed');
            jQuery('.button-follow i').show();
          }
        });
      } else {
        jQuery.ajax({
          method: 'POST',
          url: '/user/unfollow',
          data: JSON.stringify(parameter),
          contentType: "application/json;charset=utf-8",
          dataType: "json",
          success: function success(res) {
            console.log(res);
            jQuery('.button-follow i').hide();
          }
        });
      }
    }
  }]);

  return Profile;
}();

var profile = new Profile();

/***/ }),

/***/ 4:
/*!********************************************!*\
  !*** multi ./resources/js/user/profile.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\saa_php_lms_01\resources\js\user\profile.js */"./resources/js/user/profile.js");


/***/ })

/******/ });