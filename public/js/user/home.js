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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/user/home.js":
/*!***********************************!*\
  !*** ./resources/js/user/home.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

jQuery(document).ready(function () {
  //
  $.noConflict();
});

var Home =
/*#__PURE__*/
function () {
  function Home() {
    _classCallCheck(this, Home);

    this.initEvents();
  }

  _createClass(Home, [{
    key: "initEvents",
    value: function initEvents() {
      this.clickEvent();
    }
  }, {
    key: "clickEvent",
    value: function clickEvent() {
      jQuery(document).on('click', '#user-name-home', this.showSettingForm);
      jQuery(document).on('click', '.like-button', this.likeBook);
      jQuery(document).on('click', '.unlike-button', this.disLike);
    }
  }, {
    key: "showSettingForm",
    value: function showSettingForm() {
      jQuery('.setting-user').toggle();
    }
  }, {
    key: "likeBook",
    value: function likeBook() {
      if (!jQuery('.like-button').hasClass('liked')) {
        var parameter = {
          _token: jQuery('#ip_token').val(),
          book_id: jQuery(this).attr('data-key'),
          emotion: 'LIKE'
        };
        jQuery.ajax({
          method: 'POST',
          url: '/book/react',
          data: JSON.stringify(parameter),
          contentType: "application/json;charset=utf-8",
          dataType: "json",
          success: function success(res) {
            console.log(res);

            if (jQuery('.unlike-button').hasClass('liked')) {
              jQuery('.like-button').addClass('liked');
              jQuery('.unlike-button').removeClass('liked');
              jQuery('#total-like').text(parseInt(jQuery('#total-like').text()) + 1);
              jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text()) - 1);
            } else {
              jQuery('.like-button').addClass('liked');
              jQuery('.unlike-button').removeClass('liked');
              jQuery('#total-like').text(parseInt(jQuery('#total-like').text()) + 1);
            }
          }
        });
      } else {
        var parameter2 = {
          _token: jQuery('#ip_token').val(),
          book_id: jQuery(this).attr('data-key')
        };
        jQuery(home.removeReaction(parameter2));

        if (parseInt(jQuery('#total-like').text()) > 0) {
          jQuery('#total-like').text(parseInt(jQuery('#total-like').text()) - 1);
        }

        jQuery(this).removeClass('liked');
      }
    }
  }, {
    key: "disLike",
    value: function disLike() {
      if (!jQuery('.unlike-button').hasClass('liked')) {
        var parameter = {
          _token: jQuery('#ip_token').val(),
          book_id: jQuery(this).attr('data-key'),
          emotion: 'DISLIKE'
        };
        jQuery.ajax({
          method: 'POST',
          url: '/book/react',
          data: JSON.stringify(parameter),
          contentType: "application/json;charset=utf-8",
          dataType: "json",
          success: function success(res) {
            if (jQuery('.like-button').hasClass('liked')) {
              jQuery('.unlike-button').addClass('liked');
              jQuery('.like-button').removeClass('liked');
              jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text()) + 1);
              jQuery('#total-like').text(parseInt(jQuery('#total-like').text() - 1));
            } else {
              jQuery('.unlike-button').addClass('liked');
              jQuery('.like-button').removeClass('liked');
              jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text()) + 1);
            }
          }
        });
      } else {
        var parameter2 = {
          _token: jQuery('#ip_token').val(),
          book_id: jQuery(this).attr('data-key')
        };
        jQuery(home.removeReaction(parameter2));

        if (parseInt(jQuery('#total-dislike').text()) > 0) {
          jQuery('#total-dislike').text(parseInt(jQuery('#total-dislike').text()) - 1);
        }

        jQuery(this).removeClass('liked');
      }
    }
  }, {
    key: "removeReaction",
    value: function removeReaction(param) {
      jQuery.ajax({
        method: 'POST',
        url: '/book/react/remove',
        data: JSON.stringify(param),
        contentType: "application/json;charset=utf-8",
        dataType: "json",
        success: function success(res) {
          console.log(res);
        }
      });
    }
  }]);

  return Home;
}();

var home = new Home();

/***/ }),

/***/ 2:
/*!*****************************************!*\
  !*** multi ./resources/js/user/home.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\saa_php_lms_01\resources\js\user\home.js */"./resources/js/user/home.js");


/***/ })

/******/ });