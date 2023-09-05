$(document).ready(function() {
    $("#regForm").validate({
        rules: {
            name: {
                required: true,
            },
            name_h:{
                required: true,
            },
            menu_id:{
                required: true,
            },
            tpl_id:{
                required: true,
            },
            number:{
                required: true,
            },
            meta_description: {
                required: true,
            },
            about_title: {
                required: true,
            },
            meta_title: {
                required: true,
            },
            meta_keywords: {
                required: true,
            },
            about: {
                required: true,
            },
            about_h: {
                required: true,
            },

            Logo_Title1: {
                required: true,
            },
            Logo_Title1: {
                required: true,
            },
            Logo_Title2: {
                required: true,
            },
            Logo_Title3: {
                required: true,
            },
            submenues:{
                required: true,
            },
            url_logo4: {
                required: true,
            },
            designation: {
                required: true,
            },
            status:{
                required: true,
            },
            description_h: {
                required: true,
            },
            url:{
                required: true,
            },
            contact: {
                required: true,
                minlength: 10,
            },
            time: {
                required: true,
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                number: true
            },
            content:{
                minlength: 100,
            },
            content_h:{
                minlength: 100,
            },
            Section_h:{
                required: true,
            },
            urlcategory:{
                required: true,
            },
            Image_Title: {
                required: true,
            },
            Image_Alt:{
                required: true,
            },
            tittle:{
                required: true,
            },
            video_text:{
                required: true,
            },
            description: {
                required: true,
            },
            type:{
                required: true,
            },
            keyword:{
                required: true,
            },
            image_text:{
                required: true,
            },
            order:{
                required: true,
            },
            image_alt:{
                required: true,
            },
            description:{
                required: true,
            },
            heading1:{
                minlength: 10,
                maxlength: 40,
            },
            heading1_h:{
                minlength: 2,
                maxlength: 60,
            },
            sort_note:{
                minlength: 10,
                maxlength: 40,
            },
            short_h:{
                minlength: 20,
                maxlength: 60,
            },
            address:{
                required: true,
            },

        },
        messages: {
            name: {
                required: "This field is required",
            },
            name_h:{
                required: "This field is required",
            },
            title:{
                required: "This field is required",
            },
            heading1:{
                maxlength: "Heading  must be of 40 characters",
                minlength: "Heading must be of 10 characters"
            },

            heading1_h:{
                maxlength: "Heading Hindi must be of 60 characters",
                minlength: "Heading Hindi must be of 20 characters"
            },
            sort_note:{
                maxlength: "Short Note  must be of 80 characters",
                minlength: "Short Note must be of 30 characters"
            },
            short_h:{
                maxlength: "Short Note Hindi must be of 100 characters",
                minlength: "Short Note Hindi must be of 40 characters"
            },
            type:{
                required: "This field is required",
            },
            order:{
                required: "This field is required",
            },
            urlcategory:{
                required: "This field is required",
            },
            designation: {
                required: "This field is required",
            },
            Image_Alt:{
                required: "Image Alt is required",
            },
            // department:{
            //     required: "This field is required",
            // },
            video_text:{
                required: "This field is required",
            },
            Section_h:{
                required: "This field is required",
            },
            image_text:{
                required: "This field is required",
            },
            image_alt:{
                required: "This field is required",
            },
            status:{
                required: "This field is required",
            },
            // title: {
            //     required: "Title is required",
            // },
            // title_h: {
            //     required: "hindi title is required",
            // },
            number:{
                required: "Website index  is required",
            },
            Image_Title: {
                required: "Image Title is required",
            },
            tittle:{
                required: "meta field is required",
            },
            description:{
                required: "description field is required",
            },
            keyword:{
                required: "keyword field is required",
            },
            content:{
                minlength: "content  must be of 100 characters"
            },
            content_h:{
                minlength: "content Hindi  must be of 100 characters"
            },
            meta_description: {
                required: "Website Meta Description is required",
            },
            tpl_id:{
                required: "This field is required",
            },
             menu_id:{
                required: "This field is required",
            },
            submenues:{
                required: "This field is required",
            },
            url:{
                required: "This field is required",
            },
            about_title: {
                required: "Website about title is required",
            },
            meta_title: {
                required: "Website meta title is required",
            },
            meta_keywords: {
                required: "Website meta keywords is required",
            },
            about: {
                required: "Website about content is required",
            },
            about_h: {
                required: "Website about content is required",
            },
            about_image: {
                required: "Website about image is required",
            },
            Logo_Title1: {
                required: "Website log title is required",
            },
            Logo_Title3: {
                required: "Website Logo title third is required",
            },
            url_logo3: {
                required: "Website Logo Url third is required",
            },
            Logo_Title4: {
                required: "Website Logo title Fourth is required",
            },
            contact: {
                required: "Contact Number is required",
                minlength: "Contact number must be of 10 digits"
            },
            time: {
                required: "Office Time is required",
            },
            video_image:{
                required: "This field is required",
            },
            email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters"
            },
            mobile: {
                required: "Phone number is required",
                minlength: "Phone number must be of 10 digits"
            },
            title:{
                required: "This field is required",
            },
            description: {
                required: "This field is required",
            },
            description_h: {
                required: "This field is required",
            },
            address:{
                required: "Address is Must",
            },

        }

    });
});




// disable alphate mobile
$('#mobile').keypress(function (e) {
    var regex = new RegExp("^[0-9_]");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});


// disable alphate contact
$('#contact').keypress(function (e) {
    var regex = new RegExp("^[0-9_{9,9}]");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});


//only characters taken

$('.special_no').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z_]");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});

