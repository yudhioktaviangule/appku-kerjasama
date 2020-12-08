export default function setReqHead(xhr){
    xhr.setRequestHeader("Auth",`Bearer ${window.__token}`);
}