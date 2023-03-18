function openParametr(evt, parametrName) {
    var i, tabcontent, tablinks; //Объявим все переменные.
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none"; // Получим все элементы с классом tabcontent и спрячем их.
    }
    tablinks = document.getElementsByClassName("tablinks"); 
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");//Получим все элементы с классом tablinks и удалим активный класс.
    }
    document.getElementById(parametrName).style.display = "block"; //Покажем текущую вкладку и добавим активный класс на кнопку, которая откроет вкладку с ID по названию города.
    evt.currentTarget.className += " active";
}