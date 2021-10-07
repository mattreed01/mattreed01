$(() => {
    
    let editablePrfilePhoto = $("div.profileInfo div#Image img");
    let btnChangePicture = $("div.profileInfo div#bio button#editProfPhoto");
    
    let editableDescription = $("div.profileInfo div#bio div *");
    let name = $("div.profileInfo div#bio div span#name");
    let sname = $("div.profileInfo div#bio div span#surname");
    let email = $("div.profileInfo div#bio div span#email");
    let btnEditBio = $("div.profileInfo div#bio button#editBio");
    
    let nameValue = name.text();
    let snameValue = sname.text();
    let emailValue = email.text();
    
    btnEditBio.on("click", () => {
        editableDescription.toggle();
        
        if(!editableDescription.is(":visible"))
        {
            btnEditBio.text("Cancel");
            $("<form></form>", {id: 'formBio', action: './profile.php', method: 'POST'}).appendTo("div.profileInfo div#bio div");
            $("<input></input>", {id: 'inputName', name: 'nameInput', type: name.data("type"), value: nameValue}).appendTo("form#formBio");
            $("<br />").appendTo("form#formBio");
            $("<input></input>", {id: 'inputSname', name: 'snameInput', type: sname.data("type"), value: snameValue}).appendTo("form#formBio");
            $("<br />").appendTo("form#formBio");
            $("<input></input>", {id: 'inputEmail', name: 'emailInput', type: email.data("type"), value: emailValue}).appendTo("form#formBio");
            $("<br />").appendTo("form#formBio");
            $("<input></input>", {type: 'submit', name: 'changeBio', value: 'Confirm Changes'}).appendTo("form#formBio");
        }
        else
        {
            btnEditBio.text("Edit Bio");
            $("form#formBio").remove();
        }
    });
    
    btnChangePicture.on("click", () => {
        editablePrfilePhoto.toggle();
        
        if(!editablePrfilePhoto.is(":visible"))
        {
            btnChangePicture.text("Cancel");
            $("<form></form>", {id: 'formImg', action: './profile.php', method: 'POST', enctype: 'multipart/form-data'}).appendTo("div.profileInfo div#Image");
            $("<input></input>", {type: 'file', name: 'newPic', value: 'Change'}).appendTo("form#formImg");
            $("<br />").appendTo("form#formImg");
            $("<input></input>", {type: 'submit', name: 'changePic', value: 'Confirm'}).appendTo("form#formImg");
        }
        else
        {
           btnChangePicture.text("Change Profile Photo"); 
           $("form#formImg").remove();      
        }
    });
});