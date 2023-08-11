function showError(field, message){
    if(!message){
        $("#"+field).addClass('is-valid')
        .removeClass('is-invalid')
        .siblings()
        .text("");
    }
    else{
        $("#"+field).addClass('is-invalid')
        .removeClass('is-valid')
        .siblings('invalid-feedback')
        .text(message);
    }
}

function removeValidClasses(form){
    $(form).each(function(){
    $(form).find(':input').removeClass('is-valid is-invalid');
    });
}

function showMessage(type, message) {
    return '<span class="alert alert-${type} d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><div>${message}</div></span>';
}