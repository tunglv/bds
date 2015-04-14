
		<?php if($userPhones):?>
		<ul>
		<?php foreach($userPhones as $phone):?>
		    <li>
		        <?php if(count($userPhones) > 1):?> 
		        <span class="phone_radio"><input id="phone_id_<?php echo $phone->id?>" title="Đặt làm SĐT chính" type="radio" name="is_main" value="<?php echo $phone->id?>" <?php if($phone->is_main):?>checked="checked"<?php endif?>></span>
		        <?php endif?>
		        <span class="phone"><label for="phone_id_<?php echo $phone->id?>"><?php echo $phone->phoneLabel?></label></span>
		        
		        <?php if(count($userPhones) > 1):?> 
		        <span class="phone_main"><?php if($phone->is_main):?>SĐT chính<?php endif?></span>
		        <span class="phone_remove"><?php if(!$phone->is_main):?><span><a phone_id="<?php echo $phone->id?>" phone="<?php echo $phone->phoneLabel?>" title="Xóa SĐT <?php echo $phone->phoneLabel?>">Xóa</a></span><?php endif?></span>
		        <?php endif?>
		    </li>
		<?php endforeach?>
		</ul>
		
		<?php else:?>
		    <div>Tài khoản của bạn chưa có SĐT di động nào. Bạn có thể thêm tại form bên dưới</div>
		<?php endif?>
