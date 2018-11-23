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

function generateArtists(artists) {
    let gList = document.querySelector('.artistList');
    for (let name of artists) {
        let gName = document.createElement('li');
        let img = document.createElement('img');
        img.setAttribute("src", "images/artists/square/" + name.ArtistID + ".jpg");
        gName.appendChild(img);
        gList.appendChild(gName);
    }
}