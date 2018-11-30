window.addEventListener('load', function() {
    
    let id = document.querySelector(".aImage").getAttribute("id");
    let paintingUrl = '../services/painting.php?artist=' + id;
    
    fetch(paintingUrl)
        .then( response=>response.json() )
        .then( data => {
            generatePaintings(data);
        }).catch( error => console.log(error) );
});

/**
 * Generates painting data within the selected gallery
 * 
 * @param paintings - the json file containing the data of paintings associated with the selected artist
 */
function generatePaintings(paintings) {
    
    let sortedData = paintings;
    const paintingBlock = document.querySelector(".paintingRow");
    
    // document.querySelector(".hArtist").addEventListener('click', function() {
    //     console.log("artist sort event");
    //     sortedData = sortArtist(sortedData, paintingBlock);
    // }); 
    
    document.querySelector(".hTitle").addEventListener('click', function() {
        console.log("title sort event");
        sortedData = sortTitle(sortedData, paintingBlock);
        
    });
    
    document.querySelector(".hYear").addEventListener('click', function() {
        console.log("year sort event");
        sortedData = sortYearOfWork(sortedData, paintingBlock);
        
    });
    
    paintingTable(sortedData, paintingBlock);
}


/**
 * Various sorting functions based on artist last name,
 * painting title, and year of painting.
 * 
 * @param paintings - the list of painting objects to be sorted
 * @param block - the section element where the paintings will be inserted into
 */ 
function sortArtist(paintings, block) {
    paintings.sort( function(a,b) {
        if (a.LastName.toLowerCase() < b.LastName.toLowerCase()){return -1;}
        else if (a.LastName.toLowerCase() > b.LastName.toLowerCase()){return 1;}
        else {return 0;}
    });
    paintingTable(paintings, block);
    return paintings;
}
function sortTitle(paintings, block) {
    paintings.sort( function(a,b) {
        if (a.Title < b.Title){return -1;}
        else if (a.Title > b.Title){return 1;}
        else {return 0;}
    });
    paintingTable(paintings, block);
    return paintings;
}
function sortYearOfWork(paintings, block) {
    paintings.sort( function(a,b) {
        if (a.YearOfWork < b.YearOfWork){return -1;}
        else if (a.YearOfWork > b.YearOfWork){return 1;}
        else {return 0;}
    });
    paintingTable(paintings, block);
    return paintings;
}


/**
 * This function is an extension of the generatePaintings function which
 * generates the variety of painting information associated with
 * the selected gallery
 * 
 * @param sorted - the sorted list of paintings
 * @param block - the section element that will contain the paintings
 */
function paintingTable(sorted, block) {
    let paintRows = document.getElementsByClassName("ulrow");
    classClearer(paintRows);
    
    let aName = document.querySelector('#last-name').textContent;
    
    for (p of sorted) {
        let row = document.createElement('ul');
        row.setAttribute("class", "ulrow")
        
        let imgLi = document.createElement('li');
        imgLi.setAttribute("class", "ulcol0");
        // let artistLi = document.createElement('li');
        // artistLi.setAttribute("class", "ulcol1")
        let titleLi = document.createElement('li');
        titleLi.setAttribute("class", "ulcol2");
        let yearOfWorkLi = document.createElement('li');
        yearOfWorkLi.setAttribute("class", "ulcol3");
        
        let img = document.createElement('img');
        let thumbnail = document.createElement('img');
        // img.setAttribute('src', 'images/paintings/square/' + p.ImageFileName +'.jpg');
        let imgLink = '../services/imagescale.php?size=square&width=100&type=paintings&file=' + p.ImageFileName;
        let thumbNailLink = '../services/imagescale.php?size=square&width=200&type=paintings&file=' + p.ImageFileName;
        img.setAttribute('src', imgLink);
        thumbnail.setAttribute('src', thumbNailLink);
        thumbNailFunctions(img, thumbnail);
        imgLi.appendChild(img);
        
        // artistLi.textContent = aName;
        titleLi.textContent = p.Title;
        yearOfWorkLi.textContent = p.YearOfWork;
        
        row.appendChild(imgLi);    
        // row.appendChild(artistLi);
        row.appendChild(titleLi);
        row.appendChild(yearOfWorkLi);
        block.appendChild(row);   
    }
}


function thumbNailFunctions(img, thumbNail) {
    img.addEventListener('mouseenter', function() {
        let enlarge = document.querySelector("#painting-row-enlarge");
        enlarge.appendChild(thumbNail);
        enlarge.style.display = "block";
        console.log("mouse enter functions");
    });
    img.addEventListener('mouseleave', function() {
        let enlarge = document.querySelector("#painting-row-enlarge");
        enlarge.style.display = "none";
    });
    img.addEventListener('mousemove', function(){
        
    });
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