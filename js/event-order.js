document.addEventListener("DOMContentLoaded", (event) => {
    //tickets
    let selectedDate = '';
    let selectedTime = '';
    let ticketCount = 1;
    let ticketPrice = 150; 

    let time_buttons = document.querySelectorAll('.time-button');
    time_buttons.forEach(function(item){
        item.addEventListener('click', function(){
            let selectedButton = document.querySelector('.time-button.selected');
            console.log(selectedButton)
            if(selectedButton){
                selectedButton.classList.remove('selected');
            }
            item.classList.add('selected');

            document.querySelectorAll('.time-button').forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');

            const price = parseFloat(this.getAttribute('data-price')); 
            const maxTickets = this.getAttribute('data-count'); 
            const ticketInput = document.getElementById('ticket-count');
            
            ticketInput.value = 1;
            ticketInput.setAttribute('max', maxTickets);

            updateTotalPrice();
        });
    });

    let date_buttons = document.querySelectorAll('.date-button');
    date_buttons.forEach(function(item, db_index){
        item.addEventListener('click', function(){
            //time
            let order_id = item.getAttribute('data-order');
            let timeButtons = document.querySelectorAll('.time-button[data-order="' + order_id + '"]');
            let showButtons = document.querySelectorAll('.time-button.show');
            showButtons.forEach(function(time){
                time.classList.remove('show')
            });
            timeButtons.forEach(function(time, index){
                if(index == 0)
                    time.click();
                time.classList.add('show')
            });

            //date
            let selectedButton = document.querySelector('.date-button.selected');
            console.log(selectedButton)
            if(selectedButton){
                selectedButton.classList.remove('selected');
            }
            item.classList.add('selected');
        });
        if(db_index == 0){
            item.click();
        }
    });

    document.getElementById('decrease-quantity').addEventListener('click', function() {
        const ticketInput = document.getElementById('ticket-count');
        let currentValue = parseInt(ticketInput.value);

        if (currentValue > parseInt(ticketInput.min)) {
            ticketInput.value = currentValue - 1;
            updateTotalPrice(); 
        }
    });

    let increase_q = document.getElementById('increase-quantity');
    if(increase_q)
        increase_q.addEventListener('click', function() {
            const ticketInput = document.getElementById('ticket-count');
            let currentValue = parseInt(ticketInput.value);
            const maxValue = parseInt(ticketInput.max);

            if (currentValue < maxValue) {
                ticketInput.value = currentValue + 1;
                updateTotalPrice(); 
            }
        });
    
    const ticketInput = document.getElementById('ticket-count');
    ticketInput.addEventListener('input', function() {
        const maxValue = parseInt(ticketInput.max);
        const minValue = parseInt(ticketInput.min);

        if (ticketInput.value < minValue) {
            ticketInput.value = minValue;
        } else if (ticketInput.value > maxValue) {
            ticketInput.value = maxValue;
        }

        updateTotalPrice(); 
    });

    //order

    // let order_button = document.getElementById('confirm-order');
    // if(order_button)
    //     order_button.addEventListener('click', function() {
    //         let userName = document.querySelector('#user_name').value;
    //         let userMail = document.querySelector('#user_mail').value;
    //         let ticketCount = document.querySelector('#ticket-count').value;

    //         let event_b =  document.querySelector('.time-button.selected');
    //         let event_id = event_b.getAttribute('data-order');
    //         let data_key = event_b.getAttribute('data-order-time');

    //         jQuery.ajax({
    //             url: '/wp-admin/admin-ajax.php',
    //             type: 'POST',
    //             data: {
    //                 'action' : 'create_order',
    //                 'userName' : userName,
    //                 'userMail' : userMail,
    //                 'ticketCount' : ticketCount,
    //                 'event_id' : event_id,
    //                 'data_key' : data_key
    //             },
    //             success: function( response ) {
    //                 console.log(response);
    //             },
    //             error: function(response){
    //                 console.log(response);
    //             }
    //         }); 
    //     });

    let order_button = document.getElementById('confirm-order');
    if(order_button)
        order_button.addEventListener('click', function() {
            let userName = document.querySelector('#user_name').value.trim();
            let userMail = document.querySelector('#user_mail').value.trim();
            let ticketCount = document.querySelector('#ticket-count').value;

            if (userName === '') {
                UIkit.notification({message: 'Write Name', status: 'warning'});
                return;
            }

            if (userMail === '') {
                UIkit.notification({message: 'Write Mail', status: 'warning'});
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(userMail)) {
                UIkit.notification({message: 'Write correct email', status: 'warning'});
                return;
            }

            let event_b = document.querySelector('.time-button.selected');
            let event_id = event_b.getAttribute('data-order');
            let data_key = event_b.getAttribute('data-order-time');

            jQuery.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action': 'create_order',
                    'userName': userName,
                    'userMail': userMail,
                    'ticketCount': ticketCount,
                    'event_id': event_id,
                    'data_key': data_key
                },
                success: function(response) {
                    UIkit.notification({message: 'Order success created', status: 'success'})
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
});

function updateTotalPrice() {
    const selectedButton = document.querySelector('.time-button.selected'); 
    const ticketInput = document.getElementById('ticket-count');
    const totalPriceElement = document.getElementById('total-price');

    if (selectedButton) {
        const price = parseFloat(selectedButton.getAttribute('data-price')); 
        const totalPrice = price * parseInt(ticketInput.value);
        totalPriceElement.textContent = `₴${totalPrice}`;
    }
}