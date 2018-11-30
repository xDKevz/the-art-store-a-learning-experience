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
 * Generates the list of galleries in the api
 * 
 * @param galleries - the json galleries data
 */
function generateGallery(galleries) {
    let gList = document.querySelector('.galleryNames');
    let sorted = sortGalleries(galleries)
    for (let name of sorted) {
        let gName = document.createElement('li');
        let content = document.createTextNode(name.GalleryName);
        gName.appendChild(content);
        gList.appendChild(gName);
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

function generateArtists(data) {
    let list = document.querySelector('.artistList');
    for (let artist of data) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-artist.php?id=" + artist.ArtistID);
        
        let figure = document.createElement('figure');
        
        let caption = document.createElement('figcaption');
        caption.textContent = artist.FirstName + " " + artist.LastName;
        
        let img = document.createElement('img');
        img.setAttribute("src", "images/artists/square/" + artist.ArtistID + ".jpg");
        
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