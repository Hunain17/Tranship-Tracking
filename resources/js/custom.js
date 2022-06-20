
$(".create_field a").on('click', (e) => {
    const $html = `<div class="mb-3">
                    <input type="text" name="name[]" class="form-control" placeholder="Write Title" required>
                </div>`;
    $('#create_fields_form .form_fields_container').append($html);
});

$("#submit_fields_button").on('click', (e) =>{
    $("#hidden_field_submit").click();
});

$(".create_ri_record a").on('click', function(){
    console.log("this function called");
    let html = `<div class="row mt-3">
                    <div class="col-3">
                        <input type="text" name="containernumber[]" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-3">
                        <select name="status[]" class="form-select">
                            <option value="arvd">ARVD</option>
                            <option value="disc">DISC</option>
                            <option value="dct">DCT</option>
                            <option value="rct">RCT</option>
                            <option value="rcnee">RCNEE</option>
                            <option value="rty">RTY</option>
                            <option value="rshpr">RSHPR</option>
                            <option value="load">LOAD</option>
                            <option value="sail">SAIL</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="text" name="activitydate[]" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-3">
                        <input type="text" name="remarks[]" class="form-control" placeholder="" required>
                    </div>
                </div>`;
    $(".ri_container .container_record").append(html);
});

$(".generate_password a").on('click', function(){
    let consignee = $(".consignee_input").val();
    if(consignee){
        let password = consignee+"123";
        $(".generate_password span").text(password);
    }else{
        alert("Consignee field is required");
    }
});

//exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

	var trBoldBlue = $("table");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});

$("#submit_edit_record").on('click', function(){
    $(".edit_from_submit").trigger('click');
});

$(".user_profile_upload").on('click', function(){
    $("#user_profile").trigger('click');
});

$("#user_profile").on('change', function(e){
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.user_profile_img').css("display", "none");
            $('.user_profile_new').attr('src', e.target.result).css("display", "block");
        }
        reader.readAsDataURL(input.files[0]);
    }else{
        $('.user_profile_img').css("display", "block");
        $('.user_profile_new').css("display", "none");
    }
}

$("#submit_create_admin").on('click', function(){
    $("#create_admin_form_btn").trigger('click');
});

$(".delete_user").on('click', function(){
    $(this).parents("td").children('form').submit();
})