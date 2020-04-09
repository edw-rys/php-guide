function likeClick(id_movie, btn){
    xmlHttp= new XMLHttpRequest();
    xmlHttp.open("POST",'index.php?c=user&a=i_like_movies');
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = ()=>{
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            var res=xmlHttp.responseText;
            console.log(res);
            if(res){
                btn.classList="btn-like "+res;
            }
        }
    };
    xmlHttp.send("id_movie="+id_movie);
}