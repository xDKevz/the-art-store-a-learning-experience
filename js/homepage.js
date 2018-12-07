window.addEventListener('load', function() {
    
    fetch('../services/gallery.php')
        .then( response=>response.json() )
        .then( data => {
            generateGallery(data);
        }).catch( error => console.log(error) );
    
    fetch('../services/artist.php')
        .then( response=>response.json() )
        .then( data => {
            generateArtists(data);
        }).catch( error => console.log(error) );
        
    fetch('../services/genre.php')
        .then( response=>response.json() )
        .then( data => {
            generateGenre(data);
        }).catch( error => console.log(error) );
});

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

/**
 * Generates the list of galleries in the api
 * 
 * @param galleries - the json galleries data
 */
function generateGallery(data) {
    let list = document.querySelector('.galleryList');
    let sorteddata = sortGalleries(data)
    for (let gallery of sorteddata) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-gallery.php?id=" + gallery.GalleryID)
        
        let content = document.createTextNode(gallery.GalleryName);
        
        
        link.appendChild(content);
        li.appendChild(link);
        list.appendChild(li);
    }
}

function generateArtists(data) {
    let list = document.querySelector('.artistList');
    for (let artist of data) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-artist.php?id=" + artist.ArtistID);
        
        let figure = document.createElement('figure');
        
        let caption = document.createElement('figcaption');
        if (artist.FirstName == null)
            artist.FirstName = "";
        else if (artist.LastName == null)
            artist.LastName = "";
        caption.textContent = artist.FirstName + " " + artist.LastName;
        
        let img = document.createElement('img');
        img.setAttribute("src", "../services/imagescale.php?size=full&width=125&type=artists&file=" + artist.ArtistID);
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        li.appendChild(figure);
        list.appendChild(li);
    }
}

function generateGenre(data) {
    let list = document.querySelector('.genreList');
    for (let genre of data) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-genre.php?id=" + genre.GenreID);
        
        let figure = document.createElement('figure');
        
        let caption = document.createElement('figcaption');
        caption.textContent = genre.GenreName;
        
        let img = document.createElement('img');
        img.setAttribute("src", "images/genres/" + genre.GenreID + ".jpg");
        
        link.appendChild(img);
        figure.appendChild(link);
        figure.appendChild(caption);
        li.appendChild(figure);
        list.appendChild(li);
    }
}