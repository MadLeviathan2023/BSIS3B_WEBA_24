async function getRoot() {
    return new Promise((resolve, reject) => {
        const XHR = new XMLHttpRequest();
        XHR.onreadystatechange = () => {
            if (XHR.readyState == 4) {
                if (XHR.status == 200) {
                    resolve(XHR.responseText);
                }
                else {
                    reject(`Error! Status code: ${XHR.status}`);
                }
            }
        };
        XHR.open('GET', import.meta.url + '/../../get/root');
        XHR.send();
    });
};

export const ROOT = await getRoot();

export function isValidURL(urlString){
    try{
        return Boolean(new URL(urlString));
    }
    catch{
        return false;
    }
}