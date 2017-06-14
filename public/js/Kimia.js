/**
 * Created by Kimia on 3/11/2017.
 */

// ellipsis
function ellipsizeTextBox(id) {
    var el = document.getElementsByClassName(id);
    for (var i = 0, len = el.length; i < len; i++) {
        var wordArray = el[i].innerHTML.split(' ', 100);
        while (el[i].scrollHeight > el[i].offsetHeight) {
            wordArray.pop();
            el[i].innerHTML = wordArray.join(' ') + '...';
        }
    }
}

ellipsizeTextBox("description");
// end of ellipsis


// google map
function initialize()
{
    var latlng = new google.maps.LatLng(18.520266,73.856406);
    var latlng2 = new google.maps.LatLng(28.579943,77.330006);
    var myOptions =
        {
            zoom: 15,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

    var myOptions2 =
        {
            zoom: 15,
            center: latlng2,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        };

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var map2 = new google.maps.Map(document.getElementById("map_canvas_2"), myOptions2);

    var myMarker = new google.maps.Marker(
        {
            position: latlng,
            map: map,
            title:"Pune"
        });

    var myMarker2 = new google.maps.Marker(
        {
            position: latlng2,
            map: map2,
            title:"Noida"
        });
}
// end of google map


// message modal
var modal = document.getElementsByClassName('myModal');

var btn = document.getElementsByClassName("myBtn");

var span = document.getElementsByClassName("close");

for (var i = 0, len = btn.length; i < len; i++) {
    btn[i].onclick = function (event) {
        var source = event.target || event.srcElement;
        $("#"+$(source).attr('modal-target')).css('display','block');

    };

    span[i].onclick = function () {
        for (var k = 0, len3 = modal.length; k < len3; k++) {
            modal[k].style.display = "none";
        }
    };
}

window.onclick = function(event) {
    for (var i = 0, len = modal.length; i < len; i++) {
        if (event.target == modal[i]) {
            modal[i].style.display = "none";
        }
    }
};
// end of message modal


// profile pic
var main_bar = $('.profile-main');
var side_bar = $('.profile-sidebar');
if (side_bar.length) {
    var fixmeTop = side_bar.offset().top;
}
var header = $('.sticky-menu');

$(window).scroll(function() {


    // parseInt($('.sticky-menu').css('height')
    var currentScroll = $(window).scrollTop();
    // console.log(currentScroll+(parseInt(side_bar.css('top')) + parseInt(side_bar.css('height'))) + ' this ');
    // console.log($('footer').position().top);
    if (currentScroll >= fixmeTop && window.innerWidth > 767) {
        side_bar.css({
            position: 'fixed',
            top: '90px',
            left: main_bar.position().left + main_bar.width() + parseInt(main_bar.css('margin-right')) + 'px'
        });
        main_bar.css({
            float: 'left'
        });
    }
    if ((currentScroll+(parseInt(side_bar.css('top')) + parseInt(side_bar.css('height'))))> ($('footer').position().top)
        && window.innerWidth > 767) {
        // console.log('this should work');
        side_bar.css({
            position: 'absolute',
            top: $('footer').position().top - parseInt(side_bar.css('height')) + 'px',
            left: main_bar.position().left + main_bar.width() + parseInt(main_bar.css('margin-right')) + 'px'
        });
    }
    if (currentScroll < fixmeTop && window.innerWidth > 767){
        side_bar.css({
            position: 'static'
        });
    }

});
// end of profile pic


// profile info part
var inp = $('.info-form-input');

var ed = $('#edit').click(function () {
    inp.removeAttrs('disabled');
    $('.confirm-button').css('display','inline-block');
    $('#edit').css('display','none');
});

var conf = $('.confirm-button').click( function () {
        inp.attr("disabled" , true);
        $('#edit').css('display','inline-block');
        $('.confirm-button').css('display','none');
    }
);
// end of profile info part


// profile favorites
$(document).ready(function() {
    if ($(".js-example-basic-multiple").length){
        $(".js-example-basic-multiple").select2({
            dir: "rtl"
        });
    }
});
// end of profile favorites

// profile side nav menu
$(document).ready(function(){
    $(".profile-side-menu-js").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - $('.scrolling').height()
            }, 500, function(){
                window.location.hash = hash;
            });
        }
    });
});
// end of profile side nav menu

// page register
$().ready(function() {

    $(".contact-form").each(function(){

        $(this).validate(  /*feedback-form*/{
            onkeyup: false,
            onfocusout: false,
            errorElement: 'p',
            errorLabelContainer: $(this).parent().children(".alert-boxes.error-alert").children(".message"),
            rules:
                {
                    name:
                        {
                            required: true
                        },
                    email:
                        {
                            required: true,
                            email: true
                        },
                    message:
                        {
                            required: true
                        }
                },
            messages:
                {
                    name:
                        {
                            // required: 'Please enter your name',
                            required: 'Please enter your freaking name'
                        },
                    email:
                        {
                            required: 'Please enter your email address',
                            email: 'Please enter a VALID email address'
                        },
                    message:
                        {
                            required: 'Please enter your message'
                        }
                },
            invalidHandler: function()
            {
                $(this).parent().children(".alert-boxes.error-alert").slideDown('fast');
                $("#feedback-form-success").slideUp('fast');

            },
            submitHandler: function(form)
            {
                $(form).parent().children(".alert-boxes.error-alert").slideUp('fast');
                var $form = $(form).ajaxSubmit();
                submit_handler($form, $(form).parent().children(".email_server_responce") );
            }
        });
    })
});

var tel_form = $('#form-telephone');

tel_form.keyup( function () {
    if (tel_form.val().length < 11 || tel_form.val().length > 11) {
        console.log("ALERT!!!");
        tel_form.prop('invalid' , 'true');
    }
});

// if (document.getElementById('form-telephone').length) {
//     var input = document.getElementById('form-telephone');
//     input.oninvalid = function(event) {
//         event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
//     };
// }
// end of page register


// page shop cart
$('.bank').click(function () {
    // console.log("you just clicked");
    $('.bank').css('border-color', '#e1e1e1');
    $(this).css('border-color', '#f27c66');
});


$('.coupon-confirm').click(function () {
    $(this).parent().css('display' , 'none');
    $('.coupon-value').css('display' , 'inline-block');
});

$('.coupon-disable').click(function () {
    $(this).parent().css('display' , 'none');
    $('.coupon').css('display' , 'inline-block');
});


$('input:radio[name="pay"]').change(function(){
    if ($(this).attr('value') == 'credit-pay'){
        $('.credit-pay').css('display' , 'block');
        $('.bank-pay').css('display' , 'none');
    }
    if ($(this).attr('value') == 'bank-pay'){
        $('.bank-pay').css('display' , 'block');
        $('.credit-pay').css('display' , 'none');
    }

});
// $('input:radio[name="pay"]').change(function(){
//     console.log("bank-pay was checked");
//     if ($(this).is(':checked')){
//         $('.bank-pay').css('display' , 'block')
//     }
// });
// end of shop cart

// page contact us
$(".contact-form").each(function(){

    $(this).validate(  /*feedback-form*/{
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        errorLabelContainer: $(this).parent().children(".alert-boxes.error-alert").children(".message"),
        rules:
            {
                name:
                    {
                        required: true
                    },
                email:
                    {
                        required: true,
                        email: true
                    },
                message:
                    {
                        required: true
                    }
            },
        messages:
            {
                name:
                    {
                        required: 'نام و نام خانوادگی خود را وارد کنید',
                    },
                email:
                    {
                        required: 'ایمیل خود را وارد کنید',
                        email: 'ایمیل معتبر نمیباشد'
                    },
                message:
                    {
                        required: 'لطفا متن خود را وارد کنید'
                    }
            },
        invalidHandler: function()
        {
            $(this).parent().children(".alert-boxes.error-alert").slideDown('fast');
            $("#feedback-form-success").slideUp('fast');

        },
        submitHandler: function(form)
        {
            $(form).parent().children(".alert-boxes.error-alert").slideUp('fast');
            var $form = $(form).ajaxSubmit();
            submit_handler($form, $(form).parent().children(".email_server_responce") );
        }
    });
});
// end of page contact us


// page course single item
if ($(".message-form").length) {
    var input = document.getElementById('subject');
    input.oninvalid = function (event) {
        event.target.setCustomValidity('لطفا ایمیل خود را وارد کنید');
    };
    var input = document.getElementById('author');
    input.oninvalid = function (event) {
        event.target.setCustomValidity('لطفا نام خود را وارد کنید');
    };
    var input = document.getElementById('message');
    input.oninvalid = function (event) {
        event.target.setCustomValidity('لطفا متن خود را وارد کنید');
    };
}
// end of page course single item

