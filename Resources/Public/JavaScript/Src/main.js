$(document).ready(function() {
    var e;
    $('a[href*="#"]').click(function() {
        var e = $(this).attr("href");
        return "#" !== e.charAt(0) || (1 === e.length && "#" === e.charAt(0) ? ($("html, body").scrollTop($("#Home").offset().top), !1) : void 0)
    }), jQuery("#slider-img #t3s-headerslider img").each(function() {
        jQuery("#slides ul.slides-container").append(jQuery("<li/>").append(jQuery("<img/>").attr("src", jQuery(this).attr("src"))))
    }), jQuery("#slider-img").remove(), jQuery("#slides").superslides({
        hashchange: !1,
        animation: "fade",
        play: 1e4,
        pagination: !1
    }), $(".menu .nav li").each(function(e) {
        $(this).find("a").attr("href", "#menu" + (e + 1))
    }), $(".mobile-menu li").each(function(e) {
        $(this).find("a").attr("href", "#menu" + (e + 1))
    }), $(".jump-menu").click(function() {
        $("#nav2").toggleClass("active")
    }), $(".nav li a").click(function() {
        var e = $($(this).attr("href")).offset().top;
        return $("html, body").animate({
            scrollTop: e - 75
        }, 500), !1
    }), $(".title-container a").click(function() {
        var e = $($(this).attr("href")).offset().top;
        return $("html, body").animate({
            scrollTop: e - 75
        }, 500), !1
    }), $("#nav2 ul li a").click(function() {
        $("#nav2").removeClass("active")
    }), $(".skill-in").bind("inview", function(t, i) {
        !0 === i && $(this).each(function() {
            e = $(this).attr("title"), $(this).animate({
                width: e + "%"
            }, 2e3)
        })
    }), $(window).scroll(function() {
        $("#s-service").mouseenter(function() {
            $(".skill-in").each(function() {
                e = $(this).attr("title"), $(this).animate({
                    width: e + "%"
                }, 2e3)
            })
        })
    }), $("#powermail_field_fullname").click(function() {
        "FULL NAME" === this.value && (this.value = "")
    }), $("#powermail_field_youremail").click(function() {
        "YOUR EMAIL" === this.value && (this.value = "")
    }), $("#powermail_field_typemessage").click(function() {
        "TYPE MESSAGE" === this.value && (this.value = "")
    }), $("#powermail_field_fullname").blur(function() {
        "" == this.value && (this.value = "FULL NAME")
    }), $("#powermail_field_youremail").blur(function() {
        "" == this.value && (this.value = "YOUR EMAIL")
    }), $("#powermail_field_typemessage").blur(function() {
        "" == this.value && (this.value = "TYPE MESSAGE")
    }), $(".sl-ico").hover(function() {
        $(this).parent().find(".s-roll").addClass("visible")
    }, function() {
        $(this).parent().find(".s-roll").removeClass("visible")
    }), $(".car-prev-2").stop().animate({
        left: "-45px",
        opacity: "0"
    }, "fast"), $(".car-next-2").stop().animate({
        right: "-45px",
        opacity: "0"
    }, "fast"), $(".car-show-2").mouseenter(function() {
        $(".car-prev-2").stop().animate({
            left: "-40px",
            opacity: "1"
        }, "fast"), $(".car-next-2").stop().animate({
            right: "-40px",
            opacity: "1"
        }, "fast")
    }).mouseleave(function() {
        $(".car-prev-2").stop().animate({
            left: "-45px",
            opacity: "0"
        }, "fast"), $(".car-next-2").stop().animate({
            right: "-45px",
            opacity: "0"
        }, "fast")
    }), $("#lang_menu").mouseenter(function() {
        $(this).find("ul#inactive-lang-menu").attr("style", "display:block")
    }).mouseleave(function() {
        $(this).find("ul#inactive-lang-menu").attr("style", "display:none")
    });
    var t = $(".caroussel-list-2 .car-quote").length,
        i = $(".car-quote").width,
        l = t * i;
    $(".caroussel-list-2").css("width", "amplelist2"),
        function() {
            var e = $(".caroussel-list-2 .car-quote").length;
            i = $(".caroussel-2").width(), l = e * i, $(".caroussel-list-2").css("width", l);
            for (var t = document.createDocumentFragment(), a = document.createElement("li"); e--;) t.appendChild(a.cloneNode(!0));
            $(".controller-2 ul").append(t)
        }();
    var a = 0;
    $(".controller-2 ul li:first-child").addClass("selected"), $(".controller-2 ul li").click(function() {
        i = $(".caroussel-2").width(), a = $(this).index(), $(".caroussel-2").stop().animate({
            scrollLeft: i * a
        }, "slow"), $(".controller-2 ul li").removeClass("selected"), $(this).addClass("selected")
    }), $(".car-next-2").click(function() {
        a != $(".controller-2 ul li").size() - 1 && (a++, $(".caroussel-2").stop().animate({
            scrollLeft: i * a
        }, "slow"), $(".controller-2 ul li.selected").removeClass("selected").next().addClass("selected"))
    }), $(".car-prev-2").click(function() {
        0 !== a && (a--, $(".caroussel-2").stop().animate({
            scrollLeft: i * a
        }, "slow"), $(".controller-2 ul li.selected").removeClass("selected").prev().addClass("selected"))
    });
    var n, o, s = $("#i-portfolio");

    function r() {
        var e, t, i;
        e = $(window).width(), t = function() {
            var e = $(window).width(),
                t = 1;
            return e > 1200 ? t = 5 : e > 900 ? t = 4 : e > 600 ? t = 3 : e > 300 && (t = 1), t
        }(), i = Math.floor(e / t), s.find(".element").each(function() {
            $(this).css({
                width: i + "px"
            });
            var e = $(this).find("div").height() / 2 - 49;
            $(this).find("div > span").css({
                margin: e + "px 20px"
            })
        }), s.isotope("reLayout")
    }

    function c() {
        r()
    }
    s.isotope({
        animationEngine: "best-available",
        animationOptions: {
            duration: 200,
            queue: !1
        },
        layoutMode: "fitRows"
    }), $("#filters a").click(function() {
        $("#filters a").removeClass("active"), $(this).addClass("active");
        var e = $(this).attr("data-option-value");
        return s.isotope({
            filter: e
        }), r(), !1
    }), $("#filters a:first").trigger('click'), $(window).bind("resize", function() {
        clearTimeout(n), n = setTimeout(c, 1e3)
    }), jQuery("#i-portfolio img").removeAttr("width").removeAttr("height"), $(".nav").onePageNav({
        begin: function() {
            console.log("start")
        },
        end: function() {
            console.log("stop")
        },
        scrollOffset: 75
    }), $(".ch-grid").click(function() {
        $("html, body").animate({
            scrollTop: $("#project-show").offset().top
        }, 1e3)
    }), $(".image-link").magnificPopup({
        type: "image"
    }), $(".ca-wrapper").magnificPopup({
        delegate: "a",
        type: "image",
        gallery: {
            enabled: !0
        }
    }), o = 1, setInterval(function() {
        $(".main-title ul li").length == o ? ($(".main-title ul li.t-current").removeClass("t-current"), $(".main-title ul li").first().addClass("t-current"), o = 1) : (o++, $(".main-title ul li.t-current").removeClass("t-current").next().addClass("t-current"))
    }, 5e3), s.imagesLoaded(function() {
        r()
    }), r(), $(" #i-portfolio > .ch-grid ").each(function() {
        $(this).hoverdir({
            hoverDelay: 5
        })
    })
}), $(window).scroll(function() {
    $(this).scrollTop() > $("#slides").height() ? $(".header").css({
        position: "fixed",
        top: 0
    }) : $(".header").css({
        position: "relative"
    })
});