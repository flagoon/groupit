const PORT = 3000;

const folders = document.getElementById('folders');

let data = () => {
  return fetch(`http://localhost:${PORT}/sizeCounter.php`).then(res => res.json()).then(res => showTable(res));
}

const showTable = (res) => {
  let table = `<table><tr><td>Name</td><td>Value</td></tr>`;
  for(let name of Object.keys(res)) {
    if(name === '.') {
      continue;
    }
    table += `<tr><td><a ${addClass(res[name][1])}>${name}</a></td><td>${res[name][0]}</td></tr>`;
  }
  table += `</table>`;
  folders.innerHTML = table;
  addEvents();
}

const addEvents = () => {
  const links = document.querySelectorAll('a');
  for(let i = 0; i < links.length; i++) {
    if(links[i].id.indexOf('.') === -1) {
      links[i].addEventListener('click', updateTable);
    }
  }
}

const addClass = (name) => {
  if(name === 'folder') {
    return "class='link'";
  }
}

const updateTable = (e) => {
  fetch(`http://localhost:${PORT}/sizeCounter.php`, {body: JSON.stringify({name: e.target.innerText}), method: 'POST'})
    .then(res => res.json())
    .then(res => showTable(res));
}

const test = data();