let mix = require('laravel-mix');

// User CSS
mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',                
        'bower_components/admin-lte/dist/css/AdminLTE.min.css',
        'bower_components/admin-lte/dist/css/skins/_all-skins.min.css'
], 'public/css/user/ujian.css');

// User JS
mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'bower_components/admin-lte/dist/js/adminlte.min.js',
], 'public/js/user/ujian.js');

// Admin CSS
mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',                
        'bower_components/admin-lte/dist/css/AdminLTE.min.css',
        'bower_components/admin-lte/dist/css/skins/_all-skins.min.css'
], 'public/css/admin/ujian.css');

// Admin JS
mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'bower_components/admin-lte/dist/js/adminlte.min.js',
], 'public/js/admin/ujian.js');

// ------------------- Plug - in ----------------------------------------------

cssPath = 'public/css/plugin/';
jsPath = 'public/js/plugin/';

// DataTables CSS
mix.styles([
        'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'        
], cssPath + 'datatables.css');

// DataTables JS
mix.scripts([
        'bower_components/datatables.net/js/jquery.dataTables.min.js',
        'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'
], jsPath + 'datatables.js');

// ICheck CSS
mix.styles([
        'bower_components/admin-lte/plugins/iCheck/all.css'        
], cssPath + 'icheck/icheck.css');

// ICheck Plugin JS
mix.scripts([
        'bower_components/admin-lte/plugins/iCheck/icheck.min.js'        
], jsPath + 'icheck.js');

// CK-Editor Plugin JS
mix.scripts([
        'bower_components/ckeditor/ckeditor.js'        
], jsPath + 'ckeditor/ckeditor.js');