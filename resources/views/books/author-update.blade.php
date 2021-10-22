<input type="hidden" name="add_authors" value="" id="add_authors">
<input type="hidden" name="remove_authors" value="" id="remove_authors">

<div class="authors-change">
  <div class="authors-change__list-box">
    <h4>Authors:</h4>
      <ul class="authors-change__add">
      </ul>
  </div>

</div>


<label for="findAuthor">search available authors:</label>
            <input
                type="text"
                name="findAuthor"
                id="findAuthor"
                class="author__find"
            />

<ol class="authors__list"></ol>

<?php 
$info = $authors->toJSON();
?>

<script type="text/javascript">
  
  const data = '<?php echo "$info"?>';
  
  const authorInfo = JSON.parse(data);
  let authorAdd = [];
  let authorRemove = [];

  console.log(authorInfo);

  const getNames = (list) => {
    for (let i = 0; i < list.length; i++) {
        const nameList = document.querySelector('.authors__list');
        let name = list[i]['name'];
        let id = list[i]['id'];
        nameList.innerHTML += '<li class="add-remove">' + name + '<button type="button" id="addToList" value="' + id + '">add to book</button></li>';
    }
  };

  getNames(authorInfo);

  // to search a string

  const search = (string, array) => {


  //html to change    
  const nameList = document.querySelector('.authors__list');

  // clear previous search so we don't build a list of all letter searches

  nameList.innerHTML = "";
  // this needs to happen before the loop or the loop will just reset itself

  for (let i = 0; i < array.length; i++) {
    // make both items lower case
    const searchingFor = string.toLowerCase();
    const beingSearched = array[i]['name'].toLowerCase();

    // the name and id to be printed/saved if a match is found
    let name = array[i]['name'];
    let id = array[i]['id'];
    // the value of the search result
    let isThere = beingSearched.indexOf(searchingFor);

    // if the result returns a valid index print the name
    if (isThere > -1) {
      nameList.innerHTML += '<li class="add-remove">' + name + '<button type="button" id="addToList" value="' + id + '">add to book</button></li>';
      
      // redefine buttons and new event listeniners for new html elements
      const addToBookButton = document.querySelectorAll('#addToList');
      const removeFromBookButton = document.querySelectorAll('#removeFromList');
      
      addToBookButton.forEach((element, index) => {
        element.addEventListener('click', () => {
        console.log('click');
        return addToList(element.value);
        })
      })


      removeFromBookButton.forEach((element, index) => {
        element.addEventListener('click', () => {
        console.log('click');
        return removeFromList(element.value);
        })
      })

    }
  }
}

// to search

const startAuthorSearch = () => {
  search(findAuthor.value, authorInfo);
}

// to read the search automatically 
const findAuthor = document.querySelector('#findAuthor');

findAuthor.addEventListener('keyup', () => {
  return startAuthorSearch();
})

// lists to update

let addList = document.querySelector('.authors-change__add');
let removeList = document.querySelector('.authors-change__remove');

// hidden input to update

let addAuthorsValues = document.querySelector('#add_authors');
let removeAuthorsValues = document.querySelector('#remove_authors');

// add and remove buttons (need repeating in the for loop)

const addToBookButton = document.querySelectorAll('#addToList');
let removeFromListButton = document.querySelectorAll('#removeFromListButton');

// remove from list function

function removeFromList (id) {
  // remove/delete html list item id="list-item-{id}"
  let itemId = 'list-item-' + id;
  let item = document.getElementById(itemId);
  item.parentNode.removeChild(item);
  // remove the id number from the authorAdd array
  for(let i = 0; i < authorAdd.length; i++) {
    console.log('This is the loop, i =' + i);
    console.log(id);
    if(id == authorAdd[i]) {
      authorAdd.splice(i, 1);
      console.log(i);
    }
    // update the addAuthorsValues
  }
  console.log(authorAdd);
  addAuthorsValues.value = authorAdd.join(' ');

}


// add to list function
function addToList(id) {
  authorAdd.push(id);
  addAuthorsValues.value = authorAdd.join(' ');
  let buttonId = 'removeFromListButton' + id;
  addList.innerHTML += '<li id="list-item-' + id + '">' + authorInfo[id-1]['name'] + '<button type="button" id="' + buttonId + '" value="' + id + '" class="removeButton">remove from list</button></li>';
  buttonId = '#removeFromListButton' + id;
  const removeFromListButton = document.querySelectorAll('.removeButton');
  removeFromListButton.forEach((element, i) => {
    element.addEventListener('click', () => {
      return removeFromList(element.value);
    })
  })
}

// add to list button (repeated in for loop!!)
addToBookButton.forEach((element, index) => {
  element.addEventListener('click', () => {
    console.log(element.value);
  return addToList(element.value);
})
})




</script>

@foreach($book->authors as $author)
  
<script>addToList({{$author->id}});
console.log({{$author->id}})
</script>

@endforeach



