$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* --------------------------------------------------------
                        Select 2
--------------------------------------------------------   */

$(document).ready(function(){
    // Single Search Select
    $(".js-example-basic-single").select2();

    // Multi Select
    $(".js-example-basic-multiple").select2({
        'multiple': true,
        'placeholder': $(this).data('placeholder'),
         templateSelection : function (tag, container){
            if(tag._resultId){
                const obj_id = tag._resultId.split('-')[1];
                const option = $('#' + obj_id + ' option[value="' + tag.id + '"]');
                if (option.attr('locked')){
                    $(container).addClass('locked-tag');
                }
            }
            return tag.text;
        }
    }).on('select2:unselecting', function(e){
        if ($(e.params.args.data.element).attr('locked')) {
            e.preventDefault();
        }
    });
});


$(document).ready(function() {
    $("#more-details").on('click', function() {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function() {
        $(".navbar-container .nav-right").slideToggle('slow');
    });


    $('#mobile-collapse i').addClass('icon-toggle-right');
    $('#mobile-collapse').on('click', function() {
        $('#mobile-collapse i').toggleClass('icon-toggle-right');
        $('#mobile-collapse i').toggleClass('icon-toggle-left');
    });
});

/* --------------------------------------------------------
                    Swal2
--------------------------------------------------------   */

function onDelete(obj, text) {

    Swal.fire({
        title: 'Вы уверены?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonColor: '#C1A96D',
        cancelButtonColor: '#919aa3',
        confirmButtonText: '<i class="fa fa-check-circle mr-1"></i> Да, удалить!',
        cancelButtonText: '<i class="fa fa-times-circle mr-1"></i> Отмена'
    }).then((result) => {
        if (result.isConfirmed) {
            obj.closest('form').submit();
        }
    });
}

function onConfirm(_this, text, confirmButtonText)
{
    Swal.fire({
        title: 'Вы уверены?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonColor: '#D0A659',
        cancelButtonColor: '#919aa3',
        confirmButtonText: '<i class="fa fa-check-circle mr-1"></i> ' + confirmButtonText,
        cancelButtonText: '<i class="fa fa-times-circle mr-1"></i> Отмена'
    }).then((result) => {
        if (result.value) {
            _this.closest('form').submit();
        }
    });
}


/* --------------------------------------------------------
                            Date
--------------------------------------------------------   */

if(! (isPhone() || isIPad())) {

    flatpickr(".datetime", {
        enableTime: true,
        dateFormat: "d.m.Y H:i",
        locale: "ru"
    });

    flatpickr(".date", {
        enableTime: false,
        dateFormat: "d.m.Y",
        locale: "ru",
    });

    flatpickr(".time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        locale: "ru",
    });

    flatpickr(".before_today_range_dates", {
        mode: "range",
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: "ru",
        maxDate: "today"
    });
}

/* --------------------------------------------------------
                        Check browser
--------------------------------------------------------   */

function isPhone() {
    const toMatch = [
        /Android/i,
        /webOS/i,
        /iPhone/i,
        /BlackBerry/i,
        /Windows Phone/i
    ];

    return toMatch.some((toMatchItem) => {
        return navigator.userAgent.match(toMatchItem);
    });
}

function isIPad() {
    const toMatch = [
        /iPad/i,
        /iPod/i,
    ];

    return toMatch.some((toMatchItem) => {
        return navigator.userAgent.match(toMatchItem);
    });
}

/* --------------------------------------------------------
                    Configure select2 i18n
--------------------------------------------------------   */

$.fn.select2.amd.define('select2/i18n/ru',[],function () {
    // Russian
    return {
        errorLoading: function () {
            return 'Поиск…';
        },
        inputTooLong: function (args) {
            const overChars = args.input.length - args.maximum;
            let message = 'Пожалуйста, удалите ' + overChars + ' символ';
            if (overChars >= 2 && overChars <= 4) {
                message += 'а';
            } else if (overChars >= 5) {
                message += 'ов';
            }
            return message;
        },
        inputTooShort: function (args) {
            const remainingChars = args.minimum - args.input.length;
            return 'Пожалуйста, введите ' + remainingChars + ' или более символов';
        },
        loadingMore: function () {
            return 'Загружаем ещё ресурсы…';
        },
        maximumSelected: function (args) {
            let message = 'Вы можете выбрать ' + args.maximum + ' элемент';

            if (args.maximum  >= 2 && args.maximum <= 4) {
                message += 'а';
            } else if (args.maximum >= 5) {
                message += 'ов';
            }

            return message;
        },
        noResults: function () {
            return 'Ничего не найдено';
        },
        searching: function () {
            return 'Поиск…';
        }
    };
});

/* --------------------------------------------------------
                        Show error
--------------------------------------------------------   */

function showError(response)
{
    if (response.status === 422) {
        const response_json = response.responseJSON;
        const errors = response_json.errors;

        showErrorNotification(response_json.message);

        if(typeof errors !== 'undefined'){
            showErrorNotification(errors[Object.keys(errors)[0]][0]);
        }
    }
}

/* --------------------------------------------------------
                        File input
--------------------------------------------------------   */

$(".images").fileinput({
    language: "ru",
    allowedFileExtensions: ['jpeg', 'png', 'jpg', 'gif', 'svg'],
    showUpload: false,
    showCancel: false,
    height: 10,
    maxFileSize: 10000,
    maxFileCount: 10,
});


/* --------------------------------------------------------
                        Disable - Enable
--------------------------------------------------------   */

function disable(data, content = false)
{
    if(content){
        data.html(content);
    }

    data.css('cursor', 'progress');
    data.prop('disabled', true);
}


function enable(data, content = "")
{
    data.html(content);
    data.css('cursor', 'pointer');
    data.prop('disabled', false);
}

/* --------------------------------------------------------
                            Modal
--------------------------------------------------------   */

if(isPhone()){
    $('.modal-dialog').css('max-width', '95%');
}else if(isIPad()){
    $('.modal-dialog').css('max-width', '85%');
}

/* --------------------------------------------------------
                        Notifications
--------------------------------------------------------   */

toastr.options.positionClass = 'toast-bottom-right';
toastr.options.timeOut = 5000;

function showErrorNotification(title)
{
    toastr.error(title)
}

function showSuccessNotification(title) {
    toastr.success(title)
}

function showInfoNotification(title)
{
    toastr.info(title)
}

function showWarningNotification(title)
{
    toastr.warning(title)
}

/* --------------------------------------------------------
                        Scripts
--------------------------------------------------------   */

$(".theme-loader").fadeOut("slow", function () {
    $(this).remove()
});
$.mCustomScrollbar.defaults.axis = "yx";

$(".main-menu").mCustomScrollbar({
    scrollInertia: 100,
    setTop: "10px",
    setHeight: "calc(100% - 100px)",
});

/* --------------------------------------------------------
                            Tooltip - Tippy
--------------------------------------------------------   */

function tooltip(){
    $(document).ready(function() {
        tippy('[data-toggle="tooltip"]', {
            arrow: true,
            animation: 'scale',
        });
    });
}

$(document).ready(function() {
    $(function () {
        tippy('[data-toggle="tooltip"]', {
            arrow: true,
            animation: 'scale',
        });
    });

    $(function () {
        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                return $('#primary-popover-content').html();
            }
        });
    })
});

/* --------------------------------------------------------
                   Language
--------------------------------------------------------   */

function loadLanguagePickerEvents(languages, datatable)
{
    $.each(languages, function(key, lang) {
        $('#'+lang).on('click', function () {
            $('[name="lang"]').val(lang);
            datatable.ajax.reload();
        });
    });
}


function customTabConfiguration(locales, langKey){
    $.each(locales, function(key, lang) {
        $('#tab_link-'+langKey+lang).on('click', function () {
            $('#'+langKey+lang).addClass('active');
            $.each(locales, function(key2, lang2) {
                if(lang !== lang2){
                    $('#'+langKey+lang2).removeClass('active');
                }
            });
        });
    });
}

/* --------------------------------------------------------
                            Slug
--------------------------------------------------------   */

function slugify(s, opt)
{
    s = String(s);
    opt = Object(opt);

    var defaults = {
        'delimiter': '-',
        'limit': undefined,
        'lowercase': true,
        'replacements': {},
        'transliterate': true,
    };

    // Merge options
    for (var k in defaults) {
        if (!opt.hasOwnProperty(k)) {
            opt[k] = defaults[k];
        }
    }

    var char_map = {
        // Latin
        'À': 'A', 'Á': 'A', 'Â': 'A', 'Ã': 'A', 'Ä': 'A', 'Å': 'A', 'Æ': 'AE', 'Ç': 'C',
        'È': 'E', 'É': 'E', 'Ê': 'E', 'Ë': 'E', 'Ì': 'I', 'Í': 'I', 'Î': 'I', 'Ï': 'I',
        'Ð': 'D', 'Ñ': 'N', 'Ò': 'O', 'Ó': 'O', 'Ô': 'O', 'Õ': 'O', 'Ö': 'O', 'Ő': 'O',
        'Ø': 'O', 'Ù': 'U', 'Ú': 'U', 'Û': 'U', 'Ü': 'U', 'Ű': 'U', 'Ý': 'Y', 'Þ': 'TH',
        'ß': 'ss',
        'à': 'a', 'á': 'a', 'â': 'a', 'ã': 'a', 'ä': 'a', 'å': 'a', 'æ': 'ae', 'ç': 'c',
        'è': 'e', 'é': 'e', 'ê': 'e', 'ë': 'e', 'ì': 'i', 'í': 'i', 'î': 'i', 'ï': 'i',
        'ð': 'd', 'ñ': 'n', 'ò': 'o', 'ó': 'o', 'ô': 'o', 'õ': 'o', 'ö': 'o', 'ő': 'o',
        'ø': 'o', 'ù': 'u', 'ú': 'u', 'û': 'u', 'ü': 'u', 'ű': 'u', 'ý': 'y', 'þ': 'th',
        'ÿ': 'y',

        // Latin symbols
        '©': '(c)',

        // Greek
        'Α': 'A', 'Β': 'B', 'Γ': 'G', 'Δ': 'D', 'Ε': 'E', 'Ζ': 'Z', 'Η': 'H', 'Θ': '8',
        'Ι': 'I', 'Κ': 'K', 'Λ': 'L', 'Μ': 'M', 'Ν': 'N', 'Ξ': '3', 'Ο': 'O', 'Π': 'P',
        'Ρ': 'R', 'Σ': 'S', 'Τ': 'T', 'Υ': 'Y', 'Φ': 'F', 'Χ': 'X', 'Ψ': 'PS', 'Ω': 'W',
        'Ά': 'A', 'Έ': 'E', 'Ί': 'I', 'Ό': 'O', 'Ύ': 'Y', 'Ή': 'H', 'Ώ': 'W', 'Ϊ': 'I',
        'Ϋ': 'Y',
        'α': 'a', 'β': 'b', 'γ': 'g', 'δ': 'd', 'ε': 'e', 'ζ': 'z', 'η': 'h', 'θ': '8',
        'ι': 'i', 'κ': 'k', 'λ': 'l', 'μ': 'm', 'ν': 'n', 'ξ': '3', 'ο': 'o', 'π': 'p',
        'ρ': 'r', 'σ': 's', 'τ': 't', 'υ': 'y', 'φ': 'f', 'χ': 'x', 'ψ': 'ps', 'ω': 'w',
        'ά': 'a', 'έ': 'e', 'ί': 'i', 'ό': 'o', 'ύ': 'y', 'ή': 'h', 'ώ': 'w', 'ς': 's',
        'ϊ': 'i', 'ΰ': 'y', 'ϋ': 'y', 'ΐ': 'i',

        // Turkish
        'Ş': 'S', 'İ': 'I', 'Ç': 'C', 'Ü': 'U', 'Ö': 'O', 'Ğ': 'G',
        'ş': 's', 'ı': 'i', 'ç': 'c', 'ü': 'u', 'ö': 'o', 'ğ': 'g',

        // Russian
        'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'Yo', 'Ж': 'Zh',
        'З': 'Z', 'И': 'I', 'Й': 'J', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O',
        'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C',
        'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Sh', 'Ъ': '', 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'Yu',
        'Я': 'Ya',
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'zh',
        'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
        'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts',
        'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu',
        'я': 'ya',

        // Ukrainian
        'Є': 'Ye', 'І': 'I', 'Ї': 'Yi', 'Ґ': 'G',
        'є': 'ye', 'і': 'i', 'ї': 'yi', 'ґ': 'g',

        // Czech
        'Č': 'C', 'Ď': 'D', 'Ě': 'E', 'Ň': 'N', 'Ř': 'R', 'Š': 'S', 'Ť': 'T', 'Ů': 'U',
        'Ž': 'Z',
        'č': 'c', 'ď': 'd', 'ě': 'e', 'ň': 'n', 'ř': 'r', 'š': 's', 'ť': 't', 'ů': 'u',
        'ž': 'z',

        // Polish
        'Ą': 'A', 'Ć': 'C', 'Ę': 'e', 'Ł': 'L', 'Ń': 'N', 'Ó': 'o', 'Ś': 'S', 'Ź': 'Z',
        'Ż': 'Z',
        'ą': 'a', 'ć': 'c', 'ę': 'e', 'ł': 'l', 'ń': 'n', 'ó': 'o', 'ś': 's', 'ź': 'z',
        'ż': 'z',

        // Latvian
        'Ā': 'A', 'Č': 'C', 'Ē': 'E', 'Ģ': 'G', 'Ī': 'i', 'Ķ': 'k', 'Ļ': 'L', 'Ņ': 'N',
        'Š': 'S', 'Ū': 'u', 'Ž': 'Z',
        'ā': 'a', 'č': 'c', 'ē': 'e', 'ģ': 'g', 'ī': 'i', 'ķ': 'k', 'ļ': 'l', 'ņ': 'n',
        'š': 's', 'ū': 'u', 'ž': 'z',

        // Kazakh
        'Ә': 'A', 'І': 'I', 'Ң': 'N', 'Ғ': 'G', 'Ү': 'U', 'Ұ': 'U', 'Қ': 'Q', 'Ө': 'O', 'Һ': 'H',
        'ә': 'a', 'і': 'i', 'ң': 'n', 'ғ': 'g', 'ү': 'u', 'ұ': 'u', 'қ': 'q', 'ө': 'o', 'һ': 'h'
    };

    // Make custom replacements
    for (var k in opt.replacements) {
        s = s.replace(RegExp(k, 'g'), opt.replacements[k]);
    }

    // Transliterate characters to ASCII
    if (opt.transliterate) {
        for (var k in char_map) {
            s = s.replace(RegExp(k, 'g'), char_map[k]);
        }
    }

    // Replace non-alphanumeric characters with our delimiter
    var alnum = RegExp('[^a-z0-9]+', 'ig');
    s = s.replace(alnum, opt.delimiter);

    // Remove duplicate delimiters
    s = s.replace(RegExp('[' + opt.delimiter + ']{2,}', 'g'), opt.delimiter);

    // Truncate slug to max. characters
    s = s.substring(0, opt.limit);

    // Remove delimiter from ends
    s = s.replace(RegExp('(^' + opt.delimiter + '|' + opt.delimiter + '$)', 'g'), '');

    return opt.lowercase ? s.toLowerCase() : s;
}

/* --------------------------------------------------------
                            Minimize and Full Card
--------------------------------------------------------   */

$(".minimize-card").on('click', function() {
    var $this = $(this);
    var port = $($this.parents('.card'));
    var card = $(port).children('.card-block').slideToggle();
    $(this).toggleClass("icon-minus").fadeIn('slow');
    $(this).toggleClass("icon-plus").fadeIn('slow');
});

$(".full-card").on('click', function() {
    var $this = $(this);
    var port = $($this.parents('.card'));
    port.toggleClass("full-card");
    $(this).toggleClass("icon-maximize");
    $(this).toggleClass("icon-minimize");
});

/* --------------------------------------------------------
                    Input-mask
--------------------------------------------------------   */

new Inputmask("8 999 999 99 99").mask($('.phone-mask'));
new Inputmask("9999").mask($('.verification_code-mask'));
