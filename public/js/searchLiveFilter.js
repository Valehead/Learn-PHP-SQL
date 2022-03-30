//function for filtering the customer cards being shown
function mySearchFilter() {
                
    //declare variables
    var input, filter, customerCards, customerInfos, info, i, f, infosValue;

    //get the search input
    input = document.getElementById("mySearch");

    //filter the search
    filter = input.value.toUpperCase();

    //get ALL of the customers
    customerCards = document.querySelectorAll('#customer');

    //loop over ALL the customers
    for (i = 0; i < customerCards.length; i++) {

        //get ALL of the customer info stored in the li's
        customerInfos = customerCards[i].getElementsByTagName('li');
    
        //loop over ALL of the info in each card
        for(f=0; f < customerInfos.length; f++){

            //get the data in each element
            info = customerInfos[f].textContent;

            if(info) {

                //make the data uppercase for easy comparison
                infosValue = info.toUpperCase();
            };

            //if the filtered search data exists inside ANY of the customer values
            if (infosValue.indexOf(filter) > -1) {

                //set the display to visible and don't check the rest of that customer's values
                customerCards[i].style.display = "";
                break;

            } else {
                //if no match, hide the customer
                customerCards[i].style.display = "none";
            };
        };
    };                

};