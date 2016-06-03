<?php

require('stringSocializer.php');

$stringSocializer = new stringSocializer();

/**
 * Set the original string
 */
$originalString = 'El partido estaba igualado sin tantos hasta que el genio de Lionel Messi frotó la lámpara y sacó una jugada mágica de la galera para poner con remate cruzado el 1 a 0. tres minutos después una jugada velóz de Luis Suarez dejó solo a Neymar quien definió suave a la izquierda para decretar el 2 a 0 final.';
$stringSocializer->setOriginalString($originalString);

/**
 * Set the hashtags and mentions
 */
$hashtags = [
             'facebook' => [
                    [
                        'title' => 'LeoMessi',
                        'mention' => 'LeoMessi',
                        'names'   => ['/Lionel Messi/i'] 
                    ],
                    [
                        'title' => 'NeymarJr',
                        'mention' => 'Neymarjr',
                        'names'   => ['/Neymar/i'] 
                    ],
                    [
                        'title' => 'LuisSuarez',
                        'mention' => 'Luis-Suarez-167866666571743',
                        'names'   => ['/Luis Suarez/i'] 
                    ]
                ],
             'twitter' => [
                    [
                        'title' => 'Messi',
                        'hashtag' => 'Messi',
                        'names'  => ['/Lionel Messi/i'] 
                    ],
                    [
                        'title' => 'NeymarJr',
                        'mention' => 'neymarjr',
                        'names'   => ['/Neymar/i'] 
                    ],
                    [
                        'title' => 'LuisSuarez9',
                        'mention' => 'LuisSuarez9',
                        'names'   => ['/Luis Suarez/i'] 
                    ]
                ],
             'instagram' => [
                    [
                        'title' => 'LeoMessi',
                        'mention' => 'leomessi',
                        'names'  => ['/Lionel Messi/i'] 
                    ],
                    [
                        'title' => 'NeymarJr',
                        'mention' => 'neymarjr',
                        'names'   => ['/Neymar/i'] 
                    ],
                    [
                        'title' => 'LuisSuarez9',
                        'mention' => 'LuisSuarez9',
                        'names'   => ['/Luis Suarez/i'] 
                    ]
                ],
             'googleplus' => [
                    [
                        'title' => 'LeoMessi',
                        'hashtag' => 'LeoMessi',
                        'names'   => ['/Lionel Messi/i'] 
                    ],
                    [
                        'title' => 'NeymarJr',
                        'mention' => '110543884226915019329',
                        'names'  => ['/Neymar/i'] 
                    ],
                    [
                        'title' => 'LuisSuarez',
                        'mention' => '117508493298516511885',
                        'names'   => ['/Luis Suarez/i'] 
                    ]             
                ],
             'tumblr'   => [],
             'pinterest'   => [],
             ];
$stringSocializer->setHashtags($hashtags);

$stringSocializer->setHtml(true);

$stringSocializer->socializeString();

echo '<pre>';
echo $stringSocializer->getOriginalString();
echo '<br>';
print_r($stringSocializer->getStringSocialized());
echo '</pre>';

?>