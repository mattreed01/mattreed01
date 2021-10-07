/* Name: Matthew Reed
 * Student Number: 19100133
 * Position: 88*/

$(() => {
    const getUsers = URL => {
        return new Promise(res => {
            $.getJSON(URL, data => res(data));
        });
    };

    const createUserCard = (name, surname, quote) => {
        return $('<div></div>', {class: 'card mb-3'})
            .append($('<div></div>', {class: 'row no-gutters'})
            .append($('<div></div>', {class: 'col-md-4'})
            .append($('<img></img>', {src: 'bg.png', class: 'card-img', alt: '...'})))
            .append($('<div></div>', {class: 'col-md-8'})
            .append($('<div></div>', {class: 'card-body'})
            .append($('<h5></h5>', {html: `${name} ${surname}`, class:'card-title'}))
            .append($('<p></p>', {html: `Quote: ${quote}`, class: 'card-text'})))));
    };
    
    const sleep = duration => {
        return new Promise(res => {
            setTimeout(res, duration);
        });
    };

    $(window).on("scroll", async () => {
        if ($(window).scrollTop() + $(window).height() === $(document).height())
        {
            console.log("You have reached the bottom of the page");
            
            await sleep(1000);
            
            await getUsers('users.json').then(user => {
                    $('#userList').append(createUserCard(user[0].name, user[0].surname, user[0].quote));
                    $('#userList').append(createUserCard(user[1].name, user[1].surname, user[1].quote));
                    $('#userList').append(createUserCard(user[2].name, user[2].surname, user[2].quote));   
                });
                
            $('#userList').append($('.loading'));
        }
    });
});