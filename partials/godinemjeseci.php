<?php

if (isset($_POST['calcGodMjes'])) {
    $godine = filter_var($_POST['godine'], FILTER_SANITIZE_NUMBER_INT);
    $mjeseci = filter_var($_POST['mjeseci'], FILTER_SANITIZE_NUMBER_INT);
    
    

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
    $pocetak = htmlspecialchars($_POST['pocetak']);
    $kraj = htmlspecialchars($_POST['kraj']);

    $rdg = filter_var($_POST['rdg'],FILTER_SANITIZE_NUMBER_INT);
    $rdm = filter_var($_POST['rdm'],FILTER_SANITIZE_NUMBER_INT);
    $rdd = filter_var($_POST['rdd'],FILTER_SANITIZE_NUMBER_INT);
    

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

            <div class="col-6 ">
                <br><br>
                <h2 class="text-center">Godine mjeseci</h2>
                <br><br>

                <label class="form-label" for="">Godine</label>
                <input class="form-control bold" name="godine" value="" min="0" type="number"><br>
                <label class="form-label" for="">Mjeseci</label>
                <input class="form-control bold" value="" min="0" name="mjeseci" type="number"><br>
                <button class="btn btn-lg btn-danger offset-4" name="calcGodMjes" type="submit">Izračunaj</button>
                <br>
                <hr>
                <h3 class="text-center">Rezultat</h3>
                <label class="form-label" for="">Godine/Mjeseci</label>
                <input class="form-control bold" name="rezGodineMjes" type="text" value="<?php echo "$gd   Godina i   $mj   Mjeseca(i)" ?>">
                <label class="form-label" for="">Mjeseci</label>
                <input class="form-control bold" name="rezMjes" type="text" value="<?php echo $totalMjes . " Mjeseci"; ?>">
                <br>

                <br><br>
            </div>
            <!-- Razlike datuma -->
            <div class="col-6">

                <!-- Naslov -->

                <div class="container">
                    <br><br>
                    <div class="row">
                        <h2 class="text-center">Razlike datuma</h2>
                    </div>
                </div>
                <!-- End naslov -->

                <!-- Date time pickers -->
                <div class="container">
                    <?php if ($errors['razlika']) : ?>
                    <div style="height:2.2em;"  class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                        <p style="margin-top:-10px"><?php echo $errors['razlika'] ?></p>
                        <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                    <br><br><br>
                    <div class="row">


                        <div class="col-6">
                            <input type="datetime-local" id="pocetak" name="pocetak" class="form-control"><br>
                        </div>

                        <div class="col-6">
                            <input type="datetime-local" id="kraj" name="kraj" class="form-control mt-0"><br>
                        </div>
                    </div>
                </div>
  <!-- End Date time pickers -->
<div class="container">
    <div class="row offset-2">
        <div class="col-4">
        <label for="" class="form-label"><strong>Godina</strong></label>
                <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold"" type=" text" name="rdg" class="form-control " value="<?php echo $errors['razlika'] ? $god=0 : $god ;?>">

        </div>

        <div class="col-4">
        <label  for="" class="form-label "><strong>Mjeseci</strong></label>
                <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold"" type=" text" name="rdm" class="form-control " value="<?php echo $errors['razlika'] ? $mjes=0 : $mjes ; ?>">
        </div>

        <div class="col-4">
        <label for="" class="form-label offset-1 "><strong>Dana</strong></label>
            <input style="width:4rem;height:4rem;font-size:2rem;font-weight:bold" type="text" name="rdd" class="form-control" value="<?php echo $errors['razlika'] ? $dana=0 : $dana ;  ?>">

        </div>


    </div>
</div>
<br><br>
<button class="btn btn-lg btn-danger offset-5" name="diffDate">Izračunaj</button>
            </div>
        </div>
</form>