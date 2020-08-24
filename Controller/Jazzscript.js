function pickButtonDay(day){
    if(day === "Thursday" || day === "thursday"){
        jazzShowThursday()
    }
    else if(day === "Friday" || day === "friday"){
        jazzShowFriday()
    }
    else if(day === "Saturday" || day === "saturday"){
        jazzShowSaturday()
    }
    else if(day === "Sunday" || day === "sunday"){
        jazzShowSunday()
    }

}

function jazzShowThursday() {
    document.getElementById("thursday").style.display="table";
    document.getElementById("friday").style.display="none";
    document.getElementById("saturday").style.display="none";
    document.getElementById("sunday").style.display="none";

    document.getElementById("btn_Thursday").style.backgroundColor = "greenyellow";
    document.getElementById("btn_Friday").style.backgroundColor = "white";
    document.getElementById("btn_Saturday").style.backgroundColor = "white";
    document.getElementById("btn_Sunday").style.backgroundColor = "white";
}

function jazzShowFriday() {
    document.getElementById("thursday").style.display="none";
    document.getElementById("friday").style.display="table";
    document.getElementById("saturday").style.display="none";
    document.getElementById("sunday").style.display="none";

    document.getElementById("btn_Thursday").style.backgroundColor = "white";
    document.getElementById("btn_Friday").style.backgroundColor = "greenyellow";
    document.getElementById("btn_Saturday").style.backgroundColor = "white";
    document.getElementById("btn_Sunday").style.backgroundColor = "white";
}

function jazzShowSaturday() {
    document.getElementById("thursday").style.display="none";
    document.getElementById("friday").style.display="none";
    document.getElementById("saturday").style.display="table";
    document.getElementById("sunday").style.display="none";

    document.getElementById("btn_Thursday").style.backgroundColor = "white";
    document.getElementById("btn_Friday").style.backgroundColor = "white";
    document.getElementById("btn_Saturday").style.backgroundColor = "greenyellow";
    document.getElementById("btn_Sunday").style.backgroundColor = "white";
}

function jazzShowSunday() {
    document.getElementById("thursday").style.display="none";
    document.getElementById("friday").style.display="none";
    document.getElementById("saturday").style.display="none";
    document.getElementById("sunday").style.display="table";

    document.getElementById("btn_Thursday").style.backgroundColor = "white";
    document.getElementById("btn_Friday").style.backgroundColor = "white";
    document.getElementById("btn_Saturday").style.backgroundColor = "white";
    document.getElementById("btn_Sunday").style.backgroundColor = "greenyellow";
}



const openModalButtons = document.querySelectorAll('[data-modal-target]', '[data-modal-target]1','[data-modal-target1]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})

function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}




function test(id){
    console.log(id);
}

function HideGetYourTicket() {
    document.getElementById(GetYourTicket).style.displa = none;
}

function ShowGetYourTicket() {
    document.getElementById(GetYourTicket).style.display = block;
}



function SingelticketPrice(amount, price) {
    var amount = amount.value;
    var price = amount * 15.00;
    document.getElementById("singleprice").innerHTML = formatter.format(price);
}

const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'EUR',
    minimumFractionDigits: 2
})