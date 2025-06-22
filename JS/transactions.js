const transactions = 0;

document.getElementById("Deposite-button").addEventListener('click', () => {
    transactions++

    if(transactions == 10){
        alert("You have reached the maximum number of transactions")
        let button = document.getElementById("Deposite-button")
        button.style.pointerEvents = 'none'
        button.style.opacity = 0.6

    }
})