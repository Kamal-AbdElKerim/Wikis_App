function NoneRequest(id, button) {
    console.log(button.classList) ;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "View/Vew_Admin/Wikis/ajax_wikis/wikis_ajax.php?id=" + id, true);
  
    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 300) {
       
          // Toggle the button text between 'None' and 'Block'
          const buttonText = button.querySelector('#result_' + id);

          console.log(xhr.responseText)
         
          if (buttonText.innerHTML === 'None') {
          
            buttonText.innerHTML = 'Block';
            button.classList.remove('btn-info');
            button.classList.add('btn-secondary');
          } else {
            buttonText.innerHTML = 'None';
            button.classList.remove('btn-secondary');
            button.classList.add('btn-info');
          }
       
      } else {
        console.error('Request failed');
      }
    };
  
    xhr.onerror = function() {
      console.error('Request failed');
    };
  
    xhr.send();
  }