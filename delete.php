<?php
// Kas ids on olemas ja kas see on number
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Delete - Kustuta kirje tabelist</h3>
            <?php
            // Kui toimus kustutamine (faili alguses olev if lause on tõene!)
            

            // Näita tulemust
            // SQL lause, päring ja if lause kas tulemust on
            
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
                        // foreach-loop algus                            
                        ?>
                            <tr>
                                <td class="text-end">.</td>
                                <td></td>
                                <td></td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                                <td></td>
                                <td class="text-center">
                                    <a href="" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                                        <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        // foreach-loop lõpp
                        ?>
                    </tbody>
                </table>
            <?php
            // if lause els osa
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Isikuid ei leitud</p>
            <?php
            // if lause lõpp
            ?>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>