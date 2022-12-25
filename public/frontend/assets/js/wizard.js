function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#cover_image_preview").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $("#cover_image_preview").hide();
            $("#cover_image_preview").fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function add_website() {
    id = "w" + (Math.random() + 1).toString(36).substring(7);
    template = `<div class="form-group mb-4" id="${id}">
                    <label class="control-label">Website </label>
                    <input type="text" class="form-control" name="website[]" placeholder="example.com" value="">
                    <span class="float-right" onclick="remove(${id})"><i class="fa fa-minus-circle fa-lg text-danger"</span>
                </div>`;
    $("#websites").append(template);
}

function add_email() {
    id = "e" + (Math.random() + 1).toString(36).substring(7);
    template = ` <div  class="row border radius-10 p-3 mb-2" id="${id}">
                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                        <label class="control-label">Email </label>
                        <select class="form-control" name="additional_emails_type_${id}">
                            <option>Work</option>
                            <option>Home</option>
                            <option>School</option>
                            <option>Gmail</option>
                            <option>iCloud</option>
                            <option>Other</option>
                        </select>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                            <input type="email" class="form-control" name="additional_emails_${id}" placeholder="user@company.com" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <i onclick="remove(${id})" class="float-right fa fa-minus-circle fa-lg text-danger"
                    </div>

                </div>`;
    $("#emails").append(template);
}

function add_phone() {
    id = "p" + (Math.random() + 1).toString(36).substring(7);
    template = ` <div  class="row border radius-10 p-3 mb-2" id="${id}">
                    <div class="col-sm-12">
                        <div class="form-group mb-4">
                        <label class="control-label">Phone </label>
                        <select class="form-control" name="additional_phone_type_${id}">
                            <option>Mobile</option>
                            <option>Work</option>
                            <option>Home</option>
                            <option>School</option>
                            <option>Work Fax</option>
                            <option>Home Fax</option>
                            <option>Other</option>
                        </select>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mb-4">

                            <input type="text" id="phone_id_${id}" target="full_phone_${id}" class="form-control phone_number" placeholder="" value="">
                            <input type="hidden" id="full_phone_${id}" class="form-control" name="additional_phone_${id}" placeholder="" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <i onclick="remove(${id})" class="float-right fa fa-minus-circle fa-lg text-danger"
                    </div>

                </div>`;
    $("#phones").append(template);
    loadPhoneValidator("#phone_id_" + id);
}

function remove(id) {
    console.log(id);
    id.remove();
}

function removeById(id) {
    console.log(id);
    $("#" + id).remove();
}

iti = [];
function loadPhoneValidator(selector = ".phone_number") {
    var consultInput = document.querySelector(selector);
    console.log("initiate for " + $(consultInput).attr("id"));

    var ob = window.intlTelInput(consultInput, {
        initialCountry: "auto",
        separateDialCode: true,
        hiddenInput: "full",
        geoIpLookup: function (callback) {
            $.get("https://ipinfo.io", function () {}, "jsonp").always(
                function (resp) {
                    var countryCode =
                        resp && resp.country ? resp.country : "ro";
                    callback(countryCode);
                }
            );
        },
        utilsScript:
            "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
    });

    iti[$(consultInput).attr("id")] = ob;
}

function getPhones(e) {
    // e.preventDefault();
    var status = true;
    $(".phone_number").each(function () {
        id = this.id;
        var elem = iti[id];
        var full_number = elem.getNumber(intlTelInputUtils.numberFormat.E164);
        if (!elem.isValidNumber()) {
            alert(full_number + "is not a valid number");
            status = false;
        }
        target_id = id.replace("phone_id_", "");
        target_id = target_id.replace("full_phone_", "");

        console.log("Target is ".target_id);
        $("#full_phone_" + target_id).val(full_number);
    });

    return status;
}
