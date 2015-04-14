<h1 class="logintitle">
    <span class="iconfa-lock"></span> Đăng nhập 
    <?php if($error = Yii::app()->user->getFlash('error')):?>
        <span class="subtitle error"><?php echo $error?></span>
    <?php else:?>
        <span class="subtitle">Xin chào! Sign in to get you started!</span>
    <?php endif?>
</h1>
<div class="loginwrapperinner">
    <form id="form" method="post">
        <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Email" /></p>
        <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
        <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Đăng nhập</button></p>
        <p class="animate7 fadeIn"><a href="<?php echo $this->createUrl('/admin/manager/forgot')?>"><span class="icon-question-sign icon-white"></span> Quên mật khẩu ?</a></p>
    </form>
</div>