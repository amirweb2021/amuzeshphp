const matnbtn = document.getElementById('matn1btn');
const popup = document.getElementById('popup');
const popupclose = document.getElementById('popupclose');
matnbtn.addEventListener('click', ()=>{
    popup.style.display = 'block';
})
popupclose.addEventListener('click', ()=>{
    popup.style.display = 'none';
})