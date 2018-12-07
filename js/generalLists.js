window.addEventListener("load", function(){
    let type = document.querySelector("#type").getAttribute("class");
    console.log(type);
    let url = "";
    if (type == "info") {
        url = "../services/info.php";
    } else if (type == "gallery") {
        url = "../services/gallery.php";
    } else if (type == "genre") {
        url = "../services/genre.php";
    }
    
    console.log(url);
    
    fetch(url)
        .then( response => response.json() )
        .then( data => {
            if (type == "info") {
                generateinfo(data);
            } else if (type == "gallery") {
                generateGallery(data);
            } else if (type == "genre") {
                generateGenre(data);
            }
        })
        .catch( error => console.log(error));
});


function generateinfo(data) {
    let list = document.querySelector(".display-lists");
    
    for(info of data) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-info.php?id=" + info.infoID);
        
        let figure = document.createElement('figure');
        
        let caption = document.createElement('figcaption');
        if (info.FirstName == null)
            info.FirstName = "";
        else if (info.LastName == null)
            info.LastName = "";
        caption.textContent = info.FirstName + " " + info.LastName;
        
        let img = document.createElement('img');
        // img.setAttribute("src", "images/infos/square/" + info.infoID + ".jpg");
        img.setAttribute("src", "../services/imagescale.php?size=square&width=150&type=infos&file=" + info.infoID);
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        li.appendChild(figure);
        list.appendChild(li);
        
        
    }
    
}

function generateGallery() {
    
}

function generateGenre() {
    
}