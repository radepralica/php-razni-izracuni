<?php


$broj1 = $broj2 = $broj3 = $broj4 = $broj5 = $rezZbir = '1';

if (isset($_POST['brojRadnika'])) {

    $broj1 = $_POST['broj1'];
    $broj2 = $_POST['broj2'];
    $broj3 = $_POST['broj3'];
    $broj4 = $_POST['broj4'];
    $broj5 = $_POST['broj5'];

    $post1 = $_POST['post1'];
    $post2 = $_POST['post2'];
    $post3 = $_POST['post3'];
    $post4 = $_POST['post4'];
    $post5 = $_POST['post5'];



    $error = ['emptyfields' => ''];

    if (empty($_POST['broj1'])||empty($_POST['broj2'])||empty($_POST['broj3'])||empty($_POST['broj4'])||empty($_POST['broj5'])) {

        $error['emptyfields'] = 'Popunite sva polja';
    } else {


        $zbir = $broj1 + $broj2 + $broj3 + $broj4 + $broj5;

        $postR1 = ($broj1 * 100) / $zbir;               //Round na 2 decimale Prvi način
        $postR1 = round($postR1, 2);
        $postR2 = round((($broj2 * 100) / $zbir), 2);   //Round na 2 decimale Drugi način
        $postR3 = round((($broj3 * 100) / $zbir), 2);
        $postR4 = round((($broj4 * 100) / $zbir), 2);
        $postR5 = round((($broj5 * 100) / $zbir), 2);
    }
}








function total()
{
    global $postR1, $postR2, $postR3, $postR4, $postR5;
    return $postR1 + $postR2 + $postR3 + $postR4 + $postR5;
};

?>
<div class="container ">
    <br>
    <h1 class="text-center bg-primary text-white display-6 fw-bold rounded p-3">Računanje starosti zaposlenih</h1>
</div>
<br><br>

<?php if ($error['emptyfields']) : ?>
    <div class="alert bg-danger text-white container-sm text-center fw-bold w-75 alert-dismissible fade show" role="alert">
       <h3> <strong> <?php echo $error['emptyfields'] ?></strong></h3>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form name="starost" id="starost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container">
        <div class="row">
            <div class="col-4 bg-info border border border-light border-3">
                <br></br>
                <h3 class="text-center">Starost</h3>
                <br><br>

                <input disabled class="form-control" type="text" value="<?php echo "<30" ?>"><br>
                <input disabled class="form-control" type="text" value="<?php echo "31-40" ?>"><br>
                <input disabled class="form-control" type="text" value="<?php echo "41-50" ?>"><br>
                <input disabled class="form-control" type="text" value="<?php echo "51-60" ?>"><br>
                <input disabled class="form-control" type="text" value="<?php echo ">61" ?>"><br>

                <input class="form-control" type="text" value="<?php echo "Ukupno" ?>"><br>

            </div>
            <div class="col-4 bg-warning ">
                <br></br>
                <h3 class="text-center">Broj</h3>
                <br><br>

                <input class="form-control" type="number" min="1" name="broj1" value="<?php echo $broj1; ?>"><br>
                <input class="form-control" type="number" min="1" name="broj2" value="<?php echo $broj2; ?>"><br>
                <input class="form-control" type="number" min="1" name="broj3" value="<?php echo $broj3; ?>"><br>
                <input class="form-control" type="number" min="1" name="broj4" value="<?php echo $broj4; ?>"><br>
                <input class="form-control" type="number" min="1" name="broj5" value="<?php echo $broj5; ?>"><br>

                <input class="form-control" type="text" name="rezZbir" value="<?php echo $zbir ?>"><br>

                <br><br>
            </div>

            <div class="col-4 bg-danger">
                <br></br>
                <h3 class="text-center">Postotak</h3>
                <br><br>

                <input class="form-control" type="text" disabled name="post1" value="<?php echo $postR1; ?>"><br>
                <input class="form-control" type="text" disabled name="post2" value="<?php echo $postR2; ?>"><br>
                <input class="form-control" type="text" disabled name="post3" value="<?php echo $postR3; ?>"><br>
                <input class="form-control" type="text" disabled name="post4" value="<?php echo $postR4; ?>"><br>
                <input class="form-control" type="text" disabled name="post5" value="<?php echo $postR5; ?>"><br>
                <input class="form-control" type="text" disabled name="post6" value="<?php echo total(); ?>"><br>



            </div>


        </div>

    </div>
    <br>
    <button  name="brojRadnika" type="submit" class=" btn btn  btn-success offset-5"><strong><?php echo "Izračunaj broj radnika" ?></strong></button>
</form>

