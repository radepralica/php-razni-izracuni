<?php
if (isset($_POST['calcGodMjes'])) {
    $godine = $_POST['godine'];
    $mjeseci = $_POST['mjeseci'];


    $errors = ['godine' => '', 'mjeseci' => ''];
    if (empty($godine)) {
        $godine = 0;
    }
    if (empty($mjeseci)) {
        $mjeseci = 0;
    }
    if (!array_filter($errors)) {
        $totalMjes = $godine * 12 + $mjeseci;
        $gdi = $totalMjes / 12;
        $gd = floor($gdi);
        $mj = $totalMjes % 12;
    }
}



if (isset($_POST['diffDate'])) {
    $pocetak = $_POST['pocetak'];
    $kraj = $_POST['kraj'];

    $rdg = $_POST['rdg'];
    $rdm = $_POST['rdm'];
    $rdd = $_POST['rdd'];

    $date1 = date_create($pocetak);
    $date2 = date_create($kraj);


    $errors = ["razlika" => ''];
    if ($date1 >= $date2) {
        $errors['razlika'] = 'Početni datum mora biti veći';
    }

    $diff = date_diff($date2, $date1);
    $god = $diff->format("%y");
    $mjes = $diff->format("%m");
    $dana = $diff->format("%d");
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container ">



        <div style="background: lightskyblue;" class="row  rounded   mb-5">

            <div class="container ">
                <br>
                <div class="row bshad  bg-body">
                    <div class="col-6 ">

                    </div>
                    <div class="col-6 ">
                        <?php if ($errors['razlika']) : ?>
                            <div style="height:2.2em;" class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                                <p style="margin-top:-10px"><?php echo $errors['razlika'] ?></p>
                                <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>


            <div class="col-6 ">
                <br>
                <label class="form-label" for="">Godine</label>
                <input class="form-control bold" name="godine" value="" min="0" type="number"><br>
                <label class="form-label" for="">Mjeseci</label>
                <input class="form-control bold" value="" min="0" name="mjeseci" type="number"><br>
                <button class="btn btn-danger offset-4" name="calcGodMjes" type="submit">Izračunaj</button>
                <br>
                <hr>
                <h3 class="text-center">Rezultat</h3>
                <label class="form-label" for="">Godine/Mjeseci</label>
                <input class="form-control bold" name="rezGodineMjes" type="text" value="<?php echo $gd . " Godina i " . $mj . " Mjeseca(i)" ?>">
                <label class="form-label" for="">Mjeseci</label>
                <input class="form-control bold" name="rezMjes" type="text" value="<?php echo $totalMjes . " Mjeseci"; ?>">
                <br>

                <br><br>
            </div>
            <!-- Razlike datuma -->
            <div class="col-3">
                <br>
                <h4 class="text-end">Razlike </h4>
                <input type="datetime-local" id="pocetak" name="pocetak" class="form-control"><br>
                <div class="row">
                    <div class="col-4">
                        <label for="" class="form-label ms-2"><strong>Godina</strong></label>
                        <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold"" type=" text" name="rdg" class="form-control " value="<?php echo $god; ?>">
                    </div>
                    <div class="col-4">
                        <label style="margin-left:3.5rem" for="" class="form-label"><strong>Mjeseci</strong></label>
                        <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold"" type=" text" name="rdm" class="form-control ms-5 " value="<?php echo $mjes; ?>">
                        <button class="btn btn-danger m-5" name="diffDate">Izračunaj</button>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <br>
                <h4 class="ms-1 ">datuma </h4>
                <h4 class="text-center"></h4>

                <input type="datetime-local" id="kraj" name="kraj" class="form-control mt-0"><br>
                <div class="row">
                    <div class="col-4">
                        <label for="" class="form-label ms-5"><strong>Dana</strong></label>
                        <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold" type="text" name="rdd" class="ms-5 form-control" value="<?php echo $dana; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>