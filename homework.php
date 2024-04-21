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
            $sql = 'SELECT * FROM simple ORDER BY added DESC';
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
                            <td class="text-end"> <?php echo ($key + 1); ?>.</td>
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
