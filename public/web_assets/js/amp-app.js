var host = $("meta[name='home_url']").attr("content");
var lazyload = 0;
/*var Toast = Swal.mixin({toast: true, position: "top-end", showConfirmButton: false, timer: 2e3});*/
function getStates() {
  $.get(host + "/home/getStates/1", function (t) {
    $(".tray-emirates").html(t);
  });
}
function getFooter() {
  $.get(host + "/includes/getFooter", function (t) {
    $("#footer").html(t);
  });
}
$(document).ready(function () {
  getStates();
  $(document).on("keyup", ".mob-main-search", function () {
    var t = $(this).val();
    if (t == "") {
      $(".mob-main-search-result").html("");
      $(".nav-tray").css({overflow: "hidden"});
    } else {
      $(".mob-main-search-result").html("<img src='{{URL::to('/public/loader-gif.gif')}}' height='25px'/>");
      $.get(host + "/search/" + t, function (t) {
        $(".nav-tray").css({overflow: "visible"});
        $(".mob-main-search-result").html(t);
      });
    }
  });
  $(document).on("click", ".grap_deal_close_btn", function () {
    $("#ShowCouponModal").modal("hide");
  });
  $(".dropdown-item").click(function () {
    $(".mob-nav .dropdown-menu").removeClass("show");
    $(this).siblings(".dropdown-menu").toggleClass("show");
  });
  $(document).on("focusout", ".mob-main-search", function () {
    setTimeout(function () {
      $(".mobile-nav-button").removeClass("active");
      $(".nav-tray").css({height: "0px"});
      $(".tray-search").css({display: "none"});
    }, 500);
  });
  $(document).on("click", ".mobile-nav-button", function () {
    $(".tray-item").css({display: "none"});
    var t = $(this).data("option");
    if (t == "search") {
      if ($(this).hasClass("active")) {
        console.log(t);
        $(this).removeClass("active");
        $(".nav-tray").css({height: "0px"});
        $(".tray-search").css({display: "none"});
      } else {
        $(".tray-search").css({display: "block"});
        $(".nav-tray").css({height: "60px"});
        $(".mobile-nav-button").removeClass("active");
        $(this).addClass("active");
        $(".mob-main-search").focus();
      }
    } else if (t == "emirates") {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".nav-tray").css({height: "0px"});
        $(".tray-emirates").css({display: "none"});
      } else {
        $(".tray-emirates").css({display: "flex"});
        $(".nav-tray").css({height: "65px"});
        $(".mobile-nav-button").removeClass("active");
        $(this).addClass("active");
      }
    }
  });
  $(document).on("submit", "#create_user_form", function (t) {
    var e = $(this);
    var s = new FormData($("#create_user_form")[0]);
    $(".errors").css({display: "none"});
    $.ajax({type: "POST", url: e.attr("action"), data: s, dataType: "json", encode: true, processData: false, contentType: false}).done(function (t) {
      if (t.success == "success") {
        Toast.fire({icon: "success", title: t.message});
        setTimeout(function () {
          location.reload();
        }, 700);
      } else {
        Toast.fire({icon: "error", title: t.errors});
      }
    }).fail(function (t) {
      for (let [e, s] of Object.entries(t.responseJSON.errors)) {
        $("." + e + "_error").css({display: "flex"}).html(s);
      }
    });
    t.preventDefault();
  });
  $(document).on("submit", "#login_user_form", function (t) {
    var e = $(this);
    var s = new FormData($("#login_user_form")[0]);
    $(".errors").css({display: "none"});
    $.ajax({type: "POST", url: e.attr("action"), data: s, dataType: "json", encode: true, processData: false, contentType: false}).done(function (t) {
      if (t.success == "success") {
        Toast.fire({icon: "success", title: t.message});
        setTimeout(function () {
          location.reload();
        }, 700);
      } else {
        $(".password_error_l").css({display: "flex"}).html(t.message);
      }
    }).fail(function (t) {
      for (let [e, s] of Object.entries(t.responseJSON.errors)) {
        $("." + e + "_error_l").css({display: "flex"}).html(s);
      }
    });
    t.preventDefault();
  });
  $(document).on("submit", "#forgotPasswordForm", function (t) {
    var e = $(this);
    var s = new FormData($("#forgotPasswordForm")[0]);
    $(".errors").css({display: "none"});
    $(".btn-content").html($(".sub-btn").html());
    $(".sub-btn").html('<img src="../public/loader.gif" style="width:14px; margin:0 25px;">').prop("disabled", true);
    $.ajax({type: "POST", url: e.attr("action"), data: s, dataType: "json", encode: true, processData: false, contentType: false}).done(function (t) {
      if (t.success == "success") {
        Toast.fire({icon: "success", title: t.message});
        setTimeout(function () {
          location.reload();
        }, 700);
      } else {
        $(".sub-btn").html($(".btn-content").html()).prop("disabled", false);
        $(".email_error_f").css({display: "flex"}).html(t.message);
      }
    }).fail(function (t) {
      for (let [e, s] of ($(".sub-btn").html($(".btn-content").html()).prop("disabled", false), Object.entries(t.responseJSON.errors))) {
        $("." + e + "_error_f").css({display: "flex"}).html(s);
      }
    });
    t.preventDefault();
  });
  $(document).on("submit", "#resetPasswordForm", function (t) {
    var e = $(this);
    var s = new FormData($("#resetPasswordForm")[0]);
    $(".errors").css({display: "none"});
    $.ajax({type: "POST", url: e.attr("action"), data: s, dataType: "json", encode: true, processData: false, contentType: false}).done(function (t) {
      Toast.fire({icon: "success", title: t.message});
      setTimeout(function () {
        window.location.href = host;
      }, 700);
    }).fail(function (t) {
      for (let [e, s] of (console.log(t), Object.entries(t.responseJSON.errors))) {
        $("." + e + "_error").css({display: "flex"}).html(s + "<br>");
      }
    });
    t.preventDefault();
  });
  
  $("#loading").css({display: "none"});
});
$(window).scroll(function (t) {
  var e = $(window).scrollTop();
  console.log(e);
  if (lazyload == 0 && e > 400) {
    getFooter();
    lazyload = 1;
  }
});
$(document).ready(function () {
  $(document).on("click", ".accordion-item button", function () {
    if ($(this).attr("aria-expanded") == "true") {
      $(this).attr("aria-expanded", "false");
    } else {
      $(this).attr("aria-expanded", "true");
    }
  });
});
const signUpButton = document.getElementsByClassName("signUp")[0];
const signInButton = document.getElementsByClassName("signIn")[0];
const signUpCon = document.getElementsByClassName("sign-up-modal_container")[0];
const modal_container = document.getElementById("modal_container");
signUpButton.addEventListener("click", () => {
  modal_container.classList.add("right-panel-active");
  signInButton.classList.remove("act");
  signUpButton.classList.add("act");
  signUpCon.style.zIndex = "999";
});
signInButton.addEventListener("click", () => {
  modal_container.classList.remove("right-panel-active");
  signUpButton.classList.remove("act");
  signInButton.classList.add("act");
  signUpCon.style.zIndex = "1";
});
