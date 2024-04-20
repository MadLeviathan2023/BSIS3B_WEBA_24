export const ROOT = 'https://' + window.location.hostname + '/Web/WebA-MVC/eMenu/public';

export function isValidURL(urlString){
    try{
        return Boolean(new URL(urlString));
    }
    catch{
        return false;
    }
}