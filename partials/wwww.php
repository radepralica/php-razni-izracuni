<div class="col-6">
    <div class="row">


    </div>



</div>

<div class="col-3">
    <br>
    
    <input type="datetime-local" id="pocetak" name="pocetak" class="form-control"><br>
    <div class="container">
        <div class="row">
            <div class="col-4">
            <h4 class="text-end">Razlike </h4>
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