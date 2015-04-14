<a href="<?php echo $this->createUrl('/web/user/update')?>">Cập nhật tài khoản</a>
<a href="<?php echo $this->createUrl('/web/user/managePhone')?>">Quản lý SĐT</a>
<a href="<?php echo $this->createUrl('/web/user/manageEmail')?>">Quản lý email & OpenID</a>

<a href="<?php echo $this->createUrl('/web/user/password')?>">
    <?php echo $this->user->password ? 'Thay đổi mật khẩu' : 'Tạo mật khẩu'?>
</a>

<a href="<?php echo $this->createUrl('/web/user/logout')?>">Thoát</a>