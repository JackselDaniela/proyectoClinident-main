function convertEnToEs() {
    const todayBtn = document.querySelector('.fc-today-button.fc-button.fc-state-default.fc-corner-left.fc-corner-right.fc-state-disabled')
    const monthBtn = document.querySelector('.fc-month-button.fc-button.fc-state-default.fc-corner-left.fc-state-active')
    const weekBtn = document.querySelector('.fc-agendaWeek-button.fc-button.fc-state-default')
    const dayBtn = document.querySelector('.fc-agendaDay-button.fc-button.fc-state-default.fc-corner-right')

    todayBtn.textContent = "Hoy"
    monthBtn.textContent = "Mes"
    weekBtn.textContent = "Semana"
    dayBtn.textContent = "Dia"
}

convertEnToEs()
