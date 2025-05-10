/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(":text[id='langname']").popover({placement:"top"}).data("bs.popover").tip().addClass("popover-danger");
    
});

function addLangEmptyCheck(){
    str = $("#langname").val();
    if(str.trim().length===0){
        $(":text[id='langname']").popover('show');
        setTimeout(function(){$(":text[id='langname']").popover('hide');},1500);
        $(":text[id='langname']").focus();
        return false;
    }
    return true;
}

function testPage(){
    if($("#testName").val().length===0)
    {
        alert('Invalid Test Name');
        $("#testName").focus();
        return false;
    }
    
    noofques = $('#noofques').selectpicker('val');
    if(noofques === ''){
        alert('Invalid Number of Question');
        $('#noofques').focus(); 
        return false;
    }
    
    duration = $('#duration').selectpicker('val');
    if(duration === ''){
        alert('Invalid duration');
        $('#duration').focus(); 
        return false;
    }
    
    maxmarks = parseInt($("#maxmarks").val());

    if(!(maxmarks % noofques === 0)){
        alert("Maximum marks must be multiple of Number of Question");
        $("#maxmarks").focus();
        return false;
    }
}

