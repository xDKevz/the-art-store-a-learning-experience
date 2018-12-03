window.addEventListener('load', function() {
    // let GalleryID = #document.querySelector(".info-panel section").getAttribute("id");
    const url = "https://comp3512-asg2-leepalisoc.c9users.io/services/painting.php?gallery=11" //+ GalleryID;
    fetch(url)
        .then( response => response.json() )
        .then( data => {
            populatePainting(data);
            console.log(data);
        })
        .catch( error => console.log(error));
});

/**
 * Populates the painting list section using the data provided.
 * 
 * @param paintingList list of paintings to be displayed
 */
function populatePainting(paintingList) {

    // remove previous painting list
    removeContentOfPaintingList();

    let listContainer = document.querySelector(".paintings-data");

    paintingList.forEach(piece => {
        // reference for href attribute
        let href = "#" + piece.PaintingID;

        let id = piece.PaintingID;
        let list = document.createElement('ul');
        let paintingImage = document.createElement('li');
        let artist = document.createElement('li');
        let title = document.createElement('li');
        let year = document.createElement('li');
        let img = document.createElement('img');
        let link = document.createElement('a');

        list.setAttribute('class', `ulrow`);
        // set data-painting-id attribute for easy retrieval of painting
        link.setAttribute('data-painting-id', id);
        // set href so that links do not turn grey when ever one is click already
        link.setAttribute('href', href);
        
        // set class attributes for column
        paintingImage.setAttribute('class', 'ulcol0');
        artist.setAttribute('class', 'ulcol1');
        title.setAttribute('class', 'ulcol2');
        year.setAttribute('class', 'ulcol3');
        img.setAttribute('src', `../services/imagescale.php?size=square&width=100&type=paintings&file=${piece.ImageFileName}`);
        

        // append painting title to a element
        link.appendChild(document.createTextNode(piece.Title));

        // set content of li elements
        paintingImage.appendChild(img);
        artist.appendChild(document.createTextNode(piece.LastName));
        title.appendChild(link);
        year.appendChild(document.createTextNode(piece.YearOfWork));

        // add li elements to ul
        list.appendChild(paintingImage);
        list.appendChild(artist);
        list.appendChild(title);
        list.appendChild(year);

        // add ul to section
        listContainer.appendChild(list);
    });
}

/**
 * Removes previous contents of the painting list 
 */
function removeContentOfPaintingList() {
    // remove previous content
    let paintingRows = document.querySelectorAll('.list-rows');
    if (paintingRows.length > 0) {
        paintingRows.forEach(e => e.remove());
    }
}