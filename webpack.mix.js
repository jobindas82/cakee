const mix = require('laravel-mix');

mix.styles(
    [
        "resources/plugins/fontawesome-free/css/all.min.css",
        "resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        "resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
        "resources/plugins/daterangepicker/daterangepicker.css",
        "resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
        "resources/plugins/select2/css/select2.min.css",
        "resources/plugins/dropzone/min/dropzone.min.css",
        "resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css",
        "resources/css/adminlte.css",
        "resources/css/custom.css"
    ],
    "public/css/app.css"
);

mix.styles(
    [
        "resources/plugins/fontawesome-free/css/all.min.css",
        "resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        "resources/css/adminlte.css",
    ],
    "public/css/app-auth.css"
);

mix.styles(
    [
        "resources/plugins/fullcalendar/main.css",
    ],
    "public/css/fullcalendar.css"
);

mix.styles(
    [
        "resources/css/croppie.css",
    ],
    "public/css/croppie.css"
);

mix.styles(
    [
        "resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
        "resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    ],
    "public/css/datatable.css"
);

mix.scripts(
    [
        "resources/plugins/jquery/jquery.min.js",
        "resources/plugins/jquery-ui/jquery-ui.min.js",
        "resources/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "resources/plugins/moment/moment.min.js",
        "resources/plugins/daterangepicker/daterangepicker.js",
        "resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        "resources/plugins/select2/js/select2.full.min.js",
        "resources/plugins/dropzone/min/dropzone.min.js",
        "resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
        "resources/plugins/bs-custom-file-input/bs-custom-file-input.min.js",
        "resources/plugins/sweetalert2/sweetalert2.min.js",
        "resources/js/jquery.validate.min.js",
        "resources/js/additional-methods.min.js",
        "resources/js/adminlte.js",
        "resources/js/custom.js",
    ],
    "public/js/app.js"
);

mix.scripts(
    [
        "resources/plugins/jquery/jquery.min.js",
        "resources/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "resources/js/adminlte.js",
    ],
    "public/js/app-auth.js"
);

mix.scripts(
    [
        "resources/plugins/datatables/jquery.dataTables.min.js",
        "resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
        "resources/plugins/datatables-responsive/js/dataTables.responsive.min.js",
        "resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"
    ],
    "public/js/datatable.js"
);

mix.scripts(
    [
        "resources/plugins/fullcalendar/main.js",
    ],
    "public/js/fullcalendar.js"
);

mix.scripts(
    [
        "resources/js/croppie.js",
    ],
    "public/js/croppie.js"
);


mix.copyDirectory('resources/plugins/fontawesome-free/webfonts', 'public/webfonts');

mix.version();
