# StringSocializer

StringSocializer is a simple PHP class that converts string into social media rich text. It add hashtags and mentions custimized for each social network

# Usage
```php
// Initialize Class
$stringSocializer = new stringSocializer();

// set original String
$originalString = 'El partido estaba igualado sin tantos hasta que el genio de Lionel Messi frotó la lámpara y sacó una jugada mágica de la galera para poner con remate cruzado el 1 a 0. tres minutos después una jugada velóz de Luis Suarez dejó solo a Neymar quien definió suave a la izquierda para decretar el 2 a 0 final.';
$stringSocializer->setOriginalString($originalString);

// Hashtags and Mentions for many social networks
$hashtags = array(
             'facebook' => array(
                    array(
                        'title' => 'LeoMessi',
                        'mention' => 'LeoMessi',
                        'names'   => array('/Lionel Messi/i') 
                    ),
                    array(
                        'title' => 'NeymarJr',
                        'mention' => 'Neymarjr',
                        'names'   => array('/Neymar/i') 
                    ),
                    array(
                        'title' => 'LuisSuarez',
                        'mention' => 'Luis-Suarez-167866666571743',
                        'names'   => array('/Luis Suarez/i') 
                    )
                ),
             'twitter' => array(
                    array(
                        'title' => 'Messi',
                        'hashtag' => 'Messi',
                        'names'  => array('/Lionel Messi/i') 
                    ),
                    array(
                        'title' => 'NeymarJr',
                        'mention' => 'neymarjr',
                        'names'   => array('/Neymar/i') 
                    ),
                    array(
                        'title' => 'LuisSuarez9',
                        'mention' => 'LuisSuarez9',
                        'names'   => array('/Luis Suarez/i') 
                    )
                ),
             'instagram' => array(
                    array(
                        'title' => 'LeoMessi',
                        'mention' => 'leomessi',
                        'names'  => array('/Lionel Messi/i') 
                    ),
                    array(
                        'title' => 'NeymarJr',
                        'mention' => 'neymarjr',
                        'names'   => array('/Neymar/i') 
                    ),
                    array(
                        'title' => 'LuisSuarez9',
                        'mention' => 'LuisSuarez9',
                        'names'   => array('/Luis Suarez/i') 
                    )
                ),
             'googleplus' => array(
                    array(
                        'title' => 'LeoMessi',
                        'hashtag' => 'LeoMessi',
                        'names'   => array('/Lionel Messi/i') 
                    ),
                    array(
                        'title' => 'NeymarJr',
                        'mention' => '110543884226915019329',
                        'names'  => array('/Neymar/i') 
                    ),
                    array(
                        'title' => 'LuisSuarez',
                        'mention' => '117508493298516511885',
                        'names'   => array('/Luis Suarez/i') 
                    )             
                ),
             'tumblr'   => array(),
             'pinterest'   => array(),
             );
$stringSocializer->setHashtags($hashtags);

// You can set the in html or text plain (optional)
$stringSocializer->setHtml(true);

// Socialize string
$stringSocializer->socializeString();

// Get the array result with the string customized for each social network
$arrayResult = $stringSocializer->getStringSocialized();
```
