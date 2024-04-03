<?php 
// Siia tuleb suurem ports PHP koodi aga kõik on loogiline

// Tee sobilik päring tabelisse. Vaata koodi peale inlcude 'paginate.php' (näiteks homepage.php)

?>
<nav aria-label="Page navigation">
    <ul class="pagination pagination-color justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php 
        // for-loop algus
            ?>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <?php
        // for-loop lõpp
        ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
