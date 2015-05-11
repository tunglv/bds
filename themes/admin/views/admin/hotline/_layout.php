<?php $this->beginContent('//layouts/main'); ?>
<div class="pagetitle">
    <h1>Hotline Us</h1>
</div><!--pagetitle-->

<div class="maincontent">
    <div class="contentinner">
        <div class="tabs2 ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                <?php if($this->manager->isManager):?>
                    <a href="<?php echo $this->createUrl('/admin/hotline/update?id=1')?>">Cập nhật hotline us</a></li>
                <?php endif?>
            </ul>
        
            <div class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                <?php $this->widget('admin.components.widgets.AlertWidget');?>
                <?php echo $content?>
            </div>
        </div>

        <div class="clearfix"></div>
    </div><!--contentinner-->
</div><!--maincontent-->
<?php $this->endContent(); ?>