function form1() {
    let key = document.getElementById("group").value;
    let result = localStorage.getItem(key);
    document.getElementById('res').innerHTML = result;
}
function form2() {
    let teacher = document.getElementById("teacher").value;
    let disciple = document.getElementById("disciple").value;
    let key = teacher + disciple; 
    let result = localStorage.getItem(key);
    document.getElementById('res').innerHTML = result;
}
function form3(){
    let auditorium = document.getElementById("auditorium").value;
    let result = localStorage.getItem(auditorium);
    document.getElementById('res').innerHTML = result;
}
