window.addEventListener('load', function() {
    
    // document.querySelector(".loading").style.display = "block";
    // document.querySelector(".home").style.display = "none";
    getReady();
    document.querySelector(".loading").style.display = "none";
    document.querySelector(".home").style.display = "grid";
});

function getReady() {
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

/**
 * Generates the list of galleries in the api
 * 
 * @param galleries - the json galleries data
 */
function generateGallery(data) {
    let list = document.querySelector('.gallerylist-ul');
    let sorteddata = sortGalleries(data)
    for (let gallery of sorteddata) {
        let li = document.createElement('li');
        
        let link = document.createElement('a');
        link.setAttribute("href", "single-gallery.php?id=" + gallery.GalleryID)
        
        let content = document.createTextNode(gallery.GalleryName);
        
        li.setAttribute("class", "home-gallery");
        
        link.appendChild(content);
        li.appendChild(link);
        list.appendChild(li);
    }
}

/**
 * Populates all the artists requested from the artist API
 * 
 * @param data - the json artist data
 */
function generateArtists(data) {
    let half = data.length / 2;
    let index = 0;
    
    let list = document.querySelector('.artistlist .box1');
    let list2 = document.querySelector('.artistlist .box2');
    for (let artist of data) {
        // if index is equal to half switch selected list
        if (index == half) {
            list = list2;
        }
        
        let div = document.createElement('div');
        
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
        div.appendChild(figure);

        div.setAttribute("class", "hpage");
        list.appendChild(div);
        
        // increase index to switch were to append data
        index++;
    }
}

/**
 * Populates all the genres requested from the genres API
 * 
 * @param data - the json genres data
 */
function generateGenre(data) {
    let half = data.length / 2;
    let index = 0;
    
    let list = document.querySelector('.genrelist .box1');
    let list2 = document.querySelector('.genrelist .box2');
    for (let genre of data) {
        // if index is equal to half switch selected list
        if (index == half) {
            list = list2;
        }
        
        let div = document.createElement('div');
        
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
        div.appendChild(figure);

        div.setAttribute("class", "hpage");
        list.appendChild(div);
        
        // increase index to switch were to append data
        index++;
    }
}