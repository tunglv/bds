<?php

    // uncomment the following to define a path alias
    // Yii::setPathOfAlias('local','path/to/local-folder');

    // This is the main Web application configuration. Any writable
    // CWebApplication properties can be configured here.
    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>$_SERVER['SERVER_NAME'],
        'sourceLanguage'=>'vi',
        'language'=>'vi', 
        'theme'=>'admin',
        'timezone'=>'Asia/Ho_Chi_Minh',

        // preloading 'log' component
        'preload'=>array('log'),

        // autoloading model and component classes
        'import'=>array(
            'application.models.*',
            'application.components.*',
            'ext.MyDateTime',
            'ext.Myext',
            'zii.widgets.CPortlet',
            //'ext.common.RESTful.RESTController',
        ),

        'modules'=>array(
            'admin' => array(
                'defaultController' => 'page',
            ), 
            'web' => array(
                'defaultController' => 'page',
            ),
            'site' => array(
                'defaultController' => 'page',
            ),
            'api',
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'123',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.16','::1','127.0.0.1'),
            ),
        ),

        'controllerMap'=>array(
            'httpUser'=>array(
                'class'=>'api.extensions.HttpAuth.controller.HttpUserController',
                'userComponent'=>'user',
            ),
        ),

        // application components
        'components'=>array(
            'cache' => array(
                'class' => 'CFileCache',
                'cachePath' => 'protected/runtime/cache',
            ),
            'cacheData' => array(
                'class' => 'application.components.CacheData',
            ),
            'webData' =>  array(
                'class' => 'application.components.WebData',
            ),

            'crypt'=>array (
                'class'=>'ext.Crypt',
                'key'=>'^*IhgHAIjHGF%^@',
            ),
            'contentCompactor' => array(
                'class' => 'ext.contentCompactor.ContentCompactor',
                'options' => array(
                    // line_break; string; The type of line break used in the HTML that you are processing.
                    // ie, \r, \r\n, \n or PHP_EOL
                    'line_break'                         => PHP_EOL,
                    // preserved_tags; array; An array of html tags whose innerHTML contents format require preserving.
                    'preserved_tags'                    => array('textarea', 'pre', 'script', 'style', 'code'),
                    // preserved_boundry; string; The holding block that is used to replace the contents of the preserved tags
                    // while the compacting is taking place.
                    'preserved_boundry'                    => '@@PRESERVEDTAG@@',
                    // strip_comments; boolean; This will strip html comments from the html. NOTE, if the below option 'keep_conditional_comments'
                    // is not set to true then conditional Internet Explorer comments will also be stripped.
                    'strip_comments'                     => true,
                    // keep_conditional_comments; boolean; Only applies if the baove option 'strip_comments' is set to true.
                    // Only if the client browser is Internet Explorer then the conditional comments are kept.
                    'keep_conditional_comments'            => true,
                    // conditional_boundries; array; The holding block boudries that are used to replace the opening and
                    // closing tags of the conditional comments.
                    'conditional_boundries'                => array('@@IECOND-OPEN@@', '@@IECOND-CLOSE@@'),
                    // compress_horizontal; boolean; Removes horizontal whitespace of the HTML, ie left to right whitespace (spaces and tabs).
                    'compress_horizontal'                => true,
                    // compress_vertical; boolean; Removes vertical whitespace of the HTML, ie line breaks.        
                    'compress_vertical'                    => true,
                    // compress_scripts; boolean; Compresses content from script tags using a simple algorythm. Removes javascript comments,
                    // and horizontal and vertical whitespace. Note as only a simple algorythm is used there are limitations to the script 
                    // and you may want to use a more complex script like 'minify' http://code.google.com/p/minify/ or 'jsmin'
                    // http://code.google.com/p/jsmin-php/ See test3.php for an example.
                    'compress_scripts'                    => false,
                    // script_compression_callback; boolean; The name of a callback for custom js compression. See test3.php for an example.    
                    'script_compression_callback'         => false,
                    // script_compression_callback_args; array; Any additional args for the callback. The javascript will be put to the
                    // front of the array.
                    'script_compression_callback_args'     => array(),
                    // compress_css; boolean; Compresses CSS style tags.        
                    'compress_css'                        => true,
                )
            ),
            /* http://www.yiiframework.com/extension/pdf
            'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
            'mpdf'     => array(
            'librarySourcePath' => 'application.vendors.mpdf.*',
            'constants'         => array(
            '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
            ),
            'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
            //                        'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
            //                            'mode'              => '', //  This parameter specifies the mode of the new document.
            //                            'format'            => 'A4', // format A4, A5, ...
            //                            'default_font_size' => 0, // Sets the default document font size in points (pt)
            //                            'default_font'      => '', // Sets the default font-family for the new document.
            //                            'mgl'               => 15, // margin_left. Sets the page margins for the new document.
            //                            'mgr'               => 15, // margin_right
            //                            'mgt'               => 16, // margin_top
            //                            'mgb'               => 16, // margin_bottom
            //                            'mgh'               => 9, // margin_header
            //                            'mgf'               => 9, // margin_footer
            //                            'orientation'       => 'P', // landscape or portrait orientation
            //                        )
            ),
            'HTML2PDF' => array(
            'librarySourcePath' => 'application.vendors.html2pdf.*',
            'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
            //                        'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
            //                            'orientation' => 'P', // landscape or portrait orientation
            //                            'format'      => 'A4', // format A4, A5, ...
            //                            'language'    => 'en', // language: fr, en, it ...
            //                            'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
            //                            'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
            //                            'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
            //                        )
            )
            ),
            ),
            */


            // end user module

            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),

            // uncomment the following to enable URLs in path-format
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>require(dirname(__FILE__).'/urlManager_rules.php'),
            ),
            'db'=>require(dirname(__FILE__).'/db.php'),
            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),

            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
//                    array(
//                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                        'ipFilters'=>array('127.0.0.1','192.168.1.215'),
//                    ),
                    //                    array(
                    //                        'class'=>'CFileLogRoute',
                    //                        'levels'=>'error, warning',
                    //                    ),
                    //                    array(
                    //                        'class'=>'CWebLogRoute',
                    //                    ),
                ),
            ),


        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>require(dirname(__FILE__).'/params.php'),
        'defaultController' => 'web',
        
        'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
        'onEndRequest'=>create_function('$event', 'return ob_end_flush();'),
    );