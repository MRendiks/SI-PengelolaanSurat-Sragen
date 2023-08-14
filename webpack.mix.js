const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

mix.js('resources/js/pdfobject.js', 'public/js');
mix.copy('node_modules/pdfjs-dist/build/pdf.js', 'public/js/pdf.js');
mix.copy('node_modules/pdfjs-dist/build/pdf.worker.js', 'public/js/pdf.worker.js');
mix.copy('node_modules/pdfjs-dist/web/pdf_viewer.css', 'public/css/pdf_viewer.css');
mix.copy('node_modules/pdfjs-dist/web/pdf_viewer.js', 'public/js/pdf_viewer.js');
