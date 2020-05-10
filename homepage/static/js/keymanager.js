function openKeys(evt, tableType) {
  // Объявляем все переменные
  var i, tabcontent, tablinks;

  // Прячем все элементы TabContent
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Убираем класс active у элементов classlink
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Показываем текущую вкладку
  document.getElementById(tableType).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultTab").click();
