<div class="pagetitle">
    <h1>Error <?php echo $code; ?></h1> 
    <span><?php echo $msg = $code == 404 ? 'We couldn\'t find that page. It appears that you are lost.' : CHtml::encode($message); ?></span>
</div>

<div class="maincontent">
    <div class="contentinner wrapper404">
        <p><?php echo $msg?></p>
        <br>
        <button onclick="history.back()" class="btn btn-primary">Go Back to Previous Page</button> &nbsp; 
        <a class="btn" href="<?php echo $this->createUrl('/admin')?>">Go Back to Admin Home Page</a>
    </div>
</div>