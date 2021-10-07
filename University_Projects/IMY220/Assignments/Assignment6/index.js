/*Name: Matthew Reed
 *Student Number: 19100133
 *Position: 88*/

const express = require('express');
const app = express();

const port = "3000";

const server = app.listen(port, () => {
    console.log(`Listening on *:${port}`);
});

const io = require('socket.io').listen(server);

app.use(express.static('public'));

const fs = require('fs');

/*========================Code for adding into text file========================
  const txtFile = "messageLog.txt";

fs.writeFile(txtFile, "Messages:" + "\n", error => {
    if (error)
    {
        throw error;
    }
});

io.on('connection', socket=> {
    socket.on('data', msg => {
        let obj = JSON.parse(msg);
        let text = `Name: ${obj.name}, Message: ${obj.message} \n`;
        
        fs.writeFile(txtFile, text, {'flag': 'a'}, error => {
            if (error)
            {
                throw error;
            }
            
            //console.log(`${text} added to file.`);
        });
    });
});
 =============================================================================*/

const jsonFile = "messageLog.json";

if (!fs.existsSync(jsonFile))
{
  fs.writeFile(jsonFile, '{"messages": []}', error => {
        if (error)
        {
            throw error;
        }
    });  
}



io.on('connection', socket=> {
    socket.on('data', msg => {
        fs.readFile(jsonFile, (readError, jsonArray) => {
            if(readError)
            {
                throw readError;
            }
            
            let readArray = JSON.parse(jsonArray);
            let obj = JSON.parse(msg);
            
            readArray["messages"].push(obj);
            
            fs.writeFile(jsonFile, JSON.stringify(readArray), writeError => {
                if (writeError)
                {
                    throw writeError;
                }
            });
        });
    });
});

app.get('/messages', (request, response) => {
    fs.readFile(jsonFile, (error, readArray) => {
        if (error)
        {
            throw error;
        }
        
        let listArray = JSON.parse(readArray);
        let listArraySize = listArray["messages"].length;
        
        let responseBody = "<ul>";
        
        for(let i = 0; i < listArraySize; i++)
        {
            responseBody += `<li>Name: ${listArray["messages"][i].name}, Message: ${listArray["messages"][i].message}</li>`;
        }
        
        responseBody += "</ul>";
        
        response.send(responseBody);
    });
});
