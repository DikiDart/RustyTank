const express = require('express');
const app = express();


app.use("/", function(req, res){   
try {
    const u = atob(req.query.u); //base64_decode
    console.log(`Url is: ${u}`);
    
    console.log('exec script');
    const { exec } = require("child_process");
    exec(`node sel2.js -u '${u}'`, (error, stdout, stderr) => {
    if (error) {
        console.log(`error: ${error.message}`);
        return;
    }
    if (stderr) {
        console.log(`stderr: ${stderr}`);
        return;
    }
    console.log(`stdout: ${stdout}`);
    });
    
    console.log('send hohohoo');
    res.send("Hohohoo.I'll answer you soon. Merry Xssmas!");
    } catch (error) {
                    console.error('Try harder, little child.');
                    }
});




app.listen(3000);
