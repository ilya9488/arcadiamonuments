// function setPadding() {
//   let sW = ($(window).width() - $('.container').width()) / 2;
//   document.querySelector('html').style.setProperty('--sW', sW + 'px');
// }
//
// setPadding();
//
// $(window).resize(function () {
//   setPadding();
// });

//Nav Open
$('.open-nav .open-nav-icon, .close-nav').on('click', function () {
    $('.header-nav').toggleClass('header-nav-open');
});
$(document).mouseup(function (e) {
    let els = $(".header-nav, .open-nav");
    if (!els.is(e.target) && els.has(e.target).length === 0) {
        $('.header-nav').removeClass('header-nav-open');
    }
});

// Sticky Header
$(window).scroll(function () {
    stickyHeader();
});

function stickyHeader() {
    const top = $(window).scrollTop();
    if (top >= 200) {
        $('header#masthead').addClass('sticky-bg');
        $('header#masthead').removeClass('sticky-add');
    } else {
        $('header#masthead').removeClass('sticky-bg');
        $('header#masthead').addClass('sticky-add');
    }
}

stickyHeader();

//Show / hode search field
$('.bg-show-search').fadeOut('fast')
$('.nav-search').on('click', function (e) {
    e.preventDefault()
    $('.search-form [type=submit]').prop('disabled', true)
    $('.search-form').fadeIn('fast')
    $('.search-form').addClass('show')
    $('.bg-show-search').fadeIn('fast')
    $('.bg-show-search').addClass('show')
    $('.search-form').find('#s').focus()

    $('.page-content >.bg-show-search').fadeOut('fast')
    $('.header-nav').removeClass('header-nav-open')
});
$(document).mouseup(function (e) {
    var div = $('.search-form.show')
    var divBg = $('.bg-show-search.show')
    if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        div.fadeOut('fast')
        divBg.fadeOut('fast')
    }
    $('.page-content >.search-form').fadeIn('fast')
    $('.page-content >.bg-show-search').fadeOut('fast')
});


// search-form
$('.search-form #s').on('change keydown paste input', function () {
    if ($(this).val() === '') {
        $('.search-form [type=submit]').prop("disabled", true)
    } else {
        $('.search-form [type=submit]').prop("disabled", false)
    }
})

// Fancybox gallery ALL
Fancybox.bind('[data-fancybox="all"]', {
    //dragToClose: false,
    Thumbs: false,

    Image: {
        zoom: true,
        click: false,
        wheel: 'slide',
    },

    on: {
        initLayout: (fancybox) => {
            // Create top bar
            const top = document.createElement('div')
            top.classList.add('fancybox__top')

            // Create counter
            const counter = document.createElement('div')
            counter.classList.add('fancybox__counter')
            top.appendChild(counter)
            fancybox.$counter = counter

            fancybox.$backdrop.before(top)
        },
        'initCarousel Carousel.change': (fancybox) => {
            // Update counter
            fancybox.$counter.innerHTML = `${fancybox.Carousel.page + 1} / ${
                fancybox.Carousel.pages.length
            }`
        },
        // Move caption inside the slide
        reveal: (f, slide) => {
            slide.$caption && slide.$content.appendChild(slide.$caption)
        },
    },
})

// Fancybox gallery FOTO
Fancybox.bind('[data-fancybox="foto"]', {
    //dragToClose: false,
    Thumbs: false,

    Image: {
        zoom: true,
        click: false,
        wheel: 'slide',
    },

    on: {
        initLayout: (fancybox) => {
            // Create top bar
            const top = document.createElement('div')
            top.classList.add('fancybox__top')
            // Create counter
            const counter = document.createElement('div')
            counter.classList.add('fancybox__counter')
            top.appendChild(counter)
            fancybox.$counter = counter

            fancybox.$backdrop.before(top)
        },
        'initCarousel Carousel.change': (fancybox) => {
            // Update counter
            fancybox.$counter.innerHTML = `${fancybox.Carousel.page + 1} / ${
                fancybox.Carousel.pages.length
            }`
        },
        // Move caption inside the slide
        reveal: (f, slide) => {
            slide.$caption && slide.$content.appendChild(slide.$caption)
        },
    },
})

// Fancybox gallery VIDEO
Fancybox.bind('[data-fancybox="video"]', {
    //dragToClose: false,
    Thumbs: false,

    Image: {
        zoom: true,
        click: false,
        wheel: 'slide',
    },

    on: {
        initLayout: (fancybox) => {
            // Create top bar
            const top = document.createElement('div')
            top.classList.add('fancybox__top')
            // Create counter
            const counter = document.createElement('div')
            counter.classList.add('fancybox__counter')
            top.appendChild(counter)
            fancybox.$counter = counter

            fancybox.$backdrop.before(top)
        },
        'initCarousel Carousel.change': (fancybox) => {
            // Update counter
            fancybox.$counter.innerHTML = `${fancybox.Carousel.page + 1} / ${
                fancybox.Carousel.pages.length
            }`
        },
        // Move caption inside the slide
        reveal: (f, slide) => {
            slide.$caption && slide.$content.appendChild(slide.$caption)
        },
    },
})

// Fancybox gallery FOTO Sidebar
Fancybox.bind('[data-fancybox="foto-sidebar"]', {
    //dragToClose: false,
    Thumbs: false,

    Image: {
        zoom: true,
        click: false,
        wheel: 'slide',
    },

    on: {
        initLayout: (fancybox) => {
            // Create top bar
            const top = document.createElement('div')
            top.classList.add('fancybox__top')
            // Create counter
            const counter = document.createElement('div')
            counter.classList.add('fancybox__counter')
            top.appendChild(counter)
            fancybox.$counter = counter

            fancybox.$backdrop.before(top)
        },
        'initCarousel Carousel.change': (fancybox) => {
            // Update counter
            fancybox.$counter.innerHTML = `${fancybox.Carousel.page + 1} / ${
                fancybox.Carousel.pages.length
            }`
        },
        // Move caption inside the slide
        reveal: (f, slide) => {
            slide.$caption && slide.$content.appendChild(slide.$caption)
        },
    },
})

/*Dropdown Menu SELECT Form*/
$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('.message').text($(this).text())
    $('.message-subject').find('option').text($(this).text())
    $('.message').addClass('check')
});

// modal memorial
$('.icon-price').on('click', function (e) {
    $('#viewmoreModal').modal('hide')
})

// modal gifts
$('.gift-buy').on('click', function (e) {
    let img_src = $(this).find('img').attr('src')
    let gift_price = $(this).data('gift_price')

    $('.modal.gifts .modal-body img').attr('src', img_src)
    $('.modal.gifts .modal-body .modal-price').html('$ ' + gift_price)

    $('#gift_id').val($(this).data('gift_id'))
    $('#gift_name').val($(this).data('gift_name'))
    $('#gift_price').val(gift_price)
    $('#gift_image').val(img_src)
})


// guestbook
// toast show
$('.reply').on('click', function () {
    $('.toast').not($(this).parent().find('.toast')).toast('hide')
    $(this).parent().find('.toast').toast('show')
})
$('.toast-reply').toast({
    autohide: false,
    animation: true,
})

// Events calendar

const eventMemorial = document.querySelectorAll('.has-event');
for (let i = 0; i < eventMemorial.length; i++) {
    if (eventMemorial[i].childElementCount > 1) {
        eventMemorial[i].addEventListener("click", function () {

            NodeList.prototype.forEach = Array.prototype.forEach;
            var children = eventMemorial[i].childNodes;
            var eventModalList = document.querySelector('#eventModalList .modal-body .js-modal-events');
            eventModalList.innerHTML = '';
            children.forEach(function (item, index, arr) {
                var cln = item.cloneNode(true);
                eventModalList.appendChild(cln);
            });
            var childrenModal = document.querySelector('#eventModalList .modal-body .js-modal-events').childNodes
            childrenModal.forEach(function (item, index, arr) {
                if (index != 0) {
                    let eventText = eventMemorial[i].childNodes[index].dataset.title;
                    item.innerText = eventText;
                }
            });

            // showModal('#eventModalList .modal', true);
            $('#eventModalList').modal('show');
        });
    } else {
        let nodes = eventMemorial[i].childNodes;
        for (let k = 0; k < nodes.length; k++) {
            nodes[k].addEventListener("click", function () {
                let dayEvent = this.getAttribute('data-id');
                // showModal('#eventModal_'+ dayEvent+' .modal', true);
                $('#eventModal_' + dayEvent).modal('show');
            });
        }
    }

}

$(document).on('click', '.js-modal-events span', function (e) {
    let dayEvent = $(this).attr('data-id')
    $('#eventModalList').modal('hide')
    $('#eventModalList').modal('handleUpdate')
    $('#eventModal_' + dayEvent).modal('show')
})


// $('#find-events').on('click', function (e) {
$('.dropdown-menu li').on('click', function (e) {
    // let listEvent = $('option[value="Event"]').html().split(' ')[0].toLowerCase()
    let listEvent = $(this).attr('data-id')
    $('#eventModal_' + listEvent).modal('show')
})

// LOGIN
// hide / show password
$('.eye').on('click', function () {
    if ($('#user_pass').attr('type') == 'password') {
        $(this).addClass('view')
        $('#user_pass').attr('type', 'text')
    } else {
        $(this).removeClass('view')
        $('#user_pass').attr('type', 'password')
    }
})
// custom checkbox login
$('.custom-checkbox').on('click', function () {
    $('.custom-checkbox').toggleClass('check')
    // $('#rememberme').click(function () {})
})
// click label
$('.label-rememberme').on('click', function () {
    if ($('#rememberme').is(':checked')) {
        $('.custom-checkbox').addClass('check')
    } else {
        $('.custom-checkbox').removeClass('check')
    }
})

// custom checkbox SIGNUP
$('.custom-checkbox-agree').on('click', function () {
    $('.custom-checkbox-agree').toggleClass('check')
    // $('#terms').click(function () {})
})
// click label
$('.signup-agree').on('click', function () {
    if ($('#terms').is(':checked')) {
        $('.custom-checkbox-agree').addClass('check')
    } else {
        $('.custom-checkbox-agree').removeClass('check')
    }
})

// FORGOT PASSWORD (Enter New Password)
// hide / show password
$('#resetpassform p.pass1 svg.eye').on('click', function () {
    if ($('#pass1').attr('type') == 'password') {
        $(this).addClass('view')
        $('#pass1').attr('type', 'text')
    } else {
        $(this).removeClass('view')
        $('#pass1').attr('type', 'password')
    }
})
// hide / show password
$('#resetpassform p.pass2 svg.eye').on('click', function () {
    if ($('#pass2').attr('type') == 'password') {
        $(this).addClass('view')
        $('#pass2').attr('type', 'text')
    } else {
        $(this).removeClass('view')
        $('#pass2').attr('type', 'password')
    }
})


// state focus in the field where the error is login form
function focusLogin() {
    // $('input#user_login').focus()
    setTimeout(() => {
        if (window.location.search == '?errno=invalid_username' || window.location.search == '?errno=empty_username,empty_password' || window.location.search == '?errno=empty_username') {
            $('input#user_login').focus()
        } else if (window.location.search == '?errno=incorrect_password' || window.location.search == '?errno=empty_password') {
            $('input#user_pass').focus()
        }
    }, 300);
}

focusLogin();


// saving text in input fields in case of an error
function saveFields() {

    saveF = function () {
        var elements = document.querySelectorAll(
            'input[type=text], input[type=password], input[type=email]')
        for (i = 0; i < elements.length; i++) {
            ;(function (element) {
                var id = element.getAttribute('id')
                if (id == 'click') return
                localStorage.setItem(id, element.value) // id
            })(elements[i])
        }
    }
    if (window.location.pathname == '/login/') {
        document.querySelector('#wp-submit').addEventListener('click', saveF)
    } else if (window.location.pathname == '/sign-up/') {
        document.querySelector('input[type="submit"]').addEventListener('click', saveF)
    }

    function load() {
        var elements = document.querySelectorAll(
            'input[type=text], input[type=password], input[type=email]'
        )

        for (i = 0; i < elements.length; i++) {
            ;(function (element) {
                var id = element.getAttribute('id')
                if (id == 'click') return
                element.value = localStorage.getItem(id) // id
            })(elements[i])
        }
    }

    load()

}

saveFields()


// show / hide password form SIGN UP (password)
$('.eye-signup').on('click', function () {
    if ($('#password').attr('type') == 'password') {
        $(this).addClass('view')
        $('#password').attr('type', 'text')
    } else {
        $(this).removeClass('view')
        $('#password').attr('type', 'password')
    }
})
// show / hide password form SIGN UP (password_again)
$('.eye.confirm-signup').on('click', function () {
    if ($('#password_again').attr('type') == 'password') {
        $(this).addClass('view')
        $('#password_again').attr('type', 'text')
    } else {
        $(this).removeClass('view')
        $('#password_again').attr('type', 'password')
    }
})


// datapicker settings (Sign Up)
pickmeup('input#birthday', {
    position: 'bottom',
    format: 'm/d/Y',
    first_day: 1,
    hide_on_select: true,
    prev: '&#x25C4;',
    next: '&#x25BA;',
    // locale: 'en',
    // default_date: false,
    // prev: '&#x21D0;'
    // next: '&#x25BA;',
})

function birthday() {
    if ($('.pickmeup').hasClass('pmu-hidden')) {
        $('.icon-bracket-accordion').removeClass('rotate')
    } else {
        $('.icon-bracket-accordion').addClass('rotate')
    }

    if (window.location.pathname == '/dashboard/personal-data/') {
        $('.pickmeup').addClass('pmu-area')
    }
}

birthday()

$('input#birthday').on('click', birthday)
$('.pickmeup').on('click', birthday)
$(window).on('click', birthday)

// personal data ( edit data )
$('.personal-data-form .edit').on('click', function () {
    $('.is-activated').addClass('active')
    $('.personal-data-form .footer-form').removeClass('disabled')

    $('.personal-data-form input:not(#date_of_birth)').removeAttr('readonly')
    $('#date_of_birth').removeAttr('disabled')

    // Must before inputs .each
    pickmeup('#date_of_birth', {
        position: 'bottom',
        format: 'm/d/Y',
        first_day: 1,
        hide_on_select: true,
        prev: '&#x25C4;',
        next: '&#x25BA;',
        // locale: 'en',
        default_date: $('#date_of_birth').data('value'),
        // prev: '&#x21D0;',
        // next: '&#x25BA;',
    })

    $('.personal-data-form input').each(function () {
        if ($(this).data('value')) {
            $(this).val($(this).data('value'));
        }
    })

    //$('.personal-data-form .eye').addClass('active')

    // show / hide password ( personal-data-form )
    // $('.personal-data-form .eye.active').on('click', function () {
    //   let pas = $('.personal-data-form #password')
    //
    //   if (pas.attr('type') == 'password') {
    //     $(this).addClass('view')
    //     pas.attr('type', 'text')
    //   } else {
    //     $(this).removeClass('view')
    //     pas.attr('type', 'password')
    //   }
    // })
})


// date_of_birth rotate ( if show/hide calendar )
function date_of_birth() {
    if ($('.pickmeup').hasClass('pmu-hidden')) {
        $('svg#bracket_birth').removeClass('rotate')
    } else {
        $('svg#bracket_birth').addClass('rotate')
    }
    $('.pmu-button').on('click', function () {
        $('.personal-data-form input[type="submit"]').removeAttr('disabled')
    })
}

date_of_birth()

$('input#date_of_birth').on('click', date_of_birth)
$('.pickmeup').on('click', date_of_birth)
$(window).on('click', date_of_birth)


// Personal Area (input type submit) != disabled
$('.personal-data-form input').on('change', function () {
    $('.personal-data-form input[type="submit"]').removeAttr('disabled')
})
// type="reset"
$('.personal-data-form input[type="reset"]').on('click', function () {
    $('.personal-data-form input:not(#date_of_birth)').attr('readonly', true)
    $('.is-activated').removeClass('active')
    $('.personal-data-form .footer-form').addClass('disabled')
    $('#date_of_birth').attr('disabled', true)
})
// Current Menu Item (personal-area)
$('#menu-personal-area > li a[href$="//' + window.location.host + window.location.pathname + '"]').parent('li').addClass('current-menu-item');
$('.menu-area > li a[href$="//' + window.location.host + window.location.pathname + '"]').parent('li').addClass('current-menu-item');

// all / foto / video (selects gallery)
let select_btn = $('.tab-content .btn-wrap button')

select_btn.on('click', function () {
    select_btn.removeClass('active')
    $(this).addClass('active')
    if ($(this).hasClass('all')) {
        $('.tab-content a[data-fancybox="video"]').show('slow')
        $('.tab-content a[data-fancybox="foto"]').show('slow')
    } else if ($(this).hasClass('foto')) {
        $('.tab-content a[data-fancybox="video"]').hide('slow')
        $('.tab-content a[data-fancybox="foto"]').show('slow')
    } else if ($(this).hasClass('video')) {
        $('.tab-content a[data-fancybox="foto"]').hide('slow')
        $('.tab-content a[data-fancybox="video"]').show('slow')
    }
})

$('.btn-video-option').on('click', function () {
    $('#modal-optons-video').modal('show')
})

$(".photos").change(function () {
    var photosWrap = $(this).closest('.add-wrap');
    var photosTitle = photosWrap.find('.add-txt');
    var filename = this.files[0].name;
    var filenameInput = photosWrap.find('.filename');
    photosTitle.text(filename);
    filenameInput.val(filename);
});


