


let filteredProducts = []; 

let limit = localStorage.getItem('limit') || 10; 

function NumPage(value) {
  const intValue = parseInt(value, 10);
  
  if (!isNaN(intValue) && intValue > 0) {
    limit = intValue;
    localStorage.setItem('limit', limit); 
  } else {
    console.error('Invalid limit value. Setting default limit.');
    limit = 10;
    localStorage.setItem('limit', limit); 
  }
  
  return limit;
}



const selectElement = document.getElementById('mySelect');

const storedValue = localStorage.getItem('selectedValue');


if (storedValue !== null) {
    selectElement.value = storedValue;
}


selectElement.addEventListener('change', function() {
    const selectedValue = selectElement.value;

 
    localStorage.setItem('selectedValue', selectedValue);

 
    const limit = NumPage(selectedValue);

   
    console.log(selectedValue);

   
    fetchData("");
});




     
        
        
       

function paginateFun(number_page) {
  const tableElement = document.getElementById("data");



  tableElement.innerHTML = "";

  const start = (number_page - 1) * limit;
  const end = number_page * limit;

let AllData;

if (Array.isArray(filteredProducts.data) && filteredProducts.data.length > 0) {
    AllData = filteredProducts.data;
} else if (Array.isArray(filteredProducts) && filteredProducts.length > 0) {
    AllData = filteredProducts;
} else {
    // Handle the case when neither condition is met
    AllData = []; // or null or any other default value you prefer
}


  const paginate_items = AllData.slice(start, end).map((elem) => {
    return `          <div class="row mt-5 mb-1">
    
      <div class="col-lg-5 mt-lg-0 mt-4">
        <div class="position-relative">
          <img src="${elem.img}" alt="" class=" image_wiki" >
        </div>
      </div>
      <div class="col-lg-7 mb-lg-0 mb-md-5 mb-4 align-self">
        <h6 class="title-subhny">created by <a href="index.php?action=profile&auteur_id=${elem.auteur_id}"> ${elem.name}</a></h6>
        <h3 class="title-left mx-0">${elem.title}</h3>
        <h6 class="title-subhny">Categorie <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href=""> ${elem.catg_name}</a></h6>
        <h6 class="title-subhny">Tags <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href=""> ${elem.tag_name}</a></h6>
        <p class="mt-md-4 mt-3 max-lines-3">${elem.contenu}.</p>
        <a href="index.php?action=moredetails&id_wiki=${elem.id_wiki}"  class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" > Read More</a>
      </div>
    
    </div>
 `;
  });

  tableElement.innerHTML = paginate_items.join("");
  // <a class="page-link " data-page="${elem + 1}" onclick="paginateFun(${elem + 1})" href="#goo">${elem + 1}</a>


  const buttons = [...Array(Math.ceil(AllData.length / limit)).keys()].map((elem) => {
    return `<li class="page-item">
      <button class="page-link " data-page="${elem + 1}" onclick="paginateFun(${elem + 1})">${elem + 1}</button>
    </li>`;
  });

  document.getElementById("paginate").innerHTML = buttons.join("");

  const buttone = document.querySelectorAll('.page-link');
  buttone.forEach(button => {
    button.classList.remove('active');
  });

  const activeButton = document.querySelector(`.page-link[data-page="${number_page}"]`);
  if (activeButton) {
    activeButton.classList.add('active');
  }
}

function fetchData(keyword) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "View/View_front/ajax/affiche_wiki.php?keyword=" + keyword, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {


      const data = JSON.parse(xhr.responseText);
    //   const data = xhr.responseText;

      // Update filteredProducts with fetched data
    filteredProducts = data;
    console.log(filteredProducts) ;


    paginateFun(1); // Call paginateFun after fetching data
    } else {
      console.error('Request failed with status ' + xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error('Request failed');
  };

  xhr.send();
}

fetchData("")

// function search(keyword) {
//   console.log(keyword)
//   const endpoint = `https://your_server_endpoint.com/search?keyword=${keyword}`;

//   fetch(endpoint)
//     .then(response => {
//       if (!response.ok) {
//         throw new Error('Network response was not ok');
//       }
//       return response.json();
//     })
//     .then(data => {
//       // Handle the data returned from the server
//       console.log(data); // Update this to process the retrieved data
//     })
//     .catch(error => {
//       console.error('There was a problem with the fetch operation:', error);
//     });
// }


    const keywordInput = document.getElementById('keywordInput');

keywordInput.addEventListener('input', function() {
  const keywor = this.value.trim();
  
  fetchData(keywor) ;
});




  



  
