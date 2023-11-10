<?php 
if(isset($_POST['calcKamata'])){

$pocetak=$_POST['pocetak'];
$kraj=$_POST['kraj'];
$dug=$_POST['dug'];
$stopa=$_POST['stopa'];
$vrijednost=$_POST['vrijednost'];

$date1=strtotime($pocetak);
$date2=strtotime($kraj);
$diff=$date2-$date1;
$days=floor($diff/(60*60*24));

$errors=['razlika'=>''];

if($date1>=$date2){
$errors['razlika']='Datum kašnjenja mora biti veći';

}
else{
    $rezKamate=($days*$dug*$stopa)/100;
}




}

$curr=date("d.m.Y");



?>

<?php 


?>



<div class=" container ">
    <br>
    <h3 class="shadow p-3 mb-5   text-center bg-warning rounded p-3">Računanje kamate po danima</h3>
</div>
<br>
<?php if ($errors['razlika']) : ?>
                    <div   class="alert bg-danger text-white container-sm text-center fw-bold w-75 alert-dismissible fade show" role="alert">
                      <strong> <?php echo $errors['razlika'] ?></strong>
                        <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

    <div class="container">
        <br><br>
        <div class="row bg-info" style="  width:100%;overflow:auto;white-space:nowrap;">

            <div class="col-1">
                <label for="" class="ps-3 form-label">Dana</label>
                <input style="width:5rem" type="text" class="form-control" name:"brojDana" style="width:10em" value="<?php echo $days?>"><br>

            </div>

            <div class="col-2">
                <label for="" class="ps-5 form-label">Dospijeće</label>
                <input type="datetime-local" type="text" name="pocetak" class="form-control" id="pocetak" value="">

            </div>
            <div class="col-2">
                <label for="" class="ps-5 form-label">Kašnjenje</label>
                <input type="datetime-local" type="text" class="form-control" name="kraj" id="kraj" placeholder="Selektujte kašnjenje">

            </div>
            <div class="col-2">
                <label for="" class="ps-5 form-label">Dug</label>
                <input type="number" class="form-control" name="dug" value="100">

            </div>

            <div class="col-2">
                <label for="" class="ps-5 form-label">Stopa</label>
                <input type="text" class="form-control" name="stopa" value="0.03">

            </div>

            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for=""></label><br>
                       
                        <button class="btn btn-danger mt-2 form-control" name="calcKamata">Izračunaj</button>
                    </div>
                    <div class="col-6">
                        <label class="form-label ps-4"  for="">Vrijednost</label>
                        <input type="text" class="mt-0 form-control" name="vrijednost" value="<?php echo $rezKamate?>">
                    </div>

                </div>

            </div>


        </div>
    </div>
    <br>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#pocetak', {

        altInput: true,
        altFormat: "d.m.Y",
        dateFormat: "Y-m-d",
        'defaultDate': 'today'
    });

    flatpickr('#kraj', {

        altInput: true,
        altFormat: "d.m.Y",
        dateFormat: "Y-m-d",
        'defaultDate': 'today'
    });
</script>