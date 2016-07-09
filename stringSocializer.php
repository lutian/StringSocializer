<?php

/**
 * Parse string and add mentions and hashtags from many social networks
 * 
 * @version 1.1
 * @link https://github.com/lutian/stringSocializer
 * @author Lutian (Luciano Salvino)
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Luciano Salvino
 */

class stringSocializer {
    /**
     * @var string version
     */
	private $version = '1.1';
    
    /**
     * @var boolean html
     */
	private $html = true;
    
    /**
     * @var array socialNetworks
     */
    private $socialNetworks = [
                               'facebook'   => array('name' => 'facebook', 'url' => 'https://www.facebook.com/', 'hashtagLink' => 'https://www.facebook.com/hashtag/', 'mentionLink' => 'https://www.facebook.com/'),
                               'twitter'    => array('name' => 'twitter', 'url' => 'https://www.twitter.com/', 'hashtagLink' => 'https://twitter.com/search?q=', 'mentionLink' => 'https://twitter.com/'),
                               'instagram'  => array('name' => 'instagram', 'url' => 'https://www.instagram.com/', 'hashtagLink' => 'https://www.instagram.com/explore/tags/', 'mentionLink' => 'https://www.instagram.com/'),
                               'googleplus' => array('name' => 'googleplus', 'url' => 'https://plus.google.com/', 'hashtagLink' => 'https://plus.google.com/explore/', 'mentionLink' => 'https://plus.google.com/'),
                               'tumblr'     => array('name' => 'tumblr', 'url' => 'https://www.tumblr.com/', 'hashtagLink' => 'https://www.tumblr.com/tagged/', 'mentionLink' => 'https://www.tumblr.com/search/'),
                               'pinterest'  => array('name' => 'pinterest', 'url' => 'https://pinterest.com', 'hashtagLink' => 'https://pinterest.com/search/?rs=hashtag&q=%23', 'mentionLink' => 'https://pinterest.com/')
                               ];
    
    /**
     * @var array hashtags
     */
    private $hashtags;
    
    /**
     * @var array mentions
     */
    private $mentions;
    
    /**
     * @var string originalString
     */
	private $originalString;
    
    /**
     * @var array stringSocialized
     */
    private $stringSocialized;
    
    /**
     * @var string originalString
     */
    private function convertStringIntoLinks() {
        $this->originalString = preg_replace("/([\w]+\:\/\/[\w-?&;#~=.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\" class=\"taggs\">$1</a>", $this->originalString);
    }
    
    /**
     * @var array stringSocialized
     */
    private function convertStringIntoHashtags($network) {
        // depends on the social network you added in settings
        for($i=0;$i<count($this->hashtags[$network]);$i++) {
            // es hashtag o mention
            if(isset($this->hashtags[$network][$i]['hashtag'])) {
                if($this->getHtml()) {
                    $this->setStringSocialized($network, preg_replace($this->hashtags[$network][$i]['names'], "<a target=\"_new_".$network."\" href=\"".$this->socialNetworks[$network]['hashtagLink'].$this->hashtags[$network][$i]['hashtag']."\" class=\"taggs\">#".$this->hashtags[$network][$i]['title']."</a>", $this->stringSocialized[$network], 1));            
                } else {
                    $this->setStringSocialized($network, preg_replace($this->hashtags[$network][$i]['names'], "#".$this->hashtags[$network][$i]['title'], $this->stringSocialized[$network], 1));            
                }
            } elseif(isset($this->hashtags[$network][$i]['mention'])) {
                if($this->getHtml()) {
                    $this->setStringSocialized($network, preg_replace($this->hashtags[$network][$i]['names'], "<a target=\"_new_".$network."\" href=\"".$this->socialNetworks[$network]['mentionLink'].$this->hashtags[$network][$i]['mention']."\" class=\"taggs\">@".$this->hashtags[$network][$i]['title']."</a>", $this->stringSocialized[$network], 1));
                } else {
                    $this->setStringSocialized($network, preg_replace($this->hashtags[$network][$i]['names'], "@".$this->hashtags[$network][$i]['title'], $this->stringSocialized[$network], 1));
                }
            }
        }
    }
    
    /**
     * @var array stringSocialized
     */
    private function convertOriginalStringIntoSocialized() {
        $this->originalString = strip_tags($this->originalString);
        // convert to html
        if($this->getHtml()) {
            $this->convertStringIntoLinks();
        }
        
        foreach($this->socialNetworks as $network => $array) {
            //print_r($network);
            //echo '<br>'.$network['name'].'<br>';

            $this->setStringSocialized($network, $this->originalString);
            $this->convertStringIntoHashtags($network);

        }
        
    }
    
    /**
     * @var array stringSocialized
     */
    public function socializeString() {
        // first set stringSocialized
        $this->convertOriginalStringIntoSocialized();
    }
    
    
    /***************************************************************
     *                     Setters and Getters
     ***************************************************************/
    
    /**
     * Set hashtags
     * 
     * @return array
	 */
    public function setHashtags($hashtags) {
        $this->hashtags = $hashtags;
    }
    
    /**
     * Get hashtags
     * 
     * @return array
	 */
    public function getHashtags() {
        return $this->hashtags;
    }
    
    /**
     * Set originalString
     * 
     * @return string
	 */
    public function setOriginalString($originalString) {
        $this->originalString = $originalString;
    }
    
    /**
     * Get originalString
     * 
     * @return string
	 */
    public function getOriginalString() {
        return $this->originalString;
    }
    
    /**
     * Set stringSocialized
     * 
     * @return array
	 */
    public function setStringSocialized($network,$stringSocialized) {
        $this->stringSocialized[$network] =  $stringSocialized;
    }
    
    /**
     * Get stringSocialized
     * 
     * @return array
	 */
    public function getStringSocialized() {
        return $this->stringSocialized;
    }
    
    /**
     * Set html
     * 
     * @return boolean
	 */
    public function setHtml($bool) {
        $this->html = $bool;
    }
    
    /**
     * Get html
     * 
     * @return boolean
	 */
    public function getHtml() {
        return $this->html;
    }
    
}

?>