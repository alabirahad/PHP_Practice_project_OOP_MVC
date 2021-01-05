<?php

class Pagination extends Database {
    public $database;
    public function __construct() {
        $this->database = new Database();
    }
    
    public function pagination($getPage) {
        $table="registerperson";
        $sql2 = $this->database->con->prepare("SELECT * FROM   $table");
        $sql2->execute();
        $count = $sql2->rowCount();
        $i = $count / 3;
        $page = ceil($i);
        $startLoop = $getPage;
        $difference = $page - $getPage;
        if ($difference <= 3) {
            $startLoop = $page - 3;
        }
        $endLoop = $startLoop + 2;
        ?>
        <div class="page-number">
            <?php
            if ($getPage > 1) {
                $previous = $getPage - 1; ?>
                <a href='?page=1'>First</a>
                <a href='?page=<?php echo $previous ?>'> Previous</a>
            <?php } ?>

            <?php for ($target = $startLoop; $target <= ($endLoop+1); $target++) { ?>
                <a href="?page=<?php echo $target ?>"> <?= $target ?></a>
            <?php } ?>

            <?php
            if ($getPage <= $endLoop) {
                $next = $getPage + 1;?>
                <a href='?page=<?php echo $next ?>'> Next </a>
                <a href='?page=<?php echo $page ?>'>Last</a>
            <?php } ?>
        </div>
        <?php
    }
}
