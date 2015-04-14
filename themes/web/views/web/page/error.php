<div class="pagetitle">
    <h1>Error <?php echo $code; ?></h1> 
</div>

<div class="maincontent">
    <div class="contentinner wrapper404">
        <p><?php echo $message?></p>
        <br>
        <button onclick="history.back()" class="btn btn-primary">Go Back to Previous Page</button> &nbsp; 
        <a class="btn" href="<?php echo $this->createUrl('/admin')?>">Go Back to Admin Home Page</a>
    </div>
</div>