import './bootstrap';

import '../sass/app.scss';

$('#datepicker').datepicker();

//function addDate() {
  // 新しくinput要素を作成し、定数に代入する
  //const date = document.createElement('input');
  // 作成したinput要素に日付を追加する
  //date.setAttribute("name","date[]");
  //date.setAttribute("type","date");
  // input要素の末尾にdate要素を追加する
  //document.querySelector(".date").appendChild(date);
//}

//const date = document.getElementsByClassName('date');

//increase.addEventListener('click', addDate);

//function removeDate() {
  //document.querySelector(".date").removeChild(date);
//}

//decrease.addEventListener('click', removeDate);

const parent = document.getElementById('parent');
const addBtn = document.getElementById('addBtn');
const removeBtn = document.getElementById('removeBtn');
addBtn.addEventListener('click', () => {
	const input = document.createElement('input');
	input.type = 'date';
	input.name = 'date[]';
	input.classList.add('dates');
	parent.appendChild(input);
	//console.log(input.value);
});

removeBtn.addEventListener('click', () => {
	const dates = document.getElementsByClassName('dates');
	//if(dates.length > 1) dates[dates.length - 1].remove();
	for (let i = 0; i < dates.length; i++) {
		console.log(dates[i].value);
		if(!dates[i].value && dates.length > 1){
			dates[dates.length - 1].remove();
		} 

		//console.log("こんにちは")
		//if(dates[i])
	}
});
//sendBtn.addEventListener('click', () => {
	//const dates = document.getElementsByClassName('dates');
	//for(let i = dates.length - 1; i >= 0; i--) {
		//if(dates[i].value == '') dates[i].remove();
	//}
//});
