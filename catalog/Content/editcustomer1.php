<!-- declaration Part -->
<?php
    $fname = $value['FName'];
    $mname = $value['MName'];
    $lname = $value['LName'];
    $gender = $value['Gender'];
    $email = $value['Email'];
    $number = $value['Number'];
    $image = $value['Image'];
?>

<div class="modal fade bs-example-modal-lg<?php echo $value['Id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
            </div>
            <div class="modal-body">
                First Name: <input type="text" id="fname" name="fname" value="">
                Middle Name: <input type="text" id="mname" name="mname">
                Last Name: <input type="text" id="lname" name="lname"><br><br>
                Gender: <input type="radio" name="gender" value="male" <?php echo ($gender=='male')?'checked':'' ?> >Male
                        <input type="radio" name="gender" value="fmale" <?php echo ($gender=='female')?'checked':'' ?> >Fe-male
                        <input type="radio" name="gender" value="other" <?php echo ($gender=='other')?'checked':'' ?>>Others
                <br><br>
                Email: <input type="email" id="email" name="email" placeholder="abc@xyz.com"><span id="txt_email"></span><br><br>
                Number: <input type="text" id="no" name="no"><span id="txt_no"></span><br><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>
