var host = $("meta[name='home_url']").attr("content");
var host_country = $("meta[name='country']").attr("content");
lazyload = 0;
$(document).ready(function () {
    $("#loading").css({ display: "none" }),
        $(window).scroll(function () {
            $(document).scrollTop() > 70 ? $(".navbar").addClass("navbar-shadow") : $(".navbar").removeClass("navbar-shadow");
        }),
        $(document).on("click", ".grap_deal_close_btn", function () {
            $("#ShowCouponModal").modal("hide");
        }),
        $(".dropdown-item").click(function () {
            $(".mob-nav .dropdown-menu").removeClass("show"), $(this).siblings(".dropdown-menu").toggleClass("show");
        }),
        $(document).on("focusout", ".mob-main-search", function () {
            setTimeout(function () {
                $(".mobile-nav-button").removeClass("active"), $(".nav-tray").css({ height: "0px" }), $(".tray-search").css({ display: "none" });
            }, 500);
        }),
        $(document).on("click", ".mobile-nav-button", function () {
            $(".tray-item").css({ display: "none" });
            var s = $(this).data("option");
            "search" == s
                ? $(this).hasClass("active")
                    ? (console.log(s), $(this).removeClass("active"), $(".nav-tray").css({ height: "0px" }), $(".tray-search").css({ display: "none" }))
                    : ($(".tray-search").css({ display: "block" }), $(".nav-tray").css({ height: "60px" }), $(".mobile-nav-button").removeClass("active"), $(this).addClass("active"), $(".mob-main-search").focus())
                : "emirates" == s &&
                  ($(this).hasClass("active")
                      ? ($(this).removeClass("active"), $(".nav-tray").css({ height: "0px" }), $(".tray-emirates").css({ display: "none" }))
                      : ($(".tray-emirates").css({ display: "flex" }), $(".nav-tray").css({ height: "65px" }), $(".mobile-nav-button").removeClass("active"), $(this).addClass("active")));
        }),
        $(document).on("submit", "#create_user_form", function (s) {
            $('.signup-loader').css({display: 'flex'});
            var e = $(this),
                t = new FormData($("#create_user_form")[0]);
            $(".errors").css({ display: "none" }),
                $.ajax({ type: "POST", url: e.attr("action"), data: t, dataType: "json", encode: !0, processData: !1, contentType: !1 })
                    .done(function (s) {
                        "success" == s.success
                            ? (Toast.fire({ icon: "success", title: s.message }),
                              setTimeout(function () {
                                  location.reload();
                              }, 700))
                            : Toast.fire({ icon: "error", title: s.errors });
                            $('.signup-loader').css({display: 'none'});
                    })
                    .fail(function (s) {
                        $('.signup-loader').css({display: 'none'});
                        for (let [e, t] of Object.entries(s.responseJSON.errors))
                            $("." + e + "_error")
                                .css({ display: "flex" })
                                .html(t);
                    }),
                s.preventDefault();
        }),
        $(document).on("submit", "#login_user_form", function (s) {
            $('.signin-loader').css({display: 'flex'});
            var e = $(this),
                t = new FormData($("#login_user_form")[0]);
            $(".errors").css({ display: "none" }),
                $.ajax({ type: "POST", url: e.attr("action"), data: t, dataType: "json", encode: !0, processData: !1, contentType: !1 })
                    .done(function (s) {
                        "success" == s.success
                            ? (Toast.fire({ icon: "success", title: s.message }),
                              setTimeout(function () {
                                  location.reload();
                              }, 700))
                            : $(".password_error_l").css({ display: "flex" }).html(s.message);
                            $('.signin-loader').css({display: 'none'});
                    })
                    .fail(function (s) {
                        $('.signup-loader').css({display: 'none'});
                        for (let [e, t] of Object.entries(s.responseJSON.errors))
                            $("." + e + "_error_l")
                                .css({ display: "flex" })
                                .html(t);
                    }),
                s.preventDefault();
        }),
        $(document).on("submit", "#forgotPasswordForm", function (s) {
            var e = $(this),
                t = new FormData($("#forgotPasswordForm")[0]);
            $(".errors").css({ display: "none" }),
                $(".btn-content").html($(".sub-btn").html()),
                $(".sub-btn").html('<img src="../public/loader.gif" style="width:14px; margin:0 25px;">').prop("disabled", !0),
                $.ajax({ type: "POST", url: e.attr("action"), data: t, dataType: "json", encode: !0, processData: !1, contentType: !1 })
                    .done(function (s) {
                        "success" == s.success
                            ? (Toast.fire({ icon: "success", title: s.message }),
                              setTimeout(function () {
                                  location.reload();
                              }, 700))
                            : ($(".sub-btn").html($(".btn-content").html()).prop("disabled", !1), $(".email_error_f").css({ display: "flex" }).html(s.message));
                    })
                    .fail(function (s) {
                        for (let [e, t] of ($(".sub-btn").html($(".btn-content").html()).prop("disabled", !1), Object.entries(s.responseJSON.errors)))
                            $("." + e + "_error_f")
                                .css({ display: "flex" })
                                .html(t);
                    }),
                s.preventDefault();
        }),
        $(document).on("submit", "#resetPasswordForm", function (s) {
            var e = $(this),
                t = new FormData($("#resetPasswordForm")[0]);
            $(".errors").css({ display: "none" }),
                $.ajax({ type: "POST", url: e.attr("action"), data: t, dataType: "json", encode: !0, processData: !1, contentType: !1 })
                    .done(function (s) {
                        Toast.fire({ icon: "success", title: s.message }),
                            setTimeout(function () {
                                window.location.href = host;
                            }, 700);
                    })
                    .fail(function (s) {
                        for (let [e, t] of (console.log(s), Object.entries(s.responseJSON.errors)))
                            $("." + e + "_error")
                                .css({ display: "flex" })
                                .html(t + "<br>");
                    }),
                s.preventDefault();
        });
});
$(window).scroll(function (s) {
    var e = $(window).scrollTop();
    if (lazyload == 0 && e > 150) {
        getFooter();
        lazyload = 1;
    }
});
function getStates() {
    $.get(host + "/home/getStates/1", function (data) {
        $(".tray-emirates").html(data);
    });
}
function getFooter() {
    $.get(host + "/includes/getFooter", function (data) {
        $("#footer").html(data);
    });
}

$(document).ready(function () {
    checkLocation();

    $(document).on("click", ".accordion-item button", function () {
        if ($(this).attr("aria-expanded") == "true") {
            $(this).attr("aria-expanded", "false");
        } else {
            $(this).attr("aria-expanded", "true");
        }
    });

    //Sell With DCM
    $(document).on("submit", "#newsletterForm", function (event) {
        var form = $(this);
        var formData = new FormData($("#newsletterForm")[0]);
        $(".errors").css({ display: "none" });
        $(".newsletter-loader").css({ display: "block" });
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: formData,
            dataType: "json",
            encode: true,
            processData: false,
            contentType: false,
        })
            .done(function (data) {
                if (data.success == "success") {
                    Toast.fire({
                        icon: "success",
                        title: data.message,
                    });

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    $(".newsletter_error").css({ display: "flex" }).html(data.message);
                }
                $(".newsletter-loader").css({ display: "none" });
            })
            .fail(function (e) {
                $(".newsletter-loader").css({ display: "none" });
                $(".newsletter_error").css({ display: "flex" }).html(e.message);
            });

        event.preventDefault();
    });

    $(document).on("click", ".stayLocationBtn", function () {
        var loc = $(this).data("location");
        document.cookie = "cookieBy= DCM-" + loc + "; max-age=" + 60 * 60 * 24 * 30;

        $("#locationModal").modal("hide");
    });

    $(document).on("click", ".proceedLocationBtn", function () {
        var loc = $(this).data("location");
        var loclink = $(this).data("loclink");
        document.cookie = "cookieBy= DCM-" + loc + "; max-age=" + 60 * 60 * 24 * 30;
        //console.log(loclink);
        window.location.href = loclink;
    });
});

function checkLocation() {
    $.get(host + "/getLocation", function (data) {
        //console.log(data);
        if (data != "pass") {
            if (document.cookie.includes("DCM-" + host_country)) {
            } else {
                $("#locationModal .modal-body").html(data);
                $("#locationModal").modal("show");
            }
        }
    });
}
