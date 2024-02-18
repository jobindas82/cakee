//csrf token
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

//Reload Datatable
function reloadTable(table_id) {
    $(table_id)
        .DataTable()
        .ajax.reload();
}

function roundNumber(num = 0, delimiter = 2) {
    return +(Math.round(num + "e+" + delimiter) + "e-" + delimiter);
}

function round_field(field, delimiter = 2) {
    if (!isNaN(field.value)) {
        var value = Number(field.value);
        value = value >= 0 ? roundNumber(value, delimiter) : 0;
        if (!$('#' + field.id).attr('readonly'))
            $('#' + field.id).val(value.toFixed(delimiter));
    }

}

function savestate(){
    var sideBarState = localStorage.getItem("sideBarState");
    var state = ';'
    if(sideBarState == 'wide'){
        state = 'slim';
        localStorage.setItem("sideBarState", "slim");
    }else if(sideBarState == 'slim'){
        state = 'wide';
        localStorage.setItem("sideBarState", "wide");
    }else{
        state = 'slim';
        localStorage.setItem("sideBarState", "slim");
    }
}

function swithDarkmode() {
    var darkMode = localStorage.getItem("darkMode");
    var state = '';
    if (darkMode == 'dark') {
        localStorage.setItem("darkMode", "light");
        state = 'light';
    } else if (darkMode == 'light') {
        localStorage.setItem("darkMode", "dark");
        state = 'dark';
    } else {
        localStorage.setItem("darkMode", "dark");
        state = 'dark';
    }
    $.post({
        url: '/user/config',
        data: {
            key: 'darkMode',
            value: state
        }
    });
    setDarkMode();
}

function setDarkMode() {
    var darkMode = localStorage.getItem("darkMode");
    if (darkMode == 'dark') {
        $('body').addClass('dark-mode');
        $('#main_navbar').addClass('bg-dark');
        $('#main_navbar').removeClass('navbar-white');
        $('#main_sidebar').removeClass('sidebar-light-primary');
        $('#main_sidebar').addClass('sidebar-dark-primary');
        $('#darkmode_switch').html(`<i class="fas fa-sun"></i>`);
    } else {
        $('body').removeClass('dark-mode');
        $('#main_navbar').removeClass('bg-dark');
        $('#main_navbar').addClass('navbar-white');
        $('#main_sidebar').addClass('sidebar-light-primary');
        $('#main_sidebar').removeClass('sidebar-dark-primary');
        $('#darkmode_switch').html(`<i class="fas fa-moon"></i>`);
    }
}


$(function () {
    window.Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });

    var sideBarState = localStorage.getItem("sideBarState");
    if(sideBarState == 'wide'){
        $('#main-body').removeClass('sidebar-collapse');
    }else if(sideBarState == 'slim'){
        $('#main-body').addClass('sidebar-collapse');
    }else{
        $('#main-body').removeClass('sidebar-collapse');
    }

});

/**
 * preview-image.js
 * version 1.0
 * Eric Olson
 * https://github.com/zpalffy/preview-image-jquery
 *
 * License: MIT - http://opensource.org/licenses/MIT
 * Original: http://cssglobe.com/easiest-tooltip-and-image-preview-using-jquery/
 *     by Alen Grakalic (http://cssglobe.com)
 */
(function($) {
    $.previewImage = function(options) {
        var element = $(document);
        var namespace = '.previewImage';

        var opts = $.extend({
            /* The following set of options are the ones that should most often be changed
               by passing an options object into this method.
            */
            'xOffset': 20,    // the x offset from the cursor where the image will be overlayed.
            'yOffset': -20,   // the y offset from the cursor where the image will be overlayed.
            'fadeIn': 'fast', // speed in ms to fade in, 'fast' and 'slow' also supported.
            'css': {          // css to use, may also be set to false.
                'padding': '8px',
                'border': '1px solid gray',
                'background-color': '#fff',
                'z-index': '9999'
            },

            /* The following options should normally not be changed - they are here for
               cases where this plugin causes problems with other plugins/javascript.
            */
            'eventSelector': '[data-preview-image]', // the selector for binding mouse events.
            'dataKey': 'previewImage', // the key to the link data, should match the above value.
            'overlayId': 'preview-image-plugin-overlay', // the id of the overlay that will be created.
        }, options);

        // unbind any previous event listeners:
        element.off(namespace);

        element.on('mouseover' + namespace, opts.eventSelector, function(e) {
            var p = $('<p>').attr('id', opts.overlayId).css('position', 'absolute')
                .css('display', 'none')
                .append($('<img>').attr('src', $(this).data(opts.dataKey)));
            if (opts.css) p.css(opts.css);

            $('body').append(p);

            p.css("top", (e.pageY + opts.yOffset) + "px").css("left",
                (e.pageX + opts.xOffset) + "px").fadeIn(opts.fadeIn);
        });


        element.on('mouseout' + namespace, opts.eventSelector, function() {
            $('#' + opts.overlayId).remove();
        });

        element.on('mousemove' + namespace, opts.eventSelector, function(e) {
            $('#' + opts.overlayId).css("top", (e.pageY + opts.yOffset) + "px")
                .css("left", (e.pageX + opts.xOffset) + "px");
        });

        return this;
    };

    // bind with defaults so that the plugin can be used immediately if defaults are taken:
    $.previewImage();
})(jQuery);
