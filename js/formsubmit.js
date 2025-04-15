$(document).ready(function () {
    $("#savealldata").validate({
        rules: {
            inspection_date: {
                required: true,
                date: true
            },
            inspector_name: {
                required: true,
                minlength: 3
            },
            inspection_company: {
                required: true,
                minlength: 3
            },
            client_name: {
                required: true,
                minlength: 3
            },
            tower_owner: {
                required: true,
                minlength: 3
            },
            tower_location: {
                required: true,
                minlength: 3
            },
            tower_id: {
                required: true,
                minlength: 3
            },
            tower_type: {
                required: true
            },
            tower_height: {
                required: true,
                number: true
            },
            year_of_construction: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4
            },
            tower_photo: {
                required: true,
                extension: "jpg|jpeg|png|gif"
            },
            structural_critical: {
                required: true
            },
            structural_non_critical: {
                required: true
            },
            maintenance_critical: {
                required: true
            },
            maintenance_non_critical: {
                required: true
            }
        },
        messages: {
            inspection_date: "Please select an inspection date.",
            inspector_name: {
                required: "Inspector name is required.",
                minlength: "At least 3 characters required."
            },
            inspection_company: {
                required: "Inspection company is required.",
                minlength: "At least 3 characters required."
            },
            client_name: {
                required: "Client name is required.",
                minlength: "At least 3 characters required."
            },
            tower_owner: {
                required: "Tower owner is required.",
                minlength: "At least 3 characters required."
            },
            tower_location: {
                required: "Tower location is required.",
                minlength: "At least 3 characters required."
            },
            tower_id: {
                required: "Tower ID/Name is required.",
                minlength: "At least 3 characters required."
            },
            tower_type: "Please select a tower type.",
            tower_height: {
                required: "Tower height is required.",
                number: "Only numeric values allowed."
            },
            year_of_construction: {
                required: "Year of construction is required.",
                digits: "Only numeric values allowed.",
                minlength: "Enter a valid 4-digit year.",
                maxlength: "Enter a valid 4-digit year."
            },
            tower_photo: {
                required: "Please upload a photo of the tower.",
                extension: "Allowed formats: jpg, jpeg, png, gif."
            },
            structural_critical: "Please select an option.",
            structural_non_critical: "Please select an option.",
            maintenance_critical: "Please select an option.",
            maintenance_non_critical: "Please select an option."
        },
        errorPlacement: function (error, element) {
            error.addClass("text-danger small");
            if (element.prop("type") === "file") {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            alert("Form submitted successfully!");
            form.submit();
        }
    });
});


