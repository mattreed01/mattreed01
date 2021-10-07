/*Name: Matthew Reed
 * Student Number: 19100133
 * Position: 88*/

$(() => {
    console.log('The document is ready!');
});

let nameDetails = $('div.details:nth-child(1) b, div.details:nth-child(1) span');
let snameDetails = $('div.details:nth-child(2) b, div.details:nth-child(2) span');
let emailDetails = $('div.details:nth-child(3) b, div.details:nth-child(3) span');
let bdateDetails = $('div.details:nth-child(4) b, div.details:nth-child(4) span');

let btnName = $('div.details:nth-child(1) button');
let btnSname = $('div.details:nth-child(2) button');
let btnEmail = $('div.details:nth-child(3) button');
let btnBdate = $('div.details:nth-child(4) button');

let dataName = $('div.details:nth-child(1)').data('type');
let dataSname = $('div.details:nth-child(2)').data('type');
let dataEmail = $('div.details:nth-child(3)').data('type');
let dataBdate = $('div.details:nth-child(4)').data('type');

let valueName = $('div.details:nth-child(1) span').text();
let valueSname = $('div.details:nth-child(2) span').text();
let valueEmail = $('div.details:nth-child(3) span').text();
let valueBdate = $('div.details:nth-child(4) span').text();

btnName.on('click', () => { 
    nameDetails.toggle();
    
    if(!nameDetails.is(':visible'))
    {
        btnName.text('Update');
        $('<input></input>', {class: 'col-8 left', type: dataName, placeholder: valueName}).appendTo('div.details:nth-child(1)');
        $(btnName, {class: 'col right'}).appendTo('div.details:nth-child(1)');
    }
    else
    {
        valueName = $('div.details:nth-child(1) input.left').val();
        $('div.details:nth-child(1) span').text(valueName);
        
        btnName.text('Edit');
        $('div.details:nth-child(1) input.left').remove();
    }
});

btnSname.on('click', () => {
    snameDetails.toggle();
    
    if(!snameDetails.is(':visible'))
    {
        btnSname.text('Update');
        $('<input></input>', {class: 'col-8 left', type: dataSname, placeholder: valueSname}).appendTo('div.details:nth-child(2)');
        $(btnSname, {class: 'col right'}).appendTo('div.details:nth-child(2)');
    }
    else
    {
        valueSname = $('div.details:nth-child(2) input.left').val();
        $('div.details:nth-child(2) span').text(valueSname);
        
        btnSname.text('Edit');
        $('div.details:nth-child(2) input.left').remove();
    }
});

btnEmail.on('click', () => {
    emailDetails.toggle();
    
    if(!emailDetails.is(':visible'))
    {
        btnEmail.text('Update');
        $('<input></input>', {class: 'col-8 left', type: dataEmail, placeholder: valueEmail}).appendTo('div.details:nth-child(3)');
        $(btnEmail, {class: 'col right'}).appendTo('div.details:nth-child(3)');
    }
    else
    {
        valueEmail = $('div.details:nth-child(3) input.left').val();
        $('div.details:nth-child(3) span').text(valueEmail);
        
        btnEmail.text('Edit');
        $('div.details:nth-child(3) input.left').remove();
    }
});

btnBdate.on('click', () => {
    bdateDetails.toggle();
    
    if(!bdateDetails.is(':visible'))
    {
        btnBdate.text('Update');
        $('<input></input>', {class: 'col-8 left', type: dataBdate}).appendTo('div.details:nth-child(4)');
        $(btnBdate, {class: 'col right'}).appendTo('div.details:nth-child(4)');
    }
    else
    {
        valueBdate = $('div.details:nth-child(4) input.left').val();
        $('div.details:nth-child(4) span').text(valueBdate);
        
        btnBdate.text('Edit');
        $('div.details:nth-child(4) input.left').remove();
    }
});