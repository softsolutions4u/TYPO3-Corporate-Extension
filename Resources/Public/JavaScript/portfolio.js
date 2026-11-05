"use strict";
$(document).ready(function() {
    var $actual = null;
    var obert = false;
    $(".ch-grid").click(function() {
        obre($(this).data('id'));
        $actual = $(this);
        scrollToParent();
    });
    $(".folio-btn").click(function() {
        $(".project-window").slideUp("slow");
        obert = false;
    });
    obre('portfolio-1', 1);

    function obre(quin, dummy) {
        var data = $('#' + quin).html();
        $('.project-content').html(data);
        $(".project-content").hide(0)
        $('.project-window').hide(0)
        tanca();
        canvia();
        worksCarousel();
        if (dummy != 1) {
            $("html, body").animate({
                scrollTop: $('#portfolio').offset().top
            }, 300, function() {
                $('.project-window').show(0);
                $('.project-window').animate({
                    height: 900
                }, 500, function() {
                    $('.project-window').css('height', 'auto');
                    $(".project-content").fadeIn("slow");
                });
            });
        }
    }

    function tanca() {
        $(".project-content .close").click(function() {
            $(".project-window").slideUp("slow");
            $("html, body").animate({
                scrollTop: $('#portfolio').offset().top
            }, 1000);
            obert = false;
        });
    }

    function seguent() {
        if ($actual.next().hasClass('final')) {
            $actual = $($('.inici').next());
        } else {
            $actual = $($actual.next());
        }
        if ($actual.hasClass('isotope-hidden')) {
            seguent();
        } else {
            obre($actual.data('id'));
        }
    }

    function enrera() {
        if ($actual.prev().hasClass('inici')) {
            $actual = $($('.final').prev());
        } else {
            $actual = $($actual.prev());
        }
        if ($actual.hasClass('isotope-hidden')) {
            enrera();
        } else {
            obre($actual.data('id'));
        }
    }

    function canvia() {
        $('.project-content .btn-next').click(function() {
            seguent();
            $("html, body").animate({
                scrollTop: $('#project-show').offset().top
            }, 1000);
        });
        $('.project-content .btn-prev').click(function() {
            enrera();
            $("html, body").animate({
                scrollTop: $('#project-show').offset().top
            }, 1000);
        });
    }
    $('#portfolio .project-content .w-arrows div').on("click", function() {
        var targetOffset = $('#portfolio').offset().top;
        $('html, body').animate({
            scrollTop: targetOffset
        }, 500);
        return false;
    });

    function scrollToParent() {
        $("html, body").animate({
            scrollTop: $('#project-show').offset().top
        }, 1000);
    }

    function worksCarousel() {
        var totalWorks = $(".project-content .wrapper-project ul li").length;
        var ampleWork = $(".project-content").width();
        var ampleTotalWorks = totalWorks * ampleWork;
        $('.project-content .wrapper-project ul').css('width', ampleTotalWorks)
        var fragment = document.createDocumentFragment(),
            li = document.createElement('li');
        while (totalWorks--) {
            fragment.appendChild(li.cloneNode(true));
        }
        console.log(fragment);
        $('.project-content .controller-3 ul').append(fragment);
        var index3 = 0;
        var pos3 = 1;
        $('.project-content .controller-3 ul li:first-child').addClass('selected');
        $(".project-content .controller-3 ul li").click(function() {
            index3 = $(this).index();
            $(".project-content .wrapper-project").stop().animate({
                scrollLeft: ampleWork * index3
            }, 'slow');
            $('.project-content .controller-3 ul li').removeClass('selected');
            $(this).addClass('selected');
        });
        $(".project-content .w-next").click(function() {
            if (index3 != $(".project-content .controller-3 ul li").size() - 1) {
                index3++;
                $(".project-content .wrapper-project").stop().animate({
                    scrollLeft: ampleWork * index3
                }, 'slow');
                pos3++;
                $('.project-content .controller-3 ul li.selected').removeClass('selected').next().addClass('selected');
            }
        });
        $(".project-content .w-prev").click(function() {
            if (index3 != 0) {
                index3--;
                $(".project-content .wrapper-project").stop().animate({
                    scrollLeft: ampleWork * index3
                }, 'slow');
                pos3--;
                $('.project-content .controller-3 ul li.selected').removeClass('selected').prev().addClass('selected');
            }
        });
    }
});