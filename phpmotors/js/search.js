'use strict'

//Get elements
let elementsDiv = document.querySelector("#elementsDiv"); 
let searchButton = document.querySelector("#search-product");
let elementsArray = document.querySelectorAll(".searchedElementSection")
let numberOfElements = elementsArray.length
let currentPage = 1
let numberOfPages = Math.ceil(numberOfElements/10)
let numberOfPagesSection = document.querySelector("#number-of-pages-section")


//Create the number of pages
for (let i=0; i<numberOfPages; i++ ){
    let para = document.createElement("p");
    let text = document.createTextNode(i+1)
    para.appendChild(text)
    numberOfPagesSection.appendChild(para);
}

function previousPage(){
    if (currentPage>1){
        numberOfPagesSection.children[currentPage-1].style.color = "black"
        currentPage--;
        createElements(currentPage);
    }
}
function nextPage(){
    if (currentPage<numberOfPages){
        numberOfPagesSection.children[currentPage-1].style.color = "black"
        currentPage++;
        createElements(currentPage);
    }
}
/* function changePage(currentPage){
    let nextBtn = document.getElementById("nextBtn");
    let previousBtn = document.getElementById("previousBtn");

} */
function createElements(currentPage){
    console.log(currentPage)
    numberOfPagesSection.children[currentPage-1].style.color = "red"
    elementsArray.forEach(element => {
        element.style.display = "none";
    });
    for(let i = 10*(currentPage-1); i<(10*currentPage) && i<=numberOfElements; i++){
        elementsArray[i].style.display = "block";
    }
}
createElements(currentPage)
