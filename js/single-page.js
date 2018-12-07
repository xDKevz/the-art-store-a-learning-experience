window.addEventListener('load', function() {
    let type = document.querySelector("#type").getAttribute("class");
    console.log(type);
    let imageid = document.querySelector(".information").getAttribute("id");
    console.log(imageid);
    let url = ""
    if (type == "artist") {
        url = "../services/painting.php?artist=" + imageid;
    } else if (type == "gallery") {
        url = "../services/painting.php?gallery=" + imageid;
        // url = "https://comp3512-asg2-leepalisoc.c9users.io/services/painting.php?gallery=" + imageid;
    } else if (type == "genre") {
        url = "../services/painting.php?genre=" + imageid;
    }
    
    console.log(url);

    fetch(url)
        .then( response => response.json() )
        .then( data => {
            console.log(data)
            setupSortlistener(data);
            populatePainting(data);
            initMap();
        })
        .catch( error => console.log(error) );
});

function populatePainting(painting) {
    let container = document.querySelector(".painting ul");
    // remove previous painting list
    container.textContent = "";
    
    painting.forEach(piece => {
        let list = document.createElement("li");
        let img = document.createElement("img");
        let title = document.createElement("p");
        let artist = document.createElement("p");
        let year = document.createElement("p");
        let link = document.createElement("a");
        let thumbnail = document.createElement("img");

        link.setAttribute("href", "#" + piece.PaintingID);
        img.setAttribute("src", "../services/imagescale.php?size=square&width=150&type=paintings&file=" + piece.ImageFileName);
        thumbnail.setAttribute("src", "../services/imagescale.php?size=square&width=300&type=paintings&file=" + piece.ImageFileName)
        thumbnail.setAttribute("class", "thumbnail");
        
        title.textContent = piece.Title;
        year.textContent = piece.YearOfWork;
        let FirstName = "";
        let LastName = "";
        if (piece.FirstName != null) { FirstName=piece.FirstName; } 
        if (piece.LastName != null) { LastName=piece.LastName; }

        artist.textContent = FirstName + " " + LastName;
        
        // append content to li
        link.appendChild(title);
        list.appendChild(img);
        list.appendChild(link);
        list.appendChild(artist);
        list.appendChild(year);
        
        // add li to ul
        container.appendChild(list);
        
        createthumbnail(img, thumbnail);
    });
}

function createthumbnail(img, thumbnail) {
    let popup = document.querySelector("#popup");
    popup.style.position = "absolute";
    
    img.addEventListener('mouseenter', function() {
        // disables popup view in mobile
        if (!(window.matchMedia("(max-width: 768px)").matches)) {
            popup.appendChild(thumbnail);
            popup.style.display = "block";
            console.log("mouse enter functions");
        }
    });
    
    img.addEventListener('mouseleave', function() {
        let popup = document.querySelector("#popup");
        popup.style.display = "none";
        let element = document.getElementsByClassName("thumbnail");
        classClearer(element);
    });
    
    img.addEventListener('mousemove', function(e){
        // https://stackoverflow.com/questions/1248081/get-the-browser-viewport-dimensions-with-javascript
        // var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        // var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        let x = e.clientX + 100;
        let y = e.clientY - (e.clientY / 3);
        // let x = (window.innerWidth - e.clientX) + 10;
        // let y = (window.innerHeight - e.clientY) + 10;
        popup.style.top = y + "px";
        popup.style.left = x + "px";
    });
}

/**
 * Sets up map using given coordinates
 * 
 * @param latitude galleries latitude
 * @param longitude galleries longitude
 */
function initMap(latitude, longitude) {
    let mapContainer = document.querySelector('.map');
    if (mapContainer) {
        let latitude = document.querySelector("#latitude").getAttribute("class");
        let longitude = document.querySelector("#longitude").getAttribute("class");
        console.log(latitude, longitude);
        mapContainer.style.height = '500px';
        map = new google.maps.Map(mapContainer, {
            center: { lat: Number(latitude), lng: Number(longitude) },
            mapTypeId: 'satellite',
            zoom: 18
        });
    }

}


/**
 * Sets up 'painting list' artist, title, year event handlers.
 * 
 * @param the current painting list data. Use in order to
 *        re-populate the list by the preffered sort
 */
function setupSortlistener(paintingList) {
    // sort by artist
    document.querySelector('#artist').addEventListener('click', () => {
        populatePainting(sortArtist(paintingList));
    });
    
    // sort by title
    document.querySelector('#title').addEventListener('click', () => {
        populatePainting(sortTitle(paintingList));
    });
    
    // sort by year
    document.querySelector('#year').addEventListener('click', () => {
        populatePainting(sortYear(paintingList));
    });
}

/**
 * Sorts data by title
 * 
 * @param data data to be sorted
 */
function sortTitle(data) {
    return data.sort((a, b) => a.Title < b.Title ? -1 : 1);
}

/**
 * Sorts data by year of work
 * 
 * @param data data to be sorted
 */
function sortYear(data) {
    return data.sort((a, b) => a.YearOfWork < b.YearOfWork ? -1 : 1);
}

/**
 * Sorts data by artist last name
 * 
 * @param data data to be sorted
 */
function sortArtist(data) {
    return data.sort( (a,b) => a.LastName.toLowerCase() < b.LastName.toLowerCase() ? -1:1);
}

/**
 * Removes the elements containing the class name.
 * 
 * @param elementsByClass - the array which contains the elements with the className to be deleted 
 */
function classClearer(elementsByClass) {
    for (let i = (elementsByClass.length - 1); i >= 0; i--) {
        elementsByClass[i].remove();
    }
}