<?php
// Kas submit nuppu on vajutatud
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Update - Kliki muutmis ikoonil muutmiseks</h3>
            <?php
            // Kui toimus uuendamine (faili alguses olev if lause on tõene!)
            
            
            // sql lause, päring ja if lause
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
                            <th>Tegevus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // foreach-loop algab
                        ?>
                            <tr>
                                <td class="text-end">.</td>
                                <td></td>
                                <td></td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                                <td></td>
                                <td class="text-center">
                                    <a href="#"><i class="fa-solid fa-pen-to-square text-warning" title="Edit"></i></a>
                                </td>
                            </tr>
                        <?php
                        // foreach-loop lõppeb
                        ?>
                    </tbody>
                </table>
            <?php
            // if lause else
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Isikuid ei leitud</p>
            <?php
            // if lause lõppeb
            ?>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>