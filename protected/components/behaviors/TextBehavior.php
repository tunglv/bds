<?php
class TextBehavior extends CActiveRecordBehavior {
    
    /**
    * parse content to content with tag
    */
    public $contentField = 'content';
    public function getContentTag() {
        $content = $this->Owner->{$this->contentField};
//        $content = 'abc [tag]keyword1[/tag] def [tag=http://abc.com/linkngoai]keyword2[/tag] ghe [tag=/linktrong]keyword3[/tag]';

        $conent = preg_replace_callback('/\[tag(?:=([^\]]+))?\]([^\[\/]+)\[\/tag\]/', function($m){
            if(!empty($m[2])){
                $keyword = html_entity_decode(strip_tags($m[2]), ENT_COMPAT, 'UTF-8'); 
                if(!empty($m[1])){
                    if(substr($m[1], 0, 4) == 'http'){
                        return CHtml::link($keyword, $m[1], array('target' => '_blank', 'rel' => 'nofollow'));     
                    }else{
                        return CHtml::link($keyword, Yii::app()->request->getBaseUrl(TRUE).$m[1], array('target' => '_blank'));
                    }

                }else{
                    
                    $url = Search::buildUrlFromFilterData(array(
                        'keyword' => preg_replace('{[\s\-]+}', '-', $keyword),
                    ));
                    return CHtml::link($keyword, $url, array('target' => '_blank'));
                }

            }
        }, $content); 
        
        return $conent;
    }
    

    public function getTagStr() {
        $content = $this->Owner->{$this->contentField};
        preg_match_all('/\[tag(?:=[^\]]+)?\]([^\[\/]+)\[\/tag\]/', $content, $m);
        $tags = array();
        foreach($m[1] as $tag){
            $tags[] = html_entity_decode(strip_tags($tag), ENT_COMPAT, 'UTF-8');    
        }
        return $tags ? implode(', ', $tags) : null;
    }
 
} 