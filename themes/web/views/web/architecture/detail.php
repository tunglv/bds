<div id="MainContent"></div>
<div class="clear">
</div>

<div class="body-left">
<div id="Breadcrumb"></div>
<div id="TopContent"></div>
<div>
    <div id="TopContentLeft" class="SubTopContent"></div>
    <div id="TopContentRight" class="SubTopContent"></div>
</div>
<div style="clear: both;">
</div>
<div id="LeftMainContent">

<div class="container-default">
<div id="ctl27_BodyContainer">

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/lightGallery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/themes/web/files/css/lightGallery.css">
<!--<script type="text/javascript">-->
<!--    function clearInputContent(e) {-->
<!--        if (e.value == "Hãy bình luận để mọi người biết được ý kiến của bạn về bài viết này!") {-->
<!--            e.value = "";-->
<!--        }-->
<!--    }-->
<!--</script>-->
<div id="ctl27_ctl01_panelNewsDetails" class="contentDetail">

    <h1 id="ctl27_ctl01_divArticleTitle" class="detailsView-title-style"><?php echo $architecture->title?></h1>
    <div id="ctl27_ctl01_divDate" class="date-first"><?php echo date("d/m/Y H:i", $architecture->created)?></div>
    <div id="ctl27_ctl01_palSubject">

        <?php if(count($topic)>0):?>
            <div>
                <div class="inasub">
                    <strong>Cùng chủ đề: </strong>
                    <a href="<?php echo Yii::app()->createUrl('/web/architecture/topic', array('alias'=>$architecture->topic->alias,'id' => $architecture->topic_id))?>"><?php echo $architecture->topic->title?></a></div>
                <div class="subinart">
                    <?php foreach($topic as $_key_topic => $_val_topic):?>
                        <div class="artlist">
                            <a href="<?php echo Yii::app()->createUrl('/web/architecture/detail', array('alias'=>$_val_topic['alias'],'id' => $_val_topic['id']))?>" class="line"><?php echo $_val_topic['title']?></a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endif;?>

    </div>
    <div class="detailsView-contents-style">
        <h2 id="ctl27_ctl01_divSummary" class="summary"><?php echo $architecture->desc?></h2>

    </div>
    <div id="divContents" class="detailsView-contents-style detail-article-content" style="overflow: hidden;"><?php echo $architecture->content?></div>
    <div id="ctl27_ctl01_divSourceNews" class="detailsView-contents-style soucenews" style="padding: 10px">
    </div>


    <div style="clear: both; height: 20px;"></div>

</div>
<div class="clear" style="margin-bottom: 10px;">
</div>

<div style="display: none">
</div>
<div>
    <br>
</div>
<div id="ctl27_ctl01_panelOtherNews">

    <div class="othernews">
        <?php if(count($same) > 0):?>
            <h3 class="normalblue" style="white-space:nowrap;">Tin mới nhất</h3>
            <div class="otherline">&nbsp;</div>
            <div class="otherline"></div>
            <?php foreach($same as $_k_news => $_val_news):?>
                <a class="font-link-box-item iconlist" href="<?php echo Yii::app()->createUrl('/web/architecture/detail', array('alias'=>$_val_news['alias'],'id' => $_val_news['id']))?>" title="<?php echo $_val_news['title']?>"><?php echo $_val_news['title']?><i>(<?php echo date("d/m", $_val_news['created'])?>)</i></a>
            <?php endforeach;?>
        <?php endif;?>
    </div>

</div>
<div style="text-align: right;">
    <a id="lnkNewOther" class="normalblue" href="<?php echo Yii::app()->createUrl('/web/architecture/list', array('alias'=>$architecture->aliasTypeLabel))?>" style="cursor: pointer;
        text-decoration: none; font-weight: bold;">Xem thêm các tin khác</a>
</div>
<style type="text/css">
    .page
    {
        margin-left: 2px;
        width: auto;
        color: #000000;
        text-decoration: none;
        height: 23px;
        line-height: 23px;
        float: left;
        padding-left: 6px;
        padding-right: 6px;
        border: 1px solid #ccc;
        display: block;
    }
    .clickPage
    {
        color: white;
        background-color: blue;
    }
</style>
<script type="text/javascript">

function validate() {
    if (typeof (Page_ClientValidate) == 'function') {
        var isPageValid = Page_ClientValidate('ValidateComment');
        if (isPageValid) {

        }
        return false;
    }
}

$(document).ready(function() {
    var slide = 'False';
    var aId = '67131';
    if(slide.toLowerCase() == "true") {
        $("#divContents img").each(function () {
            $(this).parent().css("position","relative");
            $(this).addClass("ccursor");
            var text = aId > 62022 ? $(this).attr("title") : $(this).attr("alt");
            $(this).wrap("<span class='imageGallery relativepos' data-src='" + $(this).attr("src") + "' data-desc='" + text + "'></span>");
            var pos = $(this).position();
            $(this).parent().append("<span class='icon-slide-show' style='left:" + (pos.left + $(this).width() - 28) + "px;top:" + (pos.top ) + "px;'>&nbsp;</span>");
        });
        $("#divContents").lightGallery({
                desc:true,
                loop: true,
                escKey: true,
                lang: {allPhotos: 'Tất cả ảnh'}
            }
        );
    }

});


function ClearCommentForm() {
    var lst = $('#' + 'panelCommentUpdate').find('.text-field');
    for (var i = 0; i < lst.length; i++) {
        $(lst[i]).val('');
    }
}
function UpdateIncreaLikeNumber(id, type, classid) {
    var img = new Image();
    img.src = $("#DomainStatistic").val() + '/StatisticServiceLibrary/like/' + id;
    var lblLike = $('.' + classid).text();
    lblLike = parseInt(lblLike) + 1;
    $('.' + classid).text(lblLike);
    $('#' + classid).text("Không thích");
    var str = $('#' + classid).text();

}
function UpdateUncreaLikeNumber(id, type, classid) {
    var img = new Image();
    img.src = $("#DomainStatistic").val() + '/StatisticServiceLibrary/unlike/' + id;
    var lblLike = $('.' + classid).text();
    lblLike = parseInt(lblLike) - 1;
    $('.' + classid).text(lblLike);
    $('#' + classid).text("Thích");
    var str = $('#' + classid).text();

}
function setCookieLike(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}
function getCookieLike(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}
function UpdateLikeNumberAndCookie(id, type, classid) {

    var islike = getCookieLike(classid);


    if ((islike != null) && (islike != "") && (islike == classid)) {
        alert("Cảm ơn bạn.Sau 24h bạn mới được thao tác tiếp");
    } else {
        var strTitle = $('#' + classid).text();
        if (strTitle == 'Thích') {
            UpdateIncreaLikeNumber(id, type, classid);
        } else {
            UpdateUncreaLikeNumber(id, type, classid);
            setCookieLike(classid, classid, 1);
        }
    }
}

//Modules/News/ManagerNews/
function LoadPageNumber() {
    var total = 0;
    var pageSize = 20;
    var maxPage = 30;
    if (total>0) {
        var numPage = 0;
        if (total%pageSize==0) {
            numPage = total / pageSize;
        } else {
            numPage = total / pageSize + 1;
        }
        if(numPage>maxPage) numPage = maxPage;
        if (numPage>=2) {
            for (var i = 1; i <= numPage; i++) {
                if (i==1) {
                    $('#paging').append("<a href=\"#\" class=\"page clickPage\">"+i+"</a>");
                    continue;
                }
                $('#paging').append("<a href=\"#\" class=\"page\">"+i+"</a>");
            }
        }
    }
}



$(function () {

    $('.detail-article-content a').each(function () {
        if ($(this).parent().is('span')) {
            var $parent = $(this).parent();
            var styleSpan = $parent.attr('style');
            $(this).attr('style', styleSpan);
        }
    });

    $(".openFancy").fancybox({
        'maxWidth': 450,
        'minHeight': 385
    });

//                if ($.browser.msie && $.browser.version <= 7 && !window.fancybox_is_ready) {
//                  $(window).load(function() {
//                    $(".openFancy").fancybox();
//                  });
// 
//                  //return;
//                }


    function closeLightBox() {
        $('.fancybox-close').click();
    }

    // ThanhDT: Hide comment box
    /*
     $('#paging').html('');
     LoadPageNumber();
     $('.page').click(function () {
     $('.page').removeClass("clickPage");
     $(this).addClass("clickPage");
     var numpage = $(this).html();
     $('#pageResult').html(numpage);
     var article = <-%=ArticleId %->;
     /////////////////////

     var returnvalue = $.data(document.body, 'ArticleComment_' + article+'_'+numpage);
     var foot,content='',date,month;
     if (returnvalue != null) {
     $.each(returnvalue, function (index, value) {
     date = new Date(parseInt(value.SubmittedDate.replace("/Date(", "").replace(")/",""), 10));
     month = parseInt(date.getMonth());
     month += 1;
     if(month<10) month = '0' + month;
     foot = value.FullName != ''? value.FullName + "&nbsp;|&nbsp;" : "";
     foot += date.getDate()+'-'+month+'-'+date.getFullYear();
     content += "<div style=\"padding: 10px;\">";
     content+="<div><strong>" + value.Title + "</strong></div>";
     content+="<div>"+value.Content+"</div>";
     content+="<div style=\"font-style: italic; font-weight: bold; font-size: 0.9em;\">"+foot+"</div>";
     content+="</div><div style=\"border-top: 1px solid #ccc\"></div>";
     });
     $('.ar-comment').html(content);
     }
     else {
     $.ajax({
     type: "POST",
     cache: false,
     url: "/HandlerWeb/Comment.ashx?type=list&articleId=" + article + "&pageIndex=" + numpage,
     success: function (abc) {
     returnvalue = $.parseJSON(abc);
     $.data(document.body, 'ArticleComment_' + article+'_'+numpage, returnvalue);
     },
     timeout: 5000,
     complete: function () {
     if (returnvalue != null) {
     $.each(returnvalue, function (index, value) {
     date = new Date(parseInt(value.SubmittedDate.replace("/Date(", "").replace(")/",""), 10));
     month = parseInt(date.getMonth());
     month += 1;
     if(month<10) month = '0' + month;
     foot = value.FullName != ''? value.FullName + "&nbsp;|&nbsp;" : "";
     foot += date.getDate()+'-'+month+'-'+date.getFullYear();
     content += "<div style=\"padding: 10px;\">";
     content+="<div><strong>" + value.Title + "</strong></div>";
     content+="<div>"+value.Content+"</div>";
     content+="<div style=\"font-style: italic; font-weight: bold; font-size: 0.9em;\">"+foot+"</div>";
     content+="</div><div style=\"border-top: 1px solid #ccc\"></div>";
     });
     $('.ar-comment').html(content);

     }
     }
     });
     }
     ////////////
     //$('.ar-comment').load("/HandlerWeb/Comment.ashx");
     //            $.get('/HandlerWeb/Comment.ashx',
     //                {type:"list",
     //                    articleId:article,
     //                    pageIndex:numpage},
     //                function (data) {
     //                    $('.ar-comment').html(data);
     //                }
     //            );
     return false;
     });*/
});


</script>
</div>

</div><!--//Modules/News/ManagerNews/ViewerComments.ascx--></div>
</div>

<?php $this->renderPartial('_right_content', array('viewed'=>$viewed, 'top_topic'=>$top_topic)); ?>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>