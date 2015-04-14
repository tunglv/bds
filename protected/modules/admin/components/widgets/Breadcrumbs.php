<?php
class Breadcrumbs extends CWidget
{
        public $tagName='ul';
        public $htmlOptions=array('class'=>'breadcrumbs');
        public $encodeLabel=true;
        public $homeLink;
        public $links=array();
        public $separator='';
        public function run()
        {
                if(empty($this->links)) return;

                echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
                
                $links=array();
                
                if($this->homeLink===null)
                    $links[]='<li>'.CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl).'</li>';
                else if($this->homeLink!==false)
                    $links[]='<li><a>'.$this->homeLink.'</a></li>';
                    
                    
                $links_count = count($this->links);
                $i = 1;
                foreach($this->links as $label=>$url)
                {
                    $active = $i == $links_count ? ' class = "active"' : ''; 
                    
                    if(is_string($label) || is_array($url))
                        $links[]='<li'.$active.'>'.CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url).'</li>';
                    else
                        $links[]='<li'.$active.'><a>'.($this->encodeLabel ? CHtml::encode($url) : $url).'</a></li>';
                    
                    $i++;
                }
                echo implode($this->separator,$links);
                echo CHtml::closeTag($this->tagName);
        }
}