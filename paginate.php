<?php 
// Siia tuleb suurem ports PHP koodi aga kõik on loogiline
// Loeme kõigepeal kokku kui palju kirjeid on
$sql = 'SELECT COUNT(id) AS total FROM simple;';
$res = $database->dbGetArray($sql);
// $database->show($res); // Näitab massiivi sisu
$total = $res[0]['total'];
// Mitmendal lahaküljel me oleme?
if($total > 0) {
    if(isset($_GET['pg'])) {
        $pg = $_GET['pg']; // URLilt saadud lk. number
    } else {
        $pg = 1;
    }
} else {
    $pg = 1;
}

$totalRows = $total;
$maxPerPage = MAXPERPAGE; // MAXPERPAGE tuleb config/mysqli.php failist. See on konstatnt
$pageCount = ceil($totalRows / $maxPerPage);

// Vigane pg väärtus muudetakse 1-ks
if(empty($pg) || $pg < 1 || $pg > $pageCount) {
    $pg = 1;
}

$nextStart = $pg * $maxPerPage;
$start = $nextStart - $maxPerPage;


// Tee sobilik päring tabelisse. Vaata koodi peale inlcude 'paginate.php' (näiteks homepage.php)

?>
<nav aria-label="Page navigation">
    <ul class="pagination pagination-color justify-content-center">
        <li class="page-item">
            <a class="page-link  <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?pg=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link  <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo (($pg -1) == 0) ? '1' : ($pg -1); ?>" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>
        <?php 
        // for-loop algus
        for($x = 0; $x < $pageCount; $x++) {
            ?>
            <li class="page-item">
                <a class="page-link <?php echo (($x + 1) == $pg) ? 'active' : null; ?>" href="index.php?pg=<?php echo ($x + 1); ?>"><?php echo ($x + 1); ?></a>
            </li>
            <?php
        // for-loop lõpp
            }
        ?>
        <li class="page-item">
            <a class="page-link <?php echo ($pg >= $pageCount) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo (($pg + 1) > $pageCount) ? $pageCount : ($pg + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span> <!-- raquo on need noolekesed millega me andmebaasi lehekülgi liigutame -->
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?php echo ($pg >= $pageCount) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo $pageCount; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span> 
            </a>
        </li>
    </ul>
</nav>
