<?php if($userEmails):?>
<ul>
<?php foreach($userEmails as $email):?>
    <li>
        <?php if(count($userEmails) > 1):?> 
        <span class="email_radio"><input id="email_id_<?php echo $email->id?>" title="Đặt làm email chính" type="radio" name="is_main" value="<?php echo $email->id?>" <?php if($email->is_main):?>checked="checked"<?php endif?>></span>
        <?php endif?>
        <span class="email"><label for="email_id_<?php echo $email->id?>"><?php echo $email->email?></label></span>
        <span class="email_openid"><?php echo $email->openIdServiceLabel?></span>
        
        <?php if(count($userEmails) > 1):?> 
        <span class="email_main"><?php if($email->is_main):?>Email chính<?php endif?></span>
        <span class="email_remove"><?php if(!$email->is_main):?><span><a email_id="<?php echo $email->id?>" email="<?php echo $email->email?>" title="Xóa email <?php echo $email->email?>">Xóa</a></span><?php endif?></span>
        <?php endif?>
    </li>
<?php endforeach?>
</ul>

<?php else:?>
    <div>Tài khoản của bạn chưa có email nào. Bạn có thể thêm bằng OpenId hoặc nhập tại form bên dưới</div>
<?php endif?>