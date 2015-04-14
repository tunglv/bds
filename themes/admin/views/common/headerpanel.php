        <div class="headerpanel">
            <a href="#" class="showmenu"></a>
            
            <div class="headerright">
            <?php /*
                <div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                        <span class="iconsweets-globe iconsweets-white"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Notifications</li>
                        <li>
                            <a href="#">
                            <strong>3 people viewed your profile</strong><br />
                            <img src="img/thumbs/thumb1.png" alt="" />
                            <img src="img/thumbs/thumb2.png" alt="" />
                            <img src="img/thumbs/thumb3.png" alt="" />
                            </a>
                        </li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
                        <li><a href="#"><span class="icon-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
                        <li><a href="#"><span class="icon-user"></span> <strong>Bruce</strong> is now following you <small class="muted"> - 2 days ago</small></a></li>
                        <li class="viewmore"><a href="#">View More Notifications</a></li>
                    </ul>
                </div><!--dropdown-->
            */?>    
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                    Xin chào, <?php echo $this->manager->name?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header skinshead"><?php echo $this->manager->email?></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->createUrl('/admin/manager/update')?>"><span class="icon-edit"></span> Sửa tài khoản</a></li>
                        <?php /*
                        <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        */?>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->createUrl('/admin/manager/logout')?>"><span class="icon-off"></span> Thoát</a></li>
                    </ul>
                </div><!--dropdown-->
            
            </div><!--headerright-->
            
        </div><!--headerpanel-->
        
        
        <div class="breadcrumbwidget">
            <ul class="skins">
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
            
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'homeLink'=>CHtml::link(ucfirst($this->domain), Yii::app()->createUrl('/admin')),
                'links'=>$this->breadcrumbs,
                'htmlOptions' => array('class' => 'breadcrumb'),
                'separator' => '&nbsp; / &nbsp;',
            ));?>
        </div><!--breadcrumbs-->
        