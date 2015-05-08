<!-- START OF LEFT PANEL -->
<div class="leftpanel">

    <div class="logopanel">
        <h1><a href="<?php echo $this->createUrl('/admin')?>">Admin Area <span><?php echo $this->domain?></span></a></h1>
    </div><!--logopanel-->

    <div class="datewidget">Today is <?php echo date('l, M d, Y')?></div>

    <div class="leftmenu">        
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-header">Main Navigation</li>
            
            
            <?php if($this->manager->isStaffOnly):?>
            <li <?php if($this->menu_parent_selected == 'manager'):?> class="active"<?php endif?>>
                <a href="<?php echo $this->createUrl('/admin/manager/update')?>"><span class="icon-user"></span> Tài khoản</a>
            </li>
            <?php else:?>
            <li class="dropdown <?php if($this->menu_parent_selected == 'manager'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/manager')?>">
                    <span class="icon-user"></span> Nhân viên
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'manager') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'manager_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/manager/create')?>">Thêm mới</a></li>
                    <li<?php if($this->menu_child_selected == 'manager'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/manager')?>">Quản lý</a></li>
                </ul>
            </li>
            <?php endif?>
            
            <li class="dropdown <?php if($this->menu_parent_selected == 'news'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/news')?>">
                    <span class="icon-fire"></span> Tin tức
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'news') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'news_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/news/create')?>">Thêm tin tức</a></li>
                    <li<?php if($this->menu_child_selected == 'news'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/news')?>">Quản lý tin tức</a></li>
                    <li<?php if($this->menu_child_selected == 'newsTopic_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/news/createTopic')?>">Thêm chủ đề</a></li>
                    <li<?php if($this->menu_child_selected == 'newsTopic'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/news/indexTopic')?>">Quản lý chủ đề</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'architecture'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/architecture')?>">
                    <span class="icon-fire"></span> Kiến trúc
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'architecture') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'architecture_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/architecture/create')?>">Thêm tư vấn kiến trúc</a></li>
                    <li<?php if($this->menu_child_selected == 'architecture'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/architecture')?>">Quản lý tư vấn kiến trúc</a></li>
                    <li<?php if($this->menu_child_selected == 'architectureTopic_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/architecture/createTopic')?>">Thêm chủ đề</a></li>
                    <li<?php if($this->menu_child_selected == 'architectureTopic'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/architecture/indexTopic')?>">Quản lý chủ đề</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'decorate'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/decorate')?>">
                    <span class="icon-fire"></span> Nội - Ngoại thất
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'decorate') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'decorate_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/decorate/create')?>">Thêm tư vấn Nội, Ngoại thất</a></li>
                    <li<?php if($this->menu_child_selected == 'decorate'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/decorate')?>">Quản lý tư vấn Nội, Ngoại thất</a></li>
                    <li<?php if($this->menu_child_selected == 'decorateTopic_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/decorate/createTopic')?>">Thêm chủ đề</a></li>
                    <li<?php if($this->menu_child_selected == 'decorateTopic'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/decorate/indexTopic')?>">Quản lý chủ đề</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'pt'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/pt')?>">
                    <span class="icon-fire"></span> Phong thủy
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'pt') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'pt_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/pt/create')?>">Thêm tư vấn Phong thủy</a></li>
                    <li<?php if($this->menu_child_selected == 'pt'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/pt')?>">Quản lý tư vấn Phong thủy</a></li>
                    <li<?php if($this->menu_child_selected == 'ptTopic_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/pt/createTopic')?>">Thêm chủ đề</a></li>
                    <li<?php if($this->menu_child_selected == 'ptTopic'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/pt/indexTopic')?>">Quản lý chủ đề</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'saler'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/saler')?>">
                    <span class="icon-fire"></span> Danh sách nhà mô giới
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'saler') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'saler_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/saler/create')?>">Thêm danh nhà môi giới</a></li>
                    <li<?php if($this->menu_child_selected == 'saler'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/saler')?>">Quản lý nhà mô giới</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'project'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/project')?>">
                    <span class="icon-fire"></span> Danh sách dự án
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'project') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'project_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/project/create')?>">Thêm dự án</a></li>
                    <li<?php if($this->menu_child_selected == 'project'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/project')?>">Quản lý dự án</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'sale'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/sale')?>">
                    <span class="icon-fire"></span> Danh sách nhà - đất bán
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'sale') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'sale_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/sale/create')?>">Thêm nhà - đất bán</a></li>
                    <li<?php if($this->menu_child_selected == 'sale'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/sale')?>">Quản lý nhà - đất bán</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'rent'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/rent')?>">
                    <span class="icon-fire"></span> Danh sách nhà - đất cho thuê
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'rent') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'rent_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/rent/create')?>">Thêm nhà - đất cho thuê</a></li>
                    <li<?php if($this->menu_child_selected == 'rent'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/rent')?>">Quản lý nhà - đất cho thuê</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'contact'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/contact/update?id=1')?>">
                    <span class="icon-fire"></span> Liên hệ với chúng tôi
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'contact') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'contact_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/contact/update?id=1')?>">Nội dung</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->menu_parent_selected == 'registered'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/admin/registered/')?>">
                    <span class="icon-fire"></span> Người dùng đăng ký
                </a>
                <ul class="<?php echo ($this->menu_parent_selected == 'registered') ? 'opened':'closed'?>">
                    <li<?php if($this->menu_child_selected == 'registered_create'):?> class="active"<?php endif?>><a href="<?php echo $this->createUrl('/admin/registered')?>">Danh sách</a></li>
                </ul>
            </li>
        </ul>
    </div><!--leftmenu-->

    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->