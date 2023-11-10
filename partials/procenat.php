<?php require_once "functions/function.php"; ?>

<?php
$kolProc = $kolUkupno = $procKol = $procUkupno = '';
if (isset($_POST['calcKol'])) {
    $kolProc = filter_var($_POST['kolProc'], FILTER_SANITIZE_NUMBER_INT);
    $kolUkupno = filter_var($_POST['kolUkupno'], FILTER_SANITIZE_NUMBER_INT);
    $kolRez = filter_var($_POST['kolRez'], FILTER_SANITIZE_NUMBER_FLOAT);


    $errors = ['kolproc' => '', 'kolukupno' => '', 'prockol' => '', 'procukupno' => ''];

    if (empty($_POST['kolProc'])) {
        $errors['kolproc'] = 'Upišite procenat';
    }
    if (empty($_POST['kolUkupno'])) {
        $errors['kolukupno'] = 'Upišite količinu';
    }

    if (!array_filter($errors)) {
        $kolRez = calcKol($kolUkupno, $kolProc);
    }


    // header("Location:index.php");




}

if (isset($_POST['calcProc'])) {

    $procKol = filter_var($_POST['procKol'], FILTER_SANITIZE_NUMBER_INT);
    $procUkupno = filter_var($_POST['procUkupno'], FILTER_SANITIZE_NUMBER_INT);
    $procRez = filter_var($_POST['procRez'], FILTER_SANITIZE_NUMBER_FLOAT);

    $errors = ['prockol' => '', 'procukupno' => ''];

    if (empty($_POST['procKol'])) {
        $errors['prockol'] = 'Upišite količinu';
    }
    if (empty($_POST['procUkupno'])) {
        $errors['procukupno'] = 'Upišite ukupno';
    }

    if (!array_filter($errors)) {

        $procRez = calcProc($procUkupno, $procKol);
    }
}







?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <br><br>
    <div class="shadow p-3 mb-5 bg-body rounded container ">
        <div class="row">
            <div class="col-6 bg-info border border-light border-3">
                <br>

                <h2 class="text-light text-center">Računanje količine</h2>

                <input class="form-control" type="number" min="1" name="kolProc" placeholder="Upiši procenat" value="<?php echo $kolProc; ?>"><br>
                <?php if ($errors['kolproc']) : ?>
                    <div style="height:2.2em;"  class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                        <p style="margin-top:-10px"><?php echo $errors['kolproc'] ?></p>
                        <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <input class="form-control" type="number" min="1" name="kolUkupno" placeholder="Upiši količinu" value="<?php echo $kolUkupno; ?>"><br>

                <?php if ($errors['kolukupno']) : ?>
                    <div style="height:2.2em;"  class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                        <p style="margin-top:-10px"><?php echo $errors['kolukupno'] ?></p>
                        <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <input class="form-control" type="text" name="kolRez" value="<?php echo $kolRez; ?>" disabled><br>

                <button type="submit" name="calcKol" class="btn btn-success offset-5">Izračunaj</button><br><br><br>



            </div>

            <div class="col-6 bg-primary border border-light border-3">
                <br>

                <h2 class="text-light text-center">Računanje Procenta</h2>
                <input class="form-control" type="number" name="procUkupno" placeholder="Upiši ukupno" value="<?php echo $procUkupno ?>"><br>
                <?php if ($errors['procukupno']) : ?>
                    <div style="height:2.2em;"  class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                        <p style="margin-top:-10px"><?php echo $errors['procukupno'] ?></p>
                        <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <input class="form-control" type="number" name="procKol" placeholder="Upiši količinu" value="<?php echo $procKol ?>"><br>
                <?php if ($errors['prockol']) : ?>
                    <div style="height:2.2em;"  class="alert alert-sm alert-danger text-center fw-bold  alert-dismissible fade show" role="alert">
                        <p style="margin-top:-10px"><?php echo $errors['prockol'] ?></p>
                        <button style="margin-top:-10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <input class="form-control" type="text" name="procRez" value="<?php echo $procRez ?> " disabled><br>
                <button name="calcProc" class="btn btn-success offset-5">Izračunaj</button><br><br><br>



            </div>
        </div>
    </div>
</form>