<?php
use Slim\App;
return function (App $app){

    $settings = $app->getContainer()->get('settings');
    $app->addErrorMiddleware(    
        $settings['displayErrorDetails'], //true دي السيرفس اللي احنا عملناها بترجع 
        $settings['logErrors'],
        $settings['logErrorDetails']
    ); 
};
    