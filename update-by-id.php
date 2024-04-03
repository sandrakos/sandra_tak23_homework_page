<?php 
// Kas ids on ja kas on number
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Update - Muuda tabeli kirjet</h3>

            <form action="#" method="post">
                <div class="row mb-2">
                    <label for="name" class="col-sm-2 form-label mt-1 fw-bold">Nimi</label>
                    <div class="col">
                        <input type="text" name="name" value="" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="birth" class="col-sm-2 form-label mt-1 fw-bold">Sünniaeg</label>
                    <div class="col">
                        <input type="date" name="birth" value="" id="birth" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="salary" class="col-sm-2 form-label mt-1 fw-bold">Palk</label>
                    <div class="col">
                        <input type="number" min="0" max="9999" step="1"  name="salary" value="" id="salary" class="form-control">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="height" class="col-sm-2 form-label mt-1 fw-bold">Pikkus</label>
                    <div class="col">
                        <input type="number" min="0.00" max="2.72" step="0.01" name="height" value="" id="height" class="form-control">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <input type="hidden" name="sid" value="">
                        <input type="submit" name="submit" value="Muuda andmeid" class="btn btn-warning form-control">                        
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-info form-control">Reseti vorm</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>