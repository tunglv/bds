<?php
/**
* @package    Parser
* @subpackage    Text
*/
class TextParser
{
    /**
    * Đổi những ký tự là tiếng Việt thành nguyên âm tiếng Anh
    *
    * @param string $text
    * @return string
    */
    static public function convertVietnameseToNon($text){
        $vietnameseMappingTable = array(
        "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
        ,"ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
        ,"ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
        ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
        ,"Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ");

        $nonVietnameseMappingTable = array(
        "a","a","a","a","a","a","a","a","a","a","a"
        ,"a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o"
        ,"o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A"
        ,"A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O"
        ,"O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D");

        return str_replace($vietnameseMappingTable, $nonVietnameseMappingTable, $text);
    }

    /**
    * Biến 1 xâu thông thường thành 1 xâu hiển thị trên URL
    *
    * @param string $str
    *
    * @return string
    */
    static public function toSEOString($str, $separator = '-', $strLower = true, $hard=true, $ignoreChars=array())
    {
        if ($hard) $str = self::decodeSafeHtml($str);
        $str = self::convertVietnameseToNon($str);
        if ($strLower) $str = strtolower($str);
		$str = str_replace(array('_','-','.'), $separator, $str);
		$str = preg_replace("{[^\s\da-zA-Z{$separator}]+}", '', $str);
		
        $ignoreChars = implode($ignoreChars);
        $str = trim(preg_replace("{[^\da-zA-Z{$ignoreChars}]+}", $separator, $str), $separator);
        return  $str;
    }

    /**
    * Biến HTML thành dạng safe để có thể đưa vào SQL
    *
    * @param string $val
    * @return string
    */
    static public function encodeSafeHtml($val){
        $val = str_replace( "&"                , "&amp;"         , $val );
        $val = str_replace( "<!--"            , "&#60;&#33;--"  , $val );
        $val = str_replace( "-->"            , "--&#62;"       , $val );
        $val = str_ireplace( "<script"        , "&#60;script"   , $val );
        $val = str_replace( ">"                , "&gt;"          , $val );
        $val = str_replace( "<"                , "&lt;"          , $val );
        $val = str_replace( '"'                , "&quot;"        , $val );
        $val = str_replace( "$"                , "&#036;"        , $val );
        $val = str_replace( "!"                , "&#33;"         , $val );
        $val = str_replace( "'"                , "&#39;"         , $val ); // IMPORTANT: It helps to increase sql query safety.

        return $val;
    }

    /**
    * Biến một xâu được encode bởi hàm {@link encodeSafeHtml} trở lại thành dạng HTML thông thường
    *
    * @param string $val
    * @return string
    */
    static public function decodeSafeHtml($val){
        $val = str_replace("&#60;&#33;--"    ,    "<!--"         , $val );
        $val = str_replace("--&#62;"        ,    "-->"          , $val );
        $val = str_replace("&gt;"            ,    ">"            , $val );
        $val = str_replace("&lt;"            ,    "<"            , $val );
        $val = str_replace("&amp;"            ,    "&"            , $val );
        $val = str_replace("&#39;"            ,    "'"           , $val );
        $val = str_replace("&quot;"            ,    '"'         , $val );
        $val = str_replace("&#33;"             ,    "!"         , $val );
        $val = str_replace("&#036;"            ,    "$"         , $val );
        $val = str_ireplace("&#60;script"    ,    "<script"    , $val );

        return $val;
    }

    /**
    * Dọn dẹp những key truyền vào từ _GET hoặc _POST
    *
    * @param string $key
    * @return string
    */
    static public function cleanKey($key)
    {
        if ( $key == "" ) return "";
        $key = htmlspecialchars( urldecode($key) );
        $key = str_replace( ".."           , ""  , $key );
        $key = preg_replace( "/\_\_(.+?)\_\_/"  , ""  , $key );
        $key = preg_replace( "/^([\w\.\-\_]+)$/", "$1", $key );

        return $key;
    }

    /**
    * Chuyên dùng để dọn dẹp những thứ nguy hiểm truyền vào từ _GET hoặc _POST
    *
    * @param string $val
    * @return string Xâu sạch sẽ, đẹp đẽ, an toàn
    */
    static public function cleanValue($val){
        if ( $val == "" ) return "";

        $val = str_replace( "&#032;", " ", $val);
        $val = str_replace( chr(0xCA), "", $val );

        # Convert all carriage return combos
        $val = str_replace( array( "\r\n", "\n\r", "\r" )    , "\n"            , $val );
        $val = self::encodeSafeHtml($val);

        //-----------------------------------------
        // Ensure unicode chars are OK
        //-----------------------------------------
        $val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val );

        //-----------------------------------------
        // Try and fix up HTML entities with missing ;
        //-----------------------------------------
        $val = preg_replace( "/&#(\d+?)([^\d;])/i", "&#\\1;\\2", $val );
        return $val;
    }

    /**
    * Xóa rác HTML khi paste vào từ MsOffice
    *
    * @param string $value
    * @return string
    */
    static public function removeMsOfficeHtml($value){
        $value = str_replace('<o:p>&nbsp;</o:p>', '' , $value );
        $value = str_replace('<o:p></o:p>', '' , $value );
        $value = str_replace('style="margin: 0cm 0cm 0pt;"', "" , $value );
        $value = str_replace('>&nbsp;<', "><" , $value );
        return $value;
    }

    /**
    * Tidy HTML để đảm bảo đoạn HTML không bị vỡ
    *
    * @param string $value
    * @return string
    */
    static public function tidyHtml($value){
        $value = self::removeMsOfficeHtml($value);
        $options = array(
            "output-html"         =>     true,
            "show-body-only"     =>    true,
            "hide-comments"        =>    true,
            "word-2000"            =>    true,
            "output-encoding"    =>    "utf8",
            "input-encoding"    =>    "utf8",
        );
        $value = str_replace('&nbsp;', "(olala)" , $value );
        $tidy = tidy_parse_string($value, $options);
        tidy_clean_repair($tidy);
        $value = $tidy;
        $value = str_replace( "(olala)", "&nbsp;" , $value );
        $value = str_replace( "\n", " " , $value );
        return $value;
    }

    /**
    * Biến HTML thành dạng linebreak
    *
    * @param string $t
    * @return string
    */
    static public function convertToLineBreak($t){
        $t    = str_replace( array( "\r", "\n" ), '', $t );
        $t    = str_replace( array( "<br />", "<br>", "<br/>" ), "\n", $t );
        return $t;
    }

    /**
    * Biến các xâu nhập vào từ Windows hay Mac Os thành dạng xâu Unix
    *
    * @param string $t
    * @return string
    * @author IPB 3.0.1
    */
    static public function convertToUnix($t){
        // windows
        $t = str_replace( "\r\n" , "\n", $t );
        // Mac OS 9
        $t = str_replace( "\r"   , "\n", $t );
        return $t;
    }

    /**
    * Biến xâu từ linebreak thành HTML br
    *
    * @param string $t
    * @return string
    */
    static public function convertToHtmlBreak($t){
        $t = self::convertToUnix($t);
        $t = str_replace("\n", "<br/>", $t);
        return $t;
    }

    /**
    * Kiểm tra xem xâu nhập vào có phải email hợp lệ tồn tại không
    *
    * @param string $email
    * @return boolean
    * @author IPB 3.0.1
    */
    static public function checkValidEmailAddress($email){
        $email = trim($email);
        $email = str_replace( " ", "", $email );
        //-----------------------------------------
        // Check for more than 1 @ symbol
        //-----------------------------------------
        if ( substr_count( $email, '@' ) > 1 ) return false;

        if ( preg_match( "#[\;\#\n\r\*\'\"<>&\%\!\(\)\{\}\[\]\?\\/\s]#", $email ) )
            return false;
        else if ( preg_match( "/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,4})(\]?)$/", $email) )
            return true;
        else
            return false;
    }

    /**
    * Kiểm tra xem xâu nhập vào có phải url hợp lệ cho member hay không?
    *
    * @param string $url
    * @return boolean
    * @author IPB 3.0.1
    */
    static public function checkValidMemberUrl($url)
    {
        $url = trim($url);

        return preg_match('/^[a-z0-9]{3,64}$/', $url );
    }

    /**
    * Kiểm tra xem xâu nhập vào có phải display_name hợp lệ cho member hay không?
    *
    * @param string $displayName
    *
    */
    static public function checkValidDisplayName($displayName)
    {
        return strlen($displayName) >= 3;
    }

    /**
    * Biến 1 xâu tìm kiếm thành những cụm từ tìm kiếm tương đương để khắc phục lỗi unicode, chữ Đ
    *
    * @param string $str xâu tìm kiếm
    * @return array mảng các xâu tương đương
    */
    static function parseUnicodeErrorForMySQL($str)
    {
        if (!is_array($str)) $str = array($str);
        $rs = $str;

        $src = array('d', 'Đ', 'đ');
        $dst = array('d', 'Đ', 'đ');

        foreach ($src as $srcStr) {
            foreach ($dst as $dstStr) {
                if ($srcStr != $dstStr)
                    foreach ($str as $s) {
                         $rs[] = str_ireplace($srcStr, $dstStr, $s);
                    }
            }
        }

        return array_unique($rs);
    }

    /**
    * Từ keyword build ra cú pháp SQL Like để tìm kiếm theo keyword đó.
    * Định nghĩa :
    *     - 1 từ là 1 xâu chỉ chứa chữ cái latin hoặc dấu trắng
    *     - Từ khóa tìm kiếm có thể có nhiều từ
    *     - 1 giá trị thỏa mãn từ khóa tìm kiếm là chứa tất cả các từ trong từ khóa đó
    *
    * ví dụ :
    *     'Máy tính laptop' thỏa mãn 'laptop',
    *     'Máy tính laptop' thỏa mãn 'laptop, máy tính',
    *     'Máy tính laptop' không thỏa mãn 'desktop, máy tính',
    *
    * @param string $keywords từ khóa tìm kiếm
    * @param string|array $fieldName tên field trong database chứa từ khóa cần tìm kiếm. Nếu là nhiều field thì truyền vào mảng các tên. 1 item thỏa mãn nếu có ít nhất 1 field thỏa mãn từ khóa tìm kiếm
    *
    * @return string
    */
    static function parseKeywordsForSQLLike($keywords, $fieldName)
    {
        if (!is_array($fieldName)) $fieldName = array($fieldName);
        $keywords = preg_split('{[^\p{Latin}\s]+}iu', $keywords);

        $state = array();

        foreach ($keywords as $kw) {
            $kws = self::parseUnicodeErrorForMySQL($kw);
            $kwState = array();

            foreach ($kws as $k)
                foreach ($fieldName as $fn) $kwState[] = '(' . $fn . ' LIKE "%' . addslashes(trim($k)) . '%")';

            $state[] = '(' . implode(' OR ', $kwState) . ')';
        }

        return '(' . implode(' AND ', $state) . ')';
    }

    /**
    * Kiểm tra xem 1 URL có hợp lệ hay không
    *
    * @param string $url url cần kiểm tra
    *
    * @return string|boolean FALSE nếu không hợp lệ, đường dẫn chính xác nếu hợp lệ
    */
    /*
    static public function checkValidLinkUrl($url, $defaultProtocol = 'http')
    {
        $urlPattern = <<<'PATTERN'
{
    ^
    ((https?|ftps?)://)?                         # protocol
    (\w+:\w+@)?                                  # username:password@
    ((?:[\w\d-]+\.)+[a-z]{2,3})                # domain
    (\:\d{1,5})?                            # port
    ((?:/[^\s/]*)*)?                        # path & file
    (\?(?:[^\s#&=]+=?[^\s#&$]*?&?)*)?    # query string
    (\#[^\s$]*)?                            # bookmark
}ix
PATTERN;

        if (!preg_match($urlPattern, trim($url, "\n\r\t"), $matches)) return FALSE;

        if (empty($matches[1])) $url = $defaultProtocol . '://' . $url;

        return $url;
    }
    */
    /**
    * Làm sáng một đoạn text những từ khớp với từ đang tìm
    *
    * @param string $text    text nhập vào
    * @param string $highlight    từ cần làm sáng
    * @return string
    * @author IPB 3.0.1
    */
    static public function highLight($text, $highlight){
        $highlight  = self::cleanValue( urldecode( $highlight ) );
        $loosematch = strstr( $highlight, '*' ) ? 1 : 0;
        $keywords   = str_replace( '*', '', str_replace( "+", " ", str_replace( "++", "+", str_replace( '-', '', trim($highlight) ) ) ) );
        $keywords    = str_replace( '&quot;', '', str_replace( '\\', '&#092;', $keywords ) );
        $word_array = array();
        $endmatch   = "(.)?";
        $beginmatch = "(.)?";

        if ( $keywords )
        {
            if ( preg_match("/,(and|or),/i", $keywords) )
            {
                while ( preg_match("/\s+(and|or)\s+/i", $keywords, $match) )
                {
                    $word_array = explode( " ".$match[1]." ",    $keywords );
                    $keywords   = str_replace( $match[0], '',    $keywords );
                }
            }
            else if ( strstr( $keywords, ' ' ) )
            {
                $word_array = explode( ' ', str_replace( '  ', ' ', $keywords ) );
            }
            else
            {
                $word_array[] = $keywords;
            }

            if ( ! $loosematch )
            {
                $beginmatch = "(^|\s|\>|;)";
                $endmatch   = "(\s|,|\.|!|<br|&|$)";
            }

            if ( is_array($word_array) )
            {
                foreach ( $word_array as $keywords )
                {
                    /* Make sure we're not trying to process an empty keyword */
                    if( ! $keywords )
                    {
                        continue;
                    }

                    preg_match_all( "/{$beginmatch}(".preg_quote($keywords, '/')."){$endmatch}/is", $text, $matches );

                    for ( $i = 0; $i < count($matches[0]); $i++ )
                    {
                        $text = str_replace( $matches[0][$i], $matches[1][$i] . "<span class='searchlite'>" . $matches[2][$i] . "</span>" . $matches[3][$i], $text );
                    }
                }
            }
        }

        return $text;
    }

    /**
    * Kiểm tra xem xâu có phải UTF8 không
    *
    * @param string $str
    */
    static public function isUTF8($str) {
        $c=0; $b=0;
        $bits=0;
        $len=strlen($str);
        for($i=0; $i<$len; $i++)
        {
            $c=ord($str[$i]);

            if($c > 128)
            {
                if(($c >= 254)) return false;
                elseif($c >= 252) $bits=6;
                elseif($c >= 248) $bits=5;
                elseif($c >= 240) $bits=4;
                elseif($c >= 224) $bits=3;
                elseif($c >= 192) $bits=2;
                else return false;

                if(($i+$bits) > $len) return false;

                while( $bits > 1 )
                {
                    $i++;
                    $b = ord($str[$i]);
                    if($b < 128 || $b > 191) return false;
                    $bits--;
                }
            }
        }

        return true;
    }

    static function generateExcerpt($string, $length, $breakWords=false, $middle=false, $etc = '...'){
        if ($length == 0) return '';
        $string = strip_tags($string);
        if (mb_strlen($string) > $length) {
            $length -= min($length, mb_strlen($etc));
            if (!$breakWords && !$middle) {
                $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1));
            }
            if(!$middle) {
                return mb_substr($string, 0, $length) . $etc;
            } else {
                return mb_substr($string, 0, $length/2) . $etc . mb_substr($string, -$length/2);
            }
        } else {
            return $string;
        }
    }

    static function truncateHtmlString($text, $length, $ending = '...')
    {
        // if the plain text is shorter than the maximum length, return the whole text
        if (mb_strlen(preg_replace('/<.*?>/s', '', $text)) <= $length)
        {
            return $text;
        }

        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);

        $total_length    = mb_strlen($ending);
        $open_tags         = array();
        $truncate = '';

        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag (f.e. </b>)
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                        unset($open_tags[$pos]);
                    }
                    // if tag is an opening tag (f.e. <b>)
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }

            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length > $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += mb_strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= mb_substr($line_matchings[2], 0, $left+$entities_length);

                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }

            // if the maximum length is reached, get off the loop
            if($total_length >= $length) {
                break;
            }
        }

        // ...search the last occurance of a space...
        $spacepos = mb_strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = mb_substr($truncate, 0, $spacepos);
        }

        // add the defined ending to the text
        $truncate .= $ending;

        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }

        return $truncate;
    }

    /**
    * url                =>    <a href="url">url</a>
    * [[url]]            =>    <a href="url">url</a>
    * [[url|label]]     =>    <a href="url">label</a>
    * url|label]]         =>    <a href="url">label</a>
    *
    * @param mixed $text
    * @return mixed
    */
    static function replaceUrlWithA($text)
    {
        $text = preg_replace('{href=(\'|\")\s*([^\\1]+?)\s*\\1}', 'href="$2"', $text);
        $text = preg_replace('{<a\s([^<]*)>(?:\s*)([^<]+?)(?:\s*)</a>}s', '<a $1>$2</a>', $text);

        $urlPattern = '{' .
            '(?:\s|\[\[|^)' .                             # delimiter
            '((?:https?|ftps?)://)' .                     # protocol (1)
            '(\w+:\w+@)?' .                              # username:password@ (2)
            '((?:[\w\d]+\.)+[a-z]{2,3})' .                # domain (3)
            '(\:\d{1,5})?' .                            # port (4)
            '((?:/[^\s\|]*)*)?' .                        # path & file (5)
            '(\?(?:[^\s#&=\|](?:=[^\s#&$\|]+)?&?)*)?' .    # query string (6)
            '(#[^\s$\|]*)?' .                            # bookmark (7)
            '(?:\|(.*?)(?=\]\]))?' .                    # label (8)
            '(?:\s|\]\]|$)' .                            # delimiter
        '}e';

        $urlReplacement = '" <a href=\"$1$2$3$4$5$6$7\">" . (("$8" == "") ? trim("$1$3$4$5$6$7") : trim("$8")) . "</a> "';

        $text = preg_replace($urlPattern, $urlReplacement, $text);

        return $text;
    }

    /**
    * <a href="url">url</a>        =>    [[url]]
    * <a href="url">label</a>    =>    [[url|label]]    # when label != url
    *
    * @param mixed $text
    * @return mixed
    */
    static function replaceAWithUrl($text)
    {
        $urlPattern =
            '((?:https?|ftps?)://)' .                     # protocol (2)
            '(\w+:\w+@)?' .                              # username:password@ (3)
            '(' .                                        # rest of url (4)
                '(?:[\w\d]+\.)+[a-z]{2,3}' .                # domain
                '(?:\:\d{1,5})?' .                            # port
                '(?:(?:/[^\s\|]*)*)?' .                        # path & file
                '(?:\?(?:[^\s#&=\|](?:=[^\s#&$\|]+)?&?)*)?' .    # query string
                '(?:#[^\s$\|]*)?' .                            # bookmark
            ')';

        $aPattern = '{' .
            '<a\s.*?' .                             # start A tag and before href
            "href=(\"|\')(?:{$urlPattern})\\1" .             # href (1, 2, 3, 4)
            '[^>]*>' .                                # after href and before label
            '([^<]*)' .                                # label (5)
            '</a>' .                                # end A tag
        '}e';

        $aReplacement = '"[[$2$3$4" . (("$2$4" == "$5") ? "" : "|$5" ) . "]]"';

        $text = preg_replace($aPattern, $aReplacement, $text);

        return $text;
    }

    static function checkHexColor(&$color){
        $color = trim($color);
        $color = trim($color, '#');
        return preg_match('/^(?:[\da-f]{3}|[\da-f]{6})$/i', $color);
    }

    static function parseWikiToSave($string){
        $string = self::convertToHtmlBreak($string);
        return self::replaceUrlWithA($string);
    }

    static function parseWikiToEdit($string){
        $string = self::convertToLineBreak($string);
        return self::replaceAWithUrl($string);
    }
    /*
    static function replaceWikiObjectLink($string)
    {
        $search = <<<'PATTERN'
{
\[\[            # start link
    (?:(\w+):)?    # capture wiki object type, default will be manga
    ([^\]\[|:]+?)    # capture wiki object url
    (?:\|(.*?))?    # capture link label
\]\]            # end link
}ix
PATTERN;

        $map = array(
            'manga'    =>    array('', null, 'truyen_tranh', 'manga'),
            'people'    =>    array('tac_gia', 'people'),
            'character'    =>    array('nhan_vat', 'char', 'character'),
        );

        $x = array(
            'manga'            =>    'truyen_tranh',
            'people'        =>    'tac_gia',
            'character'        =>    'nhan_vat',
        );

        $replaceFunc = function($matches) use ($map, $x)
        {
            $url = $matches[2];
            $type = is_null($matches[1]) ? '' : $matches[1];
            $wtype = null;

            foreach ($map as $k => $v)
                if (in_array($type, $v)) $wtype = $k;

            if (is_null($wtype)) return $matches[0];

            $label = isset($matches[3]) && !empty($matches[3]) ? $matches[3] : $url;

            $class = getPrvObj($wtype, str_replace('_', ' ', $url))->isExisted() ? 'exist' : 'notexist';

            $url = addslashes($url);

            $uc = Config::read('url');
            $url = $uc['wiki'] . "{$x[$wtype]}:" . str_replace(' ', '_', $url) . '/';

            $a = "<a href='{$url}' class='{$class}'>{$label}</a>";

            return $a;

            return htmlentities($a);

            return print_r($matches, true);
        };

        #preg_match_all($search, $string, $matches);

        #echo '<pre>' . print_r($matches, true) . '</pre>' . "\n";

        return preg_replace_callback($search, $replaceFunc, $string);
    }
    */
    static function parseWikiToView($string)
    {
        $string = self::replaceUrlWithA($string);

        $string = self::replaceWikiObjectLink($string);

        return $string;
    }

    /**
    * Hàm này sẽ cache lại những file ảnh ở trong 1 đoạn văn bản HTML
    *
    * @param string $html đoạn văn bản chứa img cần cache lại
    * @param integer $itemId id của item mà đoạn văn bản này thuộc vào
    * @param callback $cacheFunc hàm này dùng để cache 1 url
    * <code>
    *     function string cache_url($url, $itemId);
    *         - $url : url của ảnh
    *         - $itemId : id của item mà ảnh này thuộc vào
    *         - return value : url của ảnh sau khi đã cache
    * </code>
    *
    * @param bool|string $alt: TRUE: alt = href. FALSE: giữ nguyên alt. STRING: Replace alt value
    *
    * @return string Đoạn HTML sau khi đã được cache lại
    *
    * @author Tarzan <hocdt@vsmc.vn>
    */
    /*
    static function cacheImgFileInHtml($html, $itemId, $cacheFunc, $alt = TRUE)
    {
        $html = preg_replace_callback('{<img([^>]+)src\s*=\s*[\'"]([^>\'"]+)[\'"]([^>]*)>}i', function ($m) use ($itemId, $cacheFunc, $alt) {
            try {
                $newUrl = call_user_func($cacheFunc, $m[2], $itemId);

                if ($alt !== false) {
                    if ($alt === true) $tAlt = $newUrl;
                    else $tAlt = htmlspecialchars($alt, ENT_QUOTES);

                    $m[1] = preg_replace('{alt\s*=\s*[\'"][^\'"]+[\'"]}i', "alt=\"{$tAlt}\"", $m[1]);
                    $m[1] = preg_replace('{alt\s*=[^\'"\s]+[\'"]?}i', "alt=\"{$tAlt}\"", $m[1]);

                    $m[3] = preg_replace('{alt\s*=\s*[\'"][^\'"]+[\'"]}i', "alt=\"{$tAlt}\"", $m[3]);
                    $m[3] = preg_replace('{alt\s*=[^\'"\s]+[\'"]?}i', "alt=\"{$tAlt}\"", $m[3]);
                }
            }
            catch (Exception $e) {
                $msg = ExceptionHandler::buildReportForException($e);
                echo $msg;
                error_log($msg);
                return $m[0];
            }

            return sprintf('<img%ssrc="%s"%s>', $m[1], $newUrl, $m[3]);
        }, $html);


        return $html;
    }
    */
    /**
    * Hàm này thực hiện việc chuẩn hóa HTML để hiển thị trên hệ thống. Các rule để chuẩn hóa như sau :
    * <code>
    *    1. Không cho phép các element : script, style,  body, html, head, form, select, input, option, textarea, button, iframe
    *    5. Các thẻ a thêm targe="_blank", empty href nếu href="javascript:*"
    *     2. Convert các thẻ div thành thẻ p
    *     3. Không cho phép các attributes : on*, id, name, type
    *     4. Chuẩn hóa cấu trúc HTML cho đúng thẻ đóng, mở
    * </code>
    *
    * @param string $html html để chuẩn hóa
    * @param array opt : array(
    *     'alt' => 'alt string will be replaced'
    * )
    * @return string html đã chuẩn hóa
    */
    static function normalizeHtmlToView($html, $opts = array('alt' => TRUE))
    {
        # step 0
        #if (preg_match('{<body>(.*)</body>}ius', $html, $matches)) $html = $matches[1];

        # STEP 4
        $tidy = new tidy();
        $tidy->parseString($html, array(
#            'output-xml'            =>    true,
            "show-body-only"         =>    true,
            'output-encoding'        =>    'utf8',
        ), 'utf8');
        $tidy->cleanRepair();
        $html = tidy_get_output($tidy);

        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

           $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->strictErrorChecking = false;
        $doc->encoding = 'UTF-8';
        @$doc->loadHTML($html);

        $xpath = new DOMXPath($doc);

        // STEP 1 + 3:
        $nodes = $xpath->query('//head | //script | //style | //form | //select | //input | //option | //textarea | //button | //iframe');
        for ($i = 0; $i < $nodes->length; $i++) {
            $node = $nodes->item($i);
            $node->parentNode->removeChild($node);
        }

        $nodes = $xpath->query('//@id | //@name | //@type | //@onclick | //@ ondblclick | //@onmousedown | //@onmouseup | //@onmouseover | //@onmousemove | //@onmouseout | //@onkeypress | //@onkeydown | //@onkeyup | //@onload | //@onunload | //@onfocus | //@onblur | //@onsubmit | //@onreset | //@onselect | //@onchange');
        for ($i = 0; $i < $nodes->length; $i++) {
            /**
            * @var DOMAttr
            */
            $node = $nodes->item($i);
            $node->ownerElement->removeAttributeNode($node);
        }

        // STEP 5
        $as = $xpath->query('//a');
        for ($i = 0; $i < $as->length; $i++) {
            /**
            * @var DOMElement
            */
            $a = $as->item($i);
            $a->setAttribute('target', '_blank');

            $href = $a->getAttribute('href');
            if (empty($href)) continue;
            if (strpos($href, 'javascript') === 0) {
                $a->setAttribute('href', '');
                continue;
            }

            if (preg_match('{\w+:[^/]}', $href)) continue;

            $redirectUrl     = Config::read('url|redirect_station', 'http://ciao.vn/redirect.php?url=');
            $href            = self::smartURLEncode($href, array('source'    =>    'ciao.vn'));

            if (stripos($href, $redirectUrl) !== 0) $href = $redirectUrl . $href;
            $a->setAttribute('href', $href);
        }

        $html = $doc->saveHTML();

        # STEP 2 :
        $html = str_ireplace(array('<div', '</div>'), array('<p', '</p>'), $html);

        $html = str_ireplace(array('<html>', '</html>','<body>','</body>'), '', $html);
        $html = mb_convert_encoding($html, 'UTF-8', 'HTML-ENTITIES');

        $html = preg_replace('~<!DOCTYPE[^>]+>~', '', $html);

        return $html;
    }

    /**
    * Encode url theo kiểu thông minh. Thông minh như thế nào tạm thời chưa giải thích.
    *
    * Đầu vào là 1 url, hàm này sẽ giữ nguyên những ký tự đã được encode, sau đó encode những ký tự cần thiết
    *
    * @param string $url url cần encode
    * @param array $args những tham số cần bổ sung thêm vào query string
    *
    * @return string url
    */
    static function smartURLEncode($url, $args = array())
    {
        $url = trim($url, ' "\'');
        if (!preg_match('{^\w+://}', $url)) $url = 'http://' . $url;

        $tmp = parse_url($url);
        if ($tmp === false) return $url;
        $parts = array_merge(
            array(
                'scheme'    =>    'http',
                'host'        =>    'ciao.vn',
                'path'         =>     '/',
                'query'     =>     '',
                'fragment'    =>    '',
            ),
            $tmp
        );

        $tmp = preg_replace('{%([\da-z]{2})}i', '#\1#', $parts['path']);
        $tmp = rawurlencode($tmp);
        $tmp = str_ireplace('%2f', '/', $tmp);
        $parts['path'] = preg_replace('{%23([\da-z]{2})%23}i', '%\1', $tmp);

        $tmp = array();
        foreach ($args as $k => $v) $tmp[] = $k . '=' . rawurlencode($v);
        $parts['query'] .= (empty($parts['query']) ? '' : '&') . implode('&', $tmp);

        $newUrl =
            $parts['scheme'] . '://' . $parts['host'] . $parts['path'] .
            (empty($parts['query']) ? '' : ('?' . $parts['query'])) .
            (empty($parts['fragment']) ? '' : ('#' . $parts['fragment']))
            ;

        return $newUrl;
    }
}
?>
