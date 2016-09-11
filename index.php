<?php
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