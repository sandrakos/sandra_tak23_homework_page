<?php
$res = false; // Algselt pole mingit infot
// Kas otsingu nuppu on vajutatud
?>
<div class="container">
    <div class="row">


        <div class="col-sm-8 mx-auto">
            <h3 class="text-center">Read - Otsi kasutajat nime baasil</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=read" method="POST" class="mb-2">
                <div class="row mb-2">
                    <label for="phrase" class="col-sm-2 form-label mt-2 fw-bold">Otsingu fraas</label>
                    <div class="col">
                        <input type="text" name="phrase" value="#" id="phrase" onclick="clearField();" class="form-control" required placeholder="Nimi">
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit" value="Otsi tulemusi" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>

            <?php
            // if lause kas leiti midagi
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Sünniaeg</th>
                        <th>Palk</th>
                        <th>Pikkus</th>
                        <th>Lisatud</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // foreach-loop algus
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    // foreach-loop lõpp
                    ?>
                </tbody>
            </table>
            <?php
            // if lause lõpp
            ?>

        </div>

    </div>
</div>