
window.onscroll = () =>{
    if(document.body.scrollTop>50 || document.documentElement.scrollTo > 50){
        console.log('abajo');
    }else{
        console.log('arriba');

    }
}


function cargarPost(num){
    let offset = 0;
    let urlApi = `http://localhost/apiphp/api.php?idcat=164&offset=${offset}&limit=${num}`;   
    console.log(urlApi)                                                                                             
    axios({
        method:'get',
        url:urlApi,
        responseType : 'json'

    })
    .then((response)=>{
        if(response.status == 200){
            console.log(response.data);
        }
    })
    .catch((error) => console.log(error));
}

cargarPost(40);