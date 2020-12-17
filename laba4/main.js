

var arr = document.getElementById("get_array");

arr.addEventListener('keypress',() => {
    const promise = result(arr.value);
    promise.then(   );
});

function result(values){
    const params = new URLSearchParams();
    params.append("array", values);
    const promise = axios.post('http://laba4/main.php', params);
    return promise.then((response) => {
        return response.data;
    })
}

function onDataReceived(data) {
    return data;
}