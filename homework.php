<?php
// Kas submit nuppu on vajutatud klikit update-by-id vormil
if(isset($_POST['submit'])) {
    // $database->show($_POST); // TEST
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $salary = $_POST['salary'];
    $height = $_POST['height'];
    if(empty($salary)) {
        $salary = 'NULL';
    }
    if(empty($height)) {
        $height = 'NULL';
    }
    $sql = 'UPDATE simple SET
    name = '.$database->dbFix($name).',
    birth = '.$database->dbFix($birth).',
    salary = '.$salary.',
    height = '.$height.',
    added = added
    WHERE id = '.$id;
    // echo $sql; // TEST
    if($database->dbQuery($sql)) {
        $success = true;
        error_log("Juhuuu  see töötas!");
        header('Location: index.php?page=homework');
        exit();
    } else {
        $success = false;
        error_log("Ei tulnud välja :(");
    }
}
?>

<?php
// Kas ids on olemas ja kas see on number
if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    $sql = 'DELETE FROM simple WHERE id = '.$_GET['ids'];
    if ($database->dbQuery($sql)) {
        $success = true;
        $url = $_SERVER['PHP_SELF']. '?page=homework';
        header('Location: '.$url);
        
    } else {
        $success = false;
        header('Location: index.php?page=homework');

    }
}
?>

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
$maxPerPage = MAXPERPAGE; // MAXPERPAGE tuleb config/mysqli.php failist. See on konstant
$pageCount = ceil($totalRows / $maxPerPage);

// Vigane pg väärtus muudetakse 1-ks
if(empty($pg) || $pg < 1 || $pg > $pageCount) {
    $pg = 1;
}

$nextStart = $pg * $maxPerPage;
$start = $nextStart - $maxPerPage;


// Tee sobilik päring tabelisse. Vaata koodi peale inlcude 'paginate.php' (näiteks homepage.php)

?>

<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Koduse töö lehekülg, et muuta ja kustutada kirjeid!</h3>
            <?php
            // Kui toimus uuendamine (faili alguses olev if lause on tõene!)
            if(isset($success) && $success) {
                ?>
                <div class="alert alert-success"> Sissekanne on uuendatud! </div>
                <?php
            } else if(isset($success) && !$homework) {
                ?>
                <div class="alert alert-danger"> Sissekande uuendamisel tekkis tõrge. </div>
                <?php
            }
            
            // sql lause, päring ja if lause
            $sql = 'SELECT * FROM simple ORDER BY added DESC LIMIT '.$start.', '.$maxPerPage;
            $res = $database->dbQuery($sql);
            if ($res !== false) {
            ?>

                <table class="table table-bordered table-striped table-hover mt-2">
                    <thead class="text-center">
                        <tr>
                            <th>Jrk</th>
                            <th>Nimi</th>
                            <th>Sünniaeg</th>
                            <th>Palk</th>
                            <th>Pikkus</th>
                            <th>Lisatud</th>
                            <th>Muuda</th>
                            <th>Kustuta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // foreach-loop algab
                        foreach ($res as $key=>$val) {
                            $date = new DateTime($val['birth']);
                            $birth = $date->format('d.m.Y');
                            $dateTime = new DateTime($val['added']);
                            $added = $dateTime->format('d.m.Y H:i:s');
                        ?>
                        <tr>
                            <td class="text-end"> <?php echo ($key + $start + 1); ?>.</td>
                            <td> <?php echo $val['name']; ?></td>
                            <td> <?php echo $birth; ?></td>
                            <td class="text-end"><?php echo $val['salary']; ?></td>
                            <td class="text-end"><?php echo $val['height']; ?></td>
                            <td> <?php echo $added; ?></td>
                            <td class="text-center">
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=update-by-id&ids=<?php echo $val['id']; ?>"><i class="fa-solid fa-pen-to-square text-warning" title="Edit"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="?page=homework&ids=<?php echo $val['id']; ?>" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                                    <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        // foreach-loop lõppeb
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            // if lause else
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Isikuid ei leitud</p>
            <?php
            }
            // if lause lõppeb
            ?>
        </div>
        <tr>

        <div class="col-sm-2"></div>
    </div>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-color justify-content-center">
        <li class="page-item">
            <a class="page-link <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?page=homework&pg=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?page=homework&pg=<?php echo (($pg -1) == 0) ? '1' : ($pg -1); ?>" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>
        <?php 
        // for-loop algus
        for($x = 0; $x < $pageCount; $x++) {
            ?>
            <li class="page-item">
                <a class="page-link <?php echo (($x + 1) == $pg) ? 'active' : null; ?>" href="index.php?page=homework&pg=<?php echo ($x + 1); ?>"><?php echo ($x + 1); ?></a>
            </li>
            <?php
        // for-loop lõpp
            }
        ?>
        <li class="page-item">
            <a class="page-link <?php echo ($pg >= $pageCount) ? 'disabled' : null; ?>" href="index.php?page=homework&pg=<?php echo (($pg + 1) > $pageCount) ? $pageCount : ($pg + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span> <!-- raquo on need noolekesed millega me andmebaasi lehekülgi liigutame -->
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?php echo ($pg >= $pageCount) ? 'disabled' : null; ?>" href="index.php?page=homework&pg=<?php echo $pageCount; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span> 
            </a>
        </li>
    </ul>
</nav>
