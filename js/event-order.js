document.addEventListener("DOMContentLoaded", (event) => {

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

    // $('.date-button').click(function() {
    //     selectedDate = $(this).data('date');
    //     $('#selected-date').text('Вы выбрали дату: ' + selectedDate);
    // });

    // $(document).on('click', '.time-button', function() {
    //     selectedTime = $(this).data('time');
    //     $('#selected-date').text('Вы выбрали дату: ' + selectedDate + ' и время: ' + selectedTime);
    // });

    // $('#increase-quantity').click(function() {
    //     ticketCount++;
    //     $('#ticket-count').val(ticketCount);
    //     updateTotalPrice();
    // });

    // $('#decrease-quantity').click(function() {
    //     if(ticketCount > 1) {
    //         ticketCount--;
    //         $('#ticket-count').val(ticketCount);
    //         updateTotalPrice();
    //     }
    // });

    // function updateTotalPrice() {
    //     let totalPrice = ticketCount * ticketPrice;
    //     $('#total-price').text(totalPrice + ' ₴');
    // }

    // $('#confirm-order').click(function() {
    //     window.location.href = '#'; 
    // });
});
