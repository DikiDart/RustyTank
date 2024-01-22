const { Builder } = require("selenium-webdriver");
const firefox = require('selenium-webdriver/firefox');

const options = new firefox.Options().setPreference('general.useragent.override', 'flag=Hohohoo CODEBY{Th1s_1s_j4st_4_b3g1nn1ng!}');
const driver = new Builder()
    .forBrowser('firefox')
    .setFirefoxOptions(options.addArguments('--headless'))
    .build();
  



async function openWebsite(url) {
try {
await driver.get(url);
console.log("Script completed");
} catch (error) {
console.error("Error in sel2.js",error);
} finally {
await driver.quit();
}
}



const urlIndex = process.argv.indexOf('-u');
let urlValue;

if (urlIndex > -1) {
  urlValue = process.argv[urlIndex + 1];
}

const argU = (urlValue || 'none');

openWebsite(`${argU}`);
