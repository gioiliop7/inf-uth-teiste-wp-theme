$( document ).ready(function() {

var loading_svg = window.location.origin + "/inf-uth/wp-content/uploads/2021/06/1488.gif";

function displayLoading() {
    return `
        <div class="mt-3 text-center">
            <img src="${loading_svg}" style="max-width:50px;">
            <p> Φόρτωση στοιχείων... </p>
        </div">
        `;
}


function subjects_ajax_call(subject,semester,kateuthinsis,paged){

    content = jQuery('.content-row');
    pagination = jQuery('.pagination');

    jQuery.ajax({
        url:subjects.ajaxUrl,
        method:'POST',
        data:{
            'action':'subjects',
            'subjects': subject,
            'examino':semester,
            'kateuthinsi':kateuthinsis,
            'paged':paged
        },
        beforeSend: function() {
            content.empty().append(displayLoading());
        },
        success:function(data){
            content.empty().append(data.data.content);
            pagination.empty().append(data.data.pagination);
        }
    });

};

jQuery('#semester').on('change',()=>{
    let semester = jQuery('select[id="semester"]').val();
    let subject = jQuery('input[name="subjectsname"]').val();
    let kateuthinsis = jQuery('select[id="kat"]').val();
    subjects_ajax_call(subject,semester,kateuthinsis);
});

jQuery('#kat').on('change',()=>{
    let semester = jQuery('select[id="semester"]').val();
    let subject = jQuery('input[name="subjectsname"]').val();
    let kateuthinsis = jQuery('select[id="kat"]').val();
    subjects_ajax_call(subject,semester,kateuthinsis);
});

jQuery('input[name="subjectsname"]').keyup(function (e) {
    let semester = jQuery('select[id="semester"]').val();
    let subject = jQuery('input[name="subjectsname"]').val();
    let kateuthinsis = jQuery('select[id="kat"]').val();
    subjects_ajax_call(subject,semester,kateuthinsis);
});

jQuery(document).on('click','.page-numbers',function(e){
    if(!$(this).hasClass('dots') && !$(this).hasClass('current')){
        e.preventDefault();
        paged = $(this).text();
        paged = paged.replace(',', '');
        let semester = jQuery('select[id="semester"]').val();
        let subject = jQuery('input[name="subjectsname"]').val();
        let kateuthinsis = jQuery('select[id="kat"]').val();
        subjects_ajax_call(subject,semester,kateuthinsis,paged);
    }
});

$('#clearbutton').on('click',(e)=>{
    jQuery("#forms")[0].reset();
    let semester = jQuery('select[id="semester"]').val();
    let subject = jQuery('input[name="subjectsname"]').val();
    let kateuthinsis = jQuery('select[id="kat"]').val();
    subjects_ajax_call(subject,semester,kateuthinsis);
});



}); //close on ready