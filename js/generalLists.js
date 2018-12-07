window.addEventListener("load", function(){
    let type = document.querySelector("#type").getAttribute("class");
    console.log(type);
    let url = "";
    if (type == "artist") {
        url = "../services/artist.php";
    } else if (type == "gallery") {
        url = "../services/gallery.php";
    } else if (type == "genre") {
        url = "../services/genre.php";
    }
    
    console.log(url);
    
    fetch(url)
        .then( response => response.json() )
        .then( data => {
            if (type == "artist") {
                generateArtists(data);
            } else if (type == "gallery") {
                generateGallery(data);
            } else if (type == "genre") {
                generateGenre(data);
            }
        })
        .catch( error => console.log(error));
});


function generateArtists(data) {
    let list = document.querySelector(".display-lists");
    
    for(let info of data) {
        let link = document.createElement('a');
        link.setAttribute("href", "single-artist.php?id=" + info.ArtistID);
        
        let figure = document.createElement('figure');
        
        let caption = document.createElement('figcaption');
        if (info.FirstName == null)
            info.FirstName = "";
        else if (info.LastName == null)
            info.LastName = "";
        caption.textContent = info.FirstName + " " + info.LastName;
        
        let img = document.createElement('img');
        img.setAttribute("src", "../services/imagescale.php?size=full&width=125&type=artists&file=" + info.ArtistID);
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        list.appendChild(figure);
    }
    
}

function generateGenre(data) {
    let list = document.querySelector('.display-lists');
    for (let genre of data) {
        let link = document.createElement('a');
        link.setAttribute("href", "single-genre.php?id=" + genre.GenreID);
        
        let figure = document.createElement('figure');
        let caption = document.createElement('figcaption');
        caption.textContent = genre.GenreName;
        
        let img = document.createElement('img');
        img.setAttribute("src", "../services/imagescale.php?width=125&file=" + genre.GenreID);
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        list.appendChild(figure);
    }
}


function generateGallery(data) {
    let list = document.querySelector('.display-lists');
    for (let gallery of data) {
        let hfour = document.createElement('h4');
        hfour.textContent = gallery.GalleryName;
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-gallery.php?id=" + gallery.GalleryID)
        
        // let content = document.createTextNode(gallery.GalleryName);
        // link.appendChild(content);
        
        link.appendChild(hfour);
        
        list.appendChild(link);
    }
}