<?php
class TestCommand extends CConsoleCommand {
    
    //php E:\xampp177\htdocs\project\anuong\console.php test
    public function run($args) {
                echo 'hello yii friends';
                echo $args[0];
                echo $args[1];
    }
    
    
    //php E:\xampp177\htdocs\project\anuong\console.php test index --type=abc quang teo --limit=20
    public function actionIndex($type, $limit=5) {
        echo $type;
        echo $limit;
    }
}
?>
