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

/**
 * Populates all the artists requested from the artist API
 * 
 * @param data - the json artist data
 */
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
        
        figure.setAttribute("class", "display-content");
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        list.appendChild(figure);
    }
    
}

/**
 * Populates all the Genres requested from the genre API
 * 
 * @param data - the json genre data
 */
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
        
        figure.setAttribute("class", "display-content");
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        list.appendChild(figure);
    }
}

/**
 * Populates all the galleries requested from the gallery API
 * 
 * @param data - the json gallery data
 */
function generateGallery(data) {
    let list = document.querySelector('.display-lists');
    let sortedData = sortGalleries(data);
    for (let gallery of sortedData) {
        let hfour = document.createElement('h4');
        hfour.textContent = gallery.GalleryName;
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-gallery.php?id=" + gallery.GalleryID)
        
        link.setAttribute("class", "display-gallery");
        
        link.appendChild(hfour);
        
        list.appendChild(link);
    }
}

/**
 * Sorts the galleries based on their GalleryName property
 * 
 * @param sortGalleries - the json gallery data
 */
function sortGalleries(sortGalleries) {
    sortGalleries.sort(function(a,b) {
        if (a.GalleryName < b.GalleryName){return -1;}
        else if (a.GalleryName > b.GalleryName){return 1;}
        else {return 0;}
    });
    return sortGalleries;
}