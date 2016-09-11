
KODX Template Engine System
=======
Açık kaynak basit ve kullanışlı tema motoru.
Yakın zaman da detaylı anlatım eklenecektir.
Geliştirildikçe güncellenecektir.

[![License](http://img.shields.io/:license-apache-brightgreen.svg)](http://www.apache.org/licenses/LICENSE-2.0.html) 

###Simple Application
```php
    //Setting up important stuff
    require_once ('template.class.php');
    define('TEMPLATES_PATH', 'templates');
    define('PARTIALS_PATH', TEMPLATES_PATH.'/partials');

    //Instanciate new object
    $template = new Template(TEMPLATES_PATH.'/test.tpl.html');

    //Assing values
    $template->assign('title', 'Merhaba, Gökhan ALKAN');
    $template->assign('text', 'Bu Template Engine Şablon Test Sistemidir.');

    //Use a partial
    $template->renderPartial('table_here', PARTIALS_PATH.'/table.part.html', array('username' => 'Gökhan ALKAN', 'age' => 27));

    //Showing content
    echo $template->show(true);
```

<i>İyi kodlamalar...</i>
